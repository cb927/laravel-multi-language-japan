@include('personal.over_menu3')


@if($withdraw_type=="banks")
@include('deposits_parts.withdrawal_bank')
@endif

@if($withdraw_type=="crypt")
@include('deposits_parts.withdrawal_crypt')
@endif