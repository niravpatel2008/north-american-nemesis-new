<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
//		echo '<pre>';print_r($this->session);
		$this->front_session = $this->session->userdata('front_session');
        //is_front_login();
    }

    public function index() {
        $data['view'] = "index";
        $this->load->view('content', $data);
    }

    public function about() {
        $data['view'] = "about";
        $this->load->view('content', $data);
    }

    public function contact() {
        $data['view'] = "contact";
        $this->load->view('content', $data);
    }

    public function signin() {
        $post = $this->input->post();
        if ($post) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run()) {
                $where = array('u_email' => $post['email'],
                    'u_password' => md5(trim($post['password']))
                );
                $user = $this->common_model->selectData('users', '*', $where);
                if (count($user) > 0) {
                    # create session
                    $data = array('u_id' => $user[0]->u_id,
                        'u_email' => $user[0]->u_email,
						'u_name'=> $user[0]->u_fname.' '.$user[0]->u_lname
                    );
                    $this->session->set_userdata('front_session', $data);
					$flash_arr = array('flash_type' => 'success',
                        'flash_msg' => 'Login successful'
                    );
                    $this->session->set_flashdata('flash_arr', $flash_arr);
                    redirect("dashboard");
                } else {
                    $flash_arr = array('flash_type' => 'error',
                        'flash_msg' => 'Invalid username or password.'
                    );
                    $this->session->set_flashdata('flash_arr', $flash_arr);
                    redirect("signin");
                }
            }
        }

        $data['view'] = "signin";
        $this->load->view('content', $data);
    }

    public function signout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

	public function forgetpassword()
	{
		$post = $this->input->post();
		//echo 'hdldl';die;
		//print_r($post);die;
		if ($post) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			if ($this->form_validation->run()) {
				$where = array('u_email' => $post['email']);

				$user = $this->common_model->selectData('users', '*', $where);
                if (count($user) > 0)
				{
                    # update user pwd
                    $data = array('u_id' => $user[0]->id,
                        'u_email' => $user[0]->email
                    );
					$newpassword = random_string('alnum', 8);
					$data = array('u_password' => md5($newpassword));
					$upid = $this->common_model->updateData('users',$data,$where);
					
					## send mail
					$login_details = array('u_email' => $user[0]->email,'u_password' => $newpassword);
					$emailTpl = $this->load->view('email_templates/forgot_password', '', true);

					$search = array('{username}', '{password}');
					$replace = array($login_details['u_email'], $login_details['u_password']);
					$emailTpl = str_replace($search, $replace, $emailTpl);

					$ret = sendEmail($user[0]->email, SUBJECT_LOGIN_INFO, $emailTpl, FROM_EMAIL, FROM_NAME);
					if ($ret)
					{
						$flash_arr = array('flash_type' => 'success',
											'flash_msg' => "Your Request has been submitted successfully.You will receive mail sortly with your credentials."
										);
					}else
					{
						$flash_arr = array(
							'flash_type' => 'error',
							'flash_msg' => 'An error occurred while processing.'
							);
							$this->session->set_flashdata('flash_arr', $flash_arr);
						redirect("index/forgetpassword");
					}
					$this->session->set_flashdata('flash_arr', $flash_arr);
					redirect("signin");
					

				}
				else
				{
					$flash_arr = array('flash_type' => 'error',
					'flash_msg' => 'User does not exist.');
					$this->session->set_flashdata('flash_arr', $flash_arr);
					redirect("index/forgetpassword");
                }
			}
		}
		$data['view'] = "forgetpassword";
        $this->load->view('content', $data);
	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
