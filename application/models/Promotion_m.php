<?php
class Promotion_m extends CI_Model
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
	public function product_cat()
	{		
		$query=$this->db->get("tbl_category");
		if($query->num_rows()>0){return $query->result();}		
	}
	public function pro_occasion()
	{		
		$query=$this->db->get("tbl_promotion_occasion");
		if($query->num_rows()>0){return $query->result();}		
	}	
	public function add_promotion()
	{
		$pro_id=uniqid();
		$data1=array
					(
						"pro_id"=>$pro_id,
						//"str_id"=>$this->session->userdata["promotion"][6],
						"date_from"=>$this->session->userdata["promotion"][0],
						"date_to"=>$this->session->userdata["promotion"][1],
						"cat_id"=>$this->session->userdata["promotion"][2],
						"occ_id"=>$this->session->userdata["promotion"][3],
						"pro_name"=>$this->session->userdata["promotion"][4],
						"pro_type"=>$this->session->userdata["promotion"][5],
						"status"=>"1"
					);
		$json=json_decode($this->input->post("str"));					
		if(count($json)>0)
		{	
			$this->db->insert("tbl_promotion",$data1);#insert pro
			if(count($json[0])==4)
			{
				for($i=0;$i<count($json);$i++)
				{	
					$data=array(	
									"pro_id"=>$pro_id,
									"p_id"=>$json[$i][0],
									"discount_percent"=>$json[$i][3]
								);
					$this->db->insert("tbl_promotion_det",$data);#insert pro_detial							
				}
			}
			else
			{
				for($i=0;$i<count($json);$i++)
				{	
					$data=array(	
									"pro_id"=>$pro_id,
									"p_id"=>$json[$i][0],									
									"qty_buy"=>$json[$i][3],
									"item_free"=>$json[$i][6],
									"qty_free"=>$json[$i][5]
								);
					$this->db->insert("tbl_promotion_det",$data);#insert pro_detial		
					
				}
			}						
		}																				
	}	

	public function get_store()
	{
		$query = $this->db->query("SELECT * FROM tbl_store");
		return $query->result();
	}
	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("pro_det_id",$id);
			$query=$this->db->delete("tbl_promotion_det");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>