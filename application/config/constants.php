<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("dbw.php");
/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */



/**
* Email constants
*/
define('ADMIN_EMAIL', 'dx.replyme@gmail.com');
define('FROM_EMAIL', 'dx.replyme@gmail.com');
define('SUBJECT_CONTACT_ADMIN', 'Contact us');
define('FROM_NAME', 'Dx Chat');
define('SUBJECT_LOGIN_INFO', 'Login info');
define('SUBJECT_COMPLAINT', 'User Complaint');
define('SUBJECT_DEAL_INFO', 'Deal info');

/**
* Paypal constants
*/
define('PAYPAL_API_VERSION', '84.00');
define('PAYPAL_API_USER', 'sdk-three_api1.sdk.com');
define('PAYPAL_API_PASSWORD', 'QFZCWN5HZM8VBG7Q');
define('PAYPAL_API_SIGNATURE', 'A-IzJhZZjhg29XQ2qnhapuwxIDzyAZQ92FRP5dqBzVesOkzbdUONzmOU');
define('PAYPAL_API_RETURN', 'signup/returnpay');
define('PAYPAL_API_CANCEL', 'signup/cancelpay');