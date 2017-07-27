<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class CategoryController extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('categoryModel','cm');
		$this->page_redirect = "category";
		$this->action="category/add";
		$this->pageHeader="Category";
		$this->cancel = "category";
		
	}

	public function index()
	{
		$data['pageHeader'] = $this->lang->line('category');
		
		$data['tbl_hdr'] = array('Category EN','Category KH','Category CH','User Create','Date Create');
		$i = 0;
		$row = $this->cm->get_category();

		if($row==true)
		{
			foreach ($row as $value) 
			{
				$data['tbl_body'][$i] = array(
												$value->cat_name,
												$value->cat_name_kh,
												$value->cat_name_ch,
												$value->user_crea,
												$value->date_crea,
												$value->cat_id
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
								"type"			=>	"text",
								"name"			=>	"txtCatName",
								"id"			=>	"txtCatName",
								"placeholder"	=>	"Enter Category Name here...",
								"class"			=> 	"form-control",
								"required"		=>	"",
								"label"			=> "Category EN"
							),
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatNameKh",
								"id"			=>	"txtCatNameKh",
								"placeholder"	=>	"Enter Category Name here...",
								"class"			=> 	"form-control",
								"label"			=> "Category KH"
							),
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatNameCh",
								"id"			=>	"txtCatNameCh",
								"placeholder"	=>	"Enter Category Name here...",
								"class"			=> 	"form-control",
								"label"			=> "Category CH"
							),
						array(
								"type"			=>	"textarea",
								"name"			=>	"txtDesc",
								"id"			=>	"txtDesc",
								"class"			=> 	"form-control",
								"label"			=> 	"Description"
							)
			);
		return $ctrl;
	}
	public function editCtrl($id)
	{
		$query = $this->cm->get_category($id);

		$ctrl = array(
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatName",
								"id"			=>	"txtCatName",
								"placeholder"	=>	"Enter Category Name here...",
								"class"			=> 	"form-control",
								"required"		=>	"",
								"value"			=>	$query->cat_name,
								"label"			=> "Category EN"
							),
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatNameKh",
								"id"			=>	"txtCatNameKh",
								"value"			=>	$query->cat_name_kh,
								"placeholder"	=>	"Enter Category Name here...",
								"class"			=> 	"form-control",
								"label"			=> "Category KH"
							),
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatNameCh",
								"id"			=>	"txtCatNameCh",
								"value"			=>	$query->cat_name_ch,
								"placeholder"	=>	"Enter Category Name here...",
								"class"			=> 	"form-control",
								"label"			=> "Category CH"
							),
						array(
								"type"			=>	"textarea",
								"name"			=>	"txtDesc",
								"id"			=>	"txtDesc",
								"value"			=>	$query->cat_desc,
								"class"			=> 	"form-control",
								"label"			=> 	"Description"
							)
			);
		return $ctrl;
	}
	public function add_category()
	{
		if(isset($_POST['btnSubmit']))
		{
			$this->cm->insertCategory();
			redirect("category");
		}
		else
		{
			$data['action'] = $this->action;
			$data['pageHeader'] = $this->lang->line('category');
			$data['ctrl'] = $this->createCtrl();
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}
	public function edit_category($id)
	{
		if(isset($_POST['btnSubmit']))
		{
			$this->cm->Update($id);
			redirect("category");		
		}else{
			$data['action'] = "category/edit/".$id;
			$data['pageHeader'] = $this->lang->line('category');
			$data['ctrl'] = $this->editCtrl($id);
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_edit',$data);
			$this->load->view('template/footer');
		}
		
	}
	public function deleteCategory($id)
	{
		if(isset($id)&&$id!="")
		{
			$this->cm->deleteCategory($id);
			redirect("category");
		}
	}
}
?>