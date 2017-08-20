<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class InventoryModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_inventory($id="")
	{
		if($id=="")
		{
			$this->db->select("p_code,p_name,path,date_release,p_status,tbl_product.p_id");
			$this->db->from("tbl_product");
			$this->db->join("tbl_media","tbl_product.p_id=tbl_media.p_id","left");
			$this->db->where("p_type","inventory");
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result();
			}else
			{
				return array();
			}
		}else
		{
			$arr = array("p_type"=>"inventory","tbl_product.p_id"=>$id);
			$this->db->select("*");
			$this->db->from("tbl_product");
			$this->db->join("tbl_media","tbl_product.p_id=tbl_media.p_id","left");
			$this->db->where($arr);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->row();
			}else
			{
				return array();
			}
		}
	}

	public function generateItemCode()
	{
		$result = "";
		$query = $this->db->query("select ifnull(max(p_code),0) as p_code from tbl_product where p_type='inventory'");
		if($query->num_rows()>0&&$query->row()->p_code=="0")
		{
			$result = "inv0000001";
		}else
		{
			$p_code = $query->row()->p_code;
			$result = intval(substr($p_code,3,strlen($p_code)-3))+1;
			$result = "inv".str_pad($result,7,"0",STR_PAD_LEFT);
		}
		return $result;
	}

	public function get_store()
	{
		$this->db->select("str_id,str_name");
		$query = $this->db->get("tbl_store");
		if($query->num_rows()>0)
		{
			return $query->result();
		}else
		{
			return array();
		}
	}

	public function get_category()
	{
		$this->db->select("cat_id,cat_name");
		$query = $this->db->get("tbl_category");
		if($query->num_rows()>0)
		{
			return $query->result();
		}else
		{
			return array();
		}
	}

	public function get_brand()
	{
		$this->db->select("brn_id,brn_name");
		$query = $this->db->get("tbl_brand");
		if($query->num_rows()>0)
		{
			return $query->result();
		}else
		{
			return array();
		}
	}
	public function add_inventory()
	{
		$img = $this->input->post("txtImgName");
		$data = array(
						"p_code"	=>	$this->input->post("txtInvCode"),
						"acc_id"	=>	$this->input->post("ddlAccount"),
						"str_id"	=>	$this->input->post("ddlStore"),
						"brn_id"	=>	$this->input->post("ddlBrand"),
						"cat_id"	=>	$this->input->post("ddlCat"),
						"p_name"	=>	$this->input->post("txtInvName"),
						"p_desc"	=>	$this->input->post("txtDesc"),
						"price"		=>	$this->input->post("txtPrice"),
						"color"		=>	$this->input->post("txtColor"),
						"size"		=>	$this->input->post("txtSize"),
						"model"		=>	$this->input->post("txtModel"),
						"date_release"	=>	$this->input->post("txtDateRelease"),
						"dimension"	=>	$this->input->post("txtDimension"),
						"p_type"	=>	"inventory",
						"p_status"	=>	$this->input->post("ddlStatus"),
						"user_crea"	=>	$this->session->memLogin,
						"date_crea"	=>	date("Y-m-d")

			);

		$query=$this->db->insert("tbl_product",$data);
		if($query==TRUE){return TRUE;}

		if($img!="")
		{			
		    $id = $this->get_inventory_id($this->input->post("txtInvCode"));
			$data = array(
							'p_id'	=>	$id,
							'path'	=>	$img,
							'media_type'	=>	'inventory',
							'user_crea'	=>	$this->session->memLogin,
							'date_crea'	=>	date("Y-m-d")
			);
			$this->db->insert("tbl_media",$data);
		}
	}

	public function get_inventory_id($p_code)
	{
		$query = $this->db->get_where("tbl_product",array("p_code"=>$p_code));
		if($query->num_rows()>0)
		{
			return $query->row()->p_id;
		}else
		{
			return array();
		}
	}
	public function updateInventory($id)
	{
		$data = array(
						'acc_id'	=>	$this->input->post("ddlAccount"),
						'str_id'	=>	$this->input->post("ddlStore"),
						'cat_id'	=>	$this->input->post("ddlCat"),
						'brn_id'	=>	$this->input->post("ddlBrand"),
						'p_name'	=>	$this->input->post("txtInvName"),
						'p_desc'	=>	$this->input->post("txtDesc"),
						'price'	=>	$this->input->post("txtPrice"),
						'color'	=>	$this->input->post("txtColor"),
						'size'	=>	$this->input->post("txtSize"),
						'model'	=>	$this->input->post("txtModel"),
						'date_release'	=>	$this->input->post("txtDateRelease"),
						'dimension'	=>	$this->input->post("txtDimension"),
						'p_status'	=>	$this->input->post("ddlStatus"),
						'user_crea'	=>	$this->session->memLogin,
						'date_crea'	=>	date("Y-m-d")
			);

		$this->db->where("p_id",$id);
		$this->db->update("tbl_product",$data);

		echo $img = $this->input->post("txtImgName");
		if($img!="")
		{
			$data = array(
							'path'	=>	$img,
							'user_updt'	=>	$this->session->memLogin,
							'date_updt'	=>	date("Y-m-d")
				);
			$this->db->where("p_id",$id);
			$this->db->update("tbl_media",$data);
		}
	}

	public function deleteInventory($id)
	{
		$this->db->where("p_id",$id);
		$this->db->delete("tbl_product");
	}
}