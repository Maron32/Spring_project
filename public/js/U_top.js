"use strict";

const attend = document.getElementById("attend");
const goHome = document.getElementById("goHome");
const overlay = document.getElementById("overlay");
const overlay2 = document.getElementById("overlay2");
const overlay3 = document.getElementById("overlay3");
const overlay4 = document.getElementById("overlay4");
const overlay5 = document.getElementById("overlay5");

const overlayReturnBtn1 = document.getElementById("overlayReturnBtn1");
const overlayReturnBtn2 = document.getElementById("overlayReturnBtn2");
const overlayAttendBtn = document.getElementById("overlayAttendBtn");
const overlayGoHomeBtn = document.getElementById("overlayGoHomeBtn");

const closeBtn1 = document.getElementById("closeBtn1");
const closeBtn2 = document.getElementById("closeBtn2");

const reasonInput = document.getElementById("reasonInput"); //早退理由
const error = document.getElementById("error");
const subject = document.getElementById("subject");

// オーバーレイを有効にする
attend.addEventListener("click", function () {
    //今の自分がとっている授業を取得
    fetch("/get_subject", {
        method: "GET",
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
            if (data.subject_name) {
                localStorage.setItem("subject_id", data.subject_id);
                subject.innerHTML = `<p>授業名：${data.subject_name}</p>`;
            } else {
                subject.innerHTML = `<p>${data.message}</p>`;
            }
        });
    //別ファイルの関数を使い現在地取得
    if (navigator.geolocation) {
        const watchId = navigator.geolocation.getCurrentPosition(
            success,
            gps_error,
            options
        );
        overlay.style.display = "flex";
    } else {
        alert("位置情報が使えません");
    }
});

// オーバーレイ2を有効にする
goHome.addEventListener("click", function () {
    overlay2.style.display = "flex";
});

// オーバーレイ内の戻るボタン
overlayReturnBtn1.addEventListener("click", function () {
    localStorage.clear();
    overlay.style.display = "none";
});

overlayReturnBtn2.addEventListener("click", function () {
    //早退理由やピンク背景の削除
    reasonInput.value = "";
    reasonInput.style.backgroundColor = "white";
    error.textContent = "";

    overlay2.style.display = "none";
});

//出席ボタンを押したときに受理成功の文言を表示
overlayAttendBtn.addEventListener("click", function () {
    overlay.style.display = "none"; //オーバーレイを削除
    const locationCheckResult = localStorage.getItem("locationCheckResult");
    const subject_id = localStorage.getItem("subject_id");
    console.log("locationCheckResult", locationCheckResult);
    if (locationCheckResult === "true") {
        fetch("/register_attendance", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                subject_id: subject_id,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                overlay3.style.display = "flex"; //受理成功を表示
            });
    } else {
        overlay5.style.display = "flex";
    }
});

closeBtn1.addEventListener("click", function () {
    localStorage.clear();
    overlay3.style.display = "none";
});

//早退ボタンを押したときに受理成功の文言を表示
overlayGoHomeBtn.addEventListener("click", function () {
    //早退理由を記入していない場合エラー
    if (reasonInput.value === "") {
        reasonInput.style.backgroundColor = "pink";
        error.textContent = "早退理由を入力してください。";
    } else {
        reasonInput.value = "";
        error.textContent = "";
        overlay2.style.display = "none";

        overlay4.style.display = "flex";
    }
});

closeBtn2.addEventListener("click", function () {
    overlay4.style.display = "none";
});

//背景ピンクの時に文字を入力すると背景が白になる
reasonInput.addEventListener("input", function () {
    if (reasonInput.value) {
        reasonInput.style.backgroundColor = "white";
    }
});

closeBtn3.addEventListener("click", function () {
    localStorage.clear();
    overlay5.style.display = "none";
});
