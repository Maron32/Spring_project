"use strict";

document.getElementById('add-button').addEventListener('click', function(){
    const new_item = document.createElement('div');
    new_item.className = 'item';
    new_item.innerHTML = `
    <div class="item">
        <a>曜日</a><br>
        <select class="week" name="week">
            <option value="" selected hidden></option>
            <option value="Monday">月曜日</option>
            <option value="Tuesday">火曜日</option>
            <option value="Wednesday">水曜日</option>
            <option value="Thursday">木曜日</option>
            <option value="Friday">金曜日</option>
        </select>
    </div>
    <div class="item" id="classes">
        <a>コマ数</a><br>
        <select class="number" name="number">
            <option value="" selected hidden></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>`;
    const br = document.createElement('br');
    document.getElementById('container').appendChild(new_item);
    document.getElementById('container').appendChild(br);
});

document.getElementById('clear').addEventListener('click', function(){
    const main_input = document.querySelector('.main').querySelectorAll('input, select');
    main_input.forEach(function(input) {
        if (input.type === 'text') {
            input.value = '';
        } else if (input.type === 'radio') {
            input.checked = false;
        } else if (input.tagName.toLowerCase() === 'select') {
            input.selectedIndex = 0;
        }
    });
});