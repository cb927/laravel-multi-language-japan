<style>
	.btn-language {
		background-color: #B49F63;
		border-color: #B49F63;
		color: white;
		padding: 0 10px;
	}

	.dropdown-menu {
		min-width: fit-content;
		right: 0;
		background: #343F47;
		border-color: #B49F63;
	}

	.dropdown-menu li a {
		padding-left: 5px;
		padding-right: unset;
		color: white;
	}

	.flag {
		height: 20px;
	}

	.language-letter {
		font-size: 12px;
	}
</style>
<div class="container-fluid black_back pc-nav">
	<div class="row">

		<div class="col-md-1 textcenter2 pad_vertical">
			<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/basic/logo.png')); ?>" class="logo"></a>
		</div>
		<div class="col-md-10 textcenter header_menu">
			<div class="col-md-6 textcenter">
				<div class="col-md-2 menu active pad_vertical2">
					<a href="/top">
						<?php echo e(trans('header.menu_top')); ?>

					</a>
				</div>
				<div class="col-md-3 menu active pad_vertical2">
					<a href="/individual">
						<?php echo e(trans('header.menu_new_account')); ?>

					</a>
				</div>
				<div class="col-md-3 menu active pad_vertical2">
					<a href="/demo">
						<?php echo e(trans('header.menu_demo')); ?>

					</a>
				</div>
				<div class="col-md-4 menu active pad_vertical2">
					<a href="/top#annai">
						<?php echo e(trans('header.menu_info')); ?>

					</a>
				</div>
			</div>
			<div class="col-md-6 textcenter">
				<div class="col-md-3 menu active pad_vertical2">
					<a href="/top#osirase">
						<?php echo e(trans('header.menu_notice')); ?>

					</a>
				</div>
				<div class="col-md-3 menu active pad_vertical2">
					<a href="/faq">
						<?php echo e(trans('header.menu_faq')); ?>

					</a>
				</div>
				<div class="col-md-3 menu active pad_vertical2 textcenter">
					<a href="/mt4login" class="<?php if(auth()->guard()->check()): ?> logout-button <?php else: ?> login-button <?php endif; ?>">
						<span class="<?php if(auth()->guard()->check()): ?> logout-button-text <?php else: ?> login-button-text <?php endif; ?>">
							<?php echo e(trans('header.menu_login')); ?>

						</span>
					</a>
				</div>
				<div class="col-md-3 menu active pad_vertical2 textcenter">
					<a href="/mt4logout" class="<?php if(auth()->guard()->check()): ?> login-button <?php else: ?> logout-button <?php endif; ?>">
						<span class="<?php if(auth()->guard()->check()): ?> login-button-text <?php else: ?> logout-button-text <?php endif; ?>">
							<?php echo e(trans('header.menu_logout')); ?>

						</span>
					</a>
				</div>
			</div>
		</div>

		<div class="col-md-1 textcenter header_menu">
			<button class="btn btn-language dropdown-toggle" type="button" data-toggle="dropdown">
				<?php echo e(trans('header.menu_lang')); ?>

				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" style="min-width: fit-content; right:0;">
				<li>
					<a href="/local/jp">
						<span><img src="<?php echo e(asset('img/flag/jp.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_jp')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/en">
						<span><img src="<?php echo e(asset('img/flag/uk.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_en')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/es">
						<span><img src="<?php echo e(asset('img/flag/sp.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_es')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/cn">
						<span><img src="<?php echo e(asset('img/flag/cn.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_cn')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/sa">
						<span><img src="<?php echo e(asset('img/flag/sa.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_sa')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/ru">
						<span><img src="<?php echo e(asset('img/flag/ru.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_ru')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/fr">
						<span><img src="<?php echo e(asset('img/flag/fr.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_fr')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/it">
						<span><img src="<?php echo e(asset('img/flag/it.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_it')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/kr">
						<span><img src="<?php echo e(asset('img/flag/kr.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_kr')); ?></span>
					</a>
				</li>
				<li>
					<a href="/local/po">
						<span><img src="<?php echo e(asset('img/flag/po.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter"><?php echo e(trans('header.lang_po')); ?></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="sp-nav">
	<div class="wrapper">
		<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img/basic/logo.png')); ?>" class="logo"></a>
		<img src="<?php echo e(asset('img/clipart365828.png')); ?>" id="open-menu" class="menu">
		<img src="<?php echo e(asset('img/Close-256.png')); ?>" class="time" id="close-menu">
	</div>
