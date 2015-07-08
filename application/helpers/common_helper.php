<?php

	function pr($arr, $option="")
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		if ($option != "") {
			exit();
		}
	}

	function public_path($type="www")
	{
		return base_url()."public/";
	}

	function admin_path($type="www")
	{
		return base_url()."admin/";
	}

    function profile_img_path($type="www")
    {
        return base_url()."uploads/profile_images/";
    }

	function is_login()
	{

		$CI =& get_instance();
		$session = $CI->session->userdata('user_session');

		if (!isset($session['u_id'])) {
			redirect(base_url());
		}
	}

    function is_front_login()
    {

        $CI =& get_instance();
        $session = $CI->session->userdata('front_session');
		
        if (!isset($session['u_id'])) {
            redirect(base_url());
        }
    }

	function success_msg_box($msg)
	{
		$html = '<div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    '.$msg.'
                </div>';
        return $html;
	}

	function error_msg_box($msg)
	{
		$html = '<div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    '.$msg.'
                </div>';
        return $html;
	}

	function get_active_tab($tab)
    {
    	$CI =& get_instance();
        if ($CI->router->fetch_class() == $tab) {
            return 'active';
        }
    }


    function sendEmail($to, $subject, $emailTpl, $from, $from_name, $cc='', $bcc=''){
        $CI =& get_instance();

        $CI->load->library('email');

		$config['protocol'] = 'smtp';
		//$config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
		$config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "dx.replyme@gmail.com";
        $config['smtp_pass'] = "dxchat123";
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";

        $CI->email->initialize($config);

        $CI->email->from($from, $from_name);
        $CI->email->to($to);

        if($cc != ''){
            $CI->email->cc($cc);
        }

        if($bcc != ''){
            $CI->email->bcc($bcc);
        }

        $CI->email->subject($subject);
        $CI->email->message($emailTpl);

        $email_Sent = $CI->email->send();
		$CI->email->clear();
        return $email_Sent;
    }

	function replace_char($str)
	{
		return str_replace(array("/","(",")","&",),"-",$str);
	}

	function my_form_error($errtxt)
	{
		return form_error($errtxt,"<p class='red'>","</p>");
	}

	function getPackages()
	{
		$CI =& get_instance();
		$packageArr = array();
		$packageArr = $CI->common_model->selectData('packages','*');
		#print_r($packageArr);exit;
		
		// $packageArr[1]=array('id'=>1,'name'=>'Free','price'=>0,'duration'=>'1 Month');
		// $packageArr[2]=array('id'=>2,'name'=>'Premium','price'=>99,'duration'=>'6 Months');
		// $packageArr[3]=array('id'=>3,'name'=>'Enterprise','price'=>199,'duration'=>'1 Year');
		return $packageArr;
	}

	function enableSite($domain)
	{
		$configFile = "./chattool/settings/$domain.settings.ini.php";
		$configArr = file_get_contents($configFile);
		$configArr = str_replace("'islive' => 'No'","'islive' => 'Yes'",$configArr);
		file_put_contents($configFile,$configArr);
	}

	function disableSite($domain)
	{
		$configFile = "./chattool/settings/$domain.settings.ini.php";
		$configArr = file_get_contents($configFile);
		$configArr = str_replace("'islive' => 'Yes'","'islive' => 'No'",$configArr);
		file_put_contents($configFile,$configArr);
	}
?>
