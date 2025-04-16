"use strict";

const checks = document.querySelectorAll('.check');
const addPlace = document.getElementById('addPlace');

//チェックボタンが押されたときに追加
checks.forEach(function (check) {
  check.addEventListener('change', function () {

    //カスタムでーた属性を取得
    const customdata = check.dataset.id;

    if (check.checked) {
      const tr = this.closest('tr');
      const td = tr.querySelectorAll('td');

      let name = '';
      for (let i = 1; i < 2; i++) {
        name = td[i].textContent;
        //科目ボタンを生成
        const subject = document.createElement('div');
        subject.classList.add('subjectStyle');
        // 科目divにカスタムデータを付与
        subject.dataset.subid = customdata;
        //科目ボタンの中に削除ボタンを生成
        const delBtn = document.createElement('span');
        //削除ボタンに対してカスタムデータ属性
        // 下の表から選んだ科目のidと同じidを付与
        delBtn.dataset.subid = customdata;
        delBtn.classList.add('delBtn');
        delBtn.textContent = '✕';
        subject.appendChild(delBtn);
        //削除ボタン押されたときの動作
        delBtn.addEventListener('click', function () {

          //さくじょボタンの科目id（カスタムデータ属性）を取得
          const delBtn_id = this.dataset.subid;
          //押されたボタンと同じidを持つ下の表のチェックボックスを取得
          const subject_check = document.querySelector('[data-id="' + delBtn_id + '"]');
          //チェックを外す
          subject_check.checked = false;

          this.parentNode.remove();  //親要素を削除
        })

        subject.append(document.createTextNode(name));
        addPlace.appendChild(subject);
      }
      //チェックを外されたときに上のdivを削除する処理
    } else {
      const subjectToRemove = addPlace.querySelector('.subjectStyle[data-subid="' + customdata + '"]');
      if (subjectToRemove) {
        subjectToRemove.remove();
      }
    }
  })
})