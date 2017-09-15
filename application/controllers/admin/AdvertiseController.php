<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class AdvertiseController extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;
	function __construct()
	{
		parent::__construct();
		$this->page_redirect = "advertise";
		$this->action="advertise/add";
		$this->pageHeader="Advertisement";
		$this->cancel = "advertise";
		$this->load->model("advertiseModel","am");
	}

	function index()
	{
		$data['pageHeader'] = $this->lang->line('advertisement');
		$data['tbl_hdr'] = array($this->lang->line("advertise_name"),$this->lang->line("image"),$this->lang->line("advertise"),$this->lang->line("position"),$this->lang->line("price"));
		$query = $this->am->get_advertise();
		$i=0;
		if(!empty($query))
		{
			foreach ($query as $key => $value) {
				$poto = $value->img;
				if(empty($poto)) $poto = "default.png";
				$data["tbl_body"][$i] = array(
										$value->ad_name,
										//$value->ad_desc,
										"<img class='img-thumbnail' src='".base_url('assets/uploads/'.$poto)."' width='50' >",
										$value->advertiser,
										$value->position,
										$value->price,
										$value->ad_id
				);
			$i++;
			}
		}else
		{
			$data["tbl_body"][$i] = array();
		}
		

		$data['action_url'] = array($this->page_redirect.'/add',
									$this->page_redirect.'/edit',
									$this->page_redirect.'/delete') ;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation(){
		$this->form_validation->set_rules("txtAdName","Advertiser Name","required");
		$this->form_validation->set_rules("txtUrl","Url","required");
		$this->form_validation->set_rules("ddlPosition","Position","required");
		$this->form_validation->set_rules("txtPage","Page","required");
		$this->form_validation->set_rules("txtPrice","Price","required");
		$this->form_validation->set_rules("txtHeight","Height","required");
		$this->form_validation->set_rules("txtAdvertiser","Advertiser","required");
		$this->form_validation->set_rules("txtUpload","Image","required");
		if($this->form_validation->run()==TRUE){
			return TRUE;
		}else{return FALSE;}
	}
	public function validation1(){
		$this->form_validation->set_rules("txtAdName","Advertiser Name","required");
		$this->form_validation->set_rules("txtUrl","Url","required");
		$this->form_validation->set_rules("ddlPosition","Position","required");
		$this->form_validation->set_rules("txtPage","Page","required");
		$this->form_validation->set_rules("txtPrice","Price","required");
		$this->form_validation->set_rules("txtHeight","Height","required");
		$this->form_validation->set_rules("txtAdvertiser","Advertiser","required");
		if($this->form_validation->run()==TRUE){
			return TRUE;
		}else{return FALSE;}
	}

	function add_advertise()
	{
		if(isset($_POST['btnSubmit']))
		{	
			if($this->validation()==TRUE){
				$this->am->insert_advertise();
				redirect("advertise");	
			}else{
				$data['action'] = $this->action;
				$data['pageHeader'] = $this->lang->line('advertisement');
				$data['ctrl'] = $this->createCtrl();
				$data['cancel'] = $this->cancel;
				$data['multipart'] = true;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_add',$data);
				$this->load->view('template/footer');
			}
		}else
		{
			$data['action'] = $this->action;
			$data['pageHeader'] = $this->lang->line('advertisement');
			$data['ctrl'] = $this->createCtrl();
			$data['cancel'] = $this->cancel;
			$data['multipart'] = true;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}

	function edit_advertise($id="")
	{
		if($id!="")
		{
			if(isset($_POST['btnSubmit']))
			{	if($this->validation1()==TRUE){
					$this->am->update_advertise($id);
					redirect("advertise");	
				}else{
					$data['action'] = "advertise/edit/".$id;
					$data['pageHeader'] = $this->lang->line('advertisement');
					$data['ctrl'] = $this->editCtrl($id);
					$data['cancel'] = $this->cancel;
					$data['multipart'] = true;
					$this->load->view('template/header');
					$this->load->view('template/left');
					$this->load->view('admin/page_edit',$data);
					$this->load->view('template/footer');
				}
			}
			elseif (isset($_POST["btnCancel"])) 
			{
				redirect('advertise');
			}
			else
			{
				$data['action'] = "advertise/edit/".$id;
				$data['pageHeader'] = $this->lang->line('advertisement');
				$data['ctrl'] = $this->editCtrl($id);
				$data['cancel'] = $this->cancel;
				$data['multipart'] = true;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');
			}
		}
	}

	function delete_advertise($id="")
	{
		if($id!="")
		{
			$this->am->delete_advertise($id);
			redirect("advertise");
		}
	}

	function editCtrl($id)
	{

		$query = $this->am->get_advertise($id);
		$pos = array("none"=>$this->lang->line("choose_one"),"left"=>$this->lang->line("left"),"right"=>$this->lang->line("right"),"center"=>$this->lang->line("center"));
		$ctrl = array(
					array(
								"type"	=>	"text",
								"name"	=>	"txtAdName",
								"id"	=>	"txtAdName",
								"class"	=>	"form-control",
								"value"	=>	set_value("txtAdName",$query->ad_name),
								"label"	=>	$this->lang->line("advertise_name")
						),
					array(
							"type"	=>	"text",
							"name"	=>	"txtUrl",
							"id"	=>	"txtUrl",
							"class"	=>	"form-control",
							"value"	=>	set_value("txtUrl",$query->url),
							"label"	=>	"URL",
						),
					array(
							'type'	=>	'dropdown',
							'name'	=>	'ddlPosition',
							'id'	=>	'ddlPosition',
							'option'=>	$pos,
							'selected'	=> $query->position,
							'class'	=>	'class="form-control"',
							'label'	=>	$this->lang->line("position")
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtPage',
							'id'	=>	'txtPage',
							'class'	=>	'form-control',
							'label'	=>	$this->lang->line("page_name"),
							'value'	=>	set_value("txtPage",$query->page),
							'required'	=>	''
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtPrice',
							'id'	=>	'txtPrice',
							'class'	=>	'form-control',
							'label'	=>	$this->lang->line("price"),
							'value'	=> set_value("txtPrice",$query->price),
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtHeight',
							'id'	=>	'txtHeight',
							'class'	=>	'form-control',
							'label'	=>	$this->lang->line("height"),
							"value"	=>	set_value("txtHeight",$query->height),
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtAdvertiser',
							'id'	=>	'txtAdvertiser',
							'class'	=>	'form-control',
							'value'	=>	set_value("txtAdvertiser",$query->advertiser),
							'label'	=>	$this->lang->line("advertise"),
						),
					array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	$this->lang->line("image")
						),
					array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'id'	=>	'txtDesc',
								'class'	=>	'form-control',
								'value'	=>	set_value("txtDesc",$query->ad_desc),
								'label'	=>	$this->lang->line("descr")
						)
			);
		return $ctrl;
	}
	function createCtrl()
	{
		$pos = array("none"=>$this->lang->line("choose_one"),"left"=>$this->lang->line("left"),"right"=>$this->lang->line("right"),"center"=>$this->lang->line("center"));
		$ctrl = array(
					array(
							"type"	=>	"text",
							"name"	=>	"txtAdName",
							"id"	=>	"txtAdName",
							"class"	=>	"form-control",
							"label"	=>	$this->lang->line("advertise_name"),
						),
					array(
							"type"	=>	"text",
							"name"	=>	"txtUrl",
							"id"	=>	"txtUrl",
							"class"	=>	"form-control",
							"label"	=>	"URL",
						
						),
					array(
							'type'	=>	'dropdown',
							'name'	=>	'ddlPosition',
							'id'	=>	'ddlPosition',
							'option'=>	$pos,
							'class'	=>	'class="form-control"',
							'label'	=>	$this->lang->line("position")
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtPage',
							'id'	=>	'txtPage',
							'class'	=>	'form-control',
							'placeholder'	=>	'Enter page name here...',
							'label'	=>	$this->lang->line("page_name"),
						
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtPrice',
							'id'	=>	'txtPrice',
							'class'	=>	'form-control',
							'label'	=>	$this->lang->line("price"),
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtHeight',
							'id'	=>	'txtHeight',
							'class'	=>	'form-control',
							'label'	=>	$this->lang->line("height"),
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtAdvertiser',
							'id'	=>	'txtAdvertiser',
							'class'	=>	'form-control',
							'label'	=>	$this->lang->line("advertise")	
						),
					array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	$this->lang->line("image")
						),
					array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'id'	=>	'txtDesc',
								'class'	=>	'form-control',
								'label'	=>	$this->lang->line("descr")
						)
				);
		return $ctrl;
	}
}
?>