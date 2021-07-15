<div class="row mt-5">
	<h2 class="text-center col-12">口座履歴</h2>
</div>
<div class="row mt-5">
	<div class="col-12">
		<div class="table-responsive shadow rounded">
			<table class="table table-hover table-sm historyTable">
				<thead class="thead-gray">
					<tr align="center">
						<th scope="col">注文番号</th>
						<th scope="col">発注時刻</th>
						<th scope="col">注文種類</th>
						<th scope="col">サイズ</th>
						<th scope="col">銘柄</th>
						<th scope="col">発注価格</th>
						<th scope="col">S/L</th>
						<th scope="col">T/P</th>
						<th scope="col">決済時刻</th>
						<th scope="col">決済価格</th>
						<th scope="col">手数料</th>
						<th scope="col">スワップ</th>
						<th scope="col">Profit</th>
					</tr>
				</thead>
				<tbody>
					@foreach($historyInfo->closedOrders as $closedOrder)
					<tr>
						<th scope="row" data-id="ticket">{{$closedOrder['order']}}</th>
						<td data-id="opendate">{{$closedOrder['open_time']}}</td>
						<td data-id="type">{{$closedOrder['type']}}</td>
						<td data-id="size">{{$closedOrder['volume']}}</td>
						<td data-id="symbol">{{$closedOrder['symbol']}}</td>
						<td data-id="openprice">{{$closedOrder['open_price']}}</td>
						<td data-id="sl">{{$closedOrder['SL']}}</td>
						<td data-id="tp">{{$closedOrder['TP']}}</td>
						<td data-id="closedate">{{$closedOrder['close_time']}}</td>
						<td data-id="closeprice">{{$closedOrder['close_price']}}</td>
						<td data-id="commission">{{$closedOrder['commission']}}</td>
						<td data-id="swap">{{$closedOrder['swap']}}</td>
						<td data-id="profit">{{$closedOrder['profit']}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 p-4 mt-4">
		<nav aria-label="Page navigation">
			<ul class="pagination ajax justify-content-center">
				@for ($i = 1; $i <= $historyInfo-> maxPageNum; $i++)
				<li class="page-item @if($i==$historyInfo-> pageNum) active @endif">
					<a class="page-link" data-page="{{$i}}" href="?page={{$i}}" aria-label="Current Page">
						{{$i}}
					</a>
				</li>
				@endfor
			</ul>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col text-center py-4">

		<form action="{{ url('sample/download2') }}" method="post">
			@csrf
			<input type="hidden" name="login" value="{{$historyInfo->login}}">
			<input type="submit" value="ダウンロード">
		</form>

	</div>
</div>
<div class="row">
	<div class="sumaryTable col-6 mx-auto p-2 my-2 border rounded">
		<table class="table table-hover">
			<tbody>
				<tr>
					<th class="border-top-0">ご入金:</th>
					<td class="border-top-0" data-title="Deposit"> {{$historyInfo-> calcUsingClosedOrders->sumOfNyukin}} </td>
				</tr>
				<tr>
					<th>出金額:</th>
					<td data-title="Withdrawal"> {{$historyInfo-> calcUsingClosedOrders->sumOfSyukkin}} </td>
				</tr>
				<tr>
					<th>ADJ:</th>
					<td data-title="Credit"> {{$historyInfo-> calcUsingClosedOrders->sumOfAdj}} </td>
				</tr>
				<tr>
					<th>手数料:</th>
					<td data-title="Commission"> {{$historyInfo-> calcUsingClosedOrders->sumOfCommission}} </td>
				</tr>
				<tr>
					<th>スワップ</th>
					<td data-title="Swap"> {{$historyInfo-> calcUsingClosedOrders->sumOfSwap}} </td>
				</tr>
				<tr>
					<th>確定損益:</th>
					<td data-title="Profit/Loss"> {{$historyInfo-> calcUsingClosedOrders->sumOfProfits}} </td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>