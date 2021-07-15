<?php echo e(trans('register_individual.reg_ind_upload')); ?>


<div class="row pad_vertical">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            <?php echo e(trans('register_individual.reg_ind_doc')); ?>

        </div>
    </div>
    <div class="col-md-10">
        <input class="form-control form-md" type="text" name="backend[document_type]" />
    </div>
</div>

<div class="row pad_vertical">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            <?php echo e(trans('register_individual.reg_ind_issue_country')); ?>

        </div>
    </div>
    <div class="col-md-10">
        <select class="form-control form-md" type="text" name="backend[document_country]">
            <option value=""><?php echo e(trans('register_individual.reg_ind_select')); ?></option>
        </select>
    </div>
</div>

<div class="row pad_vertical">
    <div class="col-md-2">
        <div class="text_right_box3">
            <?php echo e(trans('register_individual.reg_ind_doc_select')); ?>

        </div>
    </div>
    <div class="col-md-10">
        <input type="file" />
    </div>
</div>

<div class="row pad_vertical">
    <div class="col-md-2">
        <div class="text_right_box3">
            <?php echo e(trans('register_individual.reg_ind_attatch_doc')); ?>

        </div>
    </div>
    <div class="col-md-10">
        <input type="file" />
    </div>
</div>

<div class="row pad_vertical">
    <div class="col-md-2">
        <div class="text_right_box3">

        </div>
    </div>
    <div class="col-md-10">
        <input type="checkbox" /><?php echo e(trans('register_individual.reg_ind_rule')); ?>

    </div>
</div>

<div class="row text-center-sp" style="margin: 50px;">
    <div class="col-md-3"></div>
    <input type="submit" class="btn btn-success btn-lg" value="<?php echo e(trans('register_individual.reg_ind_account_read')); ?>" />
</div><?php /**PATH E:\Gitub project\good\resources\views/registerlayout/finance_info.blade.php ENDPATH**/ ?>