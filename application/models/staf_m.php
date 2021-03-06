<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Staf_m extends CI_Model
{
	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"Admin";
	}
	public function index($id=""){
		if($id==""){
			$query =$this->db->query("SELECT st_id,st_code,mem_name,stf_status,descr,acc.acc_id,acc_img,acc_type,str_name,user_create,date_create FROM tbl_staf AS st INNER JOIN tbl_account AS acc ON st.acc_id= acc.acc_id INNER JOIN
			tbl_member AS mb ON acc.mem_id=mb.mem_id LEFT JOIN tbl_store AS str ON str.acc_id=acc.acc_id ORDER BY st_id DESC");
			if($query->num_rows()>0){
			return $query->result();}
		}else{
			$query =$this->db->query("SELECT st_id,st_code,mem_name,stf_status,descr,acc.acc_id,acc_img,acc_type,str_name,staf_password,user_create,date_create FROM tbl_staf AS st INNER JOIN tbl_account AS acc ON st.acc_id= acc.acc_id INNER JOIN
			tbl_member AS mb ON acc.mem_id=mb.mem_id LEFT JOIN tbl_store AS str ON str.acc_id=acc.acc_id WHERE st_id='$id'");
			if($query->num_rows()>0){
			return $query->row();}
		}
	}
	public function change_password(){
		$data=array(
			"staf_password"=>$this->input->post("txtPassword"),
			);
		$this->db->where("st_id",$this->input->post("txtSt_id"));
		$row=$this->db->update("tbl_staf",$data);
		if($row){return TRUE;}
	}
	public function insertStaf(){
		$data = array(
					'st_code'	=>	$this->input->post('txtCode'),
					'descr'		=>	$this->input->post('terDescr'),
					'str_id'	=>	$this->input->post('ddlStore'),
					'stf_status'=>	'0',
					'acc_id'	=>	$this->input->post('ddlStaf'),
					'staf_password'	=>	$this->input->post("txtPassword"),
					'user_create'	=>	$this->session->acc_id,
					'date_create'	=>	date('Y-m-d')
			);
		$row=$this->db->insert('tbl_staf',$data);
		if($row==TRUE){return TRUE;}
	}

	public function edit($id=""){
		$data=array(
			'descr'		=>	$this->input->post('terDescr'),
			'stf_status'=>	$this->input->post('ddlStatus'),
			'acc_id'	=>	$this->input->post('ddlStaf'),);
		$this->db->where("st_id",$this->input->post("st_id"));
		$row=$this->db->update("tbl_staf",$data);
		if($row){return TRUE;}
	}
	public function edit_status($id=""){
		$data=array(
		'stf_status'=>	$this->input->post('ddlStatus'));
		$this->db->where("st_id",$id);
		$row=$this->db->update("tbl_staf",$data);
		if($row){return TRUE;}
	}

	function get_account()
	{
		$query = $this->db->query("SELECT acc_id,mem_name FROM tbl_account a INNER JOIN tbl_member m ON a.mem_id=m.mem_id WHERE acc_type='General'");
		if($query->num_rows()>0)
		{ return $query->result();}
	}

	function staf_code(){
		$query = $this->db->query('SELECT * FROM tbl_staf ORDER BY st_id DESC');
		if($query->num_rows()>0){
		 return $query->row();}
	}

	function delete_account($id)
	{
		$this->db->where('acc_id',$id);
		$this->db->delete('tbl_account');
		$this->db->where('acc_id',$id);
		$this->db->delete('tbl_product');
	}

	function get_store()
	{
		$query = $this->db->get('tbl_store');
		if($query->num_rows()>0)
		{
			return $query->result();
		}else{
			return array();
		}
	}

	function validateStaff($user="",$pwd="",$str_id="")
	{
		if($user!=""&&$pwd!=""&&$str_id!="")
		{
			$query = $this->db->query("");
			if($query->num_rows()>0)
			{
				return true;
			}else{
				return false;
			}
		}
	}
}
?>
