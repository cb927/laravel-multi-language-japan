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
	<style>
		.main-container {
			margin: 0 200px;
		}

		.image {
			width: fit-content;
			margin: auto;
		}

		.image img {
			margin-bottom: 30px;
		}

		.black-div {
			background: linear-gradient(0.25turn, #0F141C, #343F47);
			height: 40px;
		}

		.consent {
			margin: 30px 0;
			border: 1px solid gray;
		}

		.consent-main {
			padding: 30px 20px;
		}

		.form-input {
			height: 40px;
			width: 100%;
			border: 1px solid gray;
			border-radius: 0;
			margin-left: 0;
		}

		.center-align {
			width: fit-content;
			margin: auto;
		}

		.btn-danger {
			background: red;
			color: white;
			border: none;
			padding: 10px 100px;
		}
		.form-label{
			font-size: 12px;
		}

		@media screen and (max-width: 525px) {
			.main-container {
				margin: 0;
			}
			.form-input{
				margin-top: 0;
			}
			.form-label{
				text-align: left;
			}

			.btn-success {
				width: 100%;
			}
		}
	</style>
</head>

<body>

	<div class="main-wrap">

		@include('layouts.header')

		<div class="container">
			<h1 class="text-center" style="margin: 50px;">GEFXアフィリエイトパートナー申請方法</h1>
			<div class="main-container">
				<p>
					パートナー契約をご希望の方は、所要時間わずか60秒以下の下記「パートナー（紹介ブローカー）登録」よりお申し込みください。登録手続き後、パートナーチームでお申し込み内容を確認し、専属マネージャーよりご連絡差し上げます。
				</p>
				<div class="consent">
					<div class="black-div"></div>
					<div class="consent-main">
						<div class="row" style="margin-top: 20px;">
							<div class="col-md-1 form-label">登録名</div>
							<div class="col-md-4">
								<input type="text" class="form-input" placeholder="半角英数字">
							</div>
							<div class="col-md-3 form-label">メールアドレス</div>
							<div class="col-md-4">
								<input type="text" class="form-input" placeholder="半角英数字">
							</div>
						</div>
						<div class="row" style="margin-top: 20px;">
							<div class="col-md-1 form-label">口座番号</div>
							<div class="col-md-4">
								<input type="text" class="form-input" placeholder="半角英数字">
							</div>
							<div class="col-md-3 form-label">レバレッジ</div>
							<div class="col-md-4">
								<input type="text" class="form-input" placeholder="半角数字">
							</div>
						</div>
						<div class="row" style="margin-top: 20px;">
							<div class="col-md-1 form-label">通貨</div>
							<div class="col-md-4">
								<input type="text" class="form-input" placeholder="USD">
							</div>
							<div class="col-md-3 form-label">取引プラットフォーム</div>
							<div class="col-md-4">
								<input type="text" class="form-input" placeholder="アフィリエイト口座">
							</div>
						</div>
						<div class="row" style="margin-top: 20px;">
							<div class="col-md-1 form-label">連絡事項</div>
							<div class="col-md-11">
								<input type="text" class="form-input">
							</div>
						</div>
						<div class="row" style="margin-top: 20px;">
							<div class="center-align">
								<a href="{{route('aff_success')}}" class="btn btn-danger">パートナー登録</a>
							</div>
						</div>
					</div>
					<div class="black-div"></div>
				</div>
			</div>
		</div>

		@include('layouts.footer')

		<a href="javascript:void(0);" id="scroll-top" title="Scroll to Top" style="display: none; opacity: 0.5;">Top<span></span></a>

	</div>
</body>

</html>