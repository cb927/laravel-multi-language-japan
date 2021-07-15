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
    .mypage-detail-wrapper {
      padding: 50px;
      margin-top: 0 !important;
    }

    .subtitle {
      margin-bottom: 20px !important;
    }

    .subcontent {
      margin-bottom: 20px !important;
    }

    .subcontent-red {
      font-size: 15px !important;
      margin: 10px 0 !important;
      text-align: center !important;
    }

    .red-border {
      padding: 10px;
      border: 1px solid red;
    }

    @media  screen and (max-width: 525px) {
      .mypage-detail-wrapper {
        padding: 0;
      }

      .my-page-danger-button {
        font-size: 18px;
        height: unset !important;
      }

      .my-page-side-bar {
        padding-bottom: 49px;
        border-bottom: 1px solid #828282 !important;
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
            <a href="<?php echo e(url('/my-deposit')); ?>" class="mypage-menu mypage-menu-active"><?php echo e(trans('mypage.mypage_money')); ?></a>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 d-flex-around">
            <a href="<?php echo e(url('/my-transfer')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_move')); ?></a>
            <a href="<?php echo e(url('/my-additional')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_add')); ?></a>
            <a href="<?php echo e(url('/my-setting')); ?>" class="mypage-menu"><?php echo e(trans('mypage.mypage_setting')); ?></a>
          </div>
        </div>
      </div>
      <div style="height: 1px; background: gray; margin: 20px 0px"></div>

      <div class="row">
        <?php echo $__env->make('my_page.my-page-side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12  my-page-main-content">

          <div class="deposit-menu-wrapper ">
            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="<?php echo e(url('/my-deposit')); ?>" class="mypage-menu deposit-menu mypage-menu-active"><?php echo e(trans('input_output.input_bank')); ?></a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="<?php echo e(url('/my-deposit/cryptocurrency')); ?>" class="mypage-menu deposit-menu"><?php echo e(trans('input_output.input_crypto')); ?></a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="<?php echo e(url('/my-deposit/withdrawal')); ?>" class="mypage-menu deposit-menu"><?php echo e(trans('input_output.input_output')); ?></a>
            </div>
          </div>

          <div class="divider1"></div>

          <div class="mypage-detail-wrapper">
            <p class="title">
              <?php echo e(trans('input_output.input_move')); ?>

            </p>

            <p class="subtitle"><?php echo e(trans('input_output.input_account')); ?></p>
            <p class="subcontent"><?php echo e(trans('input_output.input_time')); ?><p>
            <p class="subcontent"><?php echo e(trans('input_output.input_UFJ')); ?></p>

            <div class="red-border">
              <a href="#" class="btn my-page-danger-button btn-block"><?php echo e(trans('input_output.input_cafe')); ?></a>

              <p class="subcontent-red">
                <?php echo e(trans('input_output.input_1')); ?>

              </p>
              <p class="subcontent-red" style="margin-bottom: 0 !important;">
                <?php echo e(trans('input_output.input_2')); ?>

              </p>
            </div>
            <p style="font-weight: bold; line-height: 30px; margin-top:50px">
              <?php echo e(trans('input_output.input_3')); ?><br>
              <?php echo e(trans('input_output.input_4')); ?><br>
              <?php echo e(trans('input_output.input_5')); ?><br>
              &nbsp;&nbsp;<?php echo e(trans('input_output.input_6')); ?><br>
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

</html><?php /**PATH E:\Gitub project\good\resources\views/my_page/deposit.blade.php ENDPATH**/ ?>