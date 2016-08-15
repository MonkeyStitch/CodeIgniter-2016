<?php
echo lang('user_forgot_password_username')." : ".$username."<br />";
echo lang('user_forgot_password_reset_code')." : ".$reset_code."<br />";
echo lang('user_forgot_password_reset_code_click_link')."<br />";
echo "<a href='".base_url($this->lang_code."/user/reset_password/index/".$username."/".$reset_code)."'>".base_url($this->lang_code."/user/reset_password/index/".$username."/".$reset_code)."</a>";
?>