<!DOCTYPE html>
<html lang="ja">

<head>
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
</head>

<body>

  <div class="main-wrap">
    @include('layouts.header')

    <div class="container-fluid main-area">
        <div class="row">
          <div class="col-md-12 text-center main-logo">
            <image src="./images/logo.png" style="margin-top: 10%; width: 10%">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center main-text" style="font-size: 1.7vw; margin-top: 2%;">
            <h1 class="tannks_message">
              {{ $thanks_messsage1 }}<br>
              {{ $thanks_messsage2 }}<br>
            </h1>
          </div>
        </div>
        <div class="row">
          <a href="{{route('top')}}">
            <div class="col-md-2 col-md-offset-5 text-center overmenu menu active" style="margin-top: 2%; margin-bottom: 10%;">
              TOPへ戻る
            </div>
          </a>
        </div>
    </div>

    @include('layouts.footer')
  </div>

</body>
</html>
