<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Sup_category_m extends CI_Model
{
	var $userCrea,$userUpdt;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"Admin";
	}	
	public function index($cat_id=""){
		if($cat_id!='')
		{
			$query = $this->db->get_where('tbl_category',array('cat_id'=>$cat_id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}
		}else
		{
			$query = $this->db->query("SELECT * FROM tbl_category WHERE parent_id!=''");
			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}
	}
	function get_category($cat_id='')
	{
		if($cat_id!='')
		{
			$query = $this->db->get_where('tbl_category',array('cat_id'=>$cat_id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}
		}else
		{
			$query = $this->db->query("SELECT * FROM tbl_category WHERE NOT parent_id!='' ");
			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}
	}

	function add_sup_category()
	{
		$data = array(
						'cat_name'		=>	$this->input->post('txtCatName'),
						'cat_name_kh'	=>	$this->input->post('txtCatNameKh'),
						'cat_name_ch'	=>	$this->input->post('txtCatNameCh'),
						'cat_desc'		=>	$this->input->post('txtDesc'),
						'parent_id'     =>	$this->input->post("ddlCategoryId"),
						'user_crea'		=>	$this->userCrea,
 						'date_crea'		=>	date('Y-m-d')
			);
		$this->db->insert('tbl_category',$data);
	}

	function Update($id)
	{
		$data = array(
						'cat_name'		=>	$this->input->post('txtCatName'),
						'cat_name_kh'	=>	$this->input->post('txtCatNameKh'),
						'cat_name_ch'	=>	$this->input->post('txtCatNameCh'),
						'cat_desc'		=>	$this->input->post('txtDesc'),
						'user_crea'		=>	$this->userCrea,
						'date_crea'		=>	date('Y-m-d')
		);
		$this->db->where("cat_id", $id);
		$this->db->update('tbl_category',$data);
	}

	function deleteCategory($id)
	{
		$this->db->delete("tbl_category",array("cat_id"=>$id));
	}
}
?>