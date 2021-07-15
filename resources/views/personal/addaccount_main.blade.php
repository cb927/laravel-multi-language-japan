<h1 class="center_text">
追加口座
</h1>

<form method="POST" action="{{route('addaccount-register')}}" enctype="multipart/form-data" onSubmit="return IdAuth();">
@csrf
<table class="table noneborder">
    <tbody>

		<tr>
            <td class="text_right_box2">
				<div class="labeltext35">
                お名前（ローマ字）
                </div>
            </td>
            <td class="text_left_box2">
				<input type="text" class="input_bank_withdraw" value="{{$this_user_account_info->name}}" />
            </td>
		</tr>
		
		<tr>
            <td class="text_right_box2">
				<div class="labeltext35">
                メールアドレス
                </div>
            </td>
            <td class="text_left_box2">
				<input type="text" class="input_bank_withdraw" value="{{$this_user_account_info->email}}" />
            </td>
		</tr>
		
		<tr>
            <td class="text_right_box2">
				<div class="labeltext35">
                レバレッジ
                </div>
            </td>
            <td class="text_left_box2">
				<input type="text" class="input_bank_withdraw" />
            </td>
		</tr>
		
		<tr>
            <td class="text_right_box2">
				<div class="labeltext35">
                口座種類
                </div>
            </td>
            <td class="text_left_box2">
				<input type="text" class="input_bank_withdraw" value="USD" readonly />
            </td>
        </tr>

    </tbody>
</table>


<input type="checkbox" />利用規則に同意する

<div class="row">
    <div class="col-md-4 pad_vertical">
        <div class="green_back_box small_text_box" />
        MT4パスワード入力
        </div>
    </div>
    <div class="col-md-4 pad_vertical">
        <input data-id="test1" type="text" class="input_bank_withdraw transfer-id" />
    </div>
    <div class="col-md-4 pad_vertical">
        <input type="submit" value="出金申請" class="red_back_box small_text_box" style="border: none;">
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center pad_vertical">
        <span class="error-message" style="color: red"></span>
    </div>
</div>

</form>
<script type="text/javascript">
  function IdAuth() {
      $input_id = $(".transfer-id").val();
      $login_id = $(".transfer-id").attr("data-id");
      if ($input_id != $login_id) {
        $(".error-message").html("入力されたIDが違います。");
        return false;
      }
    }
</script>
