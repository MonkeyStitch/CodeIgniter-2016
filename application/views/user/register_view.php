
<!-- Content -->
<div class="row">
    <div class="col-md-4">
        <div class="bg-danger text-error">
            <?php echo validation_errors(); ?>
        </div>
        <form name="registerForm" id="registerForm" novalidate action="<?php echo base_url($this->lang_code."/user/register/do_register");?>" method="post">
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_username"); ?>:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required data-validation-required-message="<?php echo lang("user_register_usernameError"); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_password"); ?>:</label>
                    <input type="password" class="form-control" name="password" id="password" required data-validation-required-message="<?php echo lang("user_register_passwordError"); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_passwordConfirm"); ?>:</label>
                    <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" required data-validation-required-message="<?php echo lang("user_register_passwordConfirmError"); ?>" data-validation-matches-match="password" data-validation-matches-message="<?php echo lang("user_register_passwordNotMatch"); ?>" >
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_name"); ?>:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" required data-validation-required-message="<?php echo lang("user_register_nameError"); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_email"); ?>:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required data-validation-required-message="<?php echo lang("user_register_emailError"); ?>" data-validation-email-message="<?php echo lang("user_register_emailInvalid"); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_mobile"); ?>:</label>
                    <input type="tel" class="form-control" name="mobile" id="mobile" value="<?php echo $mobile; ?>"
                           required data-validation-required-message="<?php echo lang("user_register_mobileError"); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_address"); ?>:</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>"
                           required data-validation-required-message="<?php echo lang("user_register_addressError"); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <?php echo $captcha["image"]; ?>
                </div>
                <div class="controls">
                    <input type="text" class="form-control" name="captcha" id="captcha" value="" required data-validation-required-message="<?php echo lang("user_register_captchaError"); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo lang("user_register_button"); ?></button>
            <button type="reset" class="btn btn-warning"><?php echo lang("button_clear"); ?></button>


        </form>
    </div>
</div>
<!-- /.row -->