"use strict";

document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll("#tab a");
    const contents = document.querySelectorAll("#tabbody div");

    tabs.forEach(tab => {
        tab.addEventListener("click", function(event) {
            event.preventDefault();

            contents.forEach(content => content.style.display = "none");

            tabs.forEach(item => item.classList.remove("active"));

            const href = this.getAttribute("href");
            const activeContent = document.querySelector(href);
            if (activeContent) {
                activeContent.style.display = "block";
            }

            this.classList.add("active");
        });
    });

    if (tabs[0]) {
        tabs[0].click();
    }
});

function updateDateDisplay(date) {
  const year = date.getFullYear();
  const month = date.getMonth() + 1;
  const day = date.getDate();
  const weekday = ["日", "月", "火", "水", "木", "金", "土"];
  const dayOfWeek = weekday[date.getDay()];

  const dateDisplayElements = document.getElementsByClassName('date-display');
  Array.from(dateDisplayElements).forEach(element => {
    element.textContent = `${month}月${day}日 (${dayOfWeek})`;
  });
}

function changeDate(days) {
  currentDate.setDate(currentDate.getDate() + days);
  updateDateDisplay(currentDate);
}

let currentDate = new Date();
updateDateDisplay(currentDate);

const prevButtons = document.getElementsByClassName('prev');
Array.from(prevButtons).forEach(button => {
  button.addEventListener('click', () => changeDate(-1));
});

const nextButtons = document.getElementsByClassName('next');
Array.from(nextButtons).forEach(button => {
  button.addEventListener('click', () => changeDate(1));
});

document.getElementById('main-class').addEventListener('click', function() {
  const button = this;
  button.classList.toggle('attached');
});