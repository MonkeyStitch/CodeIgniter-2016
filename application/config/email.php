<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| E-Mail Configuration
|--------------------------------------------------------------------------
|
|
*/


$config['protocol']     = 'smtp';
$config['smtp_host']    = 'ssl://smtp.googlemail.com';
$config['smtp_port']    = '465';
$config['smtp_timeout'] = '7';
$config['smtp_user']    = 'peat.tk@gmail.com';
$config['smtp_pass']    = '';
$config['mailtype']     = 'html';
$config['charset']      = 'utf-8';
$config['wordwrap']     = TRUE;
$config['newline']      = "\r\n";
$config['validation']   = TRUE;



/* End of file email.php */
/* Location: ./application/config/email.php */
