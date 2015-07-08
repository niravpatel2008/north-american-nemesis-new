<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cron extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
		
    }
	public function reminder() {
		/************  Fetch users domain which expires on today and disable chat**************/
		$where1="DATEDIFF('".date('Y-m-d H:i:s')."',user_plan.up_package_expiry_date)<=0";
		$expUsersTomorrow = $this->common_model->joinData('users','user_plan','users.u_id=user_plan.up_u_id',"*",$where1);
		foreach($expUsersTomorrow as $value)
		{
			$subdomain = $value->up_subdomain;
			disableSite($subdomain);
		}
		
		/************  Fetch users domain which will expire on tomorrow **************/
		$where1="DATEDIFF('".date('Y-m-d H:i:s')."',user_plan.up_package_expiry_date)=1";
		$expUsersTomorrow = $this->common_model->joinData('users','user_plan','users.u_id=user_plan.up_u_id',"*",$where1);
		foreach($expUsersTomorrow as $value)
		{
			$userdata['user']=$value;
			$emailTpl = $this->load->view('email_templates/reminder_oneday',$userdata, true);
			$send = sendEmail($value->u_email,"Remonder - Your ".$value->up_subdomain." domain will expire by tomorrow", $emailTpl, FROM_EMAIL, FROM_NAME);
			if($send){
			}
		}
		
		/************  Fetch users domain which will expire after 3 days **************/
		$where2="DATEDIFF('".date('Y-m-d H:i:s')."',user_plan.up_package_expiry_date)=3";
		$expUsers3days = $this->common_model->joinData('users','user_plan','users.u_id=user_plan.up_u_id',"*",$where2);
		foreach($expUsers3days as $value)
		{
			$userdata['user']=$value;
			$emailTpl = $this->load->view('email_templates/reminder_threeday',$userdata, true);
			$send = sendEmail($value->u_email,"Remonder - Your ".$value->up_subdomain." domain will expire after 3 days", $emailTpl, FROM_EMAIL, FROM_NAME);
			if($send){
			}
		}
		
		/************  Fetch users domain which will expire after 7 days **************/
		$where3="DATEDIFF('".date('Y-m-d H:i:s')."',user_plan.up_package_expiry_date)=7";
		$expUsers7days = $this->common_model->joinData('users','user_plan','users.u_id=user_plan.up_u_id',"*",$where3);
		foreach($expUsers7days as $value)
		{
			$userdata['user']=$value;
			$emailTpl = $this->load->view('email_templates/reminder_sevenday',$userdata, true);
			$send = sendEmail($value->u_email,"Remonder - Your ".$value->up_subdomain." domain will expire after 7 days", $emailTpl, FROM_EMAIL, FROM_NAME);
			if($send){
			}
		}
    }
}

/* End of file cron.php */
/* Location: ./application/controllers/cron.php */
