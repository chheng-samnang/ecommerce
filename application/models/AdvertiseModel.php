<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class AdvertiseModel extends CI_Model
{
	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
	}

	function get_advertise($id="")
	{
		if($id=="")
		{
			$query = $this->db->get("tbl_advertisement");
			if($query->num_rows()>0)
			{
				return $query->result();
			}else
			{
				return array();
			}
		}else
		{
			$query = $this->db->get_where("tbl_advertisement",array("ad_id"=>$id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}else
			{
				return array();
			}
		}
	}

	function get_marquee($id="")
	{
		// $query = $this->db->query("SELECT * FROM tbl_sysdata");
		// return $query->result();

		if($id!='')
		{
			$query = $this->db->get_where('tbl_sysdata',array('key_id'=>$id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}
		}else
		{
			$query = $this->db->query('SELECT * FROM tbl_sysdata LIMIT 1');
			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}
	}

	function deleteaMrquee($id)
	{

		$this->db->delete("tbl_sysdata",array("key_id"=>$id));
	}

	function insert_marquee()
	{
		$data = array(
						"key_data1" => $this->input->post("txtDesc")
			);
		$this->db->insert("tbl_sysdata", $data);
	}

	function update_marquee($id)
	{
		$data = array(
						"key_data1" => $this->input->post("txtDesc")
			);
		$this->db->where("key_id", $id);	
		$this->db->update("tbl_sysdata", $data);	
	}

	function insert_advertise()
	{
		$data = array(
						"ad_name"	=>	$this->input->post("txtAdName"),
						"ad_desc"	=>	$this->input->post("txtDesc"),
						"img"		=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"url"		=>	$this->input->post("txtUrl"),
						"advertiser"=>	$this->input->post("txtAdvertiser"),
						"position"	=>	$this->input->post("ddlPosition"),
						"price"		=>	$this->input->post("txtPrice"),
						"page"		=>	$this->input->post("txtPage"),
						"height"	=>	$this->input->post("txtHeight"),
						"user_crea"	=>	$this->userCrea,
						"date_crea"	=>	date("Y-m-d")
			);
		$this->db->insert("tbl_advertisement",$data);
	}

	function update_advertise($id)
	{
		if($this->input->post('txtImgName')=="")
		{
			$data = array(
						"ad_name"	=>	$this->input->post("txtAdName"),
						"ad_desc"	=>	$this->input->post("txtDesc"),
						"url"		=>	$this->input->post("txtUrl"),
						"advertiser"=>	$this->input->post("txtAdvertiser"),
						"position"	=>	$this->input->post("ddlPosition"),
						"price"		=>	$this->input->post("txtPrice"),
						"page"		=>	$this->input->post("txtPage"),
						"height"	=>	$this->input->post("txtHeight"),
						"user_updt"	=>	$this->userCrea,
						"date_updt"	=>	date("Y-m-d")
			);
		}
		else
		{
			$data = array(
						"ad_name"	=>	$this->input->post("txtAdName"),
						"ad_desc"	=>	$this->input->post("txtDesc"),
						"img"		=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"url"		=>	$this->input->post("txtUrl"),
						"advertiser"=>	$this->input->post("txtAdvertiser"),
						"position"	=>	$this->input->post("ddlPosition"),
						"price"		=>	$this->input->post("txtPrice"),
						"page"		=>	$this->input->post("txtPage"),
						"height"	=>	$this->input->post("txtHeight"),
						"user_updt"	=>	$this->userCrea,
						"date_updt"	=>	date("Y-m-d")
			);
		}
		$this->db->where("ad_id",$id);
		$this->db->update("tbl_advertisement",$data);
	}

	function delete_advertise($id)
	{
		$this->db->delete("tbl_advertisement",array("ad_id"=>$id));
	}

}