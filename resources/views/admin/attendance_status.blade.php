@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/attendance_status-style.css') }}">

<div id="item">
      <div class="list">
            <button id="main-class" class="one" onclick="window.location.href='admin'">授業</button><br>
            <button id="main-subject" class="second" onclick="window.location.href='admin_subject_register'">科目登録</button>
            <button id="main-list" class="third" onclick="window.location.href='admin_subject_all'">科目一覧</button>
            <button id="main-attend" class="forth">出席状況</button>
      </div>
      <div class="attendance">
            <h2>出席状況一覧</h2>
            <div class="item">
               <div class="contents">
                  <a id="day">出席日数</a>
                  <a id="now">現在までの授業日数</a>
                  <a id="attend">出席率</a>
               </div>
               <div class="student" id="one">
                  <a class="name">東山 譲</a>
                  <div class="line">|</div>
                  <a class="course">総合システム工学科</a>
                  <a class="number">3年</a>
                  <div class="line">|</div>
                  <a class="day">30日</a>
                  <div class="line">|</div>
                  <a class="now">30日</a>
                  <div class="line">|</div>
                  <a class="attend">100%</a>
               </div>
               <div class="student" id="one">
                  <a class="name">鎌田 琉之介</a>
                  <div class="line">|</div>
                  <a class="course">高度情報工学科</a>
                  <a class="number">3年</a>
                  <div class="line">|</div>
                  <a class="day">30日</a>
                  <div class="line">|</div>
                  <a class="now">30日</a>
                  <div class="line">|</div>
                  <a class="attend">100%</a>
               </div>
               <div class="student" id="one">
                  <a class="name">藤原 頼希</a>
                  <div class="line">|</div>
                  <a class="course">高度情報工学科</a>
                  <a class="number">4年</a>
                  <div class="line">|</div>
                  <a class="day">27日</a>
                  <div class="line">|</div>
                  <a class="now">27日</a>
                  <div class="line">|</div>
                  <a class="attend">100%</a>
               </div>
               <div class="student" id="one">
                  <a class="name">小野 陽太</a>
                  <div class="line">|</div>
                  <a class="course">高度情報工学科</a>
                  <a class="number">2年</a>
                  <div class="line">|</div>
                  <a class="day">28日</a>
                  <div class="line">|</div>
                  <a class="now">30日</a>
                  <div class="line">|</div>
                  <a class="attend">93%</a>
               </div>
               <div class="student" id="one">
                  <a class="name">佐々木 智佳</a>
                  <div class="line">|</div>
                  <a class="course">高度情報工学科</a>
                  <a class="number">2年</a>
                  <div class="line">|</div>
                  <a class="day">27日</a>
                  <div class="line">|</div>
                  <a class="now">30日</a>
                  <div class="line">|</div>
                  <a class="attend">90%</a>
               </div>
            </div>
      </div>
   </div>

<script type="text/javascript" src="{{ asset('js/A_attendance.js') }}"></script>
@endsection