<?php
class common_model extends CI_Model{
	public function  __construct(){
		parent::__construct();
		$this->load->database();
	}


	/**
	* Select data
	*
	* general function to get result by passing nesessary parameters
	*/
	public function selectData($table, $fields='*', $where='', $order_by="", $order_type="", $group_by="", $limit="", $rows="", $type='')
	{
		$this->db->select($fields);
		$this->db->from($table);
		if ($where != "") {
			$this->db->where($where);
		}

		if ($order_by != '') {
			$this->db->order_by($order_by,$order_type);
		}

		if ($group_by != '') {
			$this->db->group_by($group_by);
		}

		if ($limit > 0 && $rows == "") {
			$this->db->limit($limit);
		}
		if ($rows > 0) {
			$this->db->limit($rows, $limit);
		}


		$query = $this->db->get();

		if ($type == "rowcount") {
			$data = $query->num_rows();
		}else{
			$data = $query->result();
		}

		#echo "<pre>"; print_r($this->db->queries); exit;
		$query->free_result();

		return $data;
	}
	/**
	* Select join data
	*
	* general function to get result by passing nesessary parameters
	*/
	public function joinData($table,$join_table,$join_on, $fields='*',$where='', $order_by="", $order_type="", $group_by="", $limit="", $rows="", $type='')
	{
		$this->db->select($fields);
		$this->db->from($table);
		$this->db->join($join_table,$join_on);
		if ($where != "") {
			$this->db->where($where);
		}

		if ($order_by != '') {
			$this->db->order_by($order_by,$order_type);
		}

		if ($group_by != '') {
			$this->db->group_by($group_by);
		}

		if ($limit > 0 && $rows == "") {
			$this->db->limit($limit);
		}
		if ($rows > 0) {
			$this->db->limit($rows, $limit);
		}


		$query = $this->db->get();

		if ($type == "rowcount") {
			$data = $query->num_rows();
		}else{
			$data = $query->result();
		}

		#echo "<pre>"; print_r($this->db->queries); exit;
		$query->free_result();

		return $data;
	}

	/**
	* Insert data
	*
	*general function to insert data in table
	*/
	public function insertData($table, $data)
	{
		$result = $this->db->insert($table, $data);
		if($result == 1){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}


	/**
	* Update data
	*
	* general function to update data
	*/
	public function updateData($table, $data, $where)
	{
		$this->db->where($where);
		if($this->db->update($table, $data)){
			return 1;
		}else{
			return 0;
		}
	}


	/**
	* Delete data
	*
	* general function to delete the records
	*/
	public function deleteData($table, $data)
	{
		if($this->db->delete($table, $data)){
			return 1;
		}else{
			return 0;
		}
	}



	/**
	* check unique fields
	*/
	public function isUnique($table, $field, $value,$where = "")
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$value);
		if ($where != "")
			$this->db->where($where);
		$query = $this->db->get();
		$data = $query->num_rows();
		$query->free_result();

