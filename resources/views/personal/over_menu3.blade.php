<div class="row">
<div class="col-md-12 overmenus">

		<div class="col-md-2 overmenu menu @if($withdraw_type=='banks') active @endif">
			<a href="{{route('deposit')}}?type=withdrawal&withdraw_type=banks">
			銀行出金
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if($withdraw_type=='crypt') active @endif">
			<a href="{{route('deposit')}}?type=withdrawal&withdraw_type=crypt">
			暗号通貨出金
			</a>
		</div>

</div>
</div>