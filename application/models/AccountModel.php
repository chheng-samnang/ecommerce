<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class AccountModel extends CI_Model
{
	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"Admin";
	}

	function loadMember()
	{
		$this->db->select('mem_id,mem_name');
		$query = $this->db->get('tbl_member');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	function get_account($id="")
	{
		if($id!="")
		{
			$query = $this->db->get_where("tbl_account",array("acc_id"=>$id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}
		}else
		{
			$query = $this->db->query('SELECT acc_code,mem_name,status,sex,acc_type,acc_img,acc_id FROM tbl_account a INNER JOIN tbl_member m ON a.mem_id=m.mem_id');

			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}
	}
	function insert_account()
	{
		$data = array(
					'acc_code'	=>	$this->input->post('txtAccCode'),
					'acc_password'	=>	$this->input->post('txtPassword'),
					'mem_id'	=>	$this->input->post('ddlMember'),
					'sex'	=>	$this->input->post('ddlGender'),
					'dob'	=>	$this->input->post('txtDob'),
					'pob'	=>	$this->input->post('txtPob'),
					'status'	=>	$this->input->post('ddlStatus'),
					'acc_type'	=>	$this->input->post('ddlAccType'),
					'acc_img'	=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
					'company'	=>	$this->input->post('txtCompany'),
					'position'	=>	$this->input->post('txtPosition'),
					'contact_phone'	=>	$this->input->post('txtContact'),
					'loc_id'	=>	$this->input->post('ddlLocation'),
					'user_crea'	=>	$this->userCrea,
					'date_crea'	=>	date('Y-m-d')
			);
		$this->db->insert('tbl_account',$data);
	}
	public function changpassword()
	{ 	$id=$this->input->post("acc_id");
		if($id!=""){
			$data= array('acc_password'=>	$this->input->post('newpassword'));
			$this->db->where('acc_id',$id);
			$query=$this->db->update('tbl_account',$data);
			if($query){return true;}
		}
	}
	function update_model($id)
	{
		if(!empty($this->input->post('txtImgName')))
		{
			$data = array(
						'acc_code'	=>	$this->input->post('txtAccCode'),
						'mem_id'	=>	$this->input->post('ddlMember'),
						'sex'	=>	$this->input->post('ddlGender'),
						'dob'	=>	$this->input->post('txtDob'),
						'pob'	=>	$this->input->post('txtPob'),
						'status'	=>	$this->input->post('ddlStatus'),
						'acc_type'	=>	$this->input->post('ddlAccType'),
						'acc_img'	=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						'company'	=>	$this->input->post('txtCompany'),
						'position'	=>	$this->input->post('txtPosition'),
						'contact_phone'	=>	$this->input->post('txtContact'),
						'loc_id'	=>	$this->input->post('ddlLocation'),
						'user_updt'	=>	$this->userCrea,
						'date_updt'	=>	date('Y-m-d')
					);
		}else
		{
			$data = array(
						'acc_code'	=>	$this->input->post('txtAccCode'),
						'mem_id'	=>	$this->input->post('ddlMember'),
						'sex'	=>	$this->input->post('ddlGender'),
						'dob'	=>	$this->input->post('txtDob'),
						'pob'	=>	$this->input->post('txtPob'),
						'status'	=>	$this->input->post('ddlStatus'),
						'acc_type'	=>	$this->input->post('ddlAccType'),
						'company'	=>	$this->input->post('txtCompany'),
						'position'	=>	$this->input->post('txtPosition'),
						'contact_phone'	=>	$this->input->post('txtContact'),
						'loc_id'	=>	$this->input->post('ddlLocation'),
						'user_updt'	=>	$this->userCrea,
						'date_updt'	=>	date('Y-m-d')
					);
		}
		$this->db->where('acc_id',$id);
		$this->db->update('tbl_account',$data);
	}
	function member(){
		
	}
	function delete_account($id)
	{
		$this->db->where('acc_id',$id);
		$this->db->delete('tbl_account');
		$this->db->where('acc_id',$id);
		$this->db->delete('tbl_product');
	}
}
?>