<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>アドバンステスト</title>
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
</head>

<body>
<form action="/thanks" class="h-adr" method="POST">
@csrf
  <h1>内容確認</h1>
  <ul>
    <li>
      <!-- fullname -->
      <div class="fullname">
        <p>お名前</p>
        <div class="input-fullname">
          {{$inputs['family-name']}}  {{$inputs['first-name']}}
        </div>
      </div>
      <!-- gender -->
      <div class="gender">
        <p>性別</p>
        <div>
          {{$inputs['gender']}}
        </div>
      </div>
      <!-- email -->
      <div class="email">
        <p>メールアドレス</p>
        {{$inputs['email']}}
      </div>
      <!-- postcode -->
      <span class="p-country-name" style="display:none;">Japan</span>
      <div class="postcode">
        <p>郵便番号</p>
        〒{{$inputs['postcode']}}
      </div>
      <!-- address -->
      <div class="address">
        <p>住所</p>
        {{$inputs['address']}}
      </div>
      <!-- building_name -->
      <div class="building_name">
        <p>建物名</p>
        {{$inputs['building_name']}}
      </div>
      <!-- opinion -->
      <div class="opinion">
        <p>ご意見</p>
        {{$inputs['opinion']}}
      </div>
      <!-- button -->
    <input class="button" type="submit" value="送信">
    </li>
  </ul>
  <input class="back" name="back" type="submit" value="修正する" />
</form>
</body>

<!-- style -->
<style>
  body{
    width:80vw;
    text-align:center;
    margin:0 auto;
  }
  li{
    width:100%;
    list-style: none;
  }
  .fullname,.gender,.email,.postcode,.address,.building_name,.opinion{
    display: flex;
    align-items:center;
    justify-content: space-between;
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
    margin-left:38px;
    background-color:white;
    border:none;
    padding-bottom:0px;
    border-bottom:solid 2px black;
  }
</style>
</html>