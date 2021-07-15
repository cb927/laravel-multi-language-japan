@if($row[0] == trans('header.menu_login'))

<div class="col-md-{{$row[2]}} menu active pad_vertical2 textcenter">
	<a href="{{$row[1]}}" class="@auth logout-button @else login-button @endauth" href="{{$row[1]}}">
		<span class="@auth logout-button-text @else login-button-text @endauth">
			{{$row[0]}}
		</span>
	</a>
</div>

@elseif($row[0] == trans('header.menu_logout'))

<div class="col-md-{{$row[2]}} menu active pad_vertical2 textcenter">
	<a href="{{$row[1]}}" class="@auth login-button @else logout-button @endauth" href="{{$row[1]}}">
		<span class="@auth login-button-text @else logout-button-text @endauth">
			{{$row[0]}}
		</span>
	</a>
</div>

@else

<div class="col-md-{{$row[2]}} menu active pad_vertical2">
	<a href="{{$row[1]}}">
		{{$row[0]}}
	</a>
</div>

@endif