<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\EnrolledSubject;
use App\Models\User;
use Illuminate\Http\Request;
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
}