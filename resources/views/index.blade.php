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
<!-- バリデーションエラー表示 -->
@if (count($errors) > 0)
  <ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
  </ul>
@endif
<!-- コンテンツ部分 -->
<form action="{{ route('confirm') }}" class="h-adr" method="POST">
@csrf
  <h1>お問い合わせ</h1>
  <ul>
    <li>
      <!-- fullname -->
      <div class="fullname">
        <p>お名前</p>
        <div class="input-fullname">
        @isset($inputs)
          <input type="text" name="family-name" required value="{{$inputs['family-name']}}">
          <input type="text" name="first-name" required value="{{$inputs['first-name']}}">
        @else
          <input type="text" name="family-name" required>
          <input type="text" name="first-name" required>
        @endisset
        </div>
      </div>
      <!-- gender -->
      <div class="gender">
        <p>性別</p>
        <div>
        @isset($inputs)
          @if($inputs['gender']==="女性")
          <label><input type="radio" name="gender" required value="男性">男性</label>
          <label><input type="radio" name="gender" checked value="女性">女性</label>
          @else
          <label><input type="radio" name="gender" required checked value="男性">男性</label>
          <label><input type="radio" name="gender" value="女性">女性</label>
          @endif
        @else
          <label><input type="radio" name="gender" required checked value="男性">男性</label>
          <label><input type="radio" name="gender" value="女性">女性</label>
        @endisset
        </div>
      </div>
      <!-- email -->
      <div class="email">
        <p>メールアドレス</p>
      @isset($inputs)
        <input type="email" name="email" required value="{{$inputs['email']}}">
      @else
        <input type="email" name="email" required>
      @endisset
      </div>
      <!-- postcode -->
      <span class="p-country-name" style="display:none;">Japan</span>
      <div class="postcode">
        <p>郵便番号</p>
      @isset($inputs)
        <div>〒
        <input type="text" class="p-postal-code" size="8" maxlength="8" name="postcode" required value="{{$inputs['postcode']}}"></div>
      @else
        <div>〒
        <input type="text" class="p-postal-code" size="8" maxlength="8" name="postcode" required></div>
      @endisset
      </div>
      <!-- address -->
      <div class="address">
        <p>住所</p>
      @isset($inputs)
        <input type="text" name="address" required value="{{$inputs['address']}}" class="p-region p-locality p-street-address p-extended-address" />
      @else
        <input type="text" name="address" required class="p-region p-locality p-street-address p-extended-address" />
      @endisset
      </div>
      <!-- building_name -->
      <div class="building_name">
        <p>建物名</p>
      @isset($inputs)
        <input type="text" name="building_name" value="{{$inputs['building_name']}}">
      @else
        <input type="text" name="building_name">
      @endisset
      </div>
      <!-- opinion -->
      <div class="opinion">
        <p>ご意見</p>
      @isset($inputs)
        <textarea name="opinion" cols="100" rows="10" required>{{$inputs['opinion']}}</textarea>
      @else
        <textarea name="opinion" cols="100" rows="10" required></textarea>
      @endisset
      </div>
      <!-- button -->
    <input class="button" type="submit" value="確認" >
    </li>
  </ul>
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
</style>

</html>