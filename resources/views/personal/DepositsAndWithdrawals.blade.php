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

<div class="container">
    <div class="row">
        @include('personal.over_menu')
    </div>
    <div class="row">
        <div class="col-md-4">
            @include('personal.left_profile')
        </div>
        <div class="col-md-8 col-xs-12 d-none d-md-block">
            @include('personal.DepositsAndWithdrawals_main')
        </div>
    </div>
</div>
@include('layouts.footer')
</div>
</body>
</html>