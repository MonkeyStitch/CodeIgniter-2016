
<!-- Content -->
<div class="row">
    <div class="col-md-4">
        <div class="bg-danger text-error">
        <?php echo validation_errors(); ?>
        </div>
        <form name="registerForm" id="registerForm" novalidate action="<?php echo base_url($this->lang_code."/user/profile/do_edit");?>" method="post">
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_register_username"); ?>:</label>
                    <?php echo $username; ?>
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
            <button type="submit" class="btn btn-primary"><?php echo lang("admin_user_edit_edit_btn"); ?></button>
            
        	
        </form>
    </div>
</div>
<!-- /.row -->