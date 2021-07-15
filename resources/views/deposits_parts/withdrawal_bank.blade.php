<form method="POST" action="{{route('withdrawal-application')}}" enctype="multipart/form-data" class="register_form" onSubmit="return IdAuth();" data-addbankaction="{{route('add-bank')}}">
@csrf

<h1 class="center_text">
銀行出金
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
        <tr>
            <td class="text_right_box2">
                <div class="labeltext35">
                出金申請金額
                </div>
            </td>
            <td class="text_left_box2">
            <input type="text" class="input_bank_withdraw" />
            </td>
        </tr>

    </tbody>
</table>

<h2 class="row center_text">
送金先銀行情報
</h2>

<div class="row pad_vertical center_text">
三菱UFJ 銀行　福岡支店　普通口座　口座番号9999999 口座名義　カ）グツドイナフエフエツクス
</div>

<div class="row pad_vertical center_text">
三菱UFJ 銀行　福岡支店　普通口座　口座番号9999999 口座名義　カ）グツドイナフエフエツクス
</div>

<div class="row pad_vertical">
    <div class="col-md-10">
    </div>
    <div class="col-md-2">
        <div class="green_back_box small_text_box" />
        登録銀行追加
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4 pad_vertical">
        *銀行口座名義人氏名<br>
        <input type="text" class="input_bank_withdraw" name="bank_account_name" />
    </div>
    <div class="col-md-8 pad_vertical">
        銀行口座名義人住所<br>
        <input type="text" class="input_bank_withdraw" name="bank_account_address" />
    </div>
</div>

<div class="row">
    <div class="col-md-4 pad_vertical">
        *受取人口座番号<br>
        <input type="text" class="input_bank_withdraw" name="bank_account_number" />
    </div>
    <div class="col-md-4 pad_vertical">
        *銀行名<br>
        <input type="text" class="input_bank_withdraw" name="bank_name"  />
    </div>
    <div class="col-md-4 pad_vertical">
        
    </div>
</div>

<div class="row">
    <div class="col-md-4 pad_vertical">
        支店名<br>
        <input type="text" class="input_bank_withdraw" name="bank_branch"  />
    </div>
    <div class="col-md-4 pad_vertical">
        普通/当座<br>
        <input type="text" class="input_bank_withdraw" name="bank_kind" />
    </div>
    <div class="col-md-4 pad_vertical">
        <br>
        <div class="green_back_box small_text_box" onclick="addAccount()" />
        追加
        </div>
    </div>
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
@include('deposits_parts.testcode2')
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

    function addAccount(){
        let addbankaction = $('form').data("addbankaction");
        $('form').attr('action', addbankaction);
        $('form').submit();
    }
</script>
