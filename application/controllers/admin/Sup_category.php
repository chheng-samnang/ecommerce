<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Sup_category extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sup_category_m','scm');
		$this->load->model('product_m');
		$this->page_redirect = "admin/Sup_category";
		$this->pageHeader="Sup Category";
		$this->cancel = "Sup_category";
	}

	public function index()
	{
		$data['pageHeader'] = $this->lang->line('sup_category');

		$data['tbl_hdr'] = array($this->lang->line("sup_category").$this->lang->line("en"),$this->lang->line("sup_category").$this->lang->line("kh"),$this->lang->line("sup_category").$this->lang->line("ch"),$this->lang->line('user').$this->lang->line('create'),$this->lang->line('date').$this->lang->line('create'),$this->lang->line('user').$this->lang->line('update'),$this->lang->line('date').$this->lang->line('update'));
		$i = 0;
		$row = $this->scm->index();

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
												$value->user_updt,
												$value->date_updt,
												$value->cat_id
										);
				$i++;
			}
		}

		$data["action_url"] = array($this->page_redirect.'/add',
									$this->page_redirect.'/edit',
									$this->page_redirect.'/deleteCategory');
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation(){
		$this->form_validation->set_rules("ddlCategoryId","category","required");
		$this->form_validation->set_rules("txtCatName",$this->lang->line("category_name"),"required");
		if($this->form_validation->run()==TRUE){
		return true;
		}else{return false;}
	}
	public function add(){
			$category=$this->scm->get_category();
			if($category==TRUE)
			{
				foreach($category as $value):
				$option2[$value->cat_id]=$value->cat_name;
			endforeach;
			}
			$data['action'] = "admin/Sup_category/add_sup_category";
			$data['pageHeader'] = $this->lang->line('menu1_1');
			$data['ctrl'] = $this->createCtrl($row="",$option2);
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			//$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
	}

	public function add_sup_category()
	{
		if(isset($_POST['btnSubmit']))
		{
			if($this->validation()==TRUE){
				$this->scm->add_sup_category();
				redirect("category");
			}else{
				$this->add();
			}
		}
	}
	public function edit($id){
		$category=$this->scm->get_category();
			if($category==TRUE)
			{
				foreach($category as $value):
				$option2[$value->cat_id]=$value->cat_name;
			endforeach;
			}
			$row=$this->scm->get_category($id);
			$data['action'] = "admin/Sup_category/edit_sup_category";
			$data['pageHeader'] = $this->lang->line('menu1_1');
			$data['ctrl'] = $this->createCtrl($row,$option2);
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			//$this->load->view('template/left');
			$this->load->view('admin/page_edit',$data);
			$this->load->view('template/footer');
	}
	public function edit_sup_category($id)
	{
		if(isset($_POST['btnSubmit']))
		{
			$this->scm->Update($id);
			redirect("admin/Sup_category");
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
			$this->scm->deleteCategory($id);
			redirect(base_url()."admin/Sup_category");
		}
	}
	public function createCtrl($row="",$option2="")
	{
		if($row!=""){
			$row1=$row->cat_name;
			$row2=$row->cat_name_ch;
			$row3=$row->cat_name_kh;
			$row4=$row->cat_desc;
		}

		$ctrl = array(
						array(
								'type'=>'dropdown',
								'name'=>'ddlCategoryId',
								'value'=>$row==""? set_value("ddlCategoryId") : $row2,
								'option'=>$option2,
								'selected'=>$row==""?NULL:$row2,
								'class'=>'class="form-control"',
								'label'=>$this->lang->line("parents_category"),
							),
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatName",
								"id"			=>	"txtCatName",
								'value'			=>$row==""?NULL: $row1,
								"placeholder"	=>	$this->lang->line("category")." ".$this->lang->line("en")."...",
								"class"			=> 	"form-control",
								"label"			=> $this->lang->line("category")." ".$this->lang->line("en")
							),
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatNameKh",
								"id"			=>	"txtCatNameKh",
								'value'=>$row==""?NULL:$row2,
								"placeholder"	=>	$this->lang->line("category")." ".$this->lang->line("en")."...",
								"class"			=> 	"form-control",
								"label"			=> 	$this->lang->line("category")." ".$this->lang->line("kh")
							),
						array(
								"type"			=>	"text",
								"name"			=>	"txtCatNameCh",
								"id"			=>	"txtCatNameCh",
								'value'=>$row==""?NULL:$row3,
								"placeholder"	=>	$this->lang->line("category")." ".$this->lang->line("en")."...",
								"class"			=> 	"form-control",
								"label"			=>  $this->lang->line("category")." ".$this->lang->line("ch")
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
}
?>
