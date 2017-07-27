<?php
class Member_m extends CI_Model
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
			$this->db->order_by('mem_id', 'DESC');
			$query=$this->db->get("tbl_member");
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
	public function add()
	{
		$data= array(
						"mem_code" => $this->input->post("txtMemberCode"),
						"mem_name" => $this->input->post("txtMemberName"),
						"mem_addr" => $this->input->post("txtAddr"),
						"mem_phone" =>$this->input->post("txtMemberPhone"),
						"mem_email" =>$this->input->post("txtMemberEmail"),
						"mem_status" => $this->input->post("ddlStatus"),
						"reg_date" => date("Y-m-d",strtotime($this->input->post("txtRegisterDate"))),
						"mem_desc" => $this->input->post("txtDesc"),
						"valid_code" =>$this->input->post("txtValidCode"),
						 );
		$query=$this->db->insert("tbl_member",$data);
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			$data= array(
						"mem_code" => $this->input->post("txtMemberCode"),
						"mem_name" => $this->input->post("txtMemberName"),
						"mem_addr" => $this->input->post("txtAddr"),
						"mem_phone" =>$this->input->post("txtMemberPhone"),
						"mem_email" =>$this->input->post("txtMemberEmail"),
						"mem_status" => $this->input->post("ddlStatus"),
						"reg_date" => date("Y-m-d",strtotime($this->input->post("txtRegisterDate"))),
						"mem_desc" =>$this->input->post("txtDesc"),
						"valid_code" =>$this->input->post("txtValidCode"),
						 );
			$this->db->where("mem_id",$id);
			$query=$this->db->update("tbl_member",$data);
			if($query==TRUE){return $query;}
		}
	}
	public function delete($id)
	{
		if($id==TRUE)
		{
			$this->db->where("mem_id",$id);
			$this->db->delete("tbl_account");
			$this->db->where("mem_id",$id);
			$query=$this->db->delete("tbl_member");
			if($query==TRUE){return $query;}

		}
	}

}
?>
