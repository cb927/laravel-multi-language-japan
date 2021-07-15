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

  <script>
    function copyTextToClipboard(textVal) {
      // テキストエリアを用意する
      var copyFrom = document.createElement("textarea");
      // テキストエリアへ値をセット
      copyFrom.textContent = textVal;

      // bodyタグの要素を取得
      var bodyElm = document.getElementsByTagName("body")[0];
      // 子要素にテキストエリアを配置
      bodyElm.appendChild(copyFrom);

      // テキストエリアの値を選択
      copyFrom.select();
      // コピーコマンド発行
      var retVal = document.execCommand('copy');
      // 追加テキストエリアを削除
      bodyElm.removeChild(copyFrom);
      // 処理結果を返却
      return retVal;
    }

    $(function() {
      $(".clipboard_copy_btn")
        .click(function() {
          let btn = $(this);
          let content = btn.parent().find("input").val();
          console.log(content);

          copyTextToClipboard(content);

          alert("コピーしました。")

        });
    });
  </script>

  <title>
    GOOD ENOUGH FX
  </title>
  <style>
    @media  screen and (max-width: 525px) {
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
              <a href="<?php echo e(url('/my-deposit')); ?>" class="mypage-menu deposit-menu"><?php echo e(trans('input_output.input_bank')); ?></a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="<?php echo e(url('/my-deposit/cryptocurrency')); ?>" class="mypage-menu deposit-menu mypage-menu-active"><?php echo e(trans('input_output.input_crypto')); ?></a>
            </div>

            <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4 d-flex-around margin-top-zero">
              <a href="<?php echo e(url('/my-deposit/withdrawal')); ?>" class="mypage-menu deposit-menu"><?php echo e(trans('input_output.input_output')); ?></a>
            </div>
          </div>

          <div class="divider1"></div>

          <div class="mypage-detail-wrapper">
            <p class="title" style="margin-top: 90px;">
              <?php echo e(trans('crypto.crypto_title1')); ?>

            </p>

            <p class="title"><?php echo e(trans('crypto.crypto_title2')); ?></p>
            <p class="subcontent"><?php echo e(trans('crypto.crypto_title3')); ?><p>

            <div>
              <a href="#" class="my-page-button my-page-button-green half"><?php echo e(trans('crypto.crypto_custom')); ?></a>

              <?php $__currentLoopData = $depositCryptCurrencyInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thisCurrencyInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <img src="<?php echo e($thisCurrencyInfo->img); ?>" />
              <div style="display:flex; justity-content: center; margin:20px 0px">
                <input type="text" value="<?php echo e($thisCurrencyInfo->address); ?>" class="my-page-input per80">
                <div class="my-page-button my-page-button-green per20 clipboard_copy_btn"><?php echo e(trans('crypto.crypto_copy')); ?></div>
              </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>


            <p style="font-weight: bold; line-height: 30px; margin-top:50px">
              <?php echo e(trans('crypto.crypto_1')); ?><br>
              <?php echo e(trans('crypto.crypto_2')); ?><br>
              <?php echo e(trans('crypto.crypto_3')); ?><br>
              <?php echo e(trans('crypto.crypto_4')); ?><br>
              <?php echo e(trans('crypto.crypto_5')); ?><br>
              <?php echo e(trans('crypto.crypto_6')); ?>

            </p>

          </div>

        </div>
      </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</body>

</html><?php /**PATH E:\Gitub project\good\resources\views/my_page/deposit_cryptocurrency.blade.php ENDPATH**/ ?>