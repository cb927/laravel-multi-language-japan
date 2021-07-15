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
		.accordion {
			border: 1px solid #343F47;
		}

		.btn-block {
			background: #343F47;
			border-radius: unset;
			text-align: left;
			border-bottom: 1px solid gray;
			padding: 15px;
		}

		.btn-block:hover,
		.btn-block:visited,
		.btn-block:active,
		.btn-block:link {
			color: white;
			text-decoration: none;
		}

		.btn-success {
			background: green;
			width: 200px;
		}


		@media screen and (max-width: 525px) {
			.col-md-12 {
				padding: 0;
			}
		}
	</style>
</head>

<body>

	<div class="main-wrap">
		@include('layouts.header')

		<div class="container my-6">
			<div class="col-12 my-5">
				<h1 class="text-center" style="margin: 50px;">{{ trans('faq.title')}}</h1>
			</div>
			<div class="col-md-12">
				<div class="accordion" id="accordionExample">
					<div>
						<a href="#faq1" class="btn-block" data-toggle="collapse">{{ trans('faq.question_1')}}</a>
						<div id="faq1" class="collapse">
							<p><br>{{ trans('faq.answer_1')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq2" class="btn-block" data-toggle="collapse">{{ trans('faq.question_2')}}</a>
						<div id="faq2" class="collapse">
							<p><br>{{ trans('faq.answer_2')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq3" class="btn-block" data-toggle="collapse">{{ trans('faq.question_3')}}</a>
						<div id="faq3" class="collapse">
							<p><br>{{ trans('faq.answer_3')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq4" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_4')}}
						</a>
						<div id="faq4" class="collapse">
							<p><br>{{ trans('faq.answer_4')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq5" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_5')}}
						</a>
						<div id="faq5" class="collapse">
							<p><br>{{ trans('faq.answer_5')}}<a href="{{route('demo')}}">{{ trans('faq.answer_5_link')}}</a><br></p>
						</div>
					</div>
					<div>
						<a href="#faq6" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_6')}}
						</a>
						<div id="faq6" class="collapse">
							<p><br>{{ trans('faq.answer_6')}} <br></p>
						</div>
					</div>
					<div>
						<a href="#faq7" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_7')}}
						</a>
						<div id="faq7" class="collapse">
							<p><br>{{ trans('faq.answer_7')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq8" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_8')}}
						</a>
						<div id="faq8" class="collapse">
							<p><br>{{ trans('faq.answer_8')}} <br></p>
						</div>
					</div>
					<div>
						<a href="#faq9" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_9')}}
						</a>
						<div id="faq9" class="collapse">
							<p><br>{{ trans('faq.answer_9')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq10" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_10')}}
						</a>
						<div id="faq10" class="collapse">
							<p><br>{{ trans('faq.answer_10')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq11" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_11')}}
						</a>
						<div id="faq11" class="collapse">
							<p><br>{{ trans('faq.answer_11')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq12" class="btn-block" data-toggle="collapse">
							{{ trans('faq.question_12')}}
						</a>
						<div id="faq12" class="collapse">
							<p><br>{{ trans('faq.answer_12')}}<br></p>
						</div>
					</div>
					<div>
						<a href="#faq13" class="btn-block" data-toggle="collapse">{{ trans('faq.question_13')}}</a>
						<div id="faq13" class="collapse">
							<p><br>{{ trans('faq.answer_13')}}<br>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div style="width: fit-content; margin:50px auto 30px auto;">
					<!-- <a href="#" class="btn-custom">お問い合わせ</a> -->
					<a href="{{route('inquiry')}}" class="btn btn-success">{{ trans('faq.button')}}</a>
				</div>
			</div>
		</div>

		@include('layouts.footer')

		<a href="javascript:void(0);" id="scroll-top" title="Scroll to Top" style="display: none; opacity: 0.5;">Top<span></span></a>

	</div>
</body>

</html>