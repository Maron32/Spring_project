@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/U_subject_register_confirm.css') }}">

<body>
  <h1>ユーザーの科目登録確認画面</h1>
  <form action="/user_subject_create" method="post" enctype="multipart/form-data">
    @csrf
    <p>科目名-期間</p>
    @foreach ($subjects as $subject)
    <p>{{ $subject->name }} - {{ $subject->term }}</p>
    @endforeach
    <button type="submit">登録</button>
  </form>
  
  <script src="{{ asset('js/U_subject_register.js') }}" defer></script>
</body>
</html>
@endsection