<!DOCTYPE html>
<html lang="ja" class="accounts funding ">

<head>
	<meta charset="utf-8">
	<title>
		good-enough入金ページ | good-enough | good-enough
	</title>
	<link rel="stylesheet" href="{{asset('css/basic.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="{{$currentPath}}/../../assets/img/tn-favicon.ico.png">
	<link rel="stylesheet" href="{{$currentPath}}/../../assets/css/app.min-v=0.01.25.css">
	<link rel="stylesheet" href="{{$currentPath}}/../../assets/css/custom-d-v=0.01.25.css">
	<link rel="stylesheet" href="{{$currentPath}}/../../assets/css/custom-j-v=0.01.25.css">
</head>

<body>

	<div class="main-wrap">

		@include('layouts.header')

		@include('layouts.inquery_form')

		@include('layouts.inquery_responce')

		@include('layouts.header2')



		<div class="container-fluid pb-5">
			<div class="row accountsDesc">
				<div class="container">
					<div class="row">
						<div class="col-12 mt-5 mt-md-5 mb-md-5">
							<h1 class="text-center">口座へのご入金</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-10 col-lg-8 alert alert-danger text-center mx-auto" role="alert">
							お客様の取引資金の安全性向上のため、ご入金手続きは会員ページ内からお願い致します。
						</div>
					</div>

					<div class="row py-4 depositMethodsTable mt-5">
						<div class="col-md-12">
							<h3 class="text-center mb-4">ご入金方法</h3>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-header text-center">
									<img src="{{$currentPath}}/../../assets/img/icons/bank.svg">
									<h2 class="text-dark">銀行送金</h2>
								</div>
								<div class="card-body">
									<div class="row mx-auto px-xl-4 text-center">
										<div class="col-12">
											<h5 class="card-title text-primary  m-0">反映までの時間: <span class="card-text">1-3営業日</span></h5>
										</div>
										<div class="col-12">
											<h5 class="card-title text-muted ">手数料: 無料</h5>
										</div>
									</div>
								</div>
								<ul class="list-group list-group-flush">
									<!-- <li class="list-group-item">
				<div class="row">
					<div class="col-md-12 col-lg-6 center-with-flex">
						<a href="https://www.good-enough.com/ja/cabinet/mt4/deposit/banks/ali">
							<img src="https://www.good-enough.com/assets/img/deposit-methods/alij.png" class="img-fluid w-100">
						</a>
					</div>
					<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
						<ul class="list-unstyled currencies">
							<li class="jpy">JPY</li>
						</ul>
						<a href="https://www.good-enough.com/ja/cabinet/mt4/deposit/banks/ali" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
					</div>
				</div>
			</li> -->
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Cgcen.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/gcen.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="gbp">GBP</li>
													<li class="dollar">AUD</li>
													<li class="dollar">CAD</li>
													<li class="eur">EUR</li>
													<li class="jpy">JPY</li>
													<li class="zar">ZAR</li>
													<li class="chf">CHF</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Cscotiabank.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/scotiabank.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="dollar">MXN</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Cbmo.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/BMOHarrisBank.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-6">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="jpy">JPY</li>
													<li class="eur">EUR</li>
													<li class="dollar">CAD</li>
													<li class="gbp">GBP</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Cbanregio.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/banregio.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="dollar">MXN</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Cbanco_pichincha.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/pichincha.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Cfidelity.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/fidelity.png.jpeg" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Cinterbank.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/interbank.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<!--
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-12 col-lg-6 center-with-flex">
						<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Calternative-ko.html">
							<img src="https://www.good-enough.com/assets/img/deposit-methods/ecommpayko.png?ver=2" class="img-fluid w-100">-->
									<!-- <img src="https://www.good-enough.com/assets/img/deposit-methods/payfinderCards.png" class="img-fluid w-100 col-md-10 offset-md-1 col-8 offset-2 mt-3 cardTypes row-reverse"> -->
									<!--</a>
					</div>
					<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
						<ul class="list-unstyled currencies">
							<li class="dollar">KRW</li>
				
						</ul>
						<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Cbanks%7Calternative-ko.html" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
					</div>
				</div>
			</li>
			   -->
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-header text-center">
									<img src="{{$currentPath}}/../../assets/img/icons/creditCard.svg">
									<h2 class="text-dark">決済サービス</h2>
								</div>
								<div class="card-body">
									<div class="row mx-auto px-xl-4 text-center">
										<div class="col-12">
											<h5 class="card-title text-primary  m-0">反映までの時間: <span class="card-text "> 即日</span></h5>
										</div>
										<div class="col-12">
											<h5 class="card-title text-muted ">手数料: 無料</h5>
										</div>
									</div>
								</div>
								<ul class="list-group list-group-flush col-md-12 p-0">
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Ccredit_card%7Calternative.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/ecommpay-ver=2.png" class="img-fluid w-100">
													<!-- <img src="https://www.good-enough.com/assets/img/deposit-methods/payfinderCards.png" class="img-fluid w-100 col-md-10 offset-md-1 col-8 offset-2 mt-3 cardTypes row-reverse"> -->
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="gbp">GBP</li>
													<!--<li class="dollar">CAD</li>-->
													<li class="eur">EUR</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex" id="gigadat">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Ccredit_card%7Cinterac.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/gigadat.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">CAD</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
											<div class="col-12">
												<p class="text-center"><small>This deposit method is only available for clients, please log in the <span class="text-primary">cabinet</span> to access this method.</small></p>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Ccredit_card%7Calternative-al.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/ecommpayal-ver=2.png" class="img-fluid w-100">
													<!-- <img src="https://www.good-enough.com/assets/img/deposit-methods/payfinderCards.png" class="img-fluid w-100 col-md-10 offset-md-1 col-8 offset-2 mt-3 cardTypes row-reverse"> -->
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="gbp">GBP</li>
													<!--<li class="dollar">CAD</li>-->
													<li class="eur">EUR</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Ccredit_card%7Cbitwallet.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/bitwallet.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="eur">EUR</li>
													<li class="jpy">JPY</li>
												</ul>
												<!-- <small>(*It can also be funded to GBP accounts)</small>	 -->
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Ccredit_card%7Cecopayz.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/ecopayz.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="eur">EUR</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-header text-center">
									<img src="{{$currentPath}}/../../assets/img/icons/alternative.svg">
									<h2 class="text-dark">Eウォレット</h2>
								</div>
								<div class="card-body">
									<div class="row mx-auto px-xl-4 text-center">
										<div class="col-12">
											<h5 class="card-title text-primary  m-0">反映までの時間: <span class="card-text"> 即日</span></h5>
										</div>
										<div class="col-12">
											<h5 class="card-title text-muted ">手数料: 無料</h5>
										</div>
									</div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Calternative%7Cuphold.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/uphold.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<!-- <li class="bitcoin">BTC</li> -->
													<li class="dollar">USD</li>
													<li class="eur">EUR</li>
													<li class="jpy">JPY</li>
													<li class="gbp">GBP</li>
													<!-- <li class="litecoin">LTC</li>
							<li class="ethereum">ETH</li>
							<li class="ripple">XRP</li> -->
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Calternative%7Cbitpay.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/bitpay.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<!-- <li class="bitcoin">BTC</li> -->
													<li class="dollar">USD</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Calternative%7Cpayretailers.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/payretailers.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Calternative%7Csticpay.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/sticpay.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="gbp">GBP</li>
													<li class="dollar">CAD</li>
													<li class="eur">EUR</li>
													<li class="jpy">JPY</li>
													<li class="chf">CNY</li>
													<!-- <li class="bitcoin">BTC</li> -->
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>

									<!-- <li class="list-group-item">
				<div class="row">
					<div class="col-md-12 col-lg-6 center-with-flex">
						<a href="https://www.good-enough.com/ja/cabinet/mt4/deposit/alternative/epayments">
							<img src="https://www.good-enough.com/assets/img/deposit-methods/epayments.png" class="img-fluid w-100">
						</a>
					</div>
					<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
						<ul class="list-unstyled currencies">								
							<li class="dollar">USD</li>	
							<li class="eur">EUR</li>
														
						</ul>							
						<a href="https://www.good-enough.com/ja/cabinet/mt4/deposit/alternative/epayments" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
					</div>
				</div>
			</li> -->
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Calternative%7Cfasapay.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/fasapay.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="idr">IDR</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="https://www.transfermate.com/good-enough" target="_blank">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/transfermate.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="gbp">GBP</li>
													<li class="dollar">AUD</li>
													<li class="dollar">CAD</li>
													<li class="eur">EUR</li>
													<li class="chf">CHF</li>
													<li class="dollar">MXN</li>
													<li class="jpy">CNY</li>
												</ul>
												<a href="{{route('mt4login')}}" target="_blank" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Calternative%7Cadvcash.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/advcash.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="dollar">USD</li>
													<li class="rub">RUR</li>

												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-12 col-lg-6 center-with-flex">
												<a href="{{$currentPath}}/../cabinet/mt4-return_to=deposit%7Calternative%7Cpaytrust.html">
													<img src="{{$currentPath}}/../../assets/img/deposit-methods/paytrust.png" class="img-fluid w-100">
												</a>
											</div>
											<div class="col-md-12 col-lg-6 col-sm-6 mx-sm-auto">
												<ul class="list-unstyled currencies">
													<li class="vietnam">VND</li>
													<li class="baht">THB</li>
													<li class="ringgit">MYR</li>
													<li class="idr">IDR</li>
												</ul>
												<a href="{{route('mt4login')}}" class="col-md-8 btn btn-sm btn-outline-primary d-block mx-auto my-3">入金する</a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 my-5">
							<h2 class="text-center">ご入金に関する免責事項</h2>
						</div>
					</div>
					<div class="row py-4">
						<div class="col-lg-6 col-md-12">
							<ul class="list-dot text-muted">
								<li>金融商品取引は高リスクを伴う為、損失に耐えうる資金投資をして下さい</li>
								<li>good-enoughは第三者からのご入金を受け付けません</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-12 border-left">
							<ul class="list-dot text-muted">
								<li>場合により口座への入金反映が通常より遅れる場合がございます</li>
							</ul>
						</div>
					</div>

					<div class="row">
						<div class="col-12 text-center">
							<p class="lead"><span class="font-weight-bold"> ご出金・口座間資金移動:</span> 口座間資金移動やご出金は<a class="text-primary" href="{{route('transfer')}}">こちらから</a>可能です</p>
						</div>
					</div>
				</div>
			</div>
		</div>




		@include('layouts.footer')

		<a href="javascript:void(0);" id="scroll-top" title="Scroll to Top" style="display: none; opacity: 0.5;">Top<span></span></a>


		<script type="text/javascript" src="{{$currentPath}}/../../assets/js/signature_pad.umd.js"></script>


		<script type="text/javascript" src="{{$currentPath}}/../../assets/js/app.min-v=0.01.25.js"></script>

		<!-- TrustBox script -->
		<script type="text/javascript" src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script> <!-- End TrustBox script -->



		<script type="text/javascript">
			jQuery(function() {
				if (appEnv.cookies.permission == "dismiss") {
					/*$('#modalCookie1').modal({ 
						keyboard: true
					});*/
					jQuery('#modalCookie1').modal('hide');
				} else {
					jQuery('#modalCookie1').modal({
						backdrop: 'static',
						keyboard: false
					});
					jQuery('#modalCookie1').modal('show');
					jQuery('#modalCookie1').modal('handleUpdate');
					setCookie('permission', 'waiting', 300);

					jQuery("#cookiesdismiss").on("click", function() {
						setCookie('permission', 'dismiss', (180 * 24 * 60 * 60));
						setTimeout(function() {
							(appEnv.params.slug == "/cookies-declined") ? document.location.href = appEnv.uri.home: document.location.href = appEnv.params.slug
						}, 1000);
					});
					jQuery("#cookiedecline").on("click", function() {
						deleteAllCookies();
						setCookie('permission', 'declined', 200);
						setTimeout(function() {
							(appEnv.params.slug == "/cookies-declined") ? document.location.href = appEnv.uri.home: document.location.href = appEnv.params.slug
						}, 2000);
					});
				}
			});
		</script>



	</div>


</body>

</html>