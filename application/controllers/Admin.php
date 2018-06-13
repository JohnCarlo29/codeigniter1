<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function login(){
		if($this->session->has_userdata('user')){
			redirect('admin/menu');
		}else{	
			$this->load->view('layout/header');
			$this->load->view('login');
			$this->load->view('layout/footer');
		}
	}

	public function menu(){
		if(!$this->session->has_userdata('user')){
			redirect('login');
		}else{	
			$this->load->view('layout/header');
			$this->load->view('menu');
			$this->load->view('layout/footer');
		}
	}

	public function users(){
		if(!$this->session->has_userdata('user')){
			redirect('login');
		}else{	
			$this->load->view('layout/header');
			$this->load->view('users');
			$this->load->view('layout/footer');
		}
	}

	public function violations(){
		if(!$this->session->has_userdata('user')){
			redirect('login');
		}else{	
			$this->load->view('layout/header');
			$this->load->view('violations');
			$this->load->view('layout/footer');
		}
	}
	public function violation_history(){
		if(!$this->session->has_userdata('user')){
			redirect('login');
		}else{	
			$this->load->view('layout/header');
			$this->load->view('violation_history');
			$this->load->view('layout/footer');
		}
	}

	public function requested(){
		if(!$this->session->has_userdata('user')){
			redirect('login');
		}else{
			$this->load->view('layout/header');
			$this->load->view('requested');
			$this->load->view('layout/footer');
		}
	}

	public function charts(){
		if(!$this->session->has_userdata('user')){
			redirect('login');
		}else{
			$this->load->view('layout/header');
			$this->load->view('charts');
			$this->load->view('layout/footer');
		}
	}

	public function admin_login(){
		$rules = [
			array(
                'field' => 'uname',
                'label' => 'Username',
                'rules' => 'required'
        	),
        	array(
                'field' => 'pword',
                'label' => 'Password',
                'rules' => 'required'
        	),
		];

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('login_error', validation_errors());
			redirect('login');
		}else{
			$username = $this->input->post('uname');
			$password = $this->input->post('pword');
			$result = $this->Admin_model->admin_login($username);
			if($result == false){
				$this->session->set_flashdata('login_error', 'Username is not yet registered');
				redirect('login');
			}else{
				if(password_verify($password, $result[0]->password)){
					$userdata = ['id'=>$result[0]->id, 'user'=> $result[0]->username, 'type'=>$result[0]->type];
					$this->session->set_userdata($userdata);
					redirect('menu');
				}else{
					$this->session->set_flashdata('login_error', 'Incorrect Password');
					redirect('login');
				}
			}
		}
	}

	public function count_requests(){
		header('Content-type:application/json');
		echo json_encode($this->Admin_model->count_requests());
	}

	public function count_violations(){
		header('Content-type:application/json');
		echo json_encode($this->Admin_model->count_violations());
	}

	public function get_pending_request(){
		header('Content-type:application/json');
		echo $this->Admin_model->get_pending_request();
	}

	public function get_all_request(){
		header('Content-type:application/json');
		echo $this->Admin_model->get_all_request();
	}

	public function approve_request(){
		$data = [
			'id' => $this->input->post('id'),
			'date_approved' => date('Y-m-d'),
			'approved_by' => $this->session->userdata('id'),
		];
		if($this->Admin_model->approve_request($data)){
			$number = $this->get_contact($data['id']);
			$send = $this->send_text($number);
			if($send == 0){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}

	}

	public function new_violation(){
		$this->form_validation->set_rules('datehappend','Date Happend', 'required|trim');
		$this->form_validation->set_rules('lrn','LRN', 'required|trim|numeric|max_length[12]|min_length[12]');
		$this->form_validation->set_rules('student','Student Name', 'required|trim');
		$this->form_validation->set_rules('abuse','Abuse Type', 'required|trim|callback_dropdown_check');
		$this->form_validation->set_rules('status','Case Status', 'required|trim|callback_dropdown_check');
		$this->form_validation->set_rules('response','Response', 'required|trim');
		if($this->form_validation->run() == FALSE){
			echo strip_tags(validation_errors());
		}else{
			$data = [
				'date_happened' => $this->input->post('datehappend'),
				'lrn' => $this->input->post('lrn'),
				'student_name' => $this->input->post('student'),
				'abuse_type' => $this->input->post('abuse'),
				'status' => $this->input->post('status'),
				'response' => $this->input->post('response'),
			];

			echo $this->Admin_model->new_violation($data);
		}
	}

	public function get_unresolve_violation(){
		header('Content-type:application/json');
		echo $this->Admin_model->get_unresolve_violation();
	}

	public function resolve_violation(){
		$this->form_validation->set_rules('status','Case Status', 'required|trim|callback_dropdown_check');
		$this->form_validation->set_rules('response','Response', 'required|trim');

		if($this->form_validation->run() == FALSE){
			echo strip_tags(validation_errors());
		}else{
			$data = [
				'id'=> $this->input->post('id'),
				'status' => $this->input->post('status'),
				'response' => $this->input->post('response'),
			];

			echo $this->Admin_model->resolve_violation($data);
		}
	}

	public function get_all_violation(){
		header('Content-type:application/json');
		echo $this->Admin_model->get_all_violation();
	}

	private function get_contact($id){
		$result = $this->Admin_model->get_contact($id);
		return $result[0]->contact;
	}

	public function get_users(){
		header('Content-type:application/json');
		echo $this->Admin_model->get_users();
	}

	public function add_user(){
		$this->form_validation->set_rules('sname','Surname','required|trim');
		$this->form_validation->set_rules('fname','Firstname','required|trim');
		$this->form_validation->set_rules('mi','Middle Initial','required|trim|max_length[1]');
		$this->form_validation->set_rules('ulevel','User Level','required|trim|callback_dropdown_check');
		$this->form_validation->set_rules('uname','Username','required|trim');
		$this->form_validation->set_rules('pword','Password','required|trim');

		if($this->form_validation->run() == FALSE){
			echo strip_tags(validation_errors());
		}else{
			$data = [
				'lastname' => ucwords($this->input->post('sname')),
				'firstname' => ucwords($this->input->post('fname')),
				'mi' => ucwords($this->input->post('mi')),
				'type' => $this->input->post('ulevel'),
				'username' => $this->input->post('uname'),
				'password' => password_hash($this->input->post('pword'), PASSWORD_BCRYPT),
			];
			echo $this->Admin_model->add_user($data);
		}

	}

	public function delete_user(){
		$id = $this->input->post('id');
		echo $this->Admin_model->delete_user($id);
	}

	public function change_pass(){
		$this->form_validation->set_rules('newpword','New Password', 'required|trim');
		if($this->form_validation->run() == FALSE){
			echo strip_tags(validation_errors());
		}else{
			$id = $this->input->post('id');
			$newpass = password_hash($this->input->post('newpword'), PASSWORD_BCRYPT);
			echo $this->Admin_model->change_pass($id, $newpass);
		}
	}

	private function send_text($contact){
		$date = new DateTime();
		$date->add(new DateInterval('P7D'));
		$receiving_date =  $date->format('m-d-Y');
		
		$number = $contact;
		$message = 'Your request is approved. You may claim your requested form on '.$receiving_date;
		$this->load->library('Itextmo');
		$result = $this->itextmo->send_sms($number,$message);
		return $result;
	}

	public function logout(){
		$userdata = ['id', 'user', 'type'];
		$this->session->unset_userdata($userdata);
		$this->session->sess_destroy();
		redirect('login');
	}

	//rules for checking dropdown value
	public function dropdown_check($str){
        if ($str == ""){
	        $this->form_validation->set_message('dropdown_check', 'Please select valid value of {field}');
	        return FALSE;
        }
        else{
            return TRUE;
        }
	}
}
