<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact_us_m extends CI_Model
{
	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
	}

	public function index($id="")
	{	
		if($id==""){
			$query = $this->db->query("SELECT * FROM tbl_contact_us");
			return $query->result();
		}else{
			$query = $this->db->query("SELECT * FROM tbl_contact_us WHERE id='$id'");
			return $query->result();
		}
	}
	public function add()
	{
		$data = array(
			"contact_desc"=>$this->input->post("desce"),
			"phone1"=> $this->input->post("phone1"),
			"phone2"=>$this->input->post("phone2"),
			"email"=> $this->input->post("email"),
			"addr"=> $this->input->post("addr"),
			"fb"=> $this->input->post("fb"),
			"web"=> $this->input->post("web"),
			"user_create"=> $this->userCrea,
			"date_create"=> date("Y-m-d")
			);
		$row=$this->db->insert("tbl_contact_us", $data);
		if($row==TRUE){return TRUE;}
	}

	public function edit($id="")
	{	
		$data = array(
			"contact_desc"=>$this->input->post("desce"),
			"phone1"=> $this->input->post("phone1"),
			"phone2"=>$this->input->post("phone2"),
			"email"=> $this->input->post("email"),
			"addr"=> $this->input->post("addr"),
			"fb"=> $this->input->post("fb"),
			"web"=> $this->input->post("web"),
			"user_update"=> $this->userCrea,
			"date_update"=> date("Y-m-d")
			);
		$this->db->where("id",$id);
		$row=$this->db->update("tbl_contact_us", $data);
		if($row==TRUE){return TRUE;}

	}	
	public function get_contact_us(){
		$query = $this->db->query("SELECT * FROM tbl_contact_us ORDER BY id DESC");
			return $query->row();
	}
	public function delete($id)
	{
		if($id==TRUE)
		{
			$this->db->where("id",$id);
			$query=$this->db->delete("tbl_contact_us");
			if($query==TRUE){return $query;}
		}
	}

}// this Class