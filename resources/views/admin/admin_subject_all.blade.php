@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/A_subject_all-style.css') }}">

<div id="item">
        <div class="list">
            <button id="main-class" class="one" onclick="window.location.href='admin'">授業</button><br>
            <button id="main-subject" class="second" onclick="window.location.href='admin_subject_register'">科目登録</button>
            <button id="main-list" class="third">科目一覧</button>
            <button id="main-attend" class="forth" onclick="window.location.href='attendance_status'">出席状況</button>
        </div>
        <div class="main">
            <h2>科目一覧</h2>
            <div class="head">
                <div class="head-list1">科目名</div>
                <div class="head-list2">教師名</div>
                <div class="head-list2">講義日数</div>
                <div class="head-list2">科目編集</div>
                <div class="head-list2">科目削除</div>
            </div>
            <div class="border_line"></div>
            <div class="head-item">
                <div class="item-list" id="java">
                        <ul class="list-a">
                            <li class="head-list1">javascript</li>
                            <li class="head-list2">金野宇晃</li>
                            <li class="head-list2">30日</li>
                            <li class="head-list2"><button type="submit" class="button1">編集</button></li>
                            <li class="head-list2"><button type="submit" class="button2">削除</button></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="{{ asset('js/A_subject_all.js') }}"></script>
@endsection