		return ($data > 0)?FALSE:TRUE;
	}

	/**
	* check unique fields
	*/
	public function getId($table, $field, $value,$where = "")
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$value);
		if ($where != "")
			$this->db->where($where);
		$query = $this->db->get();
		#$data = $query->num_rows();
		$data =$query->row();

		$query->free_result();
		return $data->id;
	}


	function setupApplication($data,$user)
	{
		$path = realpath('./chat_db/master_chat.sql');
			 
		$this->load->dbforge();
		$dbDetail=$this->selectData("user_database",'*', array("ud_allocated"=>"0"),"ud_id","ASC","",'1');
		
		if (count($dbDetail)!=0)
		{
			$dbname=$dbDetail[0]->ud_db_name;
			$setArray = array('ud_uid' => $data['up_u_id'],'ud_allocated'=>'1');
			$where = 'ud_id ='.$dbDetail[0]->ud_id;
			$this->updateData('user_database', $setArray, $where);
			
			$this->db->query('use '.$dbname);
			$lines = file($path, true);
			$templine = "";
			foreach ($lines as $line)
			{
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				$templine .= $line;
				if (substr(trim($line), -1, 1) == ';')
				{
					$this->db->query($templine);
					/*echo $templine;
					echo "<br>";
					echo "<br>";*/
					$templine = '';
				}
			} 
			$userEmail=$user['u_email'];
			$userFname=$user['u_fname'];
			$userLname=$user['u_lname'];
			$password=sha1('abc123'.'b218d00d7a'.sha1('abc123'));
			$this->db->query("INSERT INTO `lh_abstract_email_template` (`id`, `name`, `from_name`, `from_name_ac`, `from_email`, `from_email_ac`, `user_mail_as_sender`, `content`, `subject`, `bcc_recipients`, `subject_ac`, `reply_to`, `reply_to_ac`, `recipient`) VALUES
(1, 'Send mail to user', 'Support Team', 0, '', 0, 0, 'Dear {user_chat_nick},\r\n\r\n{additional_message}\r\n\r\nLive Support response:\r\n{messages_content}\r\n\r\nSincerely,\r\nLive Support Team\r\n', '{name_surname} has responded to your request', '', 1, '', 1, ''),
(2, 'Support request from user', '', 0, '', 0, 0, 'Hello,\r\n\r\nUser request data:\r\nName: {name}\r\nEmail: {email}\r\nPhone: {phone}\r\nDepartment: {department}\r\nCountry: {country}\r\nCity: {city}\r\nIP: {ip}\r\n\r\nMessage:\r\n{message}\r\n\r\nAdditional data, if any:\r\n{additional_data}\r\n\r\nURL of page from which user has send request:\r\n{url_request}\r\n\r\nLink to chat if any:\r\n{prefillchat}\r\n\r\nSincerely,\r\nLive Support Team', 'Support request from user', '', 0, '', 0, '$userEmail'),
(3, 'User mail for himself', 'Support Team', 0, '', 0, 0, 'Dear {user_chat_nick},\r\n\r\nTranscript:\r\n{messages_content}\r\n\r\nSincerely,\r\nLive Support Team\r\n', 'Chat transcript', '', 0, '', 0, ''),
(4, 'New chat request', 'Support Team', 0, '', 0, 0, 'Hello,\r\n\r\nUser request data:\r\nName: {name}\r\nEmail: {email}\r\nPhone: {phone}\r\nDepartment: {department}\r\nCountry: {country}\r\nCity: {city}\r\nIP: {ip}\r\n\r\nMessage:\r\n{message}\r\n\r\nURL of page from which user has send request:\r\n{url_request}\r\n\r\nClick to accept chat automatically\r\n{url_accept}\r\n\r\nSincerely,\r\nLive Support Team', 'New chat request', '', 0, '', 0, '$userEmail'),
(5, 'Chat was closed', 'Support Team', 0, '', 0, 0, 'Hello,\r\n\r\n{operator} has closed a chat\r\nName: {name}\r\nEmail: {email}\r\nPhone: {phone}\r\nDepartment: {department}\r\nCountry: {country}\r\nCity: {city}\r\nIP: {ip}\r\n\r\nMessage:\r\n{message}\r\n\r\nAdditional data, if any:\r\n{additional_data}\r\n\r\nURL of page from which user has send request:\r\n{url_request}\r\n\r\nSincerely,\r\nLive Support Team', 'Chat was closed', '', 0, '', 0, ''),
(6, 'New FAQ question', 'Support Team', 0, '', 0, 0, 'Hello,\r\n\r\nNew FAQ question\r\nEmail: {email}\r\n\r\nQuestion:\r\n{question}\r\n\r\nQuestion URL:\r\n{url_question}\r\n\r\nURL to answer a question:\r\n{url_request}\r\n\r\nSincerely,\r\nLive Support Team', 'New FAQ question', '', 0, '', 0, ''),
(7, 'New unread message', 'Support Team', 0, '', 0, 0, 'Hello,\r\n\r\nUser request data:\r\nName: {name}\r\nEmail: {email}\r\nPhone: {phone}\r\nDepartment: {department}\r\nCountry: {country}\r\nCity: {city}\r\nIP: {ip}\r\n\r\nMessage:\r\n{message}\r\n\r\nURL of page from which user has send request:\r\n{url_request}\r\n\r\nClick to accept chat automatically\r\n{url_accept}\r\n\r\nSincerely,\r\nLive Support Team', 'New chat request', '', 0, '', 0, '$userEmail'),
(8, 'Filled form', 'Support Team', 0, '', 0, 0, 'Hello,\r\n\r\nUser has filled a form\r\nForm name - {form_name}\r\nUser IP - {ip}\r\nDownload filled data - {url_download}\r\nIdentifier - {identifier}\r\nView filled data - {url_view}\r\n\r\n {content} \r\n\r\nSincerely,\r\nLive Support Team', 'Filled form - {form_name}', '', 0, '', 0, '$userEmail'),
(9, 'Chat was accepted', 'Support Team', 0, '', 0, 0, 'Hello,\r\n\r\nOperator {user_name} has accepted a chat [{chat_id}]\r\n\r\nUser request data:\r\nName: {name}\r\nEmail: {email}\r\nPhone: {phone}\r\nDepartment: {department}\r\nCountry: {country}\r\nCity: {city}\r\nIP: {ip}\r\n\r\nMessage:\r\n{message}\r\n\r\nURL of page from which user has send request:\r\n{url_request}\r\n\r\nClick to accept chat automatically\r\n{url_accept}\r\n\r\nSincerely,\r\nLive Support Team', 'Chat was accepted [{chat_id}]', '', 0, '', 0, '$userEmail'),
(10, 'Permission request', 'Support Team', 0, '', 0, 0, 'Hello,\r\n\r\nOperator {user} has requested these permissions\n\r\n{permissions}\r\n\r\nSincerely,\r\nLive Support Team', 'Permission request from {user}', '', 0, '', 0, '$userEmail');");
			$this->db->query("INSERT INTO `lh_users` (`id`, `username`, `password`, `email`, `time_zone`, `name`, `surname`, `filepath`, `filename`, `job_title`, `departments_ids`, `xmpp_username`, `session_id`, `skype`, `disabled`, `hide_online`, `all_departments`, `invisible_mode`, `rec_per_req`, `active_chats_counter`, `closed_chats_counter`, `pending_chats_counter`) VALUES
(1, '$userEmail', '$password', '$userEmail', '', '$userFname', '$userLname', '', '', '', '0', '', '', '', 0, 0, 1, 0, 0, 0, 0, 0);");

			$this->db->query("INSERT INTO `lh_userdep` (`id`, `user_id`, `dep_id`, `last_activity`, `hide_online`, `last_accepted`, `active_chats`) VALUES (1, 1, 0, 0, 0, 0, 1);");
			$this->db->query("INSERT INTO `lh_groupuser` (`id`, `group_id`, `user_id`) VALUES (1, 1, 1);");
			

			/*Create config file*/
			$config = array ();
			$config['title'] = $data['up_subdomain'];
			$config['dbhost'] = DB_HOSTNAME;
			$config['dbuser'] = DB_USERNAME;
			$config['dbpass'] = DB_PASSWORD;
			$config['dbname'] = $dbname;
			$arrayContent = $this->load->view('template/config', $config,true);
			
			$arrayContent = "<?php $arrayContent ?>";
			file_put_contents("./chattool/settings/".$data['up_subdomain'].".settings.ini.php",$arrayContent);
			return 1;
		}
		else{
			return 0;
			
		}
	}
}
