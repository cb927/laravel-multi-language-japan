<form method="POST" action="{{route('withdrawal-application')}}" enctype="multipart/form-data" class="register_form" onSubmit="return IdAuth();">
@csrf

<h1 class="center_text">
暗号通貨出金
</h1>

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

    </tbody>
</table>

<h2 class="row center_text">
送金暗号通貨選択
</h2>

<div class="row pad_vertical center_text">

    @foreach($depositCryptCurrencyInfo as $thisCurrencyInfo)

    <input type="radio" name="crypt_currency" value="{{$thisCurrencyInfo->name}}"> <img src="{{$thisCurrencyInfo->img}}" />
    
    @endforeach

</div>

<div class="row pad_vertical center_text">

    <div class="col-md-4 pad_vertical">
        <div class="labeltext35">
        出金申請金額
        </div>
    </div>
    <div class="col-md-4 pad_vertical">
        <input type="text" class="input_bank_withdraw" />
    </div>
    <div class="col-md-4 pad_vertical">
        <div class="green_back_box small_text_box" />
        算出
        </div>
    </div>

</div>




<h3 class="row center_text">
    1.5567 BTC
</h3>

<div class="row pad_vertical">
    送金先暗号通貨ウォレットアドレス<br>
    <input type="text" class="input_bank_withdraw" />
</div>


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
@include('deposits_parts.testcode')
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
