<?php
class Slide_m extends CI_Model
{			
	private $userLog="admin";
	var $path_file_upload;	
	public function __construct()
	{
		parent::__construct();
		$this->path_file_upload="./assets/uploads/";		
	}
	public function index($id="")
	{
		if($id=="")
		{
			$query=$this->db->query("SELECT slide_id,slide_name,slide_desc,slide_url,slide_path,slide_status,user_crea,date_crea,user_updt,date_updt FROM tbl_slide ORDER BY slide_id DESC ");
			$result=$query->result();
			if($result){return $result;}
		}
		else
		{
			$this->db->where("slide_id",$id);
			$query=$this->db->get("tbl_slide");
			$result=$query->row();
			if($result){return $result;}
		}
	}
	public function add($file_name="")
	{
		$data= array(
						"slide_name" => $this->input->post("txtSlidename"),
						"slide_desc" => $this->input->post("txtDesc"),
						"slide_url" => $this->input->post("txtSlideUrl"),
						"slide_path" =>$file_name["file_name"],
						"slide_status" => $this->input->post("ddlStatus"),
						"user_crea" => $this->userLog,
						"date_crea" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_slide",$data);		
		if($query){return $query;}
	}
	public function edit($id,$file_name)
	{
		if($id==TRUE && $file_name["file_name"]=="")
		{
			$data=array(
						"slide_name"=>$this->input->post("txtSlidename"),
						"slide_desc"=>$this->input->post("txtDesc"),
						"slide_url"=>$this->input->post("txtSlideUrl"),
						/*"slide_path"=>$this->input->post("txtSlidePath"),*/
						"slide_status"=>$this->input->post("ddlStatus"),
						"user_updt"=>$this->userLog,
						"date_updt"=>date("Y-m-d")
						);
			$this->db->where("slide_id",$id);
			$query=$this->db->update("tbl_slide",$data);
			if($query==TRUE){return $query;}
		}
		else
		{
			$data=array(
						"slide_name"=>$this->input->post("txtSlidename"),
						"slide_desc"=>$this->input->post("txtDesc"),
						"slide_url"=>$this->input->post("txtSlideUrl"),
						"slide_path" =>$file_name["file_name"],
						"slide_status"=>$this->input->post("ddlStatus"),
						"user_updt"=>$this->userLog,
						"date_updt"=>date("Y-m-d")
						);
			$row=$this->index($id);			
			unlink($this->path_file_upload.$row->slide_path);
			$this->db->where("slide_id",$id);
			$query=$this->db->update("tbl_slide",$data);
			if($query==TRUE){return $query;}
		}
	}
	public function delete($id)
	{
		if($id==TRUE)
		{
			$row=$this->index($id);			
			unlink($this->path_file_upload.$row->slide_path);
			$this->db->where("slide_id",$id);
			$query=$this->db->delete("tbl_slide");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>