<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Complaint extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->front_session = $this->session->userdata('front_session');
        is_front_login();
    }

    public function index() {
        
            $post = $this->input->post();
            if ($post) {
                $this->form_validation->set_rules('subdomain', 'Subdomain', 'trim|required');
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
                $this->form_validation->set_rules('comment', 'Comments', 'trim|required');

                if ($this->form_validation->run()) {
					
                    $insert_data = array(
						't_name' => $post['name'],
                        't_email' => $post['email'],
                        't_phone' => $post['phone'],                        
						't_subdomain' => $post['subdomain'],
						't_comment' => $post['comment'],
						't_created_date' => date('Y-m-d H:i:s'),
						't_status' => 'Pending'
                    );
					$ret = $this->common_model->insertData('ticket', $insert_data); 
					
					 if ($ret > 0) {
					$emailTpl = $this->load->view('email_templates/complaint', '', true);
					$search = array('{name}','{email}','{phone}','{subdomain}','{comment}');
					$replace = array($post['name'],$post['email'],$post['phone'],$post['subdomain'],$post['comment']);
					$emailTpl = str_replace($search, $replace, $emailTpl);
					
					sendEmail(ADMIN_EMAIL, SUBJECT_COMPLAINT, $emailTpl, FROM_EMAIL, FROM_NAME);
					 $flash_arr = array('flash_type' => 'success',
                            'flash_msg' => 'Your complain submitted successfully.'
                        );
					 }
					 else
					 {
						$flash_arr = array('flash_type' => 'error',
                            'flash_msg' => 'Your complain submission fail.'
                        );
					 }
					 $this->session->set_flashdata('flash_arr', $flash_arr);
					 redirect("dashboard");
                }
				else
				{
					$retFlg = -1;
					echo $retFlg;
					redirect("complaint");
					exit;
				}
            }
			$where = array('up_u_id' => $this->front_session['u_id']);
			$user_plan = $this->common_model->selectData('user_plan', 'up_subdomain', $where);
			$data['user_plan']=$user_plan;

			$data['view'] = "index";
			$this->load->view('care/content', $data);
    }
}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */
