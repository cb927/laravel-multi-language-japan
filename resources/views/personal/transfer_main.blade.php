<h1 class="center_text">
資金移動
</h1>

<form method="post" onSubmit="return IdAuth();">
@csrf
<table class="table noneborder">
    <tbody>

        <tr>
            <td class="text_right_box2">
                出金元口座番号
            </td>
            <td class="text_left_box2">
                8091709710
            </td>
		</tr>
		
		<tr>
            <td class="text_right_box2">
				<div class="labeltext35">
                移動先口座番号
                </div>
            </td>
            <td class="text_left_box2">
				<input type="text" class="input_bank_withdraw" />
            </td>
		</tr>
		
		<tr>
            <td class="text_right_box2">
				<div class="labeltext35">
                移動申請金額
                </div>
            </td>
            <td class="text_left_box2">
				<input type="text" class="input_bank_withdraw" />
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
        <input data-id="{{$loginUserPassword}}" type="text" class="input_bank_withdraw transfer-id" />
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
        let input_id = $(".transfer-id").val();
        
        let isSamePassword = $.ajax({
            type: 'GET',
            url: '{{route('judge')}}?password='+input_id,
            async: false
        }).responseText;
        
        if(isSamePassword == "false"){
            $(".error-message").html("入力されたIDが違います。");
            return false;
        }

        return true;
    }
</script>