</div>

<div class="sp-menu" id="spmenu">
	<div class="btn-wrapper">
		<a href="<?php echo e($global->header_table_body2[2][1]); ?>" class="login-btn">
			<?php echo e($global->header_table_body2[2][0]); ?>

		</a>
		<a href="<?php echo e($global->header_table_body2[3][1]); ?>" class="logout-btn">
			<?php echo e($global->header_table_body2[3][0]); ?>

		</a>
	</div>

	<div class="link-container">

		<?php $__currentLoopData = $global->header_table_body; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo $__env->make('layouts.header_eachmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<a href="<?php echo e($global->header_table_body[0][1]); ?>" class="logout-btn">
			<?php echo e($global->header_table_body2[0][0]); ?>

		</a>

		<a href="<?php echo e(url('/inquiry')); ?>" class="logout-btn">
			<?php echo e($global->header_table_body2[1][0]); ?>

		</a>
	</div>

	<button class="btn btn-language dropdown-toggle btn-block" type="button" data-toggle="dropdown">Language
		<span class="caret"></span>
	</button>
	<div class="dropdown-menu" style="min-width: fit-content;">
		<div class="row" style="padding: 10px;">
			<div class="col-xs-4">
				<div>
					<a href="/lang/jp">
						<span><img src="<?php echo e(asset('img/flag/jp.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">日本語</span>
					</a>
				</div>
				<div>
					<a href="/lang/en">
						<span><img src="<?php echo e(asset('img/flag/uk.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">英語</span>
					</a>
				</div>
				<div>
					<a href="/lang/es">
						<span><img src="<?php echo e(asset('img/flag/sp.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">スペイン語</span>
					</a>
				</div>
				<div>
					<a href="/lang/cn">
						<span><img src="<?php echo e(asset('img/flag/cn.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">中国語</span>
					</a>
				</div>
			</div>
			<div class="col-xs-4">
				<div>
					<a href="/lang/sa">
						<span><img src="<?php echo e(asset('img/flag/sa.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">アラビア語</span>
					</a>
				</div>
				<div>
					<a href="lang/ru">
						<span><img src="<?php echo e(asset('img/flag/ru.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">ロシア語</span>
					</a>
				</div>
				<div>
					<a href="lang/fr">
						<span><img src="<?php echo e(asset('img/flag/fr.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">フランス語</span>
					</a>
				</div>
				<div>
					<a href="lang/it">
						<span><img src="<?php echo e(asset('img/flag/it.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">イタリア語</span>
					</a>
				</div>
			</div>
			<div class="col-xs-4">
				<div>
					<a href="/lang/kr">
						<span><img src="<?php echo e(asset('img/flag/kr.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">韓国語</span>
					</a>
				</div>
				<div>
					<a href="/lang/po">
						<span><img src="<?php echo e(asset('img/flag/po.png')); ?>" alt="" class="flag"></span>
						<span class="language-letter">ポルトガル語</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$("#open-menu").on('click', function() {
		$(this).css('display', 'none')
		$("#close-menu").css('display', 'block');
		$("#spmenu").fadeIn();
	});

	$("#close-menu").on('click', function() {
		$(this).css('display', 'none')
		$("#open-menu").css('display', 'block');
		$("#spmenu").fadeOut();
	});
</script><?php /**PATH E:\Gitub project\good\resources\views/layouts/header.blade.php ENDPATH**/ ?>