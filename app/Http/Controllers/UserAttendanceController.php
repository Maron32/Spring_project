<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAttendanceController extends Controller
{
    // ユーザーのトップ画面
    public function index(Request $request){
        return view('user.user_top');
    }

    public function check(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $accuracy = $request->input('accuracy');
        $isAccuracy = $request->input('isAccurate');

        $schoolLat = 39.70596;
        $schoolLon = 141.14183;

        $distance = $this->calculateDistance($latitude, $longitude, $schoolLat, $schoolLon);

        if ($isAccuracy) {
            // 精度が高い → 距離だけで判断
            $inside = $distance <= 30;
        } else {
            // 精度が悪い → 精度 + 誤差分を見込む
            $estimatedRange = $this->getEstimatedRange($latitude, $longitude, $accuracy);
            $inside = $estimatedRange <= $accuracy + 30;
            // $inside = $this->isInsideRange($latitude, $longitude, $estimatedRange);
        }

        return response()->json([
            'inside' => $inside,
            'distance' => $distance,
        ]);
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
        return $lat >= $range['minLat'] && $lat <= $range['maxLat'] &&
               $lon >= $range['minLon'] && $lon <= $range['maxLon'];
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