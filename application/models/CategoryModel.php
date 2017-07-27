<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class CategoryModel extends CI_Model
{
	var $userCrea,$userUpdt;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"Admin";
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
			$query = $this->db->get('tbl_category');
			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}
	}

	function insertCategory()
	{
		$data = array(
						'cat_name'		=>	$this->input->post('txtCatName'),
						'cat_name_kh'	=>	$this->input->post('txtCatNameKh'),
						'cat_name_ch'	=>	$this->input->post('txtCatNameCh'),
						'cat_desc'		=>	$this->input->post('txtDesc'),
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