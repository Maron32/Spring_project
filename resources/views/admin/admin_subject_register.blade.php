@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/A_subject_register.css') }}">
<form action="/admin_subject_register_confirm" method="post" enctype="multipart/form-data">
  @csrf
    <div id="item">
        <div class="list">
            <button id="main-class" class="one" onclick="window.location.href='admin'">授業</button><br>
            <button id="main-subject" class="second">科目登録</button>
            <button id="main-list" class="third" onclick="window.location.href='admin_subject_all'">科目一覧</button>
            <button id="main-attend" class="forth" onclick="window.location.href='attend.html'">出席状況</button>
        </div>
        <div class="register">

            <h2>科目登録</h2>
            <div class="main">
                <a>授業名</a><br>
                <input type="text" id="class-name" name="name" required><br>

                <a>担当教師</a><br>
                <select id="teacher" name="teacher">
                @foreach($teachers as $teacher)
                  <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
                </select><br>

                <a>授業期間</a><br>
                <select name="term" id="term">
                  @foreach($terms as $term)
                  <option value="{{ $term }}">{{ $term }}</option>
                  @endforeach
                </select><br>

                <a>授業日数</a><br>
                <input type="number" id="days" name="lesson_days" required><br>
                <div id="container">
                    <div class="item">
                        <a>曜日</a><br>
                        <select name="daytime[1][day]" id="">
                          <option value="" disabled>選択してください</option>
                          @foreach($days as $day)
                          <option value="{{ $day->id }}">{{ $day->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="item" id="classes">
                        <a>コマ数</a><br>
                        <select name="daytime[1][period]" id="">
                          <option value="" disabled>選択してください</option>
                          @foreach($periods as $period)
                          <option value="{{ $period->id }}">{{ $period->periods }}コマ目</option>
                          @endforeach
                        </select>
                    </div><br>
                </div>
                <button id="add-button">追加する</button>
            </div>
            <div class="button">
                <button id="clear">クリア</button>
                <button id="register" type="submit">登録</button>
            </div>
        </div>
    </div>
  </form>
<script type="text/javascript" src="{{ asset('js/A_subject_register.js') }}"></script>
@endsection