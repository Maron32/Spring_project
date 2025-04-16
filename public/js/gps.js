let schoollatitude = 39.70596; //緯度
let schoollongitude = 141.14183; //経度

//現在地取得の関数
function success(position) {
    let latitude = position.coords.latitude; //緯度を取得
    let longitude = position.coords.longitude; //経度を取得
    let accuracy = position.coords.accuracy; //精度を取得
    console.log("緯度" + latitude, "経度" + longitude, "精度" + accuracy);
    let lat = latitude; //緯度を変数に代入
    let long = longitude; //経度を変数に代入
    let isAccurate = accuracy <= 18;
    console.log("精度" + isAccurate);

    // if (accuracy <= 18) {
    //     const isInside = isWithinSchool(lat, long);
    //     console.log(isInside);

    //     console.log(isInside ? "学校の敷地内です" : "学校の外にいます");
    // } else {
    //     const estimatedDistance = getDistance(
    //         latitude,
    //         longitude,
    //         schoollatitude,
    //         schoollongitude
    //     );
    //     console.log("推定距離", estimatedDistance, "精度（誤差）", accuracy);

    //     if (estimatedDistance <= accuracy + 30) {
    //         console.log("※精度が悪いけど、学校の敷地内");
    //     } else {
    //         console.log("※精度が悪く、学校の外");
    //     }

    //     // 範囲情報も表示（デバッグ用）
    //     const range = getEstimatedRange(latitude, longitude, accuracy);
    //     console.log("範囲", range);
    // }

    fetch("http://127.0.0.1:8000/check_location", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({
            latitude: latitude,
            longitude: longitude,
            accuracy: accuracy,
            isAccurate: isAccurate,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
        });
}

//学校との距離を計算する関数
function getDistance(lat, long, sh_lat, sh_long) {
    let now_lat = (lat * Math.PI) / 180; // 緯度をラジアンに変換
    let now_long = (long * Math.PI) / 180; // 経度をラジアンに変換
    let ra_sh_lat = (sh_lat * Math.PI) / 180;
    let ra_sh_long = (sh_long * Math.PI) / 180;
    let lat_dis = now_lat - ra_sh_lat;
    let long_dis = now_long - ra_sh_long;

    let s =
        2 *
        Math.asin(
            Math.sqrt(
                Math.pow(Math.sin(lat_dis / 2), 2) +
                    Math.cos(now_lat) *
                        Math.cos(ra_sh_lat) *
                        Math.pow(Math.sin(long_dis / 2), 2)
            )
        );
    s = s * 6378137;
    return Math.round(s * 10000) / 10000; // 距離を返す
}

//範囲内かどうか判定
function isWithinSchool(lat, lon) {
    const distance = getDistance(lat, lon, schoollatitude, schoollongitude);
    console.log("距離", distance);
    return distance <= 30; // 30m以内なら敷地内
}

function gps_error() {
    alert("位置情報が取得出来ません");
}

//精度が悪いときのざっくり
function getEstimatedRange(lat, lon, accuracy) {
    const latRange = accuracy / 111000; // 緯度方向のメートル→度変換
    const lonRange = accuracy / (111000 * Math.cos((lat * Math.PI) / 180)); // 経度方向

    return {
        minLat: lat - latRange,
        maxLat: lat + latRange,
        minLon: lon - lonRange,
        maxLon: lon + lonRange,
    };
}

const options = {
    enableHighAccuracy: true,
    maximumAge: 0,
    timeout: 5000,
};
