<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 align="center" id="contactModalLabel">Fill out the form and we will reach you soon</h5>
			</div>
			<div class="modal-body">
				<form class="col-16 mx-auto ajax needs-validation" action="{{route('inquiry')}}"
					enctype="multipart/form-data" method="POST">
					@csrf
					<input type="hidden" name="form[type]" value="contact">
					<input type="hidden" name="thisRouteName" value="{{$thisRouteName}}">
					<div class="form-group">
						<div class="col-md-12 spaceFields">
							<fieldset class="input">
								<label class="control-label" for="basic_information[complete_name]"><span
										class="text-danger">*</span>お名前(ローマ字)</label>
								<input type="text" name="basic_information[complete_name]"
									data-custom-user-form="name" class="form-control" placeholder="お名前(ローマ字)"
									required>
							</fieldset>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12 spaceFields">
							<fieldset class="input">
								<label class="control-label" for="basic_information[email]"><span
										class="text-danger">*</span>Eメールアドレス:</label>
								<input type="email" name="basic_information[email]" data-custom-user-form="email"
									class="form-control" placeholder="Eメールアドレス" required>
							</fieldset>
						</div>
					</div>
					<!--<div class="form-group">
						<div class="col-md-12 spaceFields mt-2" id="contact_subject">
							<fieldset class="input">
								<label class="control-label" for="basic_information[reason]"><span class="text-danger">*</span>Why do you want to contact us?</label>
								<select class="selectpicker col-md-12 p-0" name="basic_information[reason]" required>
									<option value="" selected disabled>選択してください</option>
									<option value="General Inquiry">General Inquiry</option>
									<option value="Trading">Trading</option>
									<option value="Back Office">Back Office</option>
									<option value="Technical Support">Technical Support</option>
									<option value="Compliance">Compliance</option>
									<option value="Introducing Brokers">Introducing Brokers</option>
									<option value="Withdrawals">Withdrawals</option>
								</select>
							</fieldset>
						</div>
					</div>-->

					<div class="form-group">
						<div class="col-md-12 spaceFields mt-2" id="contact_message">
							<fieldset class="input textarea">
								<label class="control-label" for="contact_information[message]"><span
										class="text-danger">*</span>お問い合わせ内容</label>
								<textarea type="text" name="contact_information[message]" rows="5"
									class="form-control" placeholder="お問い合わせ内容"></textarea>
							</fieldset>
						</div>
					</div>
					</br>
					<div>
						<div class="col-md-12 spaceFields mt-2">
							<button type="submit" class="btn btn-primary" style="float:left">送信する</button>
							<button type="button" class="btn btn-primary buttonLoading d-none !important" disabled>
								<span class="spinner-border spinner-border-sm" role="status"
									aria-hidden="true"></span>
								ロード中
							</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal"
								style="float:right">閉じる</button>
						</div>
					</div>
					<input type="hidden" name="backend[user][email]" value="">
					<input type="hidden" name="backend[user][name]" value="">
				</form>
			</div>
		</div>
	</div>
</div>