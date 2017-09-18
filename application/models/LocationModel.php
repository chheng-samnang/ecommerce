<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class LocationModel extends CI_Model
{
	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"Admin";
	}

	function get_location($id="")
	{
		if($id!="")
		{
			$query = $this->db->get_where("tbl_location",array("loc_id"=>$id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}
		}else
		{
			$query = $this->db->get("tbl_location");
			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}
	}

	function insert_location()
	{
		$data = array(
						'loc_name'	=>	$this->input->post('txtLocationName'),
						'loc_desc'	=>	$this->input->post('txtDesc'),
						'user_crea'	=>	$this->userCrea,
						'date_crea'	=>	date('Y-m-d')
			);
		$this->db->insert('tbl_location',$data);
	}

	function delete_location($id)
	{
		$this->db->delete("tbl_location",array('loc_id'=>$id));
	}
	function update_location($id)
	{
		$data = array(
						'loc_name'	=>	$this->input->post('txtLocationName'),
						'loc_desc'	=>	$this->input->post('txtDesc')
			);
		$this->db->where('loc_id',$id);
		$this->db->update('tbl_location',$data);
	}
}
?>