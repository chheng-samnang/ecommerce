<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About_m extends CI_Model
{
	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
	}

	public function index($id="")
	{	
		if($id!=""){
			$query = $this->db->query("SELECT * FROM tbl_about WHERE id='$id'");
			return $query->row();
		}else{
			$query = $this->db->query("SELECT * FROM tbl_about");
			return $query->result();
		}
	}
	public function get_about(){
		$query = $this->db->query("SELECT * FROM tbl_about ORDER BY id DESC");
			return $query->row();
	}
	public function add()
	{
		$data = array(
			"descr"=> $this->input->post("txtDescr"),
			'about_img'	=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
			"user_create"=> $this->userCrea,
			"date_create"=> date("Y-m-d")
			);
		$row=$this->db->insert("tbl_about", $data);
		if($row==TRUE){return TRUE;}
	}

	public function edit($id="")
	{	
		if($this->input->post("txtImgName")!=""){
			$data = array(
				$data = array(
				"	descr"=> $this->input->post("txtDescr"),
				"user_create"=> $this->userCrea,
				"date_create"=> date("Y-m-d")
				)
			);
		}else{
			$data = array(
			"	descr"=> $this->input->post("txtDescr"),
			'about_img'	=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
			"user_create"=> $this->userCrea,
			"date_create"=> date("Y-m-d")
			);
		}
		$this->db->where("id",$id);
		$row=$this->db->update("tbl_about", $data);
		if($row==TRUE){return TRUE;}
	}	
	public function delete($id)
	{
		if($id==TRUE)
		{
			$this->db->where("id",$id);
			$query=$this->db->delete("tbl_about");
			if($query==TRUE){return $query;}
		}
	}

}// this Class