<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
		function addPlatform() {
			let loginname = "mt4-" + $(".AccountNumber").val();
			$(".loginname").val(loginname);
		};
</script>	

<form method="post" action="{{route('fa2-confirm')}}" onsubmit="return addPlatform();" >
	@csrf


	口座番号
			<input type="text" name="accountnum" class="AccountNumber">
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				<script>
					alert('口座番号またはパスワードが間違っています');
				</script>
			@enderror           
	
	
	パスワード
			<input type="password" name="password">
			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				<script>
					alert('口座番号またはパスワードが間違っています');
				</script>
			@enderror


			

			<div class="col-12 fieldContainer">
										<fieldset class="input">
											<span class="text-primary float-left">*</span><label class=" float-left" for="password">&nbsp;ワンタイムパスワード:</label>
											<input type="text" name="onepass" placeholder="ワンタイムパスワード" class="form-control required" >
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												<script>
													alert('口座番号またはパスワードが間違っています');
												</script>
											@enderror
										</fieldset>
									</div>

									<input type="hidden" name="google2fa_secret" value="{{$google2fa_secret}}">

									


		<button type="submit">ログイン</button>
		
		<input type="hidden" name="name" class="loginname">
					
</form>