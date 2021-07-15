<div class="row">
<div class="col-md-12 overmenus">

		<div class="col-md-2 overmenu menu @if($type=='alternative') active @endif">
			<a href="{{route('deposit')}}?type=alternative">
			暗号通貨入金
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if($type=='credit_card') active @endif">
			<a href="{{route('deposit')}}?type=credit_card">
			クレジットカード決済
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if($type=='banks') active @endif">
			<a href="{{route('deposit')}}?type=banks">
			銀行送金
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if($type=='withdrawal') active @endif">
			<a href="{{route('deposit')}}?type=withdrawal">
			出金
			</a>
		</div>

</div>
</div>