<?php
class Main_m extends CI_Model
{					
	public function __construct()
	{
		parent::__construct();						
	}
	public function index()
	{
		$query=$this->db->query("SELECT COUNT(str_id) AS value FROM tbl_store");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function stock()
	{
		$query=$this->db->query("SELECT COUNT(stk_id) AS value FROM tbl_stock");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function inventory()
	{
		$query=$this->db->query("SELECT COUNT(inv_id) AS value FROM tbl_inventories");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function order()
	{
		$query=$this->db->query("SELECT COUNT(ord_id) AS value FROM tbl_order_hdr WHERE ord_status='order'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function member()
	{
		$query=$this->db->query("SELECT COUNT(mem_id) AS value FROM tbl_member");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function new_member(){
		$query=$this->db->query("SELECT COUNT(mem_id) AS value FROM tbl_member WHERE mem_status='2'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function account()
	{
		$query=$this->db->query("SELECT COUNT(acc_id) AS value FROM tbl_account");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function get_cat_pro()
	{
		$query = $this->db->query("SELECT cat_name as label,SUM(ordt.qty) as y FROM tbl_category AS cat LEFT JOIN tbl_product AS pr ON cat.cat_id=pr.cat_id LEFT JOIN tbl_order_det AS ordt ON pr.p_id=ordt.p_id");
		if($query==TRUE){return $query->result();}
	}

	public function get_pro($cat_id=""){
		$query=$this->db->query("SELECT COUNT(p_id) AS value FROM tbl_product WHERE cat_id='$cat_id'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}

	public function get_order(){
		
		$query =$this->db->query("SELECT * FROM `tbl_order_hdr` AS od INNER JOIN `tbl_order_det` AS odt ON od.ord_code=odt.ord_code LEFT JOIN `tbl_member`AS mem ON od.mem_id=mem.mem_id LEFT JOIN `tbl_product` AS pr ON odt.p_id=pr.p_id WHERE ord_status='order'");
		if($query->num_rows()>0){return $query->result();}
	}
}
?>