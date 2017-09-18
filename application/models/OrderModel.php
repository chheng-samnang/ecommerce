<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class OrderModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function get_member()
	{
		$query = $this->db->get("tbl_member");
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}

	function generate_order_code()
	{
		$query = $this->db->query("SELECT IFNULL(MAX(ord_code),0) AS ord_code FROM tbl_order_hdr");

		$result = "";
		if($query->num_rows()>0&&$query->row()->ord_code=="0")
		{
			$result = "ord0000001";
		}else
		{
			$tmp = $query->row()->ord_code;
			$tmp = intval(substr($tmp,3,strlen($tmp)-3))+1;
			$result = "ord".str_pad($tmp,7,"0",STR_PAD_LEFT);
		}

		return $result;
	}
}
?>