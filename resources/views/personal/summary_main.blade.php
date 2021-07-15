<div class="row">
	<div>
		<table class="table noneborder">					  
			<tbody>
			@foreach($summary_main_table_body as $row)
				<tr>
					<th class="col-xs-6 green_color">
						<div class="text_right_box2">
						{{$row[0]}}
						</div>
					</th>
					<td class="col-xs-6">{{$row[1]}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>