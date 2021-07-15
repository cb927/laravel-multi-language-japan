<!DOCTYPE html>
<html lang="ja">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    function addPlatform() {
      let loginname = "mt4-" + $(".AccountNumber").val();
      $(".loginname").val(loginname);
    };
  </script>


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
    @media  screen and (max-width: 768px) {
      .xs-height {
        height: 500px !important;
        padding: 10% !important
      }

      .xs-height img {
        width: 30% !important
      }
    }
  </style>

</head>

<body>

  <div class="main-wrap">

    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">

      <form method="post" action="<?php echo e(route('mt4login-confirm')); ?>" onsubmit="return addPlatform();">
        <?php echo csrf_field(); ?>
        <div class="container main-area" style="margin-top: 50px; margin-bottom: 80px; height: 600px; z-index: 2">
          <div class="row text-center" style="color: white">
            　<div class="col-md-6 col-md-offset-3 xs-height col-sm-6 col-sm-offset-3 col-xs-12" style="height: 620px; background: linear-gradient(to right, #10141B, #363F46); box-shadow: 8px 8px 5px gray; z-index: 1">
              　<div class="center-block" style="margin-top: 7%">
                <image src="<?php echo e(asset('./images/logo1.png')); ?>" style="height: 12%; width: 12%">
              </div>
              <div class="col-md-12 center-block input-area" style="margin-top: 5%">
                <div class="float-left text-center col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
                  <sapn><?php echo e(trans('login.login_user')); ?></span>
                </div>
                <div class="col-md-6 float-left">
                  <input name="accountnum" class="AccountNumber" style="width: 100%; color: black"></input><br><br>
                </div>
                <div class="float-left text-center col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
                  <sapn><?php echo e(trans('login.login_password')); ?></span>
                </div>
                <div class="col-md-6 float-left">
                  <input type="password" name="password" style="width: 100%; color: black"></input><br><br>
                </div>
              </div>
              <div class="mx-auto text-center" style="margin-top: 28%">
                <input type="submit" value="<?php echo e(trans('login.login_button')); ?>" style="width: 50%;
              padding-top: 3%;
              padding-bottom: 3%;
              color: white;
              background-color: #009524;
              border: none;
              border-radius: 30px;
              display: flex;
              margin: auto;
              justify-content: center;">
              </div>
              <div class="col-md-6 col-md-offset-3 forget-password" style="margin-top: 10%; padding-bottom: 2%; border-bottom: 2px solid white">
                <a style="color:white" href="<?php echo e(url('/password-reset')); ?>"><?php echo e(trans('login.login_forget')); ?></a>
              </div>
            </div>
          </div>
        </div>
        <div style="position: absolute; top:25%; left:63%; z-index: 0">
          <image src="<?php echo e(asset('./images/logo2.png')); ?>" style="height: 80%; width: 80%;">
        </div>
        <input type="hidden" name="name" class="loginname">
      </form>

    </div>

    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</body>

</html><?php /**PATH E:\Gitub project\good\resources\views/login/mt4.blade.php ENDPATH**/ ?>