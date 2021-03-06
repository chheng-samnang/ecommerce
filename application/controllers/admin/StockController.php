<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class StockController extends CI_Controller
{	
	var $pageHeader,$page_redirect,$action,$cancel,$str_id;
	function __construct()
	{
		parent::__construct();
		$this->page_redirect = "stock";
		$this->action="stock/add";
		$this->pageHeader="Stock";
		$this->str_id = isset($this->session->str_id)?$this->session->str_id:"0";
		$this->cancel = "stock";
		$this->load->model('stockModel','sm');
	}

	function index()
	{	
		$data['pageHeader'] = $this->lang->line('stock');
		$data['tbl_hdr'] = array($this->lang->line("product_name"),$this->lang->line("qty"),$this->lang->line("type"),$this->lang->line("descr"),$this->lang->line("user_create"),$this->lang->line("date_create"));

		$row = $this->sm->get_stock();
		$i = 0;
		if(!empty($row))
		{
			foreach($row as $key => $value){
				$data['tbl_body'][$i]	=	array(
												$value->p_name,
												$value->qty,
												$value->stk_type,
												$value->stk_desc,
												$value->user_crea,
												$value->date_crea,
												$value->p_id
											);
				$i++;
			}	
		}else
		{
			$data['tbl_body'][$i] = array();
		}
		$data['action_url'] = array(0=>$this->page_redirect.'/add',
									1=>$this->page_redirect.'/edit',
									2=>$this->page_redirect.'/delete') ;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function adds()
	{
	    $product = $this->sm->get_product();
		foreach ($product as $key => $value){
			$option[0]	= $choose;
			$option[$value->p_id] = $value->p_name;}
		$data["error"]="Product is required...!";
		$data['action'] = 'stock/add';
		$data['pageHeader'] = $this->lang->line('stock');
		$data['ctrl'] = $this->createCtrl($row="", $option);
		$data['cancel'] = $this->cancel;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_add',$data);
		$this->load->view('template/footer');
	}

	function add_stock()

	{	$choose=$this->lang->line("choose");

		if(isset($_POST['btnSubmit']))
		{	
		if($this->input->post("ddlProduct")){
				$row=$this->sm->insert_stock();
				if($row==TRUE){ redirect("stock");}
			}else{ $this->adds();}	
		}else
		{
			$product = $this->sm->get_product();
			foreach ($product as $key => $value) {

				$option[0]	= $choose;
				$option[$value->p_id] = $value->p_name;}

			$data['action'] = 'stock/add';
			$data['pageHeader'] = $this->lang->line('stock');
			$data['ctrl'] = $this->createCtrl($row="", $option);
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}

	function edit_stock($id)
	{	

		$choose=$this->lang->line("choose");

		if($id!='')
		{	
			$product = $this->sm->get_product();
			foreach ($product as $key => $value){
			$option[0]	= $choose;
			$option[$value->p_id] = $value->p_name;}
			$row = $this->sm->get_stock($id);
			$data['action'] = 'stock/edit/'.$id;
			$data['pageHeader'] = $this->pageHeader;
			$data['ctrl'] = $this->createCtrl($row, $option);
			$data['cancel'] = $this->cancel;
			if(isset($_POST['btnSubmit']))
			{
				$this->sm->update_stock($id);
				redirect("stock");
			}else
			{	
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');
			}	
		}
	}

	function createCtrl($row="", $option)
	{	

		$choose=$this->lang->line("choose");

		if($row!="")
		{
			$row1 = $row->p_id;
			$row2 = $row->stk_type;
			$row3 = $row->qty;
			$row4 = $row->stk_desc;
		}

		$option1 = array('Stock In'=>$this->lang->line("stock_in"),'Stock Out'=>$this->lang->line("stock_out"));
		$ctrl = array(
					array(
							'type'	=>	'dropdown',
							'name'	=>	'ddlProduct',
							'id'	=>	'ddlProduct',
							'option'=>	$option,
							'value'=>$row==""? set_value("ddlProduct") : $row1,
							'selected'=>$row==""?NULL:$row1,
							'class'	=>	'class="form-control"',
							'label'	=>	$this->lang->line("product"),
						),
					array(
							'type'	=>	'text',
							'name'	=>	'txtQty',
							'id'	=>	'txtQty',
							'value'=>$row==""? set_value("txtQty") : $row3,
							'placeholder'=>$this->lang->line("qty"),
							'class'	=>	'form-control',
							'label'	=>	$this->lang->line("qty"),
							'required'	=>	'',
						),
					array(
							'type'	=>	'dropdown',
							'name'	=>	'ddlType',
							'id'	=>	'ddlType',
							'option'=>	$option1,
							'selected'	=>	$row==""?NULL:$row2,						
							'class'	=>	'class="form-control"',
							'label'	=>	$this->lang->line("transaction_type"),
						),
					array(
							'type'	=>	'textarea',
							'name'	=>	'txtDesc',
							'id'	=>	'txtDesc',
							'value'=>$row==""? set_value("txtDesc") : $row4,
							'label'	=>	$this->lang->line("descr"),
						)
			);
		return $ctrl;
	}
	function delete_stock($id)
	{
		if($id!="")
		{
			$this->sm->delete_stock($id);
			redirect("stock");
		}
	}
}
?>