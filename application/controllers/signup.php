<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        //if ($id > 0) {
			/*$data = array('u_subdomain'=>'neo');
			$this->common_model->setupApplication($data);*/

            $post = $this->input->post();
            if ($post) {

                $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
                $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required|is_unique[users.u_email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
                $this->form_validation->set_rules('password2', 'Confirm password', 'trim|required');
				$this->form_validation->set_rules('website', 'Website', 'trim|required|is_unique[user_plan.up_website]');
				$this->form_validation->set_rules('subdomain', 'Subdomain', 'trim|required|is_unique[user_plan.up_subdomain]');

                if ($this->form_validation->run()) {
					$packageId = $post['planSelect'];
					switch($packageId)
					{
						case 1:
							$expDate=Date('Y-m-d', strtotime("+20 days"));
						break;
						case 2:
							$expDate=Date('Y-m-d', strtotime("+30 days"));
						break;
						case 3:
							$expDate=Date('Y-m-d', strtotime("+180 days"));
						break;
						case 4:
							$expDate=Date('Y-m-d', strtotime("+365 days"));
						break;
					}
                    $insert_data = array(
						'u_fname' => $post['fname'],
                        'u_lname' => $post['lname'],
                        'u_email' => $post['email'],
                        'u_password' => md5($post['password']),
						'u_created_date' => date('Y-m-d H:i:s'),
                        'u_phone' => $post['phone'],
						'u_active' => 1
                        
                    );
					$plan_data = array(
                        'up_package_id' => $packageId,
                        'up_website' => $post['website'],
						'up_subdomain' => $post['subdomain'],
						'up_created_date' => date('Y-m-d H:i:s'),
						'up_package_expiry_date' => $expDate,
						'up_status' => 'Active'
                    );
					
					if($packageId != 1)
					{
						/* Paypal payment code */
						$this->load->helper('paypal');
						$paypal = new wp_paypal_gateway (true);

						$pkgDetail = $this->common_model->selectData('packages',"*", array("package_id"=>$packageId));
						$package_name = $pkgDetail[0]->package_name;
						$package_price = $pkgDetail[0]->package_price;
						$package_desc = $package_name." (".$pkgDetail[0]->package_description . ") Subscription for ".$post['website'];
					
						// Required Parameter for the getExpresscheckout
						$param = array(
							'amount' => $package_price,
							'currency_code' => 'USD',
							'payment_action' => 'Sale',
							'package_desc' => $package_desc,
						);
						$param["return_url"] = base_url().PAYPAL_API_RETURN;
						$param["cancel_url"] = base_url().PAYPAL_API_CANCEL;
						
						// Display the response if successful or the debug info
						if ($paypal->setExpressCheckout($param)) {
							$res=$paypal->getResponse();
							$url = $paypal->getRedirectURL();
							$payment["payment"] =  $paypal->getResponse();
							$payment["user_data"] =  $insert_data;
							$payment["plan_data"] =  $plan_data;
							$this->session->set_userdata('payment_session', $payment);
							echo $url;
						} else {
							print_r($paypal->debug_info);
						}
						exit;
					}else
					{
						
						$this->processUsersInformation($insert_data,$plan_data);
					}
                }
				else
				{
					$retFlg = -1;
					echo $retFlg;
					exit;
				}
            }
			
           // $data['view'] = "signup";
        //} else {
            $data['packages'] = getPackages();
			$data['view'] = "index";
        //}
		
        $this->load->view('content', $data);
    }
	
	public function processUsersInformation($insert_data,$plan_data)
	{
		$ret = $this->common_model->insertData('users', $insert_data);
		$plan_data['up_u_id']=$ret;
		$plan = $this->common_model->insertData('user_plan', $plan_data);
		$u_email = $insert_data['u_email'];

		$paypalResp = $this->session->userdata('payment_session');

		if(isset($paypalResp['payment']))
		{
			$paidPlan=true;#tmp flag for redirection
			if(!empty($paypalResp['payment']))
			{
				$payment = $paypalResp['payment'];
				$token = $payment['TOKEN']; 
				$status = $payment['ACK'];

				$insert_trans_data = array(
				't_upid'=>$plan,
				't_creationdate'=>date('Y-m-d H:i:s'),
				't_packageid'=>$plan_data['up_package_id'],
				't_paypaltoken'=>$token,
				't_status'=>$status
				);
				$resultVar = $this->common_model->insertData('transaction', $insert_trans_data);
			}
			else
			{
				$flash_arr = array('flash_type' => 'error',
				'flash_msg' => 'An error occured while processing payment.'
				);
				$this->session->set_flashdata('flash_arr', $flash_arr);
				redirect("/");
			}
		}
		else
			$paidPlan=false;#tmp flag for redirection

		# create session
		$data = array('u_id' => $ret,
			'u_email' => $u_email,
			'u_name'=> $insert_data['u_fname'].' '.$insert_data['u_lname']
		);
		$this->session->set_userdata('front_session', $data);

		if ($plan > 0) {
			
			$setup=$this->common_model->setupApplication($plan_data,$insert_data);
			if($setup==1)
			{
				## send mail
				//$login_details = array('u_email' => $user[0]->email,'u_password' => $newpassword);
				//$userRes = $user[0];
				$emailTpl = $this->load->view('email_templates/signup', '', true);

				$search = array('{name}','{username}','{OrgName}');
				$replace = array($insert_data['u_fname']." ".$insert_data['u_lname'],$insert_data['u_email'],'ChatAdmin');
				$emailTpl = str_replace($search, $replace, $emailTpl);

				$ret = sendEmail($u_email, SUBJECT_LOGIN_INFO, $emailTpl, FROM_EMAIL, FROM_NAME);

				$flash_arr = array('flash_type' => 'success',
					'flash_msg' => 'Welcome to DX chat.'
				);
				$retFlg = 1; 
			}
			else{
				$flash_arr = array('flash_type' => 'error',
				'flash_msg' => 'There is some technical  issue, Please try after some time.'
			);
			$retFlg = 0;
			}
		} else {
			$flash_arr = array('flash_type' => 'error',
				'flash_msg' => 'An error occurred while processing.'
			);
			$retFlg = 0;
		}
		$this->session->set_flashdata('flash_arr', $flash_arr);
		if($retFlg == 0)
		{
			echo base_url()."signup";exit;
		}
		
		if($paidPlan == false)
		{
			echo base_url()."dashboard";exit;
		}
		else
			redirect(base_url()."dashboard");
	}

	public function returnpay() {
					$get = $this->input->get();
					$token = $get['token'];
					$payment_data = $this->session->userdata('payment_session');
					
					$insert_data = $payment_data['user_data'];
					$plan_data = $payment_data['plan_data'];
					
					$payment = $payment_data['payment'];

					if (!isset($insert_data))
						redirect(base_url());

					if ($payment['TOKEN'] != $token)
						redirect(base_url());

					$this->processUsersInformation($insert_data,$plan_data);
	}

	public function cancelpay() {
			redirect(base_url());
	}
}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */
