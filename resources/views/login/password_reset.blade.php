<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- <script>
		function addPlatform() {
			let loginname = "mt4-" + $(".AccountNumber").val();
			$(".loginname").val(loginname);
		};
	</script> -->


    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery読み込み -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- 全体 -->
    <link rel="stylesheet" href="{{asset('css/basic.css')}}">
    <link rel="stylesheet" href="{{asset('css/header_and_footer.css')}}">

     <!-- 会員ページ全体 -->
    <link rel="stylesheet" href="{{asset('css/left_profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/over_menu.css')}}">

     <!-- 本ページ -->
    <link rel="stylesheet" href="{{asset('css/summary.css')}}">
    <link rel="stylesheet" href="{{asset('css/summary_main.css')}}">

	<title>
		GOOD ENOUGH FX
    </title>

    <style>
      @media screen and (max-width: 768px)
      {
          .xs-height {
              height: 500px !important;
              padding: 10% !important
          }

          .xs-height img {
            width: 30% !important
          }
      }
    </style>

  </head>
  <body>

  <div class="main-wrap">

  @include('layouts.header')

  <div class="container">

    <div class="container main-area" style="margin-top: 50px; margin-bottom: 80px; height: 600px; z-index: 2">
      <div class="row text-center" style="color: white">
	  　<div class="col-md-6 col-md-offset-3 xs-height col-sm-6 col-sm-offset-3 col-xs-12" style="height: 500px; background: linear-gradient(to right, #10141B, #363F46); box-shadow: 8px 8px 5px gray; z-index: 1">
	  	　<div class="center-block" style="margin-top: 7%">
            <image src="{{asset('./images/logo1.png')}}" style="height: 12%; width: 12%">
          </div>
          <div class="col-md-12 center-block" style="margin-top: 5%">
			       <div class="text-center col-md-12 col-sm-12 col-xs-12">
               <sapn>ログインパスワードの再設定について、</span><br>
               <sapn>以下のページよりお問い合わせをお願い致します。</span><br><br>　
             </div>
          </div>
          <div class="mx-auto text-center" style="margin-top: 30%">
            <!-- <input type="submit" value="ログインする" style=" width:50%; padding-top: 3%; padding-bottom: 3%; color: white; background-color: #009524; border: none; border-radius: 30px;"> -->
            <a href="{{url('/inquiry')}}"
              style="width: 50%;
              padding-top: 3%;
              padding-bottom: 3%;
              color: white;
              background-color: #009524;
              border: none;
              border-radius: 30px;
              display: flex;
              margin: auto;
              justify-content: center;">
              問い合わせページへ
            </a>
          </div>
        </div>
      </div>
    </div>
    <div style="position: absolute; top:25%; left:63%; z-index: 0">
      <image src="{{asset('./images/logo2.png')}}" style="height: 80%; width: 80%;">
	</div>
	<input type="hidden" name="name" class="loginname">

  </div>
</form>
  @include('layouts.footer')
  </div>
  </body>
</html>
