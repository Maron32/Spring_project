@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/U_subject_register_confirm.css') }}">

<body id="U_subject_confirm">

  <form action="/user_subject_create" method="post" enctype="multipart/form-data" id="subjects">
    <div class="container">
      <h1 class="head">登録確認</h1>
      @csrf
      <table>
        <tr>
          <th>科目名</th>
          <th>期間</th>
        </tr>
        @foreach ($subjects as $subject)
        <tr>
          <td>{{ $subject->name }}</td>
          <td>{{ $subject->term }}</td>
        </tr>
        @endforeach
      </table>
    </div>
    <div class="btns">
      <button type="button" onclick="history.back()">戻る</button>
      <button type="submit">登録</button>
    </div>
  </form>

  <script src="{{ asset('js/U_subject_register.js') }}" defer></script>
</body>

</html>
@endsection