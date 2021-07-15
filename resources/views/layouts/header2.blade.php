<div class="fixed_header2_blank" style="width:100%;"> </div>

<div class="d-none d-xl-block w-90 border-bottom fixed_header2">
		

		<div class="row no-gutters w-90">

			<div class="col-2 logoImg py-4 mr-auto headerlogo">
				<a href="{{route('top')}}">
					<img src="{{asset('img/logo/TN_LOGO.png')}}" class="img-fluid">
				</a>
			</div>

			<div class="col align-self-center">
				<div class="contactButton align-self-center text-right pr-5">
					<button type="button" id="inquery_btn" class="btn btn-lg btn-outline-primary" data-toggle="modal"
						data-target="#contactModal" style="box-shadow:none;">
						お問い合わせ
					</button>
				</div>
			</div>

		</div>
	</div>



<style>

@media screen and (min-width: 1200px)
{
	.fixed_header2
	{
		position:fixed;
		top:0px;
		z-index:1000;
		background-color:white;
		width:100%;
		height:80px;
	}

	.fixed_header2_blank
	{
		height:110px;
	}

	.headerlogo
	{
		margin-left:48px;
	}
}

@media screen and (max-width: 1199px)
{
	.fixed_header2_blank
	{
		height:50px;
	}
}

</style>