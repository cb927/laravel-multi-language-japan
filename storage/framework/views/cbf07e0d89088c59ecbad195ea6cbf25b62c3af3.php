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
        .main-container {
            text-align: center;
            margin: 100px 0;
        }

        .btn-success {
            background: green;
            width: 200px;
        }


        @media  screen and (max-width: 525px) {
            .col-md-12 {
                padding: 0;
            }
            .btn-success{
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="main-wrap">

        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container">
            <div class="main-container">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" style="width: 150px;">
                <div style="margin:30px 0">
                    <?php echo e(trans('success.mam_content_1')); ?><br>
                    <?php echo e(trans('success.mam_content_2')); ?>

                </div>
                <a href="/top" class="btn btn-success"><?php echo e(trans('success.top_btn')); ?></a>
            </div>
        </div>

        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <a href="javascript:void(0);" id="scroll-top" title="Scroll to Top" style="display: none; opacity: 0.5;">Top<span></span></a>

    </div>
</body>

</html><?php /**PATH E:\Gitub project\good\resources\views/my_page/success/mam.blade.php ENDPATH**/ ?>