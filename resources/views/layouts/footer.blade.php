<div class="container-fluid black_back">

	<div class="row footer_statement">
		<span>{{ trans('footer.footer_line_1')}}</span><br>
		<span>{{ trans('footer.footer_line_2')}}</span><br>
		<span>{{ trans('footer.footer_line_3')}}</span><br>
		<span>{{ trans('footer.footer_line_4')}}</span><br><br>
		<span>{{ trans('footer.footer_line_5')}}</span><br>
		<span>{{ trans('footer.footer_line_6')}}</span><br>
		<span>{{ trans('footer.footer_line_7')}}</span><br>
	</div>

	<div class="row footer_menu">
		<div class="footer-menu-align">
			<div class="col-md-2 menu active pad_vertical2">
				<a href="/images/GEFX FSG.pdf">
					{{trans('footer.footer_FSG')}}
				</a>
			</div>
			<div class="col-md-2 menu active pad_vertical2">
				<a href="/images/GEFX PDS.pdf">
					{{trans('footer.footer_PDS')}}
				</a>
			</div>
			<div class="col-md-1 menu active pad_vertical2">
				<a href="/images/GEFX Terms &amp; conditions.pdf">
					{{trans('footer.footer_transaction_tem')}}
				</a>
			</div>
			<div class="col-md-3 menu active pad_vertical2">
				<a href="/images/GEFX WebsitePrivacyPolicy.pdf">
					{{trans('footer.footer_policy')}}
				</a>
			</div>
			<div class="col-md-2 menu active pad_vertical2">
				<a href="/images/GEFX利用規約.pdf">
					{{trans('footer.footer_term_use')}}
				</a>
			</div>
			<div class="col-md-1 menu active pad_vertical2">
				<a href="/aboutcompany">
					{{trans('footer.footer_profile')}}
				</a>
			</div>
		</div>
		<div class="col-md-3 menu active">

		</div>
	</div>

	<div class="row textcenter">
		<div class="col-md-5 menu active">

		</div>
		<div class="col-md-2 menu active pad_vertical">
			<img src="{{asset('img/basic/logo.png')}}" class="logo">
		</div>
		<div class="col-md-5 copyright">
			<span> Copyright © 2014-2021 GOOD ENOUGH. All rights reserved. </span>
		</div>
	</div>
</div>