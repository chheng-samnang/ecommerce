<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Template_m extends CI_Model
{
	var $userCrea;
	public function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
	}

	public function select_template($id="")
	{
		if($id==""){

			$query  = $this->db->query("SELECT key_id, key_type, key_data, key_data1 FROM tbl_sysdata WHERE key_type='template'");
			if($query->num_rows()>0)
			{
				return $query->result();
			}
		}else{
			$query  = $this->db->query("SELECT key_id, key_type, key_data, key_data1 FROM tbl_sysdata WHERE key_id='$id'");
			if($query->num_rows()>0)
			{
				return $query->row();
			}
		}
		
	}

	public function insert_template()
	{
		$data = array(
						'key_data1'=>!empty($this->input->post('txtUpload'))?$this->input->post('txtUpload'):"",
						'key_type'=>'template',
						'key_data'=>$this->input->post('ddlStatus')
			);
		$this->db->insert("tbl_sysdata", $data);
	}

	public function update_template($id)
	{
		if($id==TRUE)
		{
			if(!empty($this->input->post('txtUpload')))
			{
				$row=$this->select_template($id);			
				unlink("assets/uploads/".$row->key_data1);	
				$data = array(
								'key_data1'=>!empty($this->input->post('txtUpload'))?$this->input->post('txtUpload'):"",
								'key_type'=>'template',
								'key_data'=>$this->input->post('ddlStatus')
					);
				
			}else
			{
				$data = array(
								
								'key_type'=>'template',
								'key_data'=>$this->input->post('ddlStatus')
					);
			}
			$this->db->where("key_id", $id);
			$query=$this->db->update("tbl_sysdata", $data);
			if ($query==TRUE) { return $query;}
		}
	}


	public function delete_template($id)
	{
		$this->db->where("key_id", $id);
		$query = $this->db->delete("tbl_sysdata");
		if($query==TRUE){ return $query;}
	}
}