<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>管理者アカウント作成</h1>
    <form action="/admin_register_confirm" method="post" enctype="multipart/form-data">
        <div>
            <label>名前</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="text" name="email">
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>パスワード確認用</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">登録</button>
    </form>
</body>
</html>