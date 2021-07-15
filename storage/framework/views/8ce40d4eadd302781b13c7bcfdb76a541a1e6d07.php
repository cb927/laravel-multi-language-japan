<?php if($row[0] == trans('header.menu_login')): ?>

<div class="col-md-<?php echo e($row[2]); ?> menu active pad_vertical2 textcenter">
	<a href="<?php echo e($row[1]); ?>" class="<?php if(auth()->guard()->check()): ?> logout-button <?php else: ?> login-button <?php endif; ?>" href="<?php echo e($row[1]); ?>">
		<span class="<?php if(auth()->guard()->check()): ?> logout-button-text <?php else: ?> login-button-text <?php endif; ?>">
			<?php echo e($row[0]); ?>

		</span>
	</a>
</div>

<?php elseif($row[0] == trans('header.menu_logout')): ?>

<div class="col-md-<?php echo e($row[2]); ?> menu active pad_vertical2 textcenter">
	<a href="<?php echo e($row[1]); ?>" class="<?php if(auth()->guard()->check()): ?> login-button <?php else: ?> logout-button <?php endif; ?>" href="<?php echo e($row[1]); ?>">
		<span class="<?php if(auth()->guard()->check()): ?> login-button-text <?php else: ?> logout-button-text <?php endif; ?>">
			<?php echo e($row[0]); ?>

		</span>
	</a>
</div>

<?php else: ?>

<div class="col-md-<?php echo e($row[2]); ?> menu active pad_vertical2">
	<a href="<?php echo e($row[1]); ?>">
		<?php echo e($row[0]); ?>

	</a>
</div>

<?php endif; ?><?php /**PATH E:\Gitub project\good\resources\views/layouts/header_eachmenu.blade.php ENDPATH**/ ?>