
<div class="col-md-12 member_page_title">
	<div class="col-md-4">
		<div class="black_float_box">
			メンバーページ
		</div>
	</div>
</div>

<div class="col-md-12 overmenus">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-8">
		
		<div class="col-md-2 overmenu menu @if(url()->current() == route('summary')) active @endif">
			<a href="{{route('summary')}}">
				口座サマリー
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if(url()->current() == route('history')) active @endif">
			<a href="{{route('history')}}">
				履歴
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if(url()->current() == route('deposit')) active @endif">
			<a href="{{route('deposit')}}">
				入出金
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if(url()->current() == route('transfer')) active @endif">
			<a href="{{route('transfer')}}">
			資金移動
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if(url()->current() == route('addaccount')) active @endif">
			<a href="{{route('addaccount')}}">
			追加口座
			</a>
		</div>

		<div class="col-md-2 overmenu menu @if(url()->current() == route('setting')) active @endif">
			<a href="{{route('setting')}}">
			設定
			</a>
		</div>

	</div>
</div>