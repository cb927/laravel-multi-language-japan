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
  <link rel="stylesheet" href="<?php echo e(asset('css/basic.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/header_and_footer.css')); ?>">

  <!-- 会員ページ全体 -->
  <link rel="stylesheet" href="<?php echo e(asset('css/left_profile.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/over_menu.css')); ?>">

  <!-- 本ページ -->
  <link rel="stylesheet" href="<?php echo e(asset('css/summary.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/summary_main.css')); ?>">

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

    @media  screen and (max-width: 525px) {
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
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="mypage-wrapper">
      <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
          <div class="gradient-div gradient-div-main">
            <?php echo e(trans('mypage.mypage_member')); ?>

          </div>
        </div>

        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  my-page-main-content">
          <div class="aff-partner">
            <div>
              <a href="<?php echo e(route('aff_partner')); ?>" class="btn"><?php echo e(trans('mypage.mypage_affiliate')); ?></a>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="<?php echo e(url('/my-page')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_sumary')); ?></a>
            <a href="<?php echo e(url('/my-history')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_history')); ?></a>
            <a href="<?php echo e(url('/my-deposit')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_money')); ?></a>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="<?php echo e(url('/my-transfer')); ?>" class="mypage-menu mypage-menu-active"><?php echo e(trans('mypage.mypage_move')); ?></a>
            <a href="<?php echo e(url('/my-additional')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_add')); ?></a>
            <a href="<?php echo e(url('/my-setting')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_setting')); ?></a>
          </div>
        </div>
      </div>
      <div style="height: 1px; background: gray;  margin: 20px 0px;"></div>
      <div class="row">
        <?php echo $__env->make('my_page.my-page-side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 my-page-main-content">
          <div class="mypage-detail-wrapper">
            <p class="title">
              <?php echo e(trans('mytransfer.transfer_move')); ?>

            </p>

            <div class="my-page-form-group">
              <div class="row" style="font-weight: bold;">
                <div class="col-xs-5 form-label"><?php echo e(trans('mytransfer.transfer_outnumber')); ?></div>
                <div class="col-xs-7" style="line-height: 40px;">8091709710</div>
              </div>

              <div class="row" style="font-weight: bold; margin-top:20px;">
                <div class="col-xs-5 form-label"><?php echo e(trans('mytransfer.transfer_movenumber')); ?></div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <input type="text" class="form-input">
                </div>
              </div>

              <div class="row" style="font-weight: bold; margin-top:20px;">
                <div class="col-xs-5 form-label"><?php echo e(trans('mytransfer.transfer_invoice')); ?></div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <input type="text" class="form-input" style="width: calc(100% - 40px);"><span style="margin-left: 10px;">USD</span>
                </div>
              </div>

              <div class="row" style="font-weight: bold; margin-top:20px;">
                <div class="col-xs-5 form-label">
                  <input type="checkbox" style="margin: 0px 10px" />
                </div>
                <div class="col-xs-7" style="line-height: 40px;">
                  <?php echo e(trans('mytransfer.transfer_agree')); ?>

                  <div class="temp-div"></div>
                </div>
              </div>

              <div class="row" style="font-weight: bold; margin-top:20px;">
                <div class="col-xs-6 form-label"><?php echo e(trans('mytransfer.transfer_password')); ?></div>
                <div class="col-xs-6" style="line-height: 40px;">
                  <input type="text" class="form-input">
                </div>
              </div>

              <div class="row" style="font-weight: bold; margin-top:20px;">
                <div class="col-md-5 red-div">
                  <a href="#" class="my-page-button my-page-button-red"><?php echo e(trans('mytransfer.transfer_outinvoice')); ?></a>
                </div>
              </div>

            </div>


            <p class="comment">
              <?php echo e(trans('input_output.input_3')); ?><br>
              <?php echo e(trans('input_output.input_4')); ?><br>
              <?php echo e(trans('input_output.input_5')); ?> <br>
              &nbsp;&nbsp;<?php echo e(trans('input_output.input_6')); ?> <br>
              <?php echo e(trans('input_output.input_7')); ?><br>
              <?php echo e(trans('input_output.input_8')); ?>

            </p>

          </div>
        </div>
      </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</body>

</html><?php /**PATH E:\Gitub project\good\resources\views/my_page/transfer.blade.php ENDPATH**/ ?>