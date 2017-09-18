<?php
class Store_m extends CI_Model
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
			$query=$this->db->query("SELECT str_id,str_code,acc.acc_id,mem_name,acc_code,str_name,str_type,str_desc,str_img,str.user_crea,str.date_crea,str.user_updt,str.date_updt FROM tbl_store AS str JOIN tbl_account AS acc ON str.acc_id=acc.acc_id JOIN tbl_member AS mem ON acc.mem_id=mem.mem_id ORDER BY str.str_id DESC");
			$result=$query->result();
			if($result){return $result;}
		}
		else
		{			
			$query=$this->db->query("SELECT str_id,str_code,acc.acc_id,mem_name,str_name,str_type,str_desc,str_img,str.user_crea,str.date_crea,str.user_updt,str.date_updt FROM tbl_store AS str JOIN tbl_account AS acc ON str.acc_id=acc.acc_id JOIN tbl_member AS mem ON acc.mem_id=mem.mem_id WHERE str_id='{$id}'");
			$result=$query->row();
			if($result){return $result;}
		}
	}
	public function select_account()
	{		
		$query=$this->db->query("SELECT CONCAT(mem.mem_name,' Code=',acc.acc_code) as mem_name,acc.acc_id FROM tbl_account AS acc JOIN tbl_member AS mem ON acc.mem_id=mem.mem_id");
			$result=$query->result();
			if($result){return $result;}
	}
	public function add()
	{	
		$acc_id=$this->input->post("ddlAccCode");
		$this->db->where("acc_id",$acc_id);
		$query=$this->db->get("tbl_store");
		$result=$query->row();		
		if($acc_id==$result->acc_id){return FALSE;}
		else
		{
			$data= array(
						"str_code" => $this->input->post("txtStrCode"),
						"acc_id" => $this->input->post("ddlAccCode"),
						"str_name" => $this->input->post("txtStrName"),
						"str_name" => $this->input->post("txtStrName"),
						"str_type" => $this->input->post("txtStrType"),
						"str_desc" => $this->input->post("txtDesc"),						
						"str_img" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",					
						"user_crea" => $this->userLog,
						"date_crea" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_store",$data);		
		if($query){return $query;}
		}		
	}
	public function edit($id)
	{
		$acc_id=$this->input->post("ddlAccCode");
		$this->db->where("acc_id",$acc_id);
		$this->db->where("str_id!=",$id);
		$query=$this->db->get("tbl_store");
		$result=$query->row();						 	
		if($id==TRUE)
		{
			if($acc_id==$result->acc_id){return FALSE;}
			else
			{
				if(!empty($this->input->post('txtImgName')))
				{
					$row=$this->index($id);			
					unlink("assets/uploads/".$row->str_img);
					$data=array(
						"str_code" => $this->input->post("txtStrCode"),
						"acc_id" => $this->input->post("ddlAccCode"),
						"str_name" => $this->input->post("txtStrName"),						
						"str_type" => $this->input->post("txtStrType"),
						"str_img"=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"str_desc" => $this->input->post("txtDesc"),																								
						"user_updt" => $this->userLog,
						"date_updt" => date('Y-m-d')
						);				
				}
				else
				{
					$data=array(
						"str_code" => $this->input->post("txtStrCode"),
						"acc_id" => $this->input->post("ddlAccCode"),
						"str_name" => $this->input->post("txtStrName"),						
						"str_type" => $this->input->post("txtStrType"),						
						"str_desc" => $this->input->post("txtDesc"),																								
						"user_updt" => $this->userLog,
						"date_updt" => date('Y-m-d')
						);		
				}
				$this->db->where("str_id",$id);
				$query=$this->db->update("tbl_store",$data);
				if($query==TRUE){return $query;}				
			}
							
		}
						
	}
	public function delete($id)
	{
		if($id==TRUE)
		{
			$row=$this->index($id);			
			unlink("assets/uploads/".$row->str_img);
			$this->db->where("str_id",$id);
			$query=$this->db->delete("tbl_store");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>