
<!-- Content -->
<div class="row">
    <div class="col-md-4">
        <div class="bg-danger text-error">
        <?php echo validation_errors(); ?>
        </div>
        <form name="resetpasswordForm" id="resetpasswordForm" novalidate action="<?php echo base_url($this->lang_code."/user/reset_password/do_change/".$username."/".$reset_code);?>" method="post">
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
            <button type="submit" class="btn btn-primary"><?php echo lang("user_reset_password_button"); ?></button>
            
        	
        </form>
    </div>
</div>
<!-- /.row -->