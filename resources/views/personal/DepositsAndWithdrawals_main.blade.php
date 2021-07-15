@include('personal.over_menu2')


<div class="padding20">


@if($type=='banks')
@include('deposits_parts.bank')
@endif


@if($type=='credit_card')
@include('deposits_parts.credit')
@endif

@if($type=='alternative')
@include('deposits_parts.cryptocurrency')
@endif

@if($type=='withdrawal')
@include('deposits_parts.withdrawal')
@endif

</div>
