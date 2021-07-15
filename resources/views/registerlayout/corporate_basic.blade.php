<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_corporate.reg_co_name')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <input class="form-control form-md" type="text" name="company[name]" />
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_corporate.reg_co_type')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <input class="form-control form-md" type="text" name="company[type_business]" />
    </div>
</div>

<div class="row mb-10">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_corporate.reg_co_builddate')}}
        </div>
    </div>
    <div class="col-md-10">
        <div class="col-sm-2 col-xs-4 form-sm">
            <select class="form-control form-sm" name="company[incorporation][day]">
                <option value="">{{ trans('register_corporate.reg_co_day')}}</option>
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
            <select class="form-control form-sm" name="company[incorporation][month]">
                <option value="">{{ trans('register_corporate.reg_co_month')}}</option>
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
            <select class="form-control form-sm" name="company[incorporation][year]">
                <option value="">{{ trans('register_corporate.reg_co_year')}}</option>
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
            {{ trans('register_corporate.reg_co_country1')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <select class="form-control form-md" name="company[incorporation][country]">
            <option value="">{{ trans('register_individual.reg_ind_select')}}</option>
        </select>
    </div>
</div>


<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_corporate.reg_co_street')}}
        </div>
    </div>
    <div class="col-md-10">
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="company[address1]" placeholder="{{ trans('register_corporate.reg_co_province')}}" />
        </div>
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="company[address2]" placeholder="{{ trans('register_corporate.reg_co_city')}}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="company[address3]" placeholder="{{ trans('register_corporate.reg_co_address')}}" />
        </div>
        <div class="col-md-4 mb-10 form-md-l">
            <input class="form-control" type="text" name="company[address4]" placeholder="{{ trans('register_corporate.reg_co_post')}}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_corporate.reg_co_phonenumber')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <input class="form-control form-md" type="text" name="company[phone]" />
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="text_right_box3">
            <span style="color: red;">*</span>
            {{ trans('register_corporate.reg_co_mail')}}
        </div>
    </div>
    <div class="col-md-10 mb-10">
        <input class="form-control form-md" type="text" name="company[email]" />
    </div>
</div>