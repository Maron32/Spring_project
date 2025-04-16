<!-- 管理者TOP -->
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/A_top-style.css') }}">
<div id="item">
        <div class="list">
            <button id="main-class" class="one">授業</button><br>
            <button id="main-subject" class="second" onclick="window.location.href='admin_subject_register'">科目登録</button>
            <button id="main-list" class="third" onclick="window.location.href='admin_subject_all'">科目一覧</button>
            <button id="main-attend" class="forth" onclick="window.location.href='attendance_status'">出席状況</button>
        </div>
        <div class="subject">
            <h2 id="title">担当授業</h2>
            <p id="tab">
                <a href="#page1">javascript基礎</a>
                <a href="#page2">プロジェクト開発</a>
                <a href="#page3">PHP基礎</a>
                <a href="#page4">Webデザイン</a>
                <a href="#page5">ポートフォリオ制作</a>
            </p>
            <div id="tabbody">
                <div id="page1">
                    <h2>JavaScript基礎</h2>
                    <button class="prev">◀</button>
                    <span class="date-display"></span>
                    <button class="next">▶</button>
                    <form action="{{ route('students.search') }}" class="search" method="GET">
                        @csrf
                        <input type="text" name="name" value="{{ old('name', $input ?? '') }}" placeholder="名前で検索">
                        <button type="submit">検索</button>
                    </form>

                        @if(isset($items))
                            <ul>
                                @foreach ($items as $user)
                                    <li>{{ $user->name }}（{{ $user->email }}）</li>
                                @endforeach
                            </ul>
                        @endif
                </div>
                <div id="page2">
                    <h2>プロジェクト開発</h2>
                    <button class="prev">◀</button>
                    <span class="date-display"></span>
                    <button class="next">▶</button>
                    <form action="{{ route('students.search') }}" class="search" method="GET">
                        @csrf
                        <input type="text" name="name" value="{{ old('name', $input ?? '') }}" placeholder="名前で検索">
                        <button type="submit">検索</button>
                    </form>

                        @if(isset($items))
                            <ul>
                                @foreach ($items as $user)
                                    <li>{{ $user->name }}（{{ $user->email }}）</li>
                                @endforeach
                            </ul>
                        @endif
                </div>
                <div id="page3">
                    <h2>PHP基礎</h2>
                    <button class="prev">◀</button>
                    <span class="date-display"></span>
                    <button class="next">▶</button>
                    <form action="{{ route('students.search') }}" class="search" method="GET">
                        @csrf
                        <input type="text" name="name" value="{{ old('name', $input ?? '') }}" placeholder="名前で検索">
                        <button type="submit">検索</button>
                    </form>

                        @if(isset($items))
                            <ul>
                                @foreach ($items as $user)
                                    <li>{{ $user->name }}（{{ $user->email }}）</li>
                                @endforeach
                            </ul>
                        @endif
                </div>
                <div id="page4">
                    <h2>Webデザイン</h2>
                    <button class="prev">◀</button>
                    <span class="date-display"></span>
                    <button class="next">▶</button>
                    <form action="{{ route('students.search') }}" class="search" method="GET">
                        @csrf
                        <input type="text" name="name" value="{{ old('name', $input ?? '') }}" placeholder="名前で検索">
                        <button type="submit">検索</button>
                    </form>

                        @if(isset($items))
                            <ul>
                                @foreach ($items as $user)
                                    <li>{{ $user->name }}（{{ $user->email }}）</li>
                                @endforeach
                            </ul>
                        @endif
                </div>
                <div id="page5">
                    <h2>ポートフォリオ制作</h2>
                    <button class="prev">◀</button>
                    <span class="date-display"></span>
                    <button class="next">▶</button>
                    <form action="{{ route('students.search') }}" class="search" method="GET">
                        @csrf
                        <input type="text" name="name" value="{{ old('name', $input ?? '') }}" placeholder="名前で検索">
                        <button type="submit">検索</button>
                    </form>

                        @if(isset($items))
                            <ul>
                                @foreach ($items as $user)
                                    <li>{{ $user->name }}（{{ $user->email }}）</li>
                                @endforeach
                            </ul>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/A_top.js') }}"></script>

@endsection