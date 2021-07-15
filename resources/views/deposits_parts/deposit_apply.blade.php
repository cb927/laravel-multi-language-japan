

<div>
	ご入金の前に、下記入力フォームにて、入金申請を行ってください。<br>
	送信するボタンを押すと次ページに、振込先が表示されます。<br>
</div>

<form method="POST" action="{{ route('deposit-application') }}">
	@csrf
	<div class="row">
		
		<div class="col-12 col-sm-6 col-md-6 mt-6">
			*登録名<br>
			<input type="text" name="name" style="width:100%;" required placeholder="半角英字(yamada taro)" value="{{$this_user_account_info->name}}" readonly />
		</div>
		
		<div class="col-12 col-sm-6 col-md-6 mt-6">
			*メールアドレス<br>
			<input type="text" name="email" style="width:100%;" required placeholder="半角英字（yamada taro)" value="{{$this_user_account_info->email}}" readonly />
		</div>
		
		<div class="col-12 col-sm-6 col-md-6 mt-6">
			*口座番号<br>
			<input type="text" name="account" style="width:100%;" required placeholder="口座にはご入金が必要です。" value="{{$this_user_account_info->account_number}}" readonly />
		</div>
		
		<div class="col-12 col-sm-6 col-md-6 mt-6">
			*入金金額<br>
			<input type="number" name="howmuch" style="width:100%;" required placeholder="半角数字"  />
		</div>
		
		<div class="col-12 col-sm-6 col-md-6 mt-6">
			連絡事項<br>
			<input type="text" name="comment" style="width:100%;" placeholder="何か連絡事項があれば記入してください" />
		</div>
		
		<div class="col-12" style="margin-top:40px;">
			<center>
				<button type="submit" id="inquery_btn" class="btn btn-lg btn-outline-primary">
					送信する
				</button>
			</center>
		</div>

		<input type="hidden" name="type" value="{{$type}}">
		<input type="hidden" name="kind" value="{{$kind}}">
		<input type="hidden" name="detail" value="true">

	</div>

</form>