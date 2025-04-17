<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\EnrolledSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Period;
use App\Models\Timetable;
use Illuminate\Support\Facades\Auth;

class UserAttendanceController extends Controller
{
    // ユーザーのトップ画面
    public function index(Request $request){
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::id();
        // ログインユーザーのIDから履修科目と科目情報を取得
        $enrolled_subjects = EnrolledSubject::where([
            ['student_id', $user],
            ['is_deleted', 0],
        ])->with(['subject:id,name,total_lectures,completed_lectures,term'])->get();

        // 生徒の出席情報を格納する配列
        /*
        $attendance_info[科目ID][出席数, 現在までの日数, 必要出席日数, 見込出席数]
        */
        $attendance_info = [];

        // 1科目ごとに情報を格納する
        foreach($enrolled_subjects as $subject) {
            // 出席数
            $attendance_total = AttendanceRecord::where([
                ['enrolled_subject_id', $subject->id], 
                ['attendance_status_id', 1],
                ])->count();
            // 公欠日数
            $officially_abstance_total = AttendanceRecord::where([
                ['enrolled_subject_id', $subject->id], 
                ['attendance_status_id', 3],
                ])->count();
            // 必要出席日数
            $need_attendance_days = ceil(($subject->subject->total_lectures - $officially_abstance_total) * 0.9);
            // 欠席早退日数
            $abstance_days = AttendanceRecord::where('enrolled_subject_id', $subject->id)->whereIn('attendance_status_id', [2,4])->count();
            // 見込出席率
            $prospect_attendance_rate = floor(($subject->subject->total_lectures - $abstance_days - $officially_abstance_total) / ($subject->subject->total_lectures - $officially_abstance_total) * 100);
            $attendance_info[$subject->subject->id] = [
                'attendanceDays' => $attendance_total,
                'lecturesToDate' => $subject->subject->completed_lectures,
                'needAttendanceDays' => intval($need_attendance_days),
                'prospectAttendanceRate' => intval($prospect_attendance_rate)
            ];
        }
        // dd($attendance_info);
        return view('user.user_top', compact('attendance_info'));
    }

    //今受けている授業の取得
    public function get_subject(Request $request) {
        // $user_id = Auth::id();
        $user_id = 1;
        $now = Carbon::now('Asia/Tokyo');
        $dayOfWeekId = $now->dayOfWeek;
        $fiveMinutesAgo = $now->copy()->subMinutes(3)->format('H:i:s'); //3分まえまで
        $time = $now->format('H:i:s');

        if ($dayOfWeekId >= 1 && $dayOfWeekId <= 5) {
            $period = Period::where('start_time', '<=', $time)
                ->where('start_time', '>=', $fiveMinutesAgo)
                ->where('finish_time', '>=', $time)
                ->first();
        }
        $enrolledSubjects = EnrolledSubject::where('student_id', $user_id)->with('subject')->get();
        foreach ($enrolledSubjects as $enrolledSubject) {
            $subject = $enrolledSubject->subject;

            if (!$subject) continue;

            $period_id = 1;
            // 時間割に今のコマ・曜日があるかチェック
            $timetable = $subject->timetables()
                ->where('day_id', $dayOfWeekId)
                ->where('period_id', $period_id) //ここを$period->id
                ->first();

            if ($timetable) {
                // 見つかったらその授業名を返す
                return response()->json([
                    'subject_id' => $subject->id,
                    'subject_name' => $subject->class_name,
                    'period' => $period->period,
                    'day' => $dayOfWeekId,
                ]);
            }
        }
        return response()->json([
                    'subject_id' => 2,
                    'subject_name' => "Java基礎",
                ]);
        // return response()->json(['message' => '現在受ける授業はありません']);
    }

    //学校の敷地内か
    public function check(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $accuracy = $request->input('accuracy');
        $isAccuracy = $request->input('isAccurate');

        // $schoolLat = 39.70596;
        // $schoolLon = 141.14183;

        $schoolLat = 39.73973;
        $schoolLon = 141.08785;


        $distance = $this->calculateDistance($latitude, $longitude, $schoolLat, $schoolLon);

        if ($isAccuracy) {
            // 精度が高い → 距離だけで判断
            $inside = $distance <= 30;
        } else {
            // 精度が悪い → 精度 + 誤差分を見込む
            $estimatedRange = $this->getEstimatedRange($latitude, $longitude, $accuracy);
            $inside = $this->isInsideRange($latitude, $longitude, $estimatedRange);
        }

        return response()->json([
            'inside' => $inside,
            'distance' => $distance,
        ]);
    }

    public function leaving_early(Request $request) {
        // $user_id = Auth::id();
        $user_id = 1;
        $subject_id = $request->input('subject_id');

        $enrolledSubject = EnrolledSubject::where('student_id', $user_id)
            ->where('subject_id', $subject_id)
            ->first();

        $latestAttendance = AttendanceRecord::where('enrolled_subject_id', $enrolledSubject->id)
            ->latest('created_at') // or ->orderBy('id', 'desc')
            ->first();

        $latestAttendance->attendance_status_id = 2; // 2: 早退
        $latestAttendance->reason = $request->input('reason');
        $latestAttendance->save();

        return response()->json(['message' => '早退登録が完了しました']);
    }

    //出席登録
    public function register_attendance(Request $request)
    {
        // $user_id = Auth::id();
        $user_id = 1;
        $subject_id = $request->input('subject_id');
        $date = Carbon::now('Asia/Tokyo')->format('Y-m-d');
        $enrolledSubject = EnrolledSubject::where('student_id', $user_id)
            ->where('subject_id', $subject_id)
            ->first();

        $alreadyExists = AttendanceRecord::where('enrolled_subject_id', $enrolledSubject->id)
        ->where('date', $date)
        ->exists();

        if ($alreadyExists) {
            return response()->json([
                'message' => 'すでに本日の出席は登録されています',
                'status' => 'duplicate'
            ], 409); // 409 Conflict
        }

        AttendanceRecord::create([
            'enrolled_subject_id' => $enrolledSubject->id,
            'attendance_status_id' => 1, //出席
            'date' => $date,
        ]);

        return response()->json(['message' => '出席登録が完了しました']);
    }

    // 距離計算（Haversine式）
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $radLat1 = deg2rad($lat1);
        $radLat2 = deg2rad($lat2);
        $deltaLat = deg2rad($lat2 - $lat1);
        $deltaLon = deg2rad($lon2 - $lon1);

        // Haversine式
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
             cos($radLat1) * cos($radLat2) *
             sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // 地球の半径（メートル）
        $earth_radius = 6378137;

        // 距離を計算して返す（メートル）
        return $earth_radius * $c;
    }

    // 範囲内かどうか判定
    private function isInsideRange($lat, $lon, $range)
    {
        return $lat >= $range['minLat'] && $lat <= $range['maxLat'] && $lon >= $range['minLon'] && $lon <= $range['maxLon'];
    }

    // 精度が悪いときのざっくり範囲
    private function getEstimatedRange($lat, $lon, $accuracy)
    {
        // 緯度方向のメートル→度変換
        $latRange = $accuracy / 111000;
        // 経度方向のメートル→度変換
        $lonRange = $accuracy / (111000 * cos(deg2rad($lat)));

        return [
            'minLat' => $lat - $latRange,
            'maxLat' => $lat + $latRange,
            'minLon' => $lon - $lonRange,
            'maxLon' => $lon + $lonRange,
        ];
    }

}