@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/U_subject_register.css') }}">

<body>
  <div id="container">
    <h2>選択科目登録</h2>

    <!-- 選択された科目のタグを追加 -->
    <div id="addPlace"></div>

    <!-- セレクトボックス・検索欄 -->
    <div id="userSelect">
      <select id="when">
        <option value="前期">前期</option>
        <option value="後期">後期</option>
      </select>

      <input type="text" id="searchInput" placeholder="Search">

    </div>

    <form action="/user_subject_register_confirm" method="post" enctype="multipart/form-data">
      @csrf
      <table>
        <tr>
          <th></th>
          <th>科目名</th>
          <th>期間</th>
          <th>担当教員</th>
        </tr>

        @foreach($subjects as $subject)
        <tr class="item">
          <td><input type="checkbox" class="check" name="subjects[]" value="{{ $subject->id }}" id="{{ $subject->id }}" data-id="{{ $subject->id }}"></td>
          <td class="subject_name">{{ $subject->name }}</td>
          <td class="subject_term">{{ $subject->term }}</td>
          <td>{{ $subject->user->name }}</td>
        </tr>
        @endforeach
      </table>

      <button type="submit" id="select">確認</button>
    </form>
  </div>

  <script src="{{ asset('js/U_subject_register.js') }}"></script>
</body>

</html>
@endsection