<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>管理者アカウント作成</h1>
    <form action="/admin_register_confirm" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>名前</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="text" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>パスワード確認用</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">確認</button>
    </form>
</body>
</html>