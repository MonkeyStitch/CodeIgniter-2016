
<!-- Content -->
<div class="row">
    <div class="col-md-4">
        <div class="bg-danger text-error">
        <?php echo validation_errors(); ?>
        </div>

        <?php

//        echo '<pre>';print_r($this->_aUser);exit();

        if (strpos($this->_aUser['username'], "fb@") !== false) {
            $fb_id = str_replace('fb@', '', $this->_aUser['username']);
            $picture_url = 'http://graph.facebook.com/'.$fb_id.'/picture?type=large';

        ?>
            <img class="img-responsive" src="<?php echo $picture_url; ?>" alt="" />
            (<?php echo $name; ?>)
        <?php
        }
        ?>


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