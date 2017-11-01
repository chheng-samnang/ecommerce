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
		$query=$this->db->query("SELECT DISTINCT c.com_code,c.com_id,a.`company` AS Shop,ac.`company` AS Supplier,c.`user_crea`,c.`date_crea` FROM tbl_combind c
														INNER JOIN tbl_combind_det cd ON c.com_id=cd.`com_id`
														INNER JOIN tbl_account a ON c.`bus_id`=a.`acc_id`
														INNER JOIN tbl_account ac ON c.`shop_id`=ac.`acc_id`
														");
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

	public function generateCode()
	{
		$query = $this->db->query("SELECT IFNULL(MAX(com_code),0) as com_code from tbl_combind");
		if($query->row()->com_code=="0")
		{
			return "com000001";
		}else{
			$tmp = substr($query->row()->com_code,0,3)+1;
			return $result = "com".str_pad($tmp,6,"0",STR_PAD_LEFT);
		}
	}

	public function add($json=""){
		$com_code = $this->generateCode();
		$data1 = array(
										"com_code"	=>	$com_code,
										"shop_id"	=>	$this->input->post("ddlShop_Owner"),
										"bus_id"	=>	$this->input->post("ddlSupllyer"),
										"user_crea"	=>	$this->session->acc_id,
										"date_crea"	=> date("Y-m-d")
		);
		$result = $this->db->insert("tbl_combind",$data1);
		if($result){
			$this->db->select("com_id");
			$query = $this->db->get_where("tbl_combind",array("com_code"=>$com_code));
			$com_id = $query->row()->com_id;
			if($com_id!=null)
			{
				for($i=0;$i<count($json);$i++)
				{
					$data=array(
									"com_id"=>$com_id,
									"p_id"=>$json[$i][1],
									"status"=>"1",
								);
					$query=$this->db->insert("tbl_combind_det",$data);#insert pro_detial
				}
				if($query==TRUE){ return TRUE; }
			}
		}else{
			return false;
		}
	}

	public function editProduct($json="",$id="")
	{
			if($json!=null&&$id!="")
			{
				$this->db->where("com_id",$id);
				$query = $this->db->delete("tbl_combind_det");
				if($query)
				{
					foreach ($json as $key => $value) {
						$data = array(
													"com_id"	=>	$id,
													"p_id"	=>	$value->P_id,
													"status"	=>	1
						);
						$result = $this->db->insert("tbl_combind_det",$data);
					}
					if($result){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
	}

	public function deleteProduct($id)
	{
		$this->db->where("com_id",$id);
		$query = $this->db->delete("tbl_combind_det");
		if($query)
		{
			$this->db->where("com_id",$id);
			$query2 = $this->db->delete("tbl_combind");
			if($query2)
			{
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}// this Class
