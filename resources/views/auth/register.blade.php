@extends('layouts.app')

@section('content')
<div id="container">
    <h3>学生情報の登録</h3>
    <p id="grade">学年</p>
    <select id="gradeInput" type="text" name="grade" value="{{ old('grade') }}" required autocomplete="grade" autofocus>
        @foreach($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
        @endforeach
    </select>

    <p id="course">学科</p>
    <select id="courseInput" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>
        @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
    </select>

    <p id="name">名前</p>
    <input id="nameInput" name="name" type="text">

    <p id="mail">メールアドレス</p>
    <input id="mailInput" name="email" type="text">

    <p id="pw">パスワード</p>
    <input id="pwInput" name="password" type="password">

    <p id="pwConfirm" name="password_confirmation">パスワード(確認)</p>
    <input id="pwConfirmInput" type="password">

    <!-- 未入力時に警告 -->
    <div id="redAlert"></div>
    <div id="pwAlert"></div>

    <button type="button" id="registerBtn" class="registerBtn">登録</button>
  </div>
@endsection
