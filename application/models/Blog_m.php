<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog_m extends CI_Model
{

	var $userCrea;
	function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
	}

	public function index()
	{
		$query = $this->db->query("SELECT * FROM tbl_blog");
		return $query->result();
	}

	public function add()
	{
		$data = array(
			"comment"=>$this->input->post("title"),
			"bl_id"=> $this->input->post("txt_bl_id")
			);
		$this->db->insert("tbl_comment", $data);
	}
	
	public function popular_blog()
	{
		$query = $this->db->query("SELECT bl_id, title, img, bl_desc, date_crea FROM tbl_blog WHERE status='enable' ORDER BY bl_id DESC LIMIT 5");
		return $query->result();
	}
	#====================== function popular blog  for front end================================

	public function search($keyword, $limit)
	{
		if ($limit!="") 
		{
			$offset = $this->uri->segment(3);
			$this->db->like('title',$keyword);
			$this->db->order_by('bl_id', 'DESC');
			$cond=array('status'=>'enable');
        	$query = $this->db->limit($limit, $offset)->get_where('tbl_blog', $cond);

        	return $query->result();
		}
	}
	#=========================== function search for front end========================================

	public function count()
	{
		return$this->db->count_all_results('tbl_blog');
		
	}
	#========================== function count for front end========================================

	public function blog_detail($bl_id)
	{
		if ($bl_id!="") 
		{
			$query = $this->db->query("SELECT * FROM tbl_blog WHERE bl_id={$bl_id}");
			return $query->row();	
		}
	}

	public function blog_comment($bl_id){
		if ($bl_id!="") {
		
		$query = $this->db->query("SELECT b.bl_id, c.comment FROM  tbl_comment AS c INNER JOIN tbl_blog AS b ON c.bl_id=b.bl_id WHERE b.bl_id={$bl_id}");
		 $count = count($query->result()); 
		echo "<b style='position: absolute; margin-left: 710px; z-index: 899; margin-top: 121px;'>".$count."</b>";
		return $query->result();

			# code...
		}
	}

	#======================== function blog_detail for fronet =======================================


	public function comment()
	{
		$title =  $this->input->post("title");
		if ($title!=""){
			$data = array(
				
					"comment"=>$title,
					"bl_id"=> $this->input->post("txt_bl_id"),
					"cm_crea"=> date("Y-m-d")
					);
			$this->db->insert('tbl_comment', $data);
			}
		
	}
	#========================= function Comment for front end==========================

	public function get_blog($id="")
	{
		if($id=="")
		{
			$query = $this->db->get("tbl_blog");
			if($query->num_rows()>0)
			{
				return $query->result();
			}else
			{
				return array();
			}
		}else
		{
			$query = $this->db->get_where("tbl_blog",array("bl_id"=>$id));
			if($query->num_rows()>0)
			{
				return $query->row();
			}else
			{
				return array();
			}
		}
	}
	#=========================== function get_blog for backend=================================

	function insert_blog()
	{
		$data = array(
						"title"	=>	$this->input->post("txtblogName"),
						'img'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"bl_desc"	=>	$this->input->post("txtDesc"),
						
						 "status"	=>	$this->input->post("ddlstatus"),
						"user_crea"	=>	$this->userCrea,
						"date_crea"	=>	date("Y-m-d")
			);
		$this->db->insert("tbl_blog",$data);
	}
	#========================== function insert_blog for backend===================================

	public function update_blog($id)
	{
		if($id==TRUE)
		{
			if(!empty($this->input->post('txtImgName')))
			{
				$row=$this->index($id);			
				unlink("assets/uploads/".$row->img);	
				$data = array(
							"title"	    =>	$this->input->post("txtblogName"),
							'img'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
							"bl_desc"	=>	$this->input->post("txtDesc"),
							"status"	=>	$this->input->post("ddlstatus"),
							
							"user_updt"	=>	$this->userCrea,
							"date_updt"	=>	date("Y-m-d")
				);
			}else
			{
				$data = array(
							"title"	    =>	$this->input->post("txtblogName"),
							
							"bl_desc"	=>	$this->input->post("txtDesc"),
							"status"	=>	$this->input->post("ddlstatus"),
							
							"user_updt"	=>	$this->userCrea,
							"date_updt"	=>	date("Y-m-d")
						);
			}
			$this->db->where("bl_id",$id);
			$this->db->update("tbl_blog",$data);
		}
	}
	#============================ function update_blog for backend=============================

	public function delete_blog($id)
	{
		$this->db->delete("tbl_blog",array("bl_id"=>$id));
	}
	#============================ function delete blog for backend============================
}// this Class