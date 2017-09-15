<?php
class Owner_product_m extends CI_Model
{			
	var $userCrea;
	var $str;	
	public function __construct()
	{
		parent::__construct();
		$this->str = isset($this->session->str)?$this->session->str:"1";
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}

	public function index($id="")
	{
		if($id=="")
		{			
			$query=$this->db->query("SELECT det.*,pro_name,pro_type,date_from,date_to,p_name,occ_name,cat.cat_name,path FROM tbl_promotion_det AS det JOIN tbl_promotion AS pro ON det.pro_id=pro.pro_id LEFT JOIN tbl_promotion_occasion AS occ ON pro.occ_id=occ.occ_id LEFT JOIN tbl_media AS me ON det.p_id=me.p_id JOIN tbl_product AS p ON det.p_id=p.p_id JOIN tbl_category AS cat ON pro.cat_id=cat.cat_id WHERE pro.status=1");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query=$this->db->query("SELECT det.*,pro_name,pro_type,date_from,date_to,p_name,occ_name,cat.cat_name,path FROM tbl_promotion_det AS det JOIN tbl_promotion AS pro ON det.pro_id=pro.pro_id LEFT JOIN tbl_promotion_occasion AS occ ON pro.occ_id=occ.occ_id LEFT JOIN tbl_media AS me ON det.p_id=me.p_id JOIN tbl_product AS p ON det.p_id=p.p_id JOIN tbl_category AS cat ON pro.cat_id=cat.cat_id WHERE pro.status=1 AND pro_det_id={$id}");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	
	public function add_product()
	{	
		$json=json_decode($this->input->post("str"));					
		if(count($json)>0)
		{			
			for($i=0;$i<count($json);$i++)
			{	
				$data=array(	
								"p_id"=>$json[$i][0],					
								"acc_id"=>$this->input->post("acc_id"),
								"shop_owner_status"=>$json[$i][6],
								"price"=>$json[$i][5],
								"store_qty"=>$json[$i][7],
							);
				$row=$this->db->insert("tbl_shop_owner_product",$data);#insert pro_detial
				if($row==TRUE){ return TRUE;}	
			}						
		}																				
	}	
}
?>