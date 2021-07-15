<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- BootstrapのCSS読み込み -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!-- jQuery読み込み -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- BootstrapのJS読み込み -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- 全体 -->
  <link rel="stylesheet" href="{{asset('css/basic.css')}}">
  <link rel="stylesheet" href="{{asset('css/header_and_footer.css')}}">

  <!-- 会員ページ全体 -->
  <link rel="stylesheet" href="{{asset('css/left_profile.css')}}">
  <link rel="stylesheet" href="{{asset('css/over_menu.css')}}">

  <!-- 本ページ -->
  <link rel="stylesheet" href="{{asset('css/summary.css')}}">
  <link rel="stylesheet" href="{{asset('css/summary_main.css')}}">

  <title>
    GOOD ENOUGH FX
  </title>
  <style>
    .form-label {
      text-align: right;
      line-height: 40px;
      padding-right: 10px !important;
    }

    .radio-img img {
      height: 30px;
      margin-bottom: 10px;
    }

    .register_form {
      padding: 40px;
    }

    .exchange {
      margin-top: 30px;
      border: 1px solid gray;
      padding: 30px 40px;
    }

    .wallet-address {
      padding: 10px 50px;
    }

    .output-request {
      padding: 30px 80px;
    }

    @media screen and (max-width: 525px) {
      .register_form {
        padding: 0px;
      }

      .exchange {
        padding: 10px 10px;
      }

      .wallet-address {
        padding: 10px 0px;
      }

      .output-request {
        padding: 30px 0px;
      }

      .submenu {
        width: 120px !important;
      }

      .my-page-side-bar {
        padding-bottom: 49px;
        border-bottom: 1px solid #828282 !important;
      }

      .submenu-div {
        margin-top: 0 !important;
      }
    }
  </style>

</head>

