<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class LocationController extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;
	function __construct()
	{
		parent::__construct();
		$this->page_redirect = "location";
		$this->action="location/add";
		$this->pageHeader="Location";
		$this->cancel = "location";
		$this->load->model("locationModel","lm");
	}

	function index()
	{
		$data['pageHeader'] = $this->lang->line('location');
		$data['tbl_hdr'] = array($this->lang->line("location_name"),$this->lang->line("descr"));
		$query = $this->lm->get_location();
		$i = 0;
		foreach ($query as $key => $value) {
			$data["tbl_body"][$i] = array(
											$value->loc_name,
											$value->loc_desc,
											$value->loc_id
									);
			$i++;
		}
		$data["action_url"] = array($this->page_redirect.'/add',
									$this->page_redirect.'/edit',
									$this->page_redirect.'/delete') ;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}

	function createCtrl()
	{
		$ctrl = array(
						array(
								'type'			=>	'text',
								'name'			=>	'txtLocationName',
								'id'			=>	'txtLocationName',
								'placeholder'	=>	$this->lang->line("location_name"),
								'class'			=> 	'form-control',
								'label'			=>	$this->lang->line("location_name"),
								'required'		=>	''
							),
						
						array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'label'	=>	$this->lang->line("descr")
							)
			);
		return $ctrl;
	}
	function editCtrl($id)
	{
		$query = $this->lm->get_location($id);
		$ctrl = array(
						array(
								'type'			=>	'text',
								'name'			=>	'txtLocationName',
								'id'			=>	'txtLocationName',
								'placeholder'	=>	$this->lang->line("location_name"),
								'class'			=> 	'form-control',
								'label'			=>	$this->lang->line("location_name"),
								'value'			=>	$query->loc_name,
								'required'		=>	''
							),
						array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'value'	=>	$query->loc_desc,
								'label'	=>	$this->lang->line("descr")
							)
			);
		return $ctrl;
	}
	function add_location()
	{

		if(isset($_POST['btnSubmit']))
		{
			$this->lm->insert_location();
			redirect("location");
		}else
		{
			$data['action'] = $this->action;
			$data['pageHeader'] = $this->lang->line('location');
			$data['ctrl'] = $this->createCtrl();
			$data['cancel'] = $this->cancel;
			
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');	
		}
		
	}
	function edit_location($id)
	{
		if($id!="")
		{
			if(isset($_POST['btnSubmit']))
			{
				$this->lm->update_location($id);
				redirect("location");
			}else
			{
				$data['action'] = "location/edit/".$id;
				$data['pageHeader'] = $this->lang->line('location');
				$data['ctrl'] = $this->editCtrl($id);
				$data['cancel'] = $this->cancel;
				
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');
			}
			
		}
	}
	function delete_location($id)
	{
		if($id!="")
		{
			$this->lm->delete_location($id);
			redirect("location");
		}
	}
}
?>