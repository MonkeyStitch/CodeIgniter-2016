
<!-- Content -->
<div class="row">
    <div class="col-md-4">
        <div class="bg-danger text-error">
        <?php echo validation_errors(); ?>
        </div>
        <form name="loginForm" id="loginForm" novalidate action="<?php echo base_url($this->lang_code."/user/login/do_login");?>" method="post">
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_login_username"); ?>:</label>
                    <input type="text" class="form-control" name="username" required data-validation-required-message="<?php echo lang("user_login_usernameError"); ?>">
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label><?php echo lang("user_login_password"); ?>:</label>
                    <input type="password" class="form-control" name="password" required data-validation-required-message="<?php echo lang("user_login_passwordError"); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo lang("user_login_loginButton"); ?></button>
            <a href="<?php echo base_url($this->lang_code."/user/facebook");?>"><img src="<?php echo base_url("images/fb.png");?>"></a>
            <a href="<?php echo base_url($this->lang_code."/user/forgot_password");?>"><?php echo lang("user_login_forgotPasswordLink"); ?></a>
            <hr />
            <a href="<?php echo base_url($this->lang_code."/user/register");?>" class="btn btn-success btn-lg "><?php echo lang("user_login_register"); ?></a>
        	
        </form>
    </div>
</div>
<!-- /.row -->