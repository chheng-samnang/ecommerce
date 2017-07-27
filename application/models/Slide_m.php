<?php
class Slide_m extends CI_Model
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
			$this->db->order_by('slide_id', 'DESC');
			$query=$this->db->get("tbl_slide");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("slide_id",$id);
			$query=$this->db->get("tbl_slide");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{
		$data= array(
						"slide_name" => $this->input->post("txtSlidename"),
						"slide_desc" => $this->input->post("txtDesc"),
						"slide_url" => $this->input->post("txtSlideUrl"),
						"slide_path" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"slide_status" => $this->input->post("ddlStatus"),
						"user_crea" => $this->userLog,
						"date_crea" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_slide",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			if(!empty($this->input->post('txtImgName')))
			{		
				$row=$this->index($id);			
				unlink("assets/uploads/".$row->slide_path);	
				$data=array(
							"slide_name"=>$this->input->post("txtSlidename"),
							"slide_desc"=>$this->input->post("txtDesc"),
							"slide_url"=>$this->input->post("txtSlideUrl"),
							"slide_path" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
							"slide_status"=>$this->input->post("ddlStatus"),
							"user_updt"=>$this->userLog,
							"date_updt"=>date("Y-m-d")
							);
			}
			else
			{
				$data=array(
							"slide_name"=>$this->input->post("txtSlidename"),
							"slide_desc"=>$this->input->post("txtDesc"),
							"slide_url"=>$this->input->post("txtSlideUrl"),						
							"slide_status"=>$this->input->post("ddlStatus"),
							"user_updt"=>$this->userLog,
							"date_updt"=>date("Y-m-d")
							);
			}	
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
			unlink("assets/uploads/".$row->slide_path);
			$this->db->where("slide_id",$id);
			$query=$this->db->delete("tbl_slide");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>