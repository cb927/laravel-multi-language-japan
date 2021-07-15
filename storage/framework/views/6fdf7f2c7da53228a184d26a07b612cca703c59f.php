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
  </head>
  <body>

  <div class="main-wrap">

	<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid main-area">

  <form method="POST" action="<?php echo e(route('inquiry-confirm')); ?>" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>

      <div class="row">
        <div class="col-md-3 col-md-offset-1 col-sm-10c ol-sm-offset-1 col-xs-10 col-xs-offset-1 text-center" style="font-size: 1.1vw; margin-top: 6%; padding: 1% 1%; box-shadow: 8px 8px 5px gray;">
          <span><?php echo e(trans('inquiry.title')); ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 col-md-offset-2 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4 main-logo" style="margin-top: 12%; margin-bottom: 6%;">
          <image src="./images/logo.png" style="height: 100%; width: 100%;">
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 form-area" style="margin-top: 3%;">
            <div class="row">
              <div class="col-md-3 text-center" style="font-size: 1.1vw; line-height: 38px;">
                <span><?php echo e(trans('inquiry.name')); ?></span>
              </div>
              <div class="col-md-8">
                <input name="contact_name" style="width:100%; height: 40px"></input>
              </div>
            </div>
            <div class="row" style="padding-top: 3%;">
              <div class="col-md-3 text-center" style="font-size: 1.1vw; line-height: 38px;">
                <span><?php echo e(trans('inquiry.romaji_name')); ?></span>
              </div>
              <div class="col-md-8">
                <input name="contact_name_romaji" style="width:100%; height: 40px"></input>
              </div>
            </div>
            <div class="row" style="padding-top: 3%;">
              <div class="col-md-3 text-center" style="font-size: 1.1vw; line-height: 38px;">
                <span><?php echo e(trans('inquiry.mail_address')); ?></span>
              </div>
              <div class="col-md-8">
                <input name="email" style="width:100%; height: 40px"></input>
              </div>
            </div>
            <div class="row" style="padding-top: 3%;">
              <div class="col-md-3 text-center" style="font-size: 1.1vw; line-height: 38px;">
                <span><?php echo e(trans('inquiry.question')); ?></span>
              </div>
              <div class="col-md-8">
                <input name="contact_genre" style="width:100%; height: 40px"></input>
              </div>
            </div>
            <div class="row" style="padding-top: 3%;">
              <div class="col-md-3 text-center align-middle" style="font-size: 1.1vw; line-height: 38px;">
                <span><?php echo e(trans('inquiry.content')); ?></span>
              </div>
              <div class="col-md-8">
                <input name="contact_detail" style="width:100%; height: 300px"></input>
              </div>
            </div>
            <div class="row" style="padding-top: 5%;  margin-bottom: 5%;">
                <div class="col-md-6 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 text-center">
                  <input type="submit" value="<?php echo e(trans('inquiry.button')); ?>" style="font-size: 16vx; width:100%; padding: 3% 0%; color: white; background-color: #009524; border: none;">
                </div>
            </div>
          </div>
        </div>
      </div>
	</div>
	<?php echo $__env->make('inquiry.testcode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>

	<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </div>

  </body>
</html>
<?php /**PATH E:\Gitub project\good\resources\views/inquiry/register.blade.php ENDPATH**/ ?>