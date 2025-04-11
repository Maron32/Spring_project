<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザーの科目登録</title>
</head>
<body>
  <h1>ユーザーの科目登録画面</h1>
  <form action="/user_subject_register_confirm" method="post" enctype="multipart/form-data">
    @csrf
    <div>
      @foreach($subjects as $subject)
      <div>
        <input type="checkbox" name="subjects[]" value="{{ $subject->id }}" id="{{ $subject->id }}">
        <label for="{{ $subject->id }}">{{ $subject->name }} - {{ $subject->term }} - {{ $subject->user->name }}</label>
      </div>
      @endforeach
    </div>
    <button type="submit">確認</button>
  </form>
</body>
</html>