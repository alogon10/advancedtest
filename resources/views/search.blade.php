<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アドバンステスト</title>
</head>

<body>
  <h1>管理システム</h1>
  <!-- 検索ボックス -->
  <div class="search-box">
    <form action="/search" method="POST">
    @csrf
      <table>
        <div class="form">
          <tr>
            <th>お名前</th><td><input type="text" name="fullname"></td>
          </tr>
          <tr>
            <th>登録日</th><td><input type="date" name="lowerDate"> ~ <input type="date" name="upperDate"></td>
          </tr>
          <tr>
            <th>メールアドレス</th><td><input type="text" name="email"></td>
          </tr>
          <tr>
            <th>性別</th>
            <td>
              <label>
                <input type="radio" name="gender" required value="all" checked>全て
              </label>
              <label>
                <input type="radio" name="gender" required value="0">男性
              </label>
              <label>
                <input type="radio" name="gender" required value="1">女性
              </label>
            </td>
          </tr>
        </div>
      </table>
      <div class="button1">
        <input class="button" type="submit" value="検索" ><br>
        <input class="back" type="submit" name="back" value="リセット" >
      </div>
    </form>
  </div>
  <!-- 検索ボックス　ここまで -->
  <!-- 検索結果 -->
  <div class="search">
  {{ $inputs->links() }}
    <table>
      <tr>
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th colspan="2">ご意見</th>
      </tr>
      @isset($inputs)
      @foreach ($inputs as $input)
      <tr>
        <td>{{$input['id']}}</td>
        <td>{{$input['fullname']}}</td>
        @if($input['gender']===0)
          <td>男性</td>
        @else
          <td>女性</td>
        @endif
        <td>{{$input['email']}}</td>
        <td>{{$input['opinion']}}</td>
        <td>
          <form action="/delete" method="POST">
          @csrf
          <input class="delete" type="submit" value="削除" name="delete">
          <input type="hidden" name="id" value={{$input['id']}}>
          </form>
        </td>
      </tr>
      @endforeach
      @endisset
    </table>
  </div>
  <!-- 検索結果　ここまで -->
</body>

<!-- style -->
<style>
  svg.w-5.h-5 {
    width: 30px;
    height: 30px;
    }
  .search-box{
    border:solid 3px black;
    padding:30px 20px;
  }
  h1{
    text-align:center;
  }
  .search-box table tr th{
    text-align:left;
  }
  .search table th{
    border-bottom:solid 2px black;
    text-align:left;
  }
  .search table td{
    text-align:left;
  }
  body{
    width:80vw;
    text-align:center;
    margin:0 auto;
  }
  .button1{
    text-align:center;
  }
  .button{
    background-color:black;
    color:white;
    margin-top:50px;
    width:180px;
    height:50px;
    border-radius:8px;
  }
  .back{
    background-color:white;
    border:none;
    padding-bottom:0px;
    border-bottom:solid 2px black;
  }
  .search{
    margin-top:50px;
  }
</style>

</html>