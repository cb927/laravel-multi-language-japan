<h1 class="center_text">
２段階認証設定
</h1>


<div>
GOOD ENOUGH FX にログインするたびに、ユーザー名とパスワードに加えて、スマートフォンの
Google 認証システムアプリによって生成されたコードも必要になります。
ログインするには動的コードを入力する必要があります。
これにより、アカウントのパスワードが漏洩した場合のアカウントへの侵入を効果的に防ぐことができます。
</div>

<form method="POST" action="{{route('setting-confirm')}}" enctype="multipart/form-data" onSubmit="return IdAuth1();">
@csrf
<div class="row">
    <div class="col-md-4 pad_vertical">
        <div class="green_back_box small_text_box" />
        MT4パスワード入力
        </div>
    </div>
    <div class="col-md-4 pad_vertical">
        <input data-id="test1" type="text" class="input_bank_withdraw"  id="transfer-id1"/>
    </div>
    <div class="col-md-4 pad_vertical">
        <input type="submit" value="出金申請" class="red_back_box small_text_box" style="border: none;">
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center pad_vertical">
        <span class="error-message1" style="color: red"></span>
    </div>
</div>

</form>
<script type="text/javascript">
  function IdAuth1() {
      $input_id1 = $("#transfer-id1").val();
      $login_id1 = $("#transfer-id1").attr("data-id");
      if ($input_id1 != $login_id1) {
        $(".error-message1").html("入力されたIDが違います。");
        return false;
      }
    }
</script>

<form method="POST" action="{{route('setting-confirm')}}" enctype="multipart/form-data" onSubmit="return IdAuth2();">
@csrf
<div class="row">
    <div class="col-md-4 pad_vertical">
        <div class="green_back_box small_text_box" />
        MT4パスワード入力
        </div>
    </div>
    <div class="col-md-4 pad_vertical">
        <input data-id="test2" type="text" class="input_bank_withdraw" id="transfer-id2" />
    </div>
    <div class="col-md-4 pad_vertical">
        <input type="submit" value="出金申請" class="red_back_box small_text_box" style="border: none;">
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-center pad_vertical">
        <span class="error-message2" style="color: red"></span>
    </div>
</div>

</form>
<script type="text/javascript">
  function IdAuth2() {
      $input_id2 = $("#transfer-id2").val();
      $login_id2 = $("#transfer-id2").attr("data-id");
      if ($input_id2 != $login_id2) {
        $(".error-message2").html("入力されたIDが違います。");
        return false;
      }
    }
</script>
