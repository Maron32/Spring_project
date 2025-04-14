"use strict";

// const container = document.getElementById('container');
const gradeInput = document.getElementById('gradeInput');
const courseInput = document.getElementById('courseInput');
const nameInput = document.getElementById('nameInput');
const mailInput = document.getElementById('mailInput');
const pwInput = document.getElementById('pwInput');
const pwConfirmInput = document.getElementById('pwConfirmInput');
const registerBtn = document.getElementById('registerBtn');
const redAlert = document.getElementById('redAlert');
const pwAlert = document.getElementById('pwAlert');
const inputs = [gradeInput, courseInput, nameInput, mailInput, pwInput, pwConfirmInput];


registerBtn.addEventListener('click', function () {
  let isValid = true;
  //未入力欄がある場合
  if (gradeInput.value === '' || courseInput.value === '' || nameInput.value === '' || mailInput.value === '' || pwInput.value === '' || pwConfirmInput.value === '') {
    redAlert.textContent = '未入力欄があります。';

    inputs.forEach(function (input) {    //未入力時、背景をピンクにする
      if (input.value === '') {
        input.style.backgroundColor = 'pink';
        isValid = false;
      }
    })
  }

  //パスワード確認が間違っていた場合
  if (pwInput.value !== pwConfirmInput.value) {
    pwAlert.textContent = 'パスワードが違います。';
    pwConfirmInput.style.backgroundColor = 'pink';
    isValid = false;
  } else {
    pwAlert.textContent = '';
  }

  //パスワードの長さ判定
  if (pwInput.value.length < 8) {
    pwAlert.textContent = 'パスワードは8文字以上にしてください';
    pwConfirmInput.style.backgroundColor = 'pink';
    isValid = false;
  }

  //すべて埋まっている場合
  if (gradeInput.value !== '' && courseInput.value !== '' && nameInput.value !== '' && mailInput.value !== '' && pwInput.value !== '' && pwConfirmInput.value !== '') {
    redAlert.textContent = '';
  }

  //文字が入力されると背景を白にする
  inputs.forEach(function (input) {
    input.addEventListener('input', function () {
      if (input.value !== '') {
        input.style.backgroundColor = 'white';
      }
    });
  });

  if (isValid) {
    //入力された情報を次のページへ渡す
    const gradeSubmit = gradeInput.value;
    const courseSubmit = courseInput.value;
    const nameSubmit = nameInput.value;
    const mailSubmit = mailInput.value;
    const pwSubmit = pwInput.value;
    const pwConSubmit = pwConfirmInput.value;
    const submitList = [gradeSubmit, courseSubmit, nameSubmit, mailSubmit, pwSubmit, pwConSubmit]

    localStorage.setItem('values', JSON.stringify(submitList));

    window.location.href = 'http://127.0.0.1:5500/%E3%82%A2%E3%82%AB%E3%82%A6%E3%83%B3%E3%83%88%E7%A2%BA%E8%AA%8D/index.html';
  }
})