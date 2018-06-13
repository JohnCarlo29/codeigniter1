<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Students_model');
	}

	public function request(){
		$this->load->view('layout/header');
		$this->load->view('requestform');
		$this->load->view('layout/footer');
	}

	public function send_request(){
		$rules = [
			array(
				'field' => 'date_request',
				'label' => 'Date',
				'rules' => 'required'
			),
			array(
				'field' => 'lrn',
				'label' => 'LRN No.',
				'rules' => 'required|numeric|trim|min_length[12]|max_length[12]'
			),
			array(
				'field' => 'sname',
				'label' => 'Surname',
				'rules' => 'required|trim'
			),
			array(
				'field' => 'suffix',
				'label' => 'Suffix',
				'rules' => 'required|trim'
			),
			array(
				'field' => 'fname',
				'label' => 'Firstname',
				'rules' => 'required|trim'
			),
			array(
				'field' => 'mname',
				'label' => 'Middle Name',
				'rules' => 'required|trim'
			),
			array(
				'field' => 'form',
				'label' => 'Form Requesting',
				'rules' => 'required|callback_dropdown_check'
			),
			array(
				'field' => 'purpose',
				'label' => 'Purpose',
				'rules' => 'required|callback_dropdown_check'
			),
			array(
				'field' => 'contact',
				'label' => 'Contact',
				'rules' => 'required|trim|numeric|min_length[11]|max_length[11]'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|required|valid_email'
			)
		];

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('request_error', validation_errors());
			redirect('students/request');
		}else{
			$data = [
				'lrn' => $this->input->post('lrn'),
				'student_name' => ucwords($this->input->post('fname').' '.$this->input->post('mname').' '.$this->input->post('sname').' '.$this->input->post('suffix')),
				'form_type' => ucwords($this->input->post('form')),
				'purpose' => ucwords($this->input->post('purpose')),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'date_requested' => $this->input->post('date_request'),
			];

			if($this->Students_model->new_request($data)){
				redirect('students/request_sent');
			}else{
				show_404();
			}
		}
	}

	public function request_sent(){
		$this->load->view('layout/header');
		$this->load->view('success');
		$this->load->view('layout/footer');
	}

	//rules for checking dropdown value
	public function dropdown_check($str){
        if ($str == '0'){
	        $this->form_validation->set_message('dropdown_check', 'Please select valid value of {field}');
	        return FALSE;
        }
        else{
            return TRUE;
        }
	}

}