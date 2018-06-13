<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->library('datatables');
	}

	public function admin_login($username){
		$this->db->where('username',$username);
		$query = $this->db->get('users');
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			return false;
		}
	}

	public function count_requests(){
		$this->db->select('DISTINCT (SELECT COUNT(purpose) from requests where purpose = "School Requirement") as sr, (SELECT COUNT(purpose) from requests where purpose = "work requirement") as wr');
		$this->db->where('YEAR(date_requested)',date('Y'));
		$query = $this->db->get('requests');
		return $query->result();
	}

	public function count_violations(){
		$this->db->select('DISTINCT (SELECT COUNT(abuse_type) from violations where abuse_type = "Physical") as Physical, (SELECT COUNT(abuse_type) from violations where abuse_type = "Verbal") as Verbal');
		$this->db->where('YEAR(date_happened)',date('Y'));
		$query = $this->db->get('violations');
		return $query->result();
	}

	public function get_pending_request(){
		$this->datatables->select('id,date_requested,lrn,student_name,form_type,purpose');
		$this->datatables->from('requests');
		$this->datatables->where('date_approved','0000-00-00');
		$this->datatables->where('approved_by','0');
		$this->datatables->add_column('action', '<button class="btn btn-sm btn-primary approve-request" data-id="$1"><span class="fa fa-check-square-o"></span></button>', 'id');

		return $this->datatables->generate();
	}

	public function get_all_request(){
		$this->datatables->select('r.date_requested,r.lrn,r.student_name,r.form_type,r.purpose,(IF (r.date_approved = "0000-00-00","Pending", "Approved")), CONCAT(u.lastname," ",u.firstname," ",u.mi)');
		$this->datatables->from('requests as r');
		$this->datatables->join('users as u', 'r.approved_by = u.id');

		return $this->datatables->generate();
	}	

	public function approve_request($data){
		$id = array_shift($data);
		return $this->db->update('requests', $data, 'id='.$id);
	}

	public function new_violation($data){
		return $this->db->insert('violations',$data);
	}

	public function get_all_violation(){
		$this->datatables->select('date_happened,lrn,student_name,abuse_type,(CASE WHEN status = 0 THEN "Not Solve" WHEN status = 1 THEN "Solved" END),response');
		$this->datatables->from('violations');
		return $this->datatables->generate();
	}

	public function resolve_violation($data){
		$id = array_shift($data);
		return $this->db->update('violations', $data, 'id='.$id);
	}

	public function get_unresolve_violation(){
		$this->datatables->select('id,date_happened,lrn,student_name,abuse_type');
		$this->datatables->from('violations');
		$this->datatables->where('status','0');
		$this->datatables->add_column('action', '<button class="btn btn-sm btn-primary resolve" data-id="$1"><span class="fa fa-edit"></span></button>', 'id');

		return $this->datatables->generate();
	}

	public function get_contact($id){
		$this->db->where('id', $id);
		$this->db->select('contact');
		$query = $this->db->get('requests');
		return $query->result();
	}

	public function get_users(){
		$this->datatables->select('id,lastname,firstname,mi,(CASE WHEN type = 0 THEN "Officer" WHEN type = 1 THEN "Admin" END) as type,username');
		$this->datatables->from('users');
		$this->datatables->add_column('action', '<button class="btn btn-sm btn-primary edit-user mr-1" data-id="$1"><span class="fa fa-edit"></span></button><button class="btn btn-sm btn-danger delete-user" data-id="$1"><span class="fa fa-remove"></span></button>', 'id');

		return $this->datatables->generate();
	}

	public function add_user($data){
		return $this->db->insert('users',$data);
	}

	public function delete_user($id){
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}

	public function change_pass($id, $newpass){
		$this->db->set('password', $newpass);
		$this->db->where('id',$id);
		return $this->db->update('users');
	}
	
}