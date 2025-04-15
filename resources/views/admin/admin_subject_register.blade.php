<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者科目登録</title>
</head>
<body>
  <h1>管理者の科目登録ページ</h1>
  <form action="/admin_subject_register_confirm" method="post" enctype="multipart/form-data">
    @csrf

    <div>
      <label>科目名</label>
      <input type="text" name="name">
    </div>

    <div>
      <label>担当教師</label>
      <select name="teacher" id="">
        <option value="" disabled>選択してください</option>
        @foreach($teachers as $teacher)
        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label>期間</label>
      <select name="term" id="term">
        <option value="" disabled>選択してください</option>
        @foreach($terms as $term)
        <option value="{{ $term }}">{{ $term }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label>授業日数</label>
      <input type="number" name="lesson_days">
    </div>

    <div>
      <div>
        <div>
          <label>曜日</label>
          <select name="daytime[1][day]" id="">
            <option value="" disabled>選択してください</option>
            @foreach($days as $day)
            <option value="{{ $day->id }}">{{ $day->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label>コマ数</label>
          <select name="daytime[1][period]" id="">
            <option value="" disabled>選択してください</option>
            @foreach($periods as $period)
            <option value="{{ $period->id }}">{{ $period->periods }}コマ目</option>
            @endforeach
          </select>
        </div>
      </div>

      <div>
        <div>
          <label>曜日</label>
          <select name="daytime[2][day]" id="">
            <option value="" disabled>選択してください</option>
            @foreach($days as $day)
            <option value="{{ $day->id }}">{{ $day->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label>コマ数</label>
          <select name="daytime[2][period]" id="">
            <option value="" disabled>選択してください</option>
            @foreach($periods as $period)
            <option value="{{ $period->id }}">{{ $period->periods }}コマ目</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <button type="submit">確認</button>

  </form>
</body>
</html>