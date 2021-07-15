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
			width: 300px;
			border: 1px solid gray;
			border-radius: 0;
			margin-left: 0;
		}

		.center-align {
			width: fit-content;
			margin: auto;
		}

		textarea {
			width: 400px;
		}

		.btn-success {
			background: green;
			color: white;
			border: none;
			padding: 10px 130px;
		}

		@media screen and (max-width: 525px) {
			.main-container {
				margin: 0;
			}

			textarea {
				width: 100%;
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
			<h1 class="text-center" style="margin: 50px;">{{ trans('setting_mam.mam_title')}}</h1>
			<div class="main-container">
				<p>
					{{ trans('setting_mam.mam_summary')}}
				</p>
				<div class="consent">
					<div class="black-div"></div>
					<div class="consent-main">
						<div class="image">
							<img src="{{asset('images/logo2.png')}}" alt="" style="width: 100px;">
						</div>
						<div style="text-align: center;">
							Limited Power Of Attorny Form <br>
							DISCRETIONARY TRADING AUTHORIZATION
						</div>
						<div>
							<p>The undersigned hereby authorizes</p>
							<input type="text" class="form-input">
							<span>(Trader Name)</span>
							<p style="margin: 15px 0;">
								as its agent and attorney-in-fact ( “Agent” ) to buy and sell and otherwise deal in equities, options on equities, commodities, commodity futures, options on commodity futures, and foreign exchange instruments for the undersigned’ s account and risk ( “Trading” ) with GOOD ENOUGH FX Ltd (GEFX). The undersigned hereby agrees to indemnify and hold you harmless, without limitation, from all loss, cost, indebtedness and liabilities arising therefrom including reasonable professional fees. The undersigned specifically accepts all risks associated with Trading without limitation including but not limited to technology risks, margin risks, sovereign risks, regulatory risks and execution risks. The undersigned further specifically accepts all risks without limitation associated with the Agent’ s use of proprietary and/or third party Multi Account Manager ( “MAM” ) execution/ allocation platforms designed to permit the Agent to execute orders in a master account(s) the fills from which are automatically allocated into to multiple sub-accounts, including my account(s)( “Account” ), connected to such master account(s), on a pro rata basis or on a per ticket basis. I understand and agree that GEFX is not responsible for the accuracy, effectiveness or reliability of such MAM platforms and that is my Agent’ s responsibility to manage my account and to insure that my Account has sufficient margin to carry the positions allocated to it. I further understand and agree that GEFX has the right to set limits on my Agents ability to manage my Account and to define the parameters under which my Agent is authorized to manage my Account. GEFX is authorized to take any action regarding my Account and my Agent’ s activity it deems necessary or prudent for the protection of GEFX customers a need its commercial relationships. <br><br>

								In all such purchases and sales GEFX is authorized to follow the instructions of the aforesaid Agent, its employees, sub-agents or designated third parties in every respect concerning the undersigned’ s Account with you; and except as herein otherwise provided, the Agent is authorized to act for the undersigned in the same manner and with the same force and effect as the undersigned might or could do with respect to such purchases and sales as well as with respect to all other things necessary or incidental thereto, except that the Agent is not authorized to withdraw any money, securities, or other property, either in the name of the undersigned or otherwise. <br><br>

								The undersigned hereby ratifies and confirms any and all transactions with you heretofore or hereafter made by the aforesaid Agent on behalf of or for the Account of the undersigned. <br><br>

								This authorization and indemnity is in addition to (and in no way limits or restricts) any rights which you may have under any other agreement between you and the undersigned. <br><br>

								This authorization and indemnity is a continuing one and shall remain in full force and effect until revoked by the undersigned by a written noticed addressed to you, delivered to you at the above address, and acted upon by you in the ordinary course of your business and such revocation shall not affect your liability in any way resulting from transactions initiated prior to such revocation. This authorization and indemnity shall inure to your benefit and that of your successors and assigns. <br> <br>

								FURTHERMORE, BY SIGNING THIS FORM, I ACKNOWLEDGE AND AGREE THAT THIS LIMITED POWER OF ATTORNEY AUTHORIZATION AND AGREEMENT RELATES TO MY ACCOUNT(S) AND IS INCORPORATED IN AND MADE A PART OF THE ACCOUNT AGREEMENT BETWEEN TVLTD AND ME. I ACKNOWLEDGE THAT I HAVE RECEIVED AND READ THIS LIMITED POWER OF ATTORNEY AUTHORIZATION AND AGREEMENT AND RETAINED A COPY FOR MY RECORDS AND THAT IT IS MY RESPONSIBILITY TO PROVIDE A COPY TO MY AGENT(S) IF I SO DESIRE. <br><br>

								I acknowledge that I have received, read and agree to abide by the terms and conditions of this limited power of attorney under which I will be managing account number *
							</p>
							<span>{{ trans('setting_mam.mam_number')}}</span>
							<input type="text" class="form-input">
							<span>at GEFX(the “Account” )</span>
							<p style="margin-top: 15px;">
								I agree that I am familiar with and have had the opportunity to review the use instructions for the MAM and the physical operation of the MAM that I intend to use in connection with managing the Account, GEFXs trading rules and the limits imposed on my activity by GEFX and I accept full responsibility for insuring that there is sufficient margin in the Account at all times sufficient to support the position(s) allocated to the Account prior to executing an order. I further acknowledge and agree that GEFX shall have no liability for my acts or omissions in relation to my management of the Account and I hereby indemnify and hold
							</p>
							<div class="row">
								<div class="col-md-6">
									<label for="name">{{ trans('setting_mam.mam_mail')}}</label>
									<input type="text" class="form-input">
								</div>
								<div class="col-md-6">
									<label for="name">{{ trans('setting_mam.mam_mail')}}</label>
									<input type="text" class="form-input">
								</div>
							</div>
							<div class="row" style="margin: 30px 0;">
								<div class="center-align">
									<input type="checkbox"> <span>{{ trans('setting_mam.mam_agree')}}</span>
								</div>
							</div>
							<div class="row" style="text-align: center;">
								<p>{{ trans('setting_mam.mam_content')}}</p>
								<textarea name="" id="" rows="10"></textarea>
								<div class="center-align" style="margin-top:20px;">
									<button class="btn btn-default">{{ trans('setting_mam.mam_clear')}}</button>
								</div>
								<div class="center-align" style="margin-top: 20px;">
									<a href="{{route('mam.success')}}" class="btn btn-success">{{ trans('setting_mam.mam_send')}}</a>
								</div>
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