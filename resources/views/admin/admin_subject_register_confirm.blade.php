<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>管理者科目登録確認</h1>
    <form method="post" action="/admin_subject_create" enctype="multipart/form-data">
        @csrf
        <div>
            <label>{{ $name }}</label>
            <label>{{ $teacher->name }}</label>
            <label>{{ $term }}</label>
            <label>{{ $lesson_days }}</label>
            @foreach( $daytimes as $daytime )
            <label>{{ $daytime['days']->name }} - {{ $daytime['periods']->periods }}コマ目</label>
            @endforeach
        </div>
        <button type="submit">登録</button>
    </form>
</body>
</html>