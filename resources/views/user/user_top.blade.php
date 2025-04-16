@extends('layouts.app')

@section('content')
<body>
  <div id="container">
    <div id="button">
      <button type="button" class="attend" id="attend">出席</button>
      <button type="button" class="goHome" id="goHome">早退</button>
    </div>


    <table>
      <tr>
        <th></th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
      </tr>
      <tr>
        <th>1</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>2</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>3</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>4</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <div class="flex">
      <div>出席数</div>
      <div>現在までの授業日数</div>
      <div>必要出席数</div>
      <div>見込み出席率</div>
    </div>

    <div id="days">
      <div>xxx</div>
      <div>xxx</div>
      <div>xxx</div>
      <div>xxx</div>
    </div>

    <!-- 下線 -->
    <p class="underline"></p>


    <!-- オーバーレイ1(出席) -->
    <div id="overlay">
      <h3>出席</h3>
      <p>本日の科目</p>

      <!-- ここに科目を表示 -->
      <div></div>



      <div id="overlayBtns1">
        <button type="button" id="overlayReturnBtn1">戻る</button>
        <button type="button" id="overlayAttendBtn">出席</button>
      </div>

    </div>


    <!-- オーバーレイ2(早退) -->
    <div id="overlay2">
      <h3>早退</h3>
      <p>本日の科目</p>

      <!-- ここに科目を表示 -->
      <div></div>


      <!-- 理由 -->
      <div id="reason">
        <p>理由</p>
        <input type="text" id="reasonInput">
        <p id="error"></p>
      </div>


      <div id="overlayBtns2">
        <button type="button" id="overlayReturnBtn2">戻る</button>
        <button type="button" id="overlayGoHomeBtn">早退</button>
      </div>

    </div>

    <!-- オーバーレイ3(出席受理) -->
    <div id="overlay3">
      <p>出席登録を完了しました。</p>
      <p>今日も頑張りましょう!</p>
      <button type="button" id="closeBtn1">閉じる</button>
    </div>

    <!-- オーバーレイ4(早退受理) -->
    <div id="overlay4">
      <p>早退登録を完了しました。</p>
      <p>お疲れさまでした!</p>
      <button type="button" id="closeBtn2">閉じる</button>
    </div>



  </div>

</body>

</html>
@endsection