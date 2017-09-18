<?php
class Promotion_occasion_m extends CI_Model
{			
	var $userCrea;
	public function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{
			$this->db->order_by('occ_id', 'DESC');
			$query=$this->db->get("tbl_promotion_occasion");
			$result=$query->result();
			if($result){return $result;}
		}
		else
		{
			$this->db->where("occ_id",$id);
			$query=$this->db->get("tbl_promotion_occasion");
			$result=$query->row();
			if($result){return $result;}
		}
	}
	public function add()
	{
		$data= array(
						"occ_name" => $this->input->post("txtOccName"),																												
						"occ_desc" => $this->input->post("txtDesc"),
						"user_crea" => $this->userCrea,
						"date_crea" => date('Y-m-d')													
						 );
		$query=$this->db->insert("tbl_promotion_occasion",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			$data= array(
						"occ_name" => $this->input->post("txtOccName"),																												
						"occ_desc" => $this->input->post("txtDesc"),
						"user_updt" => $this->userCrea,
						"date_updt" => date('Y-m-d')																				
						 );
			$this->db->where("occ_id",$id);
			$query=$this->db->update("tbl_promotion_occasion",$data);
			if($query==TRUE){return $query;}
		}		
	}
	public function delete($id)
	{
		if($id==TRUE)
		{			
			$this->db->where("occ_id",$id);
			$query=$this->db->delete("tbl_promotion_occasion");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>