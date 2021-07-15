<!DOCTYPE html>
<html lang="ja" class="home  ">

<head>
	<meta charset="utf-8">
	<title>
		good-enough | オンラインFXトレード
	</title>
	
	<link name="canonical" href="index.html">


	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="{{$currentPath}}/../assets/img/tn-favicon.ico.png">

	<link rel="stylesheet" href="{{asset('css/basic.css')}}">
	

	<link rel="stylesheet" href="{{$currentPath}}/../assets/css/app.min-v=0.01.25.css">
	<link rel="stylesheet" href="{{$currentPath}}/../assets/css/custom-d-v=0.01.25.css">
	<link rel="stylesheet" href="{{$currentPath}}/../assets/css/custom-j-v=0.01.25.css">




	

	
</head>

<body>
<div class="main-wrap">
@include('layouts.header')

@include('layouts.inquery_form')

@include('layouts.inquery_responce')

@include('layouts.header2')






	<div class="modal-content">
		<div class="modal-header">
			<h5 align="center" id="contactModalLabel">Fill out the form and we will reach you soon</h5>
		</div>
		<div class="modal-body">
			<form class="col-16 mx-auto ajax needs-validation" action="{{route('inquiry')}}"
				enctype="multipart/form-data" method="POST">
				@csrf
				<input type="hidden" name="form[type]" value="contact">
				<input type="hidden" name="thisRouteName" value="{{$thisRouteName}}">
				<div class="form-group">
					<div class="col-md-12 spaceFields">
						<fieldset class="input">
							<label class="control-label" for="basic_information[complete_name]"><span
									class="text-danger">*</span>お名前(ローマ字)</label>
							<input type="text" name="basic_information[complete_name]"
								data-custom-user-form="name" class="form-control" placeholder="お名前(ローマ字)"
								required>
						</fieldset>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12 spaceFields">
						<fieldset class="input">
							<label class="control-label" for="basic_information[email]"><span
									class="text-danger">*</span>Eメールアドレス:</label>
							<input type="email" name="basic_information[email]" data-custom-user-form="email"
								class="form-control" placeholder="Eメールアドレス" required>
						</fieldset>
					</div>
				</div>
				<!--<div class="form-group">
					<div class="col-md-12 spaceFields mt-2" id="contact_subject">
						<fieldset class="input">
							<label class="control-label" for="basic_information[reason]"><span class="text-danger">*</span>Why do you want to contact us?</label>
							<select class="selectpicker col-md-12 p-0" name="basic_information[reason]" required>
								<option value="" selected disabled>選択してください</option>
								<option value="General Inquiry">General Inquiry</option>
								<option value="Trading">Trading</option>
								<option value="Back Office">Back Office</option>
								<option value="Technical Support">Technical Support</option>
								<option value="Compliance">Compliance</option>
								<option value="Introducing Brokers">Introducing Brokers</option>
								<option value="Withdrawals">Withdrawals</option>
							</select>
						</fieldset>
					</div>
				</div>-->

				<div class="form-group">
					<div class="col-md-12 spaceFields mt-2" id="contact_message">
						<fieldset class="input textarea">
							<label class="control-label" for="contact_information[message]"><span
									class="text-danger">*</span>お問い合わせ内容</label>
							<textarea type="text" name="contact_information[message]" rows="5"
								class="form-control" placeholder="お問い合わせ内容"></textarea>
						</fieldset>
					</div>
				</div>
				</br>
				<div>
					<div class="col-md-12 spaceFields mt-2">
						<button type="submit" class="btn btn-primary" style="float:left">送信する</button>
						<button type="button" class="btn btn-primary buttonLoading d-none !important" disabled>
							<span class="spinner-border spinner-border-sm" role="status"
								aria-hidden="true"></span>
							ロード中
						</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal"
							style="float:right">閉じる</button>
					</div>
				</div>
				<input type="hidden" name="backend[user][email]" value="">
				<input type="hidden" name="backend[user][name]" value="">
			</form>
		</div>
	</div>








@include('layouts.footer')

<a href="javascript:void(0);" id="scroll-top" title="Scroll to Top"
	style="display: none; opacity: 0.5;">Top<span></span></a>


<script type="text/javascript" src="{{$currentPath}}/../assets/js/signature_pad.umd.js"></script>

<script type="text/javascript" src="{{$currentPath}}/../assets/js/app.min-v=0.01.25.js"></script>

<!-- TrustBox script -->
<script type="text/javascript" src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"
	async></script> <!-- End TrustBox script -->



<script type="text/javascript">
	jQuery(function () {
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
			jQuery('#modalCookie1').modal('show'); jQuery('#modalCookie1').modal('handleUpdate');
			setCookie('permission', 'waiting', 300);

			jQuery("#cookiesdismiss").on("click", function () {
				setCookie('permission', 'dismiss', (180 * 24 * 60 * 60));
				setTimeout(function () {
					(appEnv.params.slug == "/cookies-declined") ? document.location.href = appEnv.uri.home : document.location.href = appEnv.params.slug
				}, 1000);
			});
			jQuery("#cookiedecline").on("click", function () {
				deleteAllCookies();
				setCookie('permission', 'declined', 200);
				setTimeout(function () {
					(appEnv.params.slug == "/cookies-declined") ? document.location.href = appEnv.uri.home : document.location.href = appEnv.params.slug
				}, 2000);
			});
		}
	}); 	
</script>


<script type="text/javascript" src="{{$currentPath}}/../assets/js/tab-of-realtimeprice.js"></script>
<script>
	ScrollReveal().reveal('.ilc', { delay: 300 });
	ScrollReveal().reveal('.trading-platforms', { delay: 300 });
	ScrollReveal().reveal('.listTv', { delay: 300 });
	ScrollReveal().reveal('#depositHome', { delay: 250 });
	ScrollReveal().reveal('.secure', { delay: 200 });
	// ScrollReveal().reveal('.sponsorshipsHome' , { delay: 150 });
</script>


</div>

</body>

</html>