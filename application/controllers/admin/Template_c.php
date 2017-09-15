<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Template_c extends CI_Controller
{
	
	var $pageHeader,$page_redirect,$action,$cancel;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Template_m','tm');
		$this->load->model('categoryModel','cm');
		$this->page_redirect = "template";
		$this->action="template";
		$this->pageHeader="Template";
		$this->cancel ="admin/Template_c";
	}

	public function index()
	{
		$data['pageHeader'] = $this->pageHeader;
		
		$data['tbl_hdr'] = array($this->lang->line("template_type"),$this->lang->line("image"),$this->lang->line("status"));
		$i = 0;
		$row = $this->tm->select_template();

		if($row==true)
		{
			foreach ($row as $value) 
			{
				$poto = $value->key_data1;
				if(empty($poto)) $poto = "default.png";
				$data['tbl_body'][$i] = array(
												$value->key_type,
												"<img class='img-thumbnail' src='".base_url("assets/uploads/".$poto)."' style='width:70px;' />",	
												$value->key_data==1?"<p style='color: blue;'>".$this->lang->line("enable")."</p>" : "<p style='color:red;'>".$this->lang->line("disable")."</p>",						
												$value->key_id
											);
				$i++;
			}
		}
		
		$data["action_url"] = array($this->page_redirect.'/add',
									$this->page_redirect.'/edit',
									$this->page_redirect.'/delete') ;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');

	}

	public function add_template($option="")
	{
		$this->form_validation->set_rules('txtUpload','Image File','required');

		if(isset($_POST['btnSubmit']))
		{
			if($this->form_validation->run()==TRUE)
			{
				$this->tm->insert_template();
				redirect("template");
			}
			redirect("template");
		}
		elseif (isset($_POST["btnCancel"])) 
		{
			redirect("template");
		}
		else
		{
			$option = array('1'=>$this->lang->line("enable"),'0'=>$this->lang->line("disable"));
			$data['action'] = "template/add";
			$data['pageHeader'] = $this->pageHeader;
			$data['ctrl'] = $this->createCtrl($row="",$option);
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}

	#======================= Add Template ============================

	public function edit_template($id="")
	{
		if($id!="")
		{
			if (isset($_POST['btnSubmit'])) 
			{
				$this->tm->update_template($id);
				redirect("template");
			}
			elseif (isset($_POST["btnCancel"])) 
			{
				redirect("template");
			}

			else
			{
				$row=$this->tm->select_template($id);
				$option = array('1'=>$this->lang->line("enable"),'0'=>$this->lang->line("disable"));
				$data['action'] = "template/edit/".$id;
				$data['pageHeader'] = $this->pageHeader;
				$data['ctrl'] = $this->createCtrl($row,$option);
				$data['cancel'] = $this->cancel;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');
			}
		}
	}

	#====================== Edit Template ========================

	public function delete_template($id)
	{
		if(isset($id)&&$id!="")
		{
			$this->tm->delete_template($id);
			redirect("template");
		}
	}

	#================== delete Template ========================

	public function createCtrl($row="",$option)
	{
		if($row!="")
		{
			$row1=$row->key_data1;
			$row2=$row->key_data;

		}
		$ctrl = array(
						array(

								'type'=>'dropdown',
								'name'=>'ddlStatus',
								'value'=>$row==""? set_value("ddlStatus") : $row2,
								'option'=>$option,
								'selected'=>$row==""? NULL : $row2,
								'class'=>'class="form-control"',
								'label'=>$this->lang->line("status")
							),
						array(
								'type'=>'upload',
								'name'=>'txtUpload',
								'id'=>'txtUpload',
								'value'=>$row==""? set_value("txtUpload") : $row1,																		
								'class'=>'form-control',
								'label'=>$this->lang->line("image"),
								"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row1)."' style='width:70px;' />",					
								
							)
			);
		return $ctrl;
	}

	#======================== Create Ctrrl ===========================
}
