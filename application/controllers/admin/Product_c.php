<?php
class Product_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Product';
		$this->page_redirect="admin/product_c";								
		$this->load->model("product_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->lang->line('product');						
		$data["action_url"]=array("{$this->page_redirect}/add","{$this->page_redirect}/edit","{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);
		$data["tbl_hdr"]=array("Product name","Product Code","Store Name","Price","Date release","User create","Date create");		
		$row=$this->product_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										"<a href=".base_url($this->page_redirect.'/p_detail/'.$value->p_id)." title='Product Detail'>".$value->p_name."</a>",
										$value->p_code,
										$value->str_name,
										$value->price."$",
										date("d-m-Y",strtotime($value->date_release)),
										$value->user_crea,
										$value->date_crea,							
										$value->p_id
									);
			$i=$i+1;
			endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function p_detail($id="")
	{
		$data["detail"]=$this->product_m->index($id);
		$data["media"]=$this->product_m->media($id);
		$data['cancel'] = $this->lang->line('admin/Product_c');	
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$this->load->view('admin/p_detail.php',$data);
		$this->load->view('template/footer');	
	}
	public function validation()
	{		
		$this->form_validation->set_rules('txtPName','Product name','required');
		$this->form_validation->set_rules('txtPrice', 'The field', 'numeric');
		$this->form_validation->set_rules('txtDateRelease','Date release','required');												
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	
	public function add()
	{		
		$p_code = $this->product_m->get_product_code();
		#option store
			$store=$this->product_m->select_tables("tbl_store");			
			if($store==TRUE)
			{
				$option1[0]	=	"Choose One";
				foreach($store as $value):						
				$option1[$value->str_id]=$value->str_name;								
			endforeach;
			}
			#option category
			$category=$this->product_m->select_tables("tbl_category");		
			if($category==TRUE)
			{
				$option2[0]	= "Choose One";
				foreach($category as $value):						
				$option2[$value->cat_id]=$value->cat_name;								
			endforeach;
			}
			#option brand
			$brand=$this->product_m->select_tables("tbl_brand");			
			if($brand==TRUE)
			{
				$option3[0]	= "Choose One";
				foreach($brand as $value):						
				$option3[$value->brn_id]=$value->brn_name;								
			endforeach;
			}	
			$option4= array('1'=>'Enable','0'=>'Disable');				
		$data['ctrl'] = $this->createCtrl($row="",$option1,$option2,$option3,$option4,$p_code);		
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->lang->line('product');		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_add',$data);
		$this->load->view('template/footer');		
	}
	public function add_value()
	{
		if(isset($_POST["btnSubmit"]))
		{
			
			if($this->validation()==TRUE)
				{									
					$row=$this->product_m->add();															              
	                if($row==TRUE)
	                {	                		                	
						redirect("{$this->page_redirect}/");
	                }	                                																			
				}
			else{$this->add();}		
		}
	}
	public function edit($id)
	{		
		if($id!="")
		{
			#option store
			$store=$this->product_m->select_tables("tbl_store");			
			if($store==TRUE)
			{
				foreach($store as $value):						
				$option1[$value->str_id]=$value->str_name;								
			endforeach;
			}
			#option category
			$category=$this->product_m->select_tables("tbl_category");		
			if($category==TRUE)
			{
				foreach($category as $value):						
				$option2[$value->cat_id]=$value->cat_name;								
			endforeach;
			}
			#option brand
			$brand=$this->product_m->select_tables("tbl_brand");			
			if($brand==TRUE)
			{
				foreach($brand as $value):						
				$option3[$value->brn_id]=$value->brn_name;								
			endforeach;
			}			
			$row=$this->product_m->index($id);		
			$option4 = array('1'=>'Enable','0'=>'Disable');		
			if($row==TRUE)
			{																																		
				$data['ctrl'] = $this->createCtrl($row,$option1,$option2,$option3,$option4,$row->p_code);		
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->lang->line('product');			
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/page_edit",$data);
				$this->load->view('template/footer');
			}else
			{echo "Product not found!";}
		}
		else{echo "Cannot find Product ID!";}
	}
	public function edit_value($id="")
	{
		if(isset($_POST["btnSubmit"]))
		{						
			$this->product_m->edit($id);	
					                		                	
			redirect("admin/product_c");	
	       	
		}elseif(isset($_POST['btnCancel']))
		{
			redirect('admin/product_c');			
		}
	}	

	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->product_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option1,$option2,$option3,$option4,$p_code)
		{	
			if($row!="")
			{			
					$row1=$row->str_id;
					$row2=$row->cat_id;														
					$row3=$row->brn_id;
					$row4=$row->p_name;										
					$row5=$row->price;
					$row6=$row->qty;
					$row7=$row->color;
					$row8=$row->size;
					$row9=$row->model;
					$row10=$row->date_release;
					$row11=$row->dimension;
					$row12=$row->short_desc;
					$row13=$row->p_desc;														
					$row14=$row->path;
					$row16=$row->p_status;
					$row15=$p_code;
			}
			$row15=$p_code;												
			//$ctrl = array();
			$ctrl = array(
							array(
									'type'=>'text',
									'name'=>'txtProCode',
									'id'=>'txtProCode',
									'value'=>$row==""?set_value("txtProCode",$row15):$row15,
									'placeholder'=>'Enter Product Code here....',
									'class'=>'form-control',
									'readonly'=>'readonly',
									'label'=>'Product Code'
								),
							array(
									'type'=>'dropdown',
									'name'=>'ddlStoreId',
									'value'=>$row==""? set_value("ddlStoreId") : $row1,									
									'option'=>$option1,
									'selected'=>$row==""?NULL:$row1,
									'class'=>'class="form-control"',
									'label'=>'Store name',									
								),
							array(
									'type'=>'dropdown',
									'name'=>'ddlCategoryId',
									'value'=>$row==""? set_value("ddlCategoryId") : $row2,
									'option'=>$option2,
									'selected'=>$row==""?NULL:$row2,
									'class'=>'class="form-control"',
									'label'=>'Category name',									
								),
							array(
									'type'=>'dropdown',
									'name'=>'ddlBrandId',
									'value'=>$row==""? set_value("ddlBrandId") : $row3,
									'option'=>$option3,
									'selected'=>$row==""?NULL:$row3,
									'class'=>'class="form-control"',
									'label'=>'Brand name',									
								),
							array(
									'type'=>'text',
									'name'=>'txtPName',
									'id'=>'txtPName',									
									'value'=>$row==""? set_value("txtPName") : $row4,					
									'placeholder'=>'Enter Product name here...',
									'required'=>'required',									
									'class'=>'form-control',
									'label'=>'Product name',									
								),
							array(
									'type'	=>	'text',
									'name'	=>	'txtStockQty',
									'id'	=>	'txtStockQty',
									'value'	=>	$row==""?set_value("txtStockQty"):$row6,
									'placeholder'	=>	'Enter stock quantity here...',
									'class'	=>	'form-control',
									'label'	=>	'Stock Quantity'
								),
							array(
									'type'=>'text',
									'name'=>'txtPrice',
									'id'=>'txtPrice',									
									'value'=>$row==""? set_value("txtPrice") : $row5,					
									'placeholder'=>'Enter Price here...',
									'required'=>'required',									
									'class'=>'form-control',
									'label'=>'Price',									
								),
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'value'=>$row==""? set_value("ddlStatus") : $row2,
									'option'=>$option4,
									'selected'=>$row==""?NULL:$row16,	
									'class'=>'class="form-control"',
									'label'=>'Status',									
								),
							array(
									'type'=>'text',
									'name'=>'txtColor',
									'id'=>'txtColor',
									'value'=>$row==""? set_value("txtColor") : $row7,
									'placeholder'=>'Enter Color here...',									
									'class'=>'form-control',
									'label'=>'Color'
								),							
							array(
								'type'=>'text',
								'name'=>'txtSize',
								'id'=>'txtSize',
								'value'=>$row==""? set_value("txtSize") : $row8,
								'placeholder'=>'Enter Size here...',																																																											
								'class'=>'form-control',
								'label'=>'Size',									
							),							
							array(
								'type'=>'text',
								'name'=>'txtModel',
								'id'=>'txtModel',
								'value'=>$row==""? set_value("txtModel") : $row9,
								'placeholder'=>'Enter Model here...',																																																										
								'class'=>'form-control',
								'label'=>'Model',									
							),
							array(
								'type'=>'date',
								'name'=>'txtDateRelease',
								'id'=>'txtDateRelease',
								'value'=>$row==""? set_value("txtDateRelease") : date("m/d/Y",strtotime($row10)),
								'placeholder'=>'Enter Date release here...',																																																			
								'class'=>'form-control datetimepicker',
								'label'=>'Date release',									
							),
							array(
								'type'=>'text',
								'name'=>'txtDimensoin',
								'id'=>'txtDimensoin',
								'value'=>$row==""? set_value("txtDimensoin") : $row11,
								'placeholder'=>'Enter Dimensoin here...',																																																			
								'class'=>'form-control',
								'label'=>'Dimensoin',									
							),
							array(
									'type'=>'upload',
									'name'=>'txtUpload',
									'id'=>'txtUpload',
									'value'=>$row==""? set_value("txtUpload") : $row3,																		
									'class'=>'form-control',
									'label'=>'Image',
									"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row14)."' style='width:70px;' />",										
								),
							array(
									'type'=>'textarea',
									'name'=>'txtShortDesc',
									'value'=>$row==""? set_value("txtShortDesc") : $row12,
									'label'=>'Short Description'
								),														
							array(
									'type'=>'textarea',
									'name'=>'txtPdesc',
									'value'=>$row==""? set_value("txtPdesc") : $row13,
									'label'=>'Product Description'
								),
								array(
									'type'=>'hidden',
									'name'=>'txtMediaType',
									'value'=>'image',
									'label'=>''								
								)							
							);
			return $ctrl;
		}
}
?>