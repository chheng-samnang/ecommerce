<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class marqueeController extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdvertiseModel','am');
		$this->load->model('categoryModel','cm');
		$this->page_redirect = "marquee";
		$this->action="marquee";
		$this->pageHeader="marquee";
		$this->cancel = "marquee";
	}

	public function index()
	{
		$data['pageHeader'] = $this->lang->line('marquee');
		
		$data['tbl_hdr'] = array($this->lang->line("descr"));
		$i = 0;
		$row = $this->am->get_marquee();

		if($row==true)
		{
			foreach ($row as $value) 
			{
				$data['tbl_body'][$i] = array(
												substr($value->key_data1, 0, 100)."...",
												
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

	public function createCtrl()
	{
		$ctrl = array(
						array(
								"type"			=>	"textarea",
								"name"			=>	"txtDesc",
								"id"			=>	"txtDesc",
								"class"			=> 	"form-control",

								"label"			=> 	$this->lang->lang->line("descr"),

							)
			);
		return $ctrl;
	}
	public function editCtrl($id)
	{
		$query = $this->am->get_marquee($id);

		$ctrl = array(
						
						array(
								"type"			=>	"textarea",
								"name"			=>	"txtDesc",
								"id"			=>	"txtDesc",
								"value"			=>	$query->key_data1,
								"class"			=> 	"form-control",
								"label"			=> 	$this->lang->line("descr")
							)
			);
		return $ctrl;
	}
	public function validation(){
		$this->form_validation->set_rules('txtDesc','Text Run','trim|required');												
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function add_marquee()
	{
		if(isset($_POST['btnSubmit']))
		{
			if($this->validation()==TRUE){
				$this->am->insert_marquee();
				redirect("marquee");
			}else{
				$data['action'] = "marquee/add";
				$data['pageHeader'] = $this->lang->line('marquee');
				$data['ctrl'] = $this->createCtrl();
				$data['cancel'] = $this->cancel;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_add',$data);
				$this->load->view('template/footer');
			}
		}
		elseif (isset($_POST["btnCancel"])) 
		{
			redirect("marquee");
		}
		else
		{
			$data['action'] = "marquee/add";
			$data['pageHeader'] = $this->lang->line('marquee');
			$data['ctrl'] = $this->createCtrl();
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}
	public function edit_marquee($id="")
	{	
		if($id!="")
		{
			if (isset($_POST['btnSubmit'])) 
			{
				if($this->validation()==TRUE){
					$this->am->update_marquee($id);
					redirect("marquee");
				}else{
					$data['action'] = "marquee/edit/".$id;
					$data['pageHeader'] = $this->lang->line('marquee');
					$data['ctrl'] = $this->editCtrl($id);
					$data['cancel'] = $this->cancel;
					$this->load->view('template/header');
					$this->load->view('template/left');
					$this->load->view('admin/page_edit',$data);
					$this->load->view('template/footer');
				}
			}
			elseif (isset($_POST["btnCancel"])) 
			{
				redirect("marquee");
			}
			else
			{
				$data['action'] = "marquee/edit/".$id;
				$data['pageHeader'] = $this->lang->line('marquee');
				$data['ctrl'] = $this->editCtrl($id);
				$data['cancel'] = $this->cancel;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');
			}
		}
	}
	public function delete_marquee($id)
	{
		if(isset($id)&&$id!="")
		{
			$this->am->deleteaMrquee($id);
			redirect("marquee");
		}
	}
}
?>