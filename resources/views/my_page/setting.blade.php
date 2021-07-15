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

  <script type="text/javascript">
    function IdAuth(sikibetusi) {
      console.log("IdAuth");
      let input_id = $(".loginpassword" + sikibetusi).val();
      console.log(input_id);

      let isSamePassword = $.ajax({
        type: 'GET',
        url: '{{route("judge")}}?password=' + input_id,
        async: false
      }).responseText;

      console.log(isSamePassword);

      if (isSamePassword == "false") {
        $(".error-message").html("入力されたIDが違います。");
        return false;
      }

      return true;
    }
  </script>

  <title>
    GOOD ENOUGH FX
  </title>
  <style>
    .my-page-button-red {
      border: none;
    }

    .comment {
      font-weight: bold;
      line-height: 30px;
      margin-top: 50px;
      display: none;
    }

    .mypage-detail-wrapper {
      padding: 0 50px;
    }

    .card {
      margin-top: 30px;
      border: 1px solid #343F47;
      border-radius: 5px;
    }

    .card-header {
      background: linear-gradient(0.25turn, #0F141C, #343F47);
      color: white;
      padding: 15px;
    }

    .card-body {
      padding: 15px;
    }

    .btn-success {
      background: green;
      border: none;
      padding: 6px 30px;
    }

    @media screen and (max-width: 525px) {
      .red-div {
        margin-left: 0;
      }

      .comment {
        display: block;
      }

      .mypage-detail-wrapper {
        padding: 0;
      }

      .card-body {
        padding: 0;
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

        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 my-page-main-content">
          <div class="aff-partner">
            <div>
              <a href="{{route('aff_partner')}}" class="btn">{{ trans('mypage.mypage_member')}}</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="{{url('/my-page')}}" class="mypage-menu">{{ trans('mypage.mypage_sumary')}}</a>
            <a href="{{url('/my-history')}}" class="mypage-menu">{{ trans('mypage.mypage_history')}}</a>
            <a href="{{url('/my-deposit')}}" class="mypage-menu">{{ trans('mypage.mypage_money')}}</a>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="{{url('/my-transfer')}}" class="mypage-menu">{{ trans('mypage.mypage_move')}}</a>
            <a href="{{url('/my-additional')}}" class="mypage-menu">{{ trans('mypage.mypage_add')}}</a>
            <a href="{{url('/my-setting')}}" class="mypage-menu mypage-menu-active">{{ trans('mypage.mypage_setting')}}</a>
          </div>
        </div>
      </div>
      <div style="height: 1px; background: gray; margin: 20px 0px;"></div>
      <div class="row">
        @include('my_page.my-page-side-bar')
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 my-page-main-content">
          <div class="mypage-detail-wrapper">
            <p class="title">
              {{ trans('mysetting.setting_set')}}
            </p>
            <div class="card">
              <div class="card-header">{{ trans('mysetting.setting_mam')}}</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3 col-xs-4" style="padding: 10px;">
                    <img src="{{asset('img/setting/doc.png')}}" alt="" style="width: 100%;">
                  </div>
                  <div class="col-md-9 col-xs-8" style="padding: 10px;">
                    <p>
                      {{ trans('mysetting.setting_1')}}<br>
                      {{ trans('mysetting.setting_2')}}<br>
                      {{ trans('mysetting.setting_3')}}<br>
                      {{ trans('mysetting.setting_4')}}<br>
                      {{ trans('mysetting.setting_5')}}
                    </p>
                    <div>
                      <a href="{{route('setting_mam')}}" class="btn btn-success">{{ trans('mysetting.setting_submit')}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">{{ trans('mysetting.setting_stage')}}</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3 col-xs-4" style="padding: 10px;">
                    <img src="{{asset('img/setting/password.png')}}" alt="" style="width: 100%;">
                  </div>
                  <div class="col-md-9 col-xs-8" style="padding: 10px;">
                    <p>
                      {{ trans('mysetting.setting_two')}}<br>
                      {{ trans('mysetting.setting_two_1')}}<br>
                      {{ trans('mysetting.setting_two_2')}}<br>
                      {{ trans('mysetting.setting_two_3')}}<br>
                      {{ trans('mysetting.setting_two_4')}}<br>
                      {{ trans('mysetting.setting_two_5')}}<br>
                      {{ trans('mysetting.setting_two_6')}}
                    </p>
                    <div>
                      <a href="{{route('setting1')}}" class="btn btn-success">Activate</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footer')
  </div>
</body>

</html>