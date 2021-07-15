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
      margin-left: 0;
      margin-top: 0;
    }

    .mypage-detail-wrapper {
      padding: 50px;
    }

    .border-gray {
      margin-top: 20px;
      padding: 20px;
      border-radius: 5px;
      border: 1px solid gray;
    }

    .form-label {
      text-align: right;
      line-height: 40px;
      padding-right: 10px !important;
    }

    .form-md {
      max-width: 200px;
      width: 100%;
      height: 40px;
      border: 1px solid gray;
    }

    .form-lg {
      max-width: 400px;
      width: 100%;
      height: 40px;
      border: 1px solid gray;
    }

    .mb-3 {
      margin-bottom: 15px;
    }

    @media  screen and (max-width: 525px) {
      input {
        height: 30px !important;
      }

      .form-label {
        line-height: 30px;
        font-size: 10px;
      }

      .form-md {
        width: 120px !important;
      }

      .mypage-detail-wrapper {
        padding: 0;
      }

      .border-gray {
        padding: 10px;
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
              <a href="<?php echo e(url('/my-deposit')); ?>" class="mypage-menu deposit-menu"><?php echo e(trans('input_output.input_bank')); ?></a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="<?php echo e(url('/my-deposit/cryptocurrency')); ?>" class="mypage-menu deposit-menu"><?php echo e(trans('input_output.input_crypto')); ?></a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="<?php echo e(url('/my-deposit/withdrawal')); ?>" class="mypage-menu deposit-menu mypage-menu-active"><?php echo e(trans('input_output.input_output')); ?></a>
            </div>
          </div>

          <div class="divider1"></div>

          <div class="deposit-menu-wrapper">
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 d-flex-around margin-top-zero submenu-div">
              <a href="<?php echo e(url('/my-deposit/withdrawal')); ?>" class="mypage-menu deposit-menu  mypage-menu-active submenu"><?php echo e(trans('input_output.input_bank')); ?></a>
              <a href="<?php echo e(url('/my-deposit/withdrawal/credit')); ?>" class="mypage-menu deposit-menu submenu"><?php echo e(trans('input_money.bank_credit')); ?></a>
            </div>
          </div>

          <div class="divider2"></div>

          <div class="mypage-detail-wrapper">

            <form method="POST" action="<?php echo e(route('withdrawal-application2')); ?>" enctype="multipart/form-data" class="register_form" onSubmit="return IdAuth();" data-addbankaction="<?php echo e(route('add-bank')); ?>" data-withdrawaction="<?php echo e(route('withdrawal-application2')); ?>">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="howdo" value="bank">
              <p class="title">
                <?php echo e(trans('input_money.bank_out')); ?>

              </p>
              <div class="my-page-form-group" style="margin: auto;">
                <div class="row">
                  <div class="col-xs-5 form-label" style="font-weight: bold;"><?php echo e(trans('input_money.bank_number')); ?></div>
                  <div class="col-xs-7" style="height: 40px; line-height:40px; font-weight:bold;"><?php echo e($account_number); ?></div>
                </div>
                <div class="row">
                  <div class="col-xs-5 form-label" style="font-weight: bold;"><?php echo e(trans('input_money.bank_invoice')); ?></div>
                  <div class="col-xs-7" style="height: 40px; line-height:40px;">
                    <input type="text" class="my-page-input1 withdrawinput" name="input_bank_withdraw" required>
                  </div>
                </div>
              </div>
              <p class="title">
                <?php echo e(trans('input_money.bank_info')); ?>

              </p>
              <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="d-flex-center">
                <input class="withdrawinput" type="radio" name="bankid" value="<?php echo e($bank->id); ?>" required> <span><?php echo e($bank->bank_name); ?>　<?php echo e($bank->bank_branch); ?>　<?php echo e($bank->bank_kind); ?>　<?php echo e($bank->bank_account_number); ?> <?php echo e($bank->bank_account_name); ?></span>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <a href="#" class="my-page-button my-page-button-green fixed-width" style="margin-top: 50px"><?php echo e(trans('input_money.bank_add')); ?></a>
              <div class="border-gray">

                <div class="row mb-3">
                  <div class="col-md-3 col-xs-5 form-label">
                    <span class="form-label"><?php echo e(trans('input_money.bank_account_name')); ?></span>
                  </div>
                  <div class="col-md-9 col-xs-7">
                    <input type="text" class="form-md" name="bank_account_name" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3 col-xs-5 form-label">
                    <span class="form-label"><?php echo e(trans('input_money.bank_account_address')); ?></span>
                  </div>
                  <div class="col-md-9 col-xs-7">
                    <input type="text" class="form-lg" name="bank_account_address" required>
                  </div>
                </div>


                <div class="row mb-3">
                  <div class="col-md-3 col-xs-5 form-label">
                    <span class="form-label"><?php echo e(trans('input_money.bank_number')); ?></span>
                  </div>
                  <div class="col-md-9 col-xs-7">
                    <input type="text" class="form-md" name="bank_account_number" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3 col-xs-5 form-label">
                    <span class="form-label"><?php echo e(trans('input_money.bank_name')); ?></span>
                  </div>
                  <div class="col-md-9 col-xs-7">
                    <input type="text" class="form-md" name="bank_name" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-3 col-xs-5 form-label">
                    <span class="form-label"><?php echo e(trans('input_money.bank_shop')); ?></span>
                  </div>
                  <div class="col-md-9 col-xs-7">
                    <input type="text" class="form-md" name="bank_branch" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 col-xs-5 form-label">
                    <span class="form-label"><?php echo e(trans('input_money.bank_type')); ?></span>
                  </div>
                  <div class="col-md-9 col-xs-7">
                    <input type="text" class="form-md" name="bank_kind" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 col-sm-8"></div>
                  <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                    <div class="my-page-button my-page-button-green fixed-width" onclick="addAccount();"><?php echo e(trans('input_money.bank_account_add')); ?></div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top: 50px">
                <div class="col-xs-6 form-label">
                  <span><?php echo e(trans('input_money.bank_password')); ?></span>
                </div>
                <div class="col-xs-6">
                  <input type="text" class="form-md my-page-input mt4-password" style="margin-right: auto; margin-left:0;">
                </div>
              </div>
              <div style="margin-top: 10px;">
                <div class="my-page-button my-page-button-red" onclick="withdraw()"><?php echo e(trans('myadditional.add_outinvoice')); ?></div>
              </div>

              <input type="submit" class="submitbtn" style="display:none;" onclick="validationJudge()">

              <div class="row">
                <p style="font-weight: bold; line-height: 30px; margin-top:50px">
                  <?php echo e(trans('input_money.bank_1')); ?><br>
                  <?php echo e(trans('input_money.bank_2')); ?><br>
                  <?php echo e(trans('input_money.bank_3')); ?><br>
                  <?php echo e(trans('input_money.bank_4')); ?><br>
                  <?php echo e(trans('input_money.bank_5')); ?><br>
                  <?php echo e(trans('input_money.bank_6')); ?>

                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>

  <script type="text/javascript">
    function IdAuth() {
      let input_id = $(".mt4-password").val();

      let isSamePassword = $.ajax({
        type: 'GET',
        url: '<?php echo e(route("judge")); ?>?password=' + input_id,
        async: false
      }).responseText;

      if (isSamePassword == "false") {
        $(".error-message").html("入力されたIDが違います。");
        return false;
      }

      return true;
    }

    function validationJudge() {

      $('form').attr('action');
      $('form').data("addbankaction");
      $('form').data("withdrawaction");

      //銀行追加
      if ($('form').attr('action') == $('form').data("addbankaction")) {
        $('.withdrawinput').removeAttr('required');
      }

      //出金申請
      if ($('form').attr('action') == $('form').data("withdrawaction")) {
        $('.addbankinput').removeAttr('required');
      }

    }

    function addAccount() {
      let addbankaction = $('form').data("addbankaction");
      $('form').attr('action', addbankaction);
      $('.submitbtn').click();
    }

    function withdraw() {
      let addbankaction = $('form').data("withdrawaction");
      $('form').attr('action', addbankaction);
      $('.submitbtn').click();
    }
  </script>


</body>

</html><?php /**PATH E:\Gitub project\good\resources\views/my_page/deposit_withdrawal.blade.php ENDPATH**/ ?>