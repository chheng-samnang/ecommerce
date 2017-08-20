<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InventoryController extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;
	function __construct()
	{
		parent::__construct();
		$this->page_redirect = "inventory";
		$this->action="inventory/add";
		$this->pageHeader="Inventory";
		$this->cancel = "inventory";
		$this->load->model("inventoryModel","im");
		$this->load->model("accountModel","am");
	}

	function test()
	{
		var_dump($this->im->get_inventory());
	}
	function index()
	{
		$data['pageHeader'] = $this->pageHeader;
		$data['tbl_hdr'] = array('Product Code','Product Name','Image','Date Release','Status');

		$query = $this->im->get_inventory();
		$i=0;
		if(!empty($query))
		{
			foreach ($query as $key => $value) {
				$img = $value->path;
				if(empty($img)) $img = "default.png"; // default image
				$status = $value->p_status=="1"?"Enable":"Disable";
				$data["tbl_body"][$i] = array(
											$value->p_code,
											$value->p_name,
											"<img src='".base_url("assets/uploads/".$img)."' class='img-thumbnail' style='width:100px'>",
											$value->date_release,
											$status,
											$value->p_id
				);
			$i++;
			}
		}else
		{$data["tbl_body"][$i] = array();}
	
		$data['action_url'] = array($this->page_redirect.'/add',
									$this->page_redirect.'/edit',
									$this->page_redirect.'/delete') ;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
		//var_dump($query);

	}
	public function validation()
	{		
		$this->form_validation->set_rules('txtInvCode','Inventory Code','required');
		$this->form_validation->set_rules('ddlAccount', '', 'required');
		$this->form_validation->set_rules('ddlStore','Stor Name','required');	
		$this->form_validation->set_rules('ddlCat','Category','required');
		$this->form_validation->set_rules('ddlBrand', 'Brand', 'required');
		$this->form_validation->set_rules('txtInvName','Inventory Name','required');
		$this->form_validation->set_rules('txtPrice','Price','numeric');												
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	

	public function addInventory()
	{
		if(isset($_POST['btnSubmit']))
		{	
			if($this->validation()==TRUE)
			{
				$row=$this->im->add_inventory();
				if($row==TRUE){redirect("inventory");}
			}else{
				$data['action'] = $this->action;
				$data['multipart'] = true;
				$data['pageHeader'] = $this->pageHeader;
				$data['ctrl'] = $this->createCtrl();
				$data['cancel'] = $this->cancel;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_add',$data);
				$this->load->view('template/footer');
			}
		}

		elseif (isset($_POST["btnCancel"])) 
		{ redirect('inventory');}
		else
		{
			$data['action'] = $this->action;
			$data['multipart'] = true;
			$data['pageHeader'] = $this->pageHeader;
			$data['ctrl'] = $this->createCtrl();
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}

	public function editInventory($id)
	{
		if($id!="")
		{
			if(isset($_POST['btnSubmit']))
			{
				$this->im->updateInventory($id);
				redirect('inventory');
			}elseif (isset($_POST["btnCancel"])) 
			{
				redirect('inventory');
			}
			else
			{
				$data['action'] = "inventory/edit/".$id;
				$data['multipart'] = true;
				$data['pageHeader'] = $this->pageHeader;
				$data['ctrl'] = $this->editCtrl($id);
				//$data['cancel'] = $this->cancel;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');	
			}
		}
	}

	public function deleteInventory($id="")
	{
		if($id!="")
		{
			$this->im->deleteInventory($id);
			redirect("inventory");
		}
	}

	function createCtrl()
	{

		$invCode = $this->im->generateItemCode();
		$account = $this->am->get_account();
		$store = $this->im->get_store();
		$category = $this->im->get_category();
		$brand = $this->im->get_brand();

		foreach ($account as $key => $value) {
			$option1[0] = 'Choose One';
			$option1[$value->acc_id] = $value->acc_code;
		}

		foreach ($store as $key => $value) {
			$option2[0] = 'Choose One';
			$option2[$value->str_id] = $value->str_name;
		}

		foreach ($category as $key => $value) {
			$option3[0] = 'Choose One';
			$option3[$value->cat_id] = $value->cat_name;	
		}

		foreach ($brand as $key => $value) {
			$option4[0] = 'Choose One';
			$option4[$value->brn_id] = $value->brn_name;
		}
		$option5 = array("1"=>"Enable","0"=>"Disable");
		$ctrl = array(
						array(
								'type'	=>	'text',
								'name'	=>	'txtInvCode',
								'id'	=>	'txtInvCode',
								'placeholder'	=>	'Enter Inventory Code here...',
								'value'	=>	set_value('txtInvCode',$invCode),
								'class'	=>	'form-control',
								'readonly'	=>'readonly',
								'label'	=>	'Inventory Code'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlAccount',
								'id'	=>	'ddlAccount',
								'value'	=>	set_value('ddlAccount',''),
								'option'=>	$option1,
								'class'	=>	'class="form-control"',
								'label'	=>	'Account Code'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlStore',
								'id'	=>	'ddlStore',
								'option'=>	$option2,
								'value'	=>	set_value('ddlStore',''),
								'class'	=>	'class="form-control"',
								'label'	=>	'Store Name'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlCat',
								'id'	=>	'ddlCat',
								'value'	=>	set_value('ddlCat',''),
								'option'=>	$option3,
								'class'	=>	'class="form-control"',
								'label'	=>	'Category'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlBrand',
								'id'	=>	'ddlBrand',
								'value'	=>	set_value('ddlBrand',''),
								'option'=>	$option4,
								'class'	=>	'class="form-control"',
								'label'	=>	'Brand'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtInvName',
								'id'	=>	'txtInvName',
								'placeholder'	=>	'Enter Inventory Name here...',
								'value'	=>	set_value('txtInvName',''),
								'class'	=>	'form-control',
								'label'	=>	'Inventory Name'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtPrice',
								'id'	=>	'txtPrice',
								'placeholder'=>	'Enter Price  here...',
								'value'	=>	set_value('txtPrice',''),
								'class'	=>	'form-control',
								'label'	=>	'Price'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtColor',
								'id'	=>	'txtColor',
								'placeholder'	=>	'Enter Color  here...',
								'value'	=>	set_value('txtColor',''),
								'class'	=>	'form-control',
								'label'	=>	'Color'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtSize',
								'id'	=>	'txtSize',
								'placeholder'	=>	'Enter Size here...',
								'value'	=>	set_value('txtSize',''),
								'class'	=>	'form-control',
								'label'	=>	'Size'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtModel',
								'id'	=>	'txtModel',
								'placeholder'	=>	'Enter Model here...',
								'value'	=>	set_value('txtModel',''),
								'class'	=>	'form-control',
								'label'	=>	'Model'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtDateRelease',
								'id'	=>	'txtDateRelease',
								'placeholder'	=>	'Click here to pick a date',
								'value'	=>	set_value('txtDateRelease',''),
								'class'	=>	'form-control datetimepicker',
								'label'	=>	'Date Release'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtDimension',
								'id'	=>	'txtDimension',
								'placeholder'	=>	'Enter Dimension here....',
								'value'	=>	set_value('txtDimension',''),
								'class'	=>	'form-control',
								'label'	=>	'Dimension'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlStatus',
								'id'	=>	'ddlStatus',
								'option'=>	$option5,
								'class'	=>	'class="form-control"',
								'label'	=>	'Status',
							),
						array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	'Image'
							),
						array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'id'	=>	'txtDesc',
								'value'	=>	set_value('txtDesc',''),
								'class'	=>	'form-control',
								'label'	=>	'Description'
							),
			);
		return $ctrl;
	}

	function editCtrl($id)
	{
		$item = $this->im->get_inventory($id);
		$invCode = $item->p_code;
		$account = $this->am->get_account();	
		$store = $this->im->get_store();	
		$category = $this->im->get_category();	
		$brand = $this->im->get_brand();	

		foreach ($account as $key => $value) {	#Load data into ddlAccount
			$option1[0] = 'Choose One';
			$option1[$value->acc_id] = $value->acc_code;
		}

		foreach ($store as $key => $value) {	#Load data into ddlStore
			$option2[0] = 'Choose One';
			$option2[$value->str_id] = $value->str_name;
		}

		foreach ($category as $key => $value) {	#Load data into ddlCat
			$option3[0] = 'Choose One';
			$option3[$value->cat_id] = $value->cat_name;	
		}

		foreach ($brand as $key => $value) {	#Load Data into ddlBrand
			$option4[0] = 'Choose One';
			$option4[$value->brn_id] = $value->brn_name;
		}
		$option5 = array("1"=>"Enable","0"=>"Disable");
		$ctrl = array(
						array(
								'type'	=>	'text',
								'name'	=>	'txtInvCode',
								'id'	=>	'txtInvCode',
								'placeholder'	=>	'Enter Inventory Code here...',
								'value'=>$row==""?set_value("txtProCode",$row15):$row15,
								'value'	=>	set_value('txtInvCode',$invCode),
								'class'	=>	'form-control',
								'readonly'	=>	'readonly',
								'label'	=>	'Inventory Code'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlAccount',
								'id'	=>	'ddlAccount',
								'option'=>	$option1,
								'selected'	=>	$item->acc_id,
								'class'	=>	'class="form-control"',
								'label'	=>	'Account Code'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlStore',
								'id'	=>	'ddlStore',
								'option'=>	$option2,
								'selected'	=>	$item->str_id,
								'class'	=>	'class="form-control"',
								'label'	=>	'Store Name'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlCat',
								'id'	=>	'ddlCat',
								'option'=>	$option3,
								'selected'	=>	$item->cat_id,
								'class'	=>	'class="form-control"',
								'label'	=>	'Category'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlBrand',
								'id'	=>	'ddlBrand',
								'option'=>	$option4,
								'selected'	=>	$item->brn_id,
								'class'	=>	'class="form-control"',
								'label'	=>	'Brand'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtInvName',
								'id'	=>	'txtInvName',
								'placeholder'	=>	'Enter Inventory Name here...',
								'value'	=>	set_value('txtInvName',$item->p_name),
								'class'	=>	'form-control',
								'label'	=>	'Inventory Name'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtPrice',
								'id'	=>	'txtPrice',
								'placeholder'	=>	'Enter Price  here...',
								'value'	=>	set_value('txtPrice',$item->price),
								'class'	=>	'form-control',
								'label'	=>	'Price'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtColor',
								'id'	=>	'txtColor',
								'placeholder'	=>	'Enter Color  here...',
								'value'	=>	set_value('txtColor',$item->color),
								'class'	=>	'form-control',
								'label'	=>	'Color'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtSize',
								'id'	=>	'txtSize',
								'placeholder'	=>	'Enter Size here...',
								'value'	=>	set_value('txtSize',$item->size),
								'class'	=>	'form-control',
								'label'	=>	'Size'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtModel',
								'id'	=>	'txtModel',
								'placeholder'	=>	'Enter Model here...',
								'value'	=>	set_value('txtModel',$item->model),
								'class'	=>	'form-control',
								'label'	=>	'Model'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtDateRelease',
								'id'	=>	'txtDateRelease',
								'placeholder'	=>	'Click here to pick a date',
								'value'	=>	set_value('txtDateRelease',$item->date_release),
								'class'	=>	'form-control datetimepicker',
								'label'	=>	'Date Release'
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtDimension',
								'id'	=>	'txtDimension',
								'placeholder'	=>	'Enter Dimension here....',
								'value'	=>	set_value('txtDimension',$item->dimension),
								'class'	=>	'form-control',
								'label'	=>	'Dimension'
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlStatus',
								'id'	=>	'ddlStatus',
								'option'=>	$option5,
								'selected'	=>	$item->p_status,
								'class'	=>	'class="form-control"',
								'label'	=>	'Status',
							),
						array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	'Image'
							),
						array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'id'	=>	'txtDesc',
								'value'	=>	set_value('txtDesc',$item->p_desc),
								'class'	=>	'form-control',
								'label'	=>	'Description'
							),
			);
		return $ctrl;
	}
}