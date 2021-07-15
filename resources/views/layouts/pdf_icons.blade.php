<style>

.pdf_icon_for_sp{
  width:25%;
  float:left;
}

.pdf_icon_for_sp_a{
  width:100%;
  font-size:10px;
  text-align:center;
}

@media screen and (min-width: 452px) {
  .pdf_icon_for_sp_area{
    display: none;
  }
  
  .pdf_icon_for_pc_area{
    display: block;
  }
}

@media screen and (max-width: 451px) {
  .pdf_icon_for_sp_area{
    display: block;
  }
  
  .pdf_icon_for_pc_area{
    display: none;
  } 
}

</style>

<div class="row pdf_icon_for_pc_area">
		<div class="col md-12">
			<div class="row">
				<div class="col md-3">
											<a href="{{route('esignature')}}" target="_blank" class="row">
											<div class="col-md-4">
							<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="img-fluid">
						</div>
						<p class="col-md-8">Esignatures</p>
					</a>
				</div>
				<div class="col md-3">
											<a href="{{route('terms')}}" target="_blank" class="row">
											<div class="col-md-4">
							<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="img-fluid">
						</div>
						<p class="col-md-8">Terms and Conditions</p>
					</a>
				</div>
				<div class="col md-3">
											<a href="{{route('privacy')}}" target="_blank" class="row">
											<div class="col-md-4">
							<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="img-fluid">
						</div>
						<p class="col-md-8">Client Agreement</p>
					</a>
				</div>
				<div class="col md-3">
											<a href="{{route('risk')}}" target="_blank" class="row">
											<div class="col-md-4">
							<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="img-fluid">
						</div>
						<p class="col-md-8">Additional Risk Disclosure</p>
					</a>
				</div>
			</div>
		</div>
	</div>





	<div class="pdf_icon_for_sp_area">

		<div class="pdf_icon_for_sp">
			<a href="{{route('esignature')}}" target="_blank" class="pdf_icon_for_sp_a">
				<div class="pdf_icon_for_sp_a">
					<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="pdf_icon_for_sp_a">
				</div>
				<p class="pdf_icon_for_sp_a">Esignatures</p>
			</a>
		</div>
		<div class="pdf_icon_for_sp">
			<a href="{{route('terms')}}" target="_blank" class="pdf_icon_for_sp_a">
				<div class="pdf_icon_for_sp_a">
					<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="pdf_icon_for_sp_a">
				</div>
				<p class="pdf_icon_for_sp_a">Terms and Conditions</p>
			</a>
		</div>
		<div class="pdf_icon_for_sp">
			<a href="{{route('privacy')}}" target="_blank" class="pdf_icon_for_sp_a">
				<div class="pdf_icon_for_sp_a">
					<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="pdf_icon_for_sp_a">
				</div>
				<p class="pdf_icon_for_sp_a">Client Agreement</p>
			</a>
		</div>
		<div class="pdf_icon_for_sp">
			<a href="{{route('risk')}}" target="_blank" class="pdf_icon_for_sp_a">
				<div class="pdf_icon_for_sp_a">
					<img src="{{$layoutPath}}/../assets/img/pdfIcon.png" class="pdf_icon_for_sp_a">
				</div>
				<p class="pdf_icon_for_sp_a">Additional Risk Disclosure</p>
			</a>
		</div>

	</div>