<body>
  <div class="main-wrap">
    @include('layouts.header')


    <div class="mypage-wrapper">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
          <div class="gradient-div gradient-div-main">
            {{ trans('mypage.mypage_member')}}
          </div>
        </div>

        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  my-page-main-content">
          <div class="aff-partner">
            <div>
              <a href="{{route('aff_partner')}}" class="btn">{{ trans('mypage.mypage_affiliate')}}</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="{{url('/my-page')}}" class="mypage-menu">{{ trans('mypage.mypage_sumary')}}</a>
            <a href="{{url('/my-history')}}" class="mypage-menu">{{ trans('mypage.mypage_history')}}</a>
            <a href="{{url('/my-deposit')}}" class="mypage-menu mypage-menu-active">{{ trans('mypage.mypage_money')}}</a>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="{{url('/my-transfer')}}" class="mypage-menu">{{ trans('mypage.mypage_move')}}</a>
            <a href="{{url('/my-additional')}}" class="mypage-menu">{{ trans('mypage.mypage_add')}}</a>
            <a href="{{url('/my-setting')}}" class="mypage-menu">{{ trans('mypage.mypage_setting')}}</a>
          </div>
        </div>
      </div>

      <div style="height: 1px; background: gray; margin: 20px 0px"></div>

      <div class="row">
        @include('my_page.my-page-side-bar')
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  my-page-main-content">

          <div class="deposit-menu-wrapper ">
            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="{{url('/my-deposit')}}" class="mypage-menu deposit-menu">{{ trans('input_output.input_bank')}}</a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="{{url('/my-deposit/cryptocurrency')}}" class="mypage-menu deposit-menu">{{ trans('input_output.input_crypto')}}</a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="{{url('/my-deposit/withdrawal')}}" class="mypage-menu deposit-menu mypage-menu-active">{{ trans('input_output.input_output')}}</a>
            </div>
          </div>

          <div class="divider1"></div>

          <div class="deposit-menu-wrapper">
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 d-flex-around margin-top-zero submenu-div">
              <a href="{{url('/my-deposit/withdrawal')}}" class="mypage-menu deposit-menu submenu">{{ trans('input_output.input_bank')}}</a>
              <a href="{{url('/my-deposit/withdrawal/credit')}}" class="mypage-menu deposit-menu mypage-menu-active submenu">{{ trans('input_money.bank_credit')}}</a>
            </div>
          </div>

          <div class="divider2"></div>

          <div class="mypage-detail-wrapper">

            <p class="title">
              {{ trans('credit.credit_money')}}
            </p>

            <div class="row" style="margin: 20px 0;">
              <div class="col-xs-6 form-label">{{ trans('credit.credit_out')}}</div>
              <div class="col-xs-6" style="line-height: 40px;">8091709710</div>
            </div>

            <p class="title">
              {{ trans('credit.credit_send')}}
            </p>

            <form method="POST" action="{{route('withdrawal-application2')}}" enctype="multipart/form-data" class="register_form" onSubmit="return IdAuth();">
              @csrf

              <input type="hidden" name="howdo" value="crypt">

              <div class="row">
                <div class="col-md-3 col-xs-6 radio-img">
                  <input type="radio" name="howdo">
                  <img src="../../images/bitcoin.png" />
                </div>
                <div class="col-md-3 col-xs-6 radio-img">
                  <input type="radio" name="howdo">
                  <img src="../../images/ethereum.png" />
                </div>
                <div class="col-md-3 col-xs-6 radio-img">
                  <input type="radio" name="howdo">
                  <img src="../../images/bitcoincash.png" />
                </div>
                <div class="col-md-3 col-xs-6 radio-img">
                  <input type="radio" name="howdo">
                  <img src="../../images/tether.png" />
                </div>
              </div>

              <div class="exchange">
                <div class="row">
                  <div class="col-md-9 col-xs-12" style="line-height: 40px;">
                    <div class="col-xs-3 subtitle">{{ trans('credit.credit_invoice')}}</div>
                    <div class="col-xs-7">
                      <input type="text" class="my-page-input">
                    </div>
                    <div class="col-xs-2" style="padding: 0 10px;">USD</div>
                  </div>
                  <div class="col-md-3 col-xs-12">
                    <a href="#" class="my-page-button my-page-button-green fixed-width">{{ trans('credit.credit_add')}}</a>
                  </div>
                </div>
                <div class="row" style="margin-top: 30px;">
                  <div class="row">
                    <div class="col-xs-3 form-label" style="font-size: 20px; font-weight:bold">{{ trans('credit.credit_after')}}</div>
                    <div class="col-xs-6">
                      <input type="text" class="my-page-input">
                    </div>
                    <div class="col-xs-3" style="line-height: 40px; padding-left:5px;">BTC</div>
                  </div>
                </div>
              </div>

              <div class="wallet-address">
                <span class="subtitle" style="margin:5%">{{ trans('credit.credit_address')}}</span>
                <input type="text" style="margin-top:2%" class="my-page-input" name="receiver_cryptaddress">
              </div>

              <div class="output-request">
                <div class="row">
                  <div class="col-md-8">
                    <div class="col-xs-6 form-label">{{ trans('credit.credit_password')}}</div>
                    <div class="col-xs-6">
                      <input type="text" class="my-page-input" style="margin-bottom: 20px;">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <input type="submit" value="{{ trans('credit.credit_out_invoice')}}" class="red_back_box small_text_box" style="border: none; margin:0;">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 text-center pad_vertical">
                  <span class="error-message" style="color: red"></span>
                </div>
              </div>

              <p style="font-weight: bold; line-height: 30px;">
                {{ trans('credit.credit_1')}}<br>
                {{ trans('credit.credit_2')}}<br>
                {{ trans('credit.credit_3')}}<br>
                {{ trans('credit.credit_4')}}<br>
                {{ trans('credit.credit_5')}}<br>
                {{ trans('credit.credit_6')}}
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
    @include('layouts.footer')
  </div>

  <script type="text/javascript">
    function IdAuth() {
      let input_id = $(".mt4-password").val();

      let isSamePassword = $.ajax({
        type: 'GET',
        url: '{{route("judge")}}?password=' + input_id,
        async: false
      }).responseText;

      if (isSamePassword == "false") {
        $(".error-message").html("入力されたIDが違います。");
        return false;
      }

      return true;
    }
  </script>

</body>

</html>