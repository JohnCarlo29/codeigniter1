<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function new_request($data){
		return $this->db->insert('requests', $data);
	}
}