<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>科目登録確認画面</title>
</head>
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
</body>
</html>