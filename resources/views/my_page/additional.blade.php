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
    input {
      margin-top: 0 !important;
    }

    .form-input {
      margin-left: 0 !important;
      height: 40px;
      border: 1px solid gray;
      border-radius: 0;
      width: 100%;
    }

    .red-div {
      margin-left: 255px;
    }

    .comment {
      font-weight: bold;
      line-height: 30px;
      margin-top: 50px;
      display: none;
    }

    @media screen and (max-width: 525px) {
      .red-div {
        margin-left: 0;
      }

      .comment {
        display: block;
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
            <a href="{{url('/my-deposit')}}" class="mypage-menu">{{ trans('mypage.mypage_money')}}</a>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="{{url('/my-transfer')}}" class="mypage-menu">{{ trans('mypage.mypage_move')}}</a>
            <a href="{{url('/my-additional')}}" class="mypage-menu mypage-menu-active">{{ trans('mypage.mypage_add')}}</a>
            <a href="{{url('/my-setting')}}" class="mypage-menu">{{ trans('mypage.mypage_setting')}}</a>
          </div>
        </div>
      </div>
      <div style="height: 1px; background: gray;  margin: 20px 0px;"></div>
      <div class="row">
        @include('my_page.my-page-side-bar')
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 my-page-main-content">
          <div class="mypage-detail-wrapper">
            <p class="title">
              {{ trans('myadditional.add_account')}}
            </p>

            <div class="my-page-form-group">

              <div class="row" style="margin-top:20px;">
                <div class="col-xs-5 form-label">{{ trans('myadditional.add_name')}}</div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <input type="text" class="form-input" value="{{$this_user_account_info->name}}">
                </div>
              </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-xs-5 form-label">{{ trans('myadditional.add_main')}}</div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <input type="text" class="form-input" value="{{$this_user_account_info->email}}">
                </div>
              </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-xs-5 form-label">{{ trans('myadditional.add_platform')}}</div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <select name="basic_information[platform]" class="form-input" required>
                    <option value="" selected disabled>{{ trans('register_individual.reg_ind_select')}}</option>
                    <option value="メタトレーダー4">{{ trans('register_individual.reg_ind_meta-4')}}</option>
                    <option value="アフィリエイト">{{ trans('register_individual.reg_ind_agency')}}</option>
                    <option value="MAM口座">{{ trans('register_individual.reg_ind_mam')}}</option>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-xs-5 form-label">{{ trans('myadditional.add_leverage')}}</div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <select name="" class="form-input">
                    <option value="">{{ trans('register_individual.reg_ind_select')}}</option>
                  </select>
                </div>
              </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-xs-5 form-label">{{ trans('myadditional.add_type')}}</div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <input type="text" class="form-input" value="USD">
                </div>
              </div>


              <div class="row" style="margin-top:20px;">
                <div class="col-xs-5 form-label">
                  <input type="checkbox" style="margin: 0px 10px" />
                </div>
                <div class="col-xs-7" style="line-height: 40px;">
                  {{ trans('myadditional.add_agree')}}
                </div>
              </div>


              <div class="row" style="margin-top:20px;">
                <div class="col-xs-6 form-label">{{ trans('myadditional.add_password')}}</div>
                <div class="col-xs-6" style="line-height: 40px;">
                  <input type="text" class="form-input">
                </div>
              </div>

              <div class="row" style="margin-top:20px;">
                <div class="col-md-5 red-div">
                  <a href="#" class="my-page-button my-page-button-red">{{ trans('myadditional.add_outinvoice')}}</a>
                </div>
              </div>

            </div>


            <p class="comment">
              {{ trans('input_output.input_3')}}<br>
              {{ trans('input_output.input_4')}}<br>
              {{ trans('input_output.input_5')}} <br>
              &nbsp;&nbsp;{{ trans('input_output.input_6')}} <br>
              {{ trans('input_output.input_7')}}<br>
              {{ trans('input_output.input_8')}}
            </p>

          </div>
        </div>
      </div>
    </div>
    @include('layouts.footer')
  </div>
</body>

</html>