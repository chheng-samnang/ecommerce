<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class StockModel extends CI_Model
{
	var $str_id,$userCrea;
	function __construct()
	{
		parent::__construct();
		$this->str_id = isset($this->session->str_id)?$this->session->str_id:'1';
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:'Admin';
	}

	function get_stock($id="")
	{
		if($id=="")
		{
			$query = $this->db->query("SELECT s.p_id,p_name,qty,stk_type,stk_desc,s.user_crea,s.date_crea FROM tbl_stock s INNER JOIN tbl_product p ON s.p_id=p.p_id ORDER BY stk_id DESC");
			
			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}else
		{
			$query = $this->db->query("SELECT s.p_id,p_name,qty,stk_type,stk_desc,s.user_crea,s.date_crea FROM tbl_stock s INNER JOIN tbl_product p ON s.p_id=p.p_id where s.p_id=$id and s.str_id='$this->str_id'");
			if($query->num_rows()>0)
			{
				return $query->row();
			}
		}
	}

	function get_product()
	{
		$this->db->select('p_id,p_name');
		$query = $this->db->get('tbl_product');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}

	function insert_stock()
	{
		$data = array(
						'p_id'	=>	$this->input->post('ddlProduct'),
						'str_id'=>	$this->str_id,
						'qty'	=>	$this->input->post('txtQty'),
						'stk_type'	=>	$this->input->post('ddlType'),
						'stk_desc'	=>	$this->input->post('txtDesc'),
						'user_crea'	=>	$this->userCrea,
						'date_crea'	=>	date('Y-m-d')
			);
		$query=$this->db->insert('tbl_stock',$data);
		if($query){return $query;}
	}

	function update_stock($id)
	{
		$data = array(
						'p_id'	=>	$this->input->post('ddlProduct'),
						'str_id'	=>	$this->str_id,
						'qty'	=>	$this->input->post('txtQty') + $this->input->post('txtQtyNew'),
						'stk_type'	=>	$this->input->post('ddlType'),
						'stk_desc'	=>	$this->input->post('txtDesc'),
						'user_crea'	=>	$this->userCrea,
						'date_crea'	=>	date('Y-m-d')
			);
		$this->db->where('p_id',$id);
		$this->db->update("tbl_stock",$data);
	}

	function delete_stock($id)
	{
		$this->db->where('p_id',$id);
		$this->db->delete('tbl_stock');
	}
}

?>