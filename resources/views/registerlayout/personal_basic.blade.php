<div class="row mb-10">
    <div class="col-md-2 mb-10">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_name')}}
        </div>
    </div>
    <div class="col-md-10">
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="primary_holder[last_name]" placeholder="{{ trans('register_individual.reg_ind_lastname')}}" />
        </div>
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="primary_holder[first_name]" placeholder="{{ trans('register_individual.reg_ind_firstname')}}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_cetificate')}} <br>
            {{ trans('register_individual.reg_ind_passport')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <input class="form-control form-md" type="text" name="primary_holder[from]" />
    </div>
</div>

<div class="row mb-10">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_effect_time')}}
        </div>
    </div>
    <div class="col-md-10">
        <div class="col-sm-2 col-xs-4 form-sm">
            <select class="form-control" name="primary_holder[period_day]">
                <option value="">{{ trans('register_individual.reg_ind_day')}}</option>
                <?php
                for ($i = 1; $i <= 31; $i++) {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-sm-2 col-xs-4 form-sm">
            <select class="form-control" name="primary_holder[period_month]">
                <option value="">{{ trans('register_individual.reg_ind_month')}}</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-sm-2 col-xs-4 form-sm">
            <select class="form-control" name="primary_holder[period_year]">
                <option value="">{{ trans('register_individual.reg_ind_year')}}</option>
                <?php
                for ($i = 2021; $i >= 1950; $i--) {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</div>

<div class="row mb-10">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_birthday')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <div class="col-sm-2 col-xs-4 form-sm">
            <select class="form-control form-sm" name="primary_holder[birth_day]">
                <option value="">{{ trans('register_individual.reg_ind_day')}}</option>
                <?php
                for ($i = 1; $i <= 31; $i++) {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-sm-2 col-xs-4 form-sm">
            <select class="form-control form-sm" name="primary_holder[birth_month]">
                <option value="">{{ trans('register_individual.reg_ind_month')}}</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-sm-2 col-xs-4 form-sm">
            <select class="form-control form-sm" name="primary_holder[birth_year]">
                <option value="">{{ trans('register_individual.reg_ind_year')}}</option>
                <?php
                for ($i = 2021; $i >= 1950; $i--) {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_country')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <select class="form-control form-md" name="basic_information[leverage]">
            <option value="">{{ trans('register_individual.reg_ind_select')}}</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_resident')}}
        </div>
    </div>
    <div class="col-md-10">
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="primary_holder[last_name]" placeholder="{{ trans('register_individual.reg_ind_Prefectures')}}" />
        </div>
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="primary_holder[first_name]" placeholder="{{ trans('register_individual.reg_ind_city')}}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="primary_holder[last_name]" placeholder="{{ trans('register_individual.reg_ind_address')}}" />
        </div>
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="primary_holder[first_name]" placeholder="{{ trans('register_individual.reg_ind_post')}}" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_phonenumber')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <input class="form-control form-md" type="text" name="primary_holder[phone]" />
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_individual.reg_ind_email')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <input class="form-control form-md" type="text" name="primary_holder[email]" />
    </div>
</div>