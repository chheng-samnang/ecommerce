<?php
class Order_hdr_m extends CI_Model
{			
	private $userLog="admin";	
	public function __construct()
	{
		parent::__construct();				
	}
	public function index($id="")
	{
		if($id=="")
		{			
			$query=$this->db->query("SELECT ord_id,ord_code,ord_date,m.mem_id,m.mem_name,ord_status FROM tbl_order_hdr AS hdr JOIN tbl_member AS m ON hdr.mem_id=m.mem_id ORDER BY ord_id DESC");
			$result=$query->result();
			if($result){return $result;}
		}
		else
		{
			$this->db->where("mem_id",$id);
			$query=$this->db->get("tbl_member");
			$result=$query->row();
			if($result){return $result;}
		}
	}	
}
?>