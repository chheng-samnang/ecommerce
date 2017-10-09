<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Combind_product_m extends CI_Model
{
	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
	}

	public function index($id="")
	{	
		$query=$this->db->query("SELECT p_code,p.p_id,mem_name,med.path,acc_type,price,cat_name,p_name FROM tbl_combind AS com INNER JOIN tbl_account AS acc ON com.shop_id=acc.acc_id INNER JOIN  tbl_member AS mb ON acc.mem_id=mb.mem_id 
		INNER JOIN tbl_product AS p ON com.p_id=p.p_id INNER JOIN tbl_media AS med ON p.p_id=med.p_id INNER JOIN tbl_category AS cat ON p.cat_id=cat.cat_id");
		if($query->num_rows()>0)
		{ return $query->result();}
	}	
	public function get_account(){
		$query = $this->db->query("SELECT acc_type,acc_id,m.mem_id,mem_name FROM tbl_member AS m INNER JOIN tbl_account AS a ON m.mem_id=a.mem_id");
		if($query->num_rows()>0)
		{ return $query->result();}
	}
	public function combind_detail($id=""){

		$query=$this->db->query("SELECT p_code,p.p_id,mem_name,med.path,acc_type,price,cat_name,p_name,cat_name,str_name,qty,short_desc,p_desc,brn_name,color,size,model,date_release,dimension FROM tbl_combind AS com INNER JOIN tbl_account AS acc ON com.shop_id = acc.acc_id 
		INNER JOIN tbl_product AS p ON com.p_id = p.p_id INNER JOIN tbl_media AS med ON p.p_id=med.p_id INNER JOIN tbl_category AS cat ON p.cat_id=cat.cat_id LEFT JOIN tbl_store AS st ON acc.acc_id=st.acc_id
		INNER JOIN tbl_stock AS stk ON stk.p_id=p.p_id INNER JOIN tbl_member AS mb ON acc.mem_id=mb.mem_id LEFT JOIN tbl_brand AS br ON p.brn_id=br.brn_id
		WHERE com.p_id='$id'");
		if($query->num_rows()>0)
		{ return $query->row();}

	}
	public function get_supply($id=""){
		$query = $this->db->query("SELECT mem_name FROM tbl_combind AS com INNER JOIN tbl_account AS acc ON acc.acc_id=com.bus_id INNER JOIN tbl_member AS mb ON acc.mem_id=mb.mem_id WHERE com.p_id='$id'");
		if($query->num_rows()>0){ return $query->row();}
	}	
	public function add($json=""){
		for($i=0;$i<count($json);$i++)
		{	
			$data=array(	
							"p_id"=>$json[$i][1],	
							"shop_id"=>$this->input->post("ddlShop_Owner"),
							"bus_id"=>$this->input->post("ddlSupllyer"),						
						);
			$query=$this->db->insert("tbl_combind",$data);#insert pro_detial	
			if($query==TRUE){ return TRUE; }
		}
	}
}// this Class