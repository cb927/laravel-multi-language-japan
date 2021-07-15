<div class="row">
	<div>
		<table class="table noneborder">					  
			<tbody>
				@foreach($personal->left_profile_table_body as $row)

				<tr>
					<th class="col-xs-4">
						<div class="text_right_box">
						{{$row[0]}}
						</div>
					</th>
					<td class="col-xs-8">
						<div class="black_float_box">
						{{$row[1]}}
						</div>
					</td>
				</tr>
					
				@endforeach
			</tbody>
		</table>
	</div>
</div>