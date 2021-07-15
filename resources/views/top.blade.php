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

  <link rel="stylesheet" href="{{asset('css/top.css')}}">

  <title>
    GOOD ENOUGH FX
  </title>

  <style>
    .fxratein300 {
      display: block;
    }

    .fxratein200 {
      display: none;
    }

    .fxratein160 {
      display: none;
    }

    .back-opacity-div {
      display: block;
      text-align: center;
      padding: 13px;
      margin: auto;
      width: 80%;
      background: #fff;
      opacity: 0.76;
      box-shadow: 7px 7px 5px rgb(0 0 0 / 75%);
      z-index: 2;
      margin-bottom: 20px;
    }

    @media screen and (min-width: 525px) {
      #logo_image {
        margin-left: 50px;
      }

      #com_image {
        margin-left: -50px;
      }
    }

    @media screen and (max-width: 525px) {
      .fxratein300 {
        display: none;
      }

      .fxratein200 {
        display: block;
      }

      .fxratein160 {
        display: none;
      }

      .bg-text {
        display: none;
      }

      .sec-title-image {
        width: 142%;
        margin-left: 0;
      }

      .table-name table {
        width: 320px !important;
      }
    }

    @media screen and (max-width: 354px) {
      .fxratein300 {
        display: none;
      }

      .fxratein200 {
        display: none;
      }

      .fxratein160 {
        display: block;
      }

      .bg-text {
        display: none;
      }

      .sec-title-image {
        width: 142%;
        margin-left: 0;
      }

      .table-name table {
        width: 320px !important;
      }
    }
  </style>
</head>

<body style="margin: 0; padding:0">
  <div class="main-wrap">
    <div class="container-fruid">
      @include('layouts.header')

      <div class="bg-image">
        <div class="row" style="z-index: 1; padding-bottom:30px">
          <div class="col-md-5 col-sm-12 col-xs-12 col-lg-5" id="logo_image">
            <img src="./images/header_logo.png" class="banner-logo" style="width: 50%;">
            <div>
              @foreach($global->header_table_body as $row)
              @if($row[0] == trans('header.menu_new_account'))
              <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <a class="common-button banner-button1" style="z-index:100" href="{{$row[1]}}">{{ trans('header.menu_new_account')}}</a>
              </div>

              @elseif($row[0] == trans('header.menu_demo'))
              <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
                <a class="common-button banner-button2" href="{{$row[1]}}">{{ trans('header.menu_demo')}}</a>
              </div>
              @endif
              @endforeach
            </div>
          </div>
          <div class="col-md-7 col-sm-12 col-xs-12 col-lg-7" id="com_image">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center title-bg">
              <span>{{ trans('top.top_banner')}}</span>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
              <img src="./images/header_img.png" width="80%">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-12 col-lg-5 bg-text" style="text-align:right;">
            <span>{{ trans('top.top_banner_sm_1')}}</span><br>
            <span>{{ trans('top.top_banner_sm_2')}}</span>
          </div>
        </div>
      </div>

      <div class="row" id="sec-1-bg" style="background-image: url(./images/sec1_bg.png); background-repeat: no-repeat; padding:20px;">
        <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
          <span class="back-opacity-div">REAL TIME TRADE RATE</span>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12 col-lg-8">
          <div class="table-name" style="height:255px; overflow: hidden;">
            <center>
              <script type="text/javascript" src="https://ja.exchange-rates.org/GetCustomContent.aspx?sid=RT000QH6S&amp;type=RatesTable&amp;stk=0MH2B7P19S" charset="utf-8">
              </script>
              <div>提供: <a href="https://ja.exchange-rates.org/" rel="nofollow">ja.exchange-rates.org</a></div>
            </center>
            <div>
            </div>
          </div>
        </div>
      </div>
      <div id="osirase" class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2" id="gefx-information">
          <div id="gefx-information-title">
            <span>{{ trans('top.top_news')}}</span>
          </div>
          <table class="newslink" data-url="./rss" id="gefx-information-table">
            <thead>
              <tr>
                <th>DATE</th>
                <th>TITLE</th>
              </tr>
            </thead>
            <tbody id="gefx-information-data">
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <img src="./images/sec2_title1.png" class="sec-title-image" id="sec2-title-image">
        </div>
      </div>
      <div class="row padding-xx">
        <div class="section-text" id="section2-text">
          <span>{{ trans('top.top_meta_intro_1')}}</span><br>
          <span>{{ trans('top.top_meta_intro_2')}}</spna>
        </div>
      </div>
      <div class="row padding-x">
        <div class="col-md-6 col-lg-6 col-xs-12">
          <img src="./images/sec2_img1.png" class="img-margin-0" id="sec2-image1">
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12">
          <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-6  text-center-sp mt-5">
              <img class="img-margin-0" src="./images/sec2_img2.png" id="sec2-image2">
            </div>
            <div class="col-md-5 col-sm-5 col-xs-6 text-center-sp mt-5">
              <img class="img-margin-0" src="./images/sec2_img3.png" id="sec2-image3">
            </div>
          </div>
          <div class="row">
            <div class="text-center-sp mt-5">
              <a href="https://download.mql5.com/cdn/web/18024/mt4/goodenoughtreasure4setup.exe" class="common-button special-width">{{ trans('top.top_meta_btn')}}</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <img src="./images/sec3_title1.png" class="sec-title-image" id="sec3-title-image">
        </div>
      </div>

      <div class="row" style="margin: 10px 0;">
        <div class="section-text" id="section3-text">
          <span>{{ trans('top.top_crypto_intro_1')}}</span><br>
          <span>{{ trans('top.top_crypto_intro_2')}}</span><br>
          <span>{{ trans('top.top_crypto_intro_3')}}</span>
        </div>
      </div>

      <div class="row">
        <img src="./images/sec3_bg.png" id="sec3-bg-image">
      </div>

      <div id="annai" class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <img src="./images/sec4_title1.png" class="sec-title-image" id="sec4-title-image">
        </div>
      </div>
      <div class="row">
        <img class="hidden-xs" src="./images/sec4_img.png" class="img-width-full" id="sec4-img">
        <img class="visible-xs-block" src="./images/sp_img.png" class="img-width-full" id="sec4-img">
      </div>
      <div class="row">
        @foreach($global->header_table_body as $row)
        @if($row[0] == "新規口座開設")
        <div class="col-md-12  col-sm-12 col-lg-12 col-xs-12  text-center-sp">
          <a href="{{$row[1]}}" class="common-button">新規口座開設</a>
        </div>
        @endif
        @endforeach
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <img src="./images/sec5_title1.png" class="sec-title-image" id="sec5-title-image">
        </div>
      </div>
      <div class="row hidden-xs" id="sec5-bg-image">
        <div class="sec5-text">
          <span class="sec5-heading">{{ trans('top.top_best_title_1')}}</span><br><br>
          <span>{{ trans('top.top_best_content_1')}}</span><br>
        </div>
        <div class="sec5-text">
          <span class="sec5-heading">{{ trans('top.top_best_title_2')}}</span><br><br>
          <span>{{ trans('top.top_best_content_2')}}</span><br>
        </div>

      </div>
      <div class="row visible-xs-block" id="sec5-bg-image-sm">
        <div class="sec5-text">
          <span class="sec5-heading">{{ trans('top.top_best_title_1')}}</span><br><br>
          <span>{{ trans('top.top_best_content_1')}}</span><br>
        </div>
        <div class="sec5-text">
          <span class="sec5-heading">{{ trans('top.top_best_title_2')}}</span><br><br>
          <span>{{ trans('top.top_best_content_2')}}</span><br>
        </div>
      </div>

      @include('layouts.footer')

    </div>
  </div>
</body>

</html>
<script>
  $(function() {

    let rss_url = $(".newslink").data("url");

    $.get(rss_url + "/getTitle3.php", function(data) {
      data = JSON.parse(data);
      console.log(data);
      for (let i = 0; i < 4; i++) {
        $date = $("<td>").html(data[i]["date"]);
        $title = $("<a>").html(data[i]["title"]).attr("href", "https" + data[i]["link"]);;
        $title.css('color', 'blue');
        $rssinfo = $('<tr>').append($date).append($title);
        $('#gefx-information-table').append($rssinfo);
      }
    });

  });
</script>