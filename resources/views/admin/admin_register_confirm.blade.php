<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>管理者アカウント登録確認</h1>
    <form action="/admin_create" method="POST" enctype="multipart/form-data">
        @csrf
        <label>名前：{{ $formData['name'] }}</label>
        <label>メールアドレス：{{ $formData['email'] }}</label>

        <input type="hidden" name="name" value="{{ $formData['name'] }}">
        <input type="hidden" name="email" value="{{ $formData['email'] }}">
        <input type="hidden" name="password" value="{{ $formData['password'] }}">

        <button type="submit">登録</button>
    </form>
</body>
</html>