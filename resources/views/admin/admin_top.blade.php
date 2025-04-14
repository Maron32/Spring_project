<!-- 管理者TOP -->
 <!DOCTYPE html>
 <html lang="ja">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者TOP</title>
 </head>
 <body>
 <h1>生徒一覧</h1>
   <ul>
      @foreach($items as $student)
         <li>{{ $student->getData() }}</li>
      @endforeach
   </ul>

   <form action="{{ route('students.search') }}" method="GET">
    <input type="text" name="name" value="{{ old('name', $input ?? '') }}" placeholder="名前で検索">
    <button type="submit">検索</button>
   </form>

   @if(isset($items))
      <ul>
         @foreach ($items as $user)
               <li>{{ $user->name }}（{{ $user->email }}）</li>
         @endforeach
      </ul>
   @endif

 </body>
 </html>