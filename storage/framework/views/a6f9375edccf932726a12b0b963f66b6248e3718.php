<div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 my-page-side-bar">
    <?php $__currentLoopData = $personal->left_profile_table_body; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="d-flex-right">
        <span><?php echo e($row[0]); ?></span>
        <div class="gradient-div gradient-div-submain"><?php echo e($row[1]); ?></div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH E:\Gitub project\good\resources\views/my_page/my-page-side-bar.blade.php ENDPATH**/ ?>