<div class="row mt-5">
	<h2 class="text-center col-12"><?php echo e(trans('history.history_title')); ?></h2>
</div>
<div class="row mt-5">
	<div class="col-12">
		<div class="table-responsive shadow rounded">
			<table class="table table-hover table-sm historyTable">
				<thead class="thead-gray">
					<tr align="center">
						<th scope="col"><?php echo e(trans('history.history_order')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_time')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_type')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_size')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_lock')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_cost')); ?></th>
						<th scope="col">S/L</th>
						<th scope="col">T/P</th>
						<th scope="col"><?php echo e(trans('history.history_paytime')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_paycost')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_fee')); ?></th>
						<th scope="col"><?php echo e(trans('history.history_stuff')); ?></th>
						<th scope="col">Profit</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope="row" data-id="ticket">test</td>
						<td data-id="opendate">test</td>
						<td data-id="type">test</td>
						<td data-id="size">test</td>
						<td data-id="symbol">test</td>
						<td data-id="openprice">test</td>
						<td data-id="sl">test</td>
						<td data-id="tp">test</td>
						<td data-id="closedate">test</td>
						<td data-id="closeprice">test</td>
						<td data-id="commission">test</td>
						<td data-id="swap">test</td>
						<td data-id="profit">test</td>
					</tr>
					<tr>
						<td scope="row" data-id="ticket">test</td>
						<td data-id="opendate">test</td>
						<td data-id="type">test</td>
						<td data-id="size">test</td>
						<td data-id="symbol">test</td>
						<td data-id="openprice">test</td>
						<td data-id="sl">test</td>
						<td data-id="tp">test</td>
						<td data-id="closedate">test</td>
						<td data-id="closeprice">test</td>
						<td data-id="commission">test</td>
						<td data-id="swap">test</td>
						<td data-id="profit">test</td>
					</tr>
					<tr>
						<td scope="row" data-id="ticket">test</td>
						<td data-id="opendate">test</td>
						<td data-id="type">test</td>
						<td data-id="size">test</td>
						<td data-id="symbol">test</td>
						<td data-id="openprice">test</td>
						<td data-id="sl">test</td>
						<td data-id="tp">test</td>
						<td data-id="closedate">test</td>
						<td data-id="closeprice">test</td>
						<td data-id="commission">test</td>
						<td data-id="swap">test</td>
						<td data-id="profit">test</td>
					</tr>
					<tr>
						<td scope="row" data-id="ticket">test</td>
						<td data-id="opendate">test</td>
						<td data-id="type">test</td>
						<td data-id="size">test</td>
						<td data-id="symbol">test</td>
						<td data-id="openprice">test</td>
						<td data-id="sl">test</td>
						<td data-id="tp">test</td>
						<td data-id="closedate">test</td>
						<td data-id="closeprice">test</td>
						<td data-id="commission">test</td>
						<td data-id="swap">test</td>
						<td data-id="profit">test</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="row">
	<div style="width: fit-content; margin:auto">
		<div>
			<span>
				<< </span>
					<span style="color: green;">1</span>
					<span> >> </span>
		</div>
	</div>
</div>
<div class="row" style="margin-top:20px;">
	<div class="col text-center py-4">

		<form action="<?php echo e(url('sample/download2')); ?>" method="post">
			<?php echo csrf_field(); ?>
			<input type="hidden" name="login" value="test">
			<input class="submit-btn" type="submit" value="<?php echo e(trans('history.history_down')); ?>" style="margin: 0;">
		</form>

	</div>
</div>
<div class="row" style="margin-top: 50px;">
	<div class="sumaryTable col-6 mx-auto p-2 my-2 border rounded">
		<table class="table" style="margin-bottom: 0;">
			<tbody>
				<tr>
					<th class="border-top-0"><?php echo e(trans('history.history_input')); ?></th>
					<td class="border-top-0" data-title="Deposit">7.61 </td>
				</tr>
				<tr>
					<th><?php echo e(trans('history.history_output')); ?></th>
					<td data-title="Withdrawal">-1 </td>
				</tr>
				<tr>
					<th>ADJ:</th>
					<td data-title="Credit">0 </td>
				</tr>
				<tr>
					<th><?php echo e(trans('history.history_fee')); ?></th>
					<td data-title="Commission">0 </td>
				</tr>
				<tr>
					<th>スワップ</th>
					<td data-title="Swap">0 </td>
				</tr>
				<tr>
					<th><?php echo e(trans('history.history_confirm')); ?></th>
					<td data-title="Profit/Loss">0 </td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div><?php /**PATH E:\Gitub project\good\resources\views/personal/history_main.blade.php ENDPATH**/ ?>