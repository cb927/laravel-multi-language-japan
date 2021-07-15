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
		.pb-10 {
			padding-bottom: 10px !important;
		}

		.pt-10 {
			padding-top: 10px !important;
		}

		.py-10 {
			padding: 10px 0 !important;
		}

		.mt-10 {
			margin-top: 10px !important;
		}

		.mb-10 {
			margin-bottom: 10px !important;
		}

		.my-10 {
			margin: 10px 0 !important;
		}

		.text_right_box3 {
			margin-right: 15px;
		}

		.form-md {
			width: 200px;
			margin-left: 0px;
		}

		.form-md-l {
			margin-right: 10px;
		}

		.form-md-l input {
			margin-left: 0px;
		}

		.form-sm {
			margin-right: 10px;
		}

		.form-label {
			padding-right: 15px !important;
			text-align: right;
		}

		.btn-success {
			background: green;
		}

		@media  screen and (max-width: 525px) {
			.form-md {
				width: 100%;
			}

			.form-sm {
				margin-right: 0px;
				padding: 5px !important;
			}

			.form-md-l {
				margin-right: 0;
			}

			.form-label {
				text-align: left;
			}
		}
	</style>
</head>

<body>

	<div class="main-wrap">
		<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="container">
			<div class="row py-10">
				<div class="col-md-4">
					<div class="white_float_box">
						<?php echo e(trans('register_individual.reg_ind_new_account')); ?>

					</div>
				</div>
			</div>
			<div class="row py-10">
				<div class="col-md-4">

					<div class="col-md-6 overmenu menu">
						<a href="<?php echo e(route('individual')); ?>">
							<?php echo e(trans('register_individual.reg_ind_new_person')); ?>

						</a>
					</div>

					<div class="col-md-6 overmenu menu active">
						<a href="<?php echo e(route('corporate')); ?>">
							<?php echo e(trans('register_individual.reg_ind_law_person')); ?>

						</a>
					</div>

				</div>
			</div>

			<form method="POST" action="<?php echo e(route('individual-confirm')); ?>" enctype="multipart/form-data" class="register_form">
				<?php echo csrf_field(); ?>
				<div class="row">
					<div class="col-md-2">
						<div class="text_right_box3">
							<?php echo e(trans('register_individual.reg_ind_account_setting')); ?>

						</div>
					</div>
					<div class="col-md-10">
						<?php echo $__env->make('registerlayout.platform_currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>

				</div>

				<div class="row">

					<div class="col-md-2">
						<div class="text_right_box3">
							(<?php echo e(trans('register_corporate.reg_co_setting')); ?>)
						</div>
					</div>

					<div class="col-md-10">
						<?php echo $__env->make('registerlayout.corporate_basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>

				</div>

				<div class="row">

					<div class="col-md-2">
						<div class="text_right_box3">
							(<?php echo e(trans('register_corporate.reg_co_info')); ?>)
						</div>
					</div>

					<div class="col-md-10">
						<?php echo $__env->make('registerlayout.personal_basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>

				</div>

				<div class="row py-10">
					<div class="col-md-2 ">
						<div class="text_right_box3">
							<?php echo e(trans('register_individual.reg_ind_other')); ?>

						</div>
					</div>
					<div class="col-md-10 ">
						<div class="row">
							<div class="col-md-2 ">
								<div class="text_right_box3">
									<?php echo e(trans('register_individual.reg_ind_broker')); ?> <br>
									<?php echo e(trans('register_individual.reg_ind_roma')); ?>

								</div>
							</div>
							<div class="col-md-10">
								<input class="form-control form-md" type="text" name="basic_information[currency]" />
							</div>
						</div>
					</div>
				</div>

				<div class="row">

					<div class="col-md-2">
						<div class="text_right_box3">

						</div>
					</div>

					<div class="col-md-10">
						<?php echo $__env->make('registerlayout.us_citizen', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>

				</div>

				<div class="row">

					<div class="col-md-2">
						<div class="text_right_box3">

						</div>
					</div>

					<div class="col-md-10">
						<?php echo $__env->make('registerlayout.finance_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</div>
				</div>
				<input type="hidden" name="extra_information[ib_name]" value="">
			</form>
		</div>

		<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>

</body>

</html><?php /**PATH E:\Gitub project\good\resources\views/corporate/register.blade.php ENDPATH**/ ?>