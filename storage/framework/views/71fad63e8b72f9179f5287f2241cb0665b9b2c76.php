<div class="row mb-10">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            <?php echo e(trans('register_individual.reg_ind_account_currency')); ?>

        </div>
    </div>
    <div class="col-md-10">
        <input class="form-control form-md" type="text" name="basic_information[currency]" />
    </div>
</div>

<div class="row mb-10">
    <div class="col-md-2 ">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            <?php echo e(trans('register_individual.reg_ind_platform')); ?>

        </div>
    </div>
    <div class="col-md-10">
        <select class="form-control form-md" name="basic_information[platform]" required>
            <option value="" selected disabled><?php echo e(trans('register_individual.reg_ind_select')); ?></option>
            <option value="メタトレーダー4"><?php echo e(trans('register_individual.reg_ind_meta-4')); ?> 4</option>
            <option value="アフィリエイト"><?php echo e(trans('register_individual.reg_ind_agency')); ?></option>
            <option value="MAM口座"><?php echo e(trans('register_individual.reg_ind_mam')); ?></option>
        </select>
    </div>
</div>

<div class="row mb-10">
    <div class="col-md-2 ">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            <?php echo e(trans('register_individual.reg_ind_leverage')); ?>

        </div>
    </div>
    <div class="col-md-10">
        <select class="form-control form-md" name="basic_information[leverage]">
            <option value=""><?php echo e(trans('register_individual.reg_ind_select')); ?></option>
        </select>
    </div>
</div><?php /**PATH E:\Gitub project\good\resources\views/registerlayout/platform_currency.blade.php ENDPATH**/ ?>