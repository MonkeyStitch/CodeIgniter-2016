
<!-- Content -->
<div class="row">
    <div class="col-md-4">
        <div class="bg-danger text-error">
            <?php echo validation_errors(); ?>
        </div>
        <form name="forgotPasswordForm" id="forgotPasswordForm" novalidate action="<?php echo base_url($this->lang_code."/user/forgot_password/do_forgot");?>" method="post">
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_username"); ?>:</label>
                    <input type="text" class="form-control" name="username" value="" required data-validation-required-message="<?php echo lang("user_register_usernameError"); ?>">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_email"); ?>:</label>
                    <input type="email" class="form-control" name="email" id="email" value="" required data-validation-required-message="<?php echo lang("user_register_emailError"); ?>" data-validation-email-message="<?php echo lang("user_register_emailInvalid"); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo lang("user_forgot_password_button"); ?></button>


        </form>
    </div>
</div>
<!-- /.row -->