<?php
class Store_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Store';
		$this->page_redirect="admin/store_c";								
		$this->load->model("store_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->lang->line('store');						
		$data["action_url"]=array("{$this->page_redirect}/add","{$this->page_redirect}/edit","{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);
		
		$data["tbl_hdr"]=array($this->lang->line("stor_code")
			,$this->lang->line("account_code"),$this->lang->line("member_name")
			,$this->lang->line("stor_name"),$this->lang->line("stor_type")
			,$this->lang->line("descr"),$this->lang->line("image"),$this->lang->line("user_create")
			,$this->lang->line("date_create"),$this->lang->line("user_update"),$this->lang->line("date_update"));		
		$row=$this->store_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$poto = $value->str_img;
			if(empty($poto)) $poto = "default.png";
			$data["tbl_body"][$i]=array(
										$value->str_code,
										$value->acc_code,
										$value->mem_name,
										$value->str_name,
										$value->str_type,
										$value->str_desc,										
										"<img class='img-thumbnail' src='".base_url("assets/uploads/".$poto)."' style='width:70px;' />",										
										$value->user_crea,										
										date("d-m-Y",strtotime($value->date_crea)),
										$value->user_updt,
										$value->date_updt==NULL?NULL:date("d-m-Y",strtotime($value->date_updt)),										
										$value->str_id
									);
			$i=$i+1;
			endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation()
	{		
		$this->form_validation->set_rules('txtStrName','Store name','required');										
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	
	public function add($error="")
	{
		$data['error']=$error;
		$row=$this->store_m->select_account();				
		if($row==TRUE)
		{
			foreach($row as $value):						
			$option[$value->acc_id]=$value->mem_name;				
			endforeach;
		}					
		$data['ctrl'] = $this->createCtrl($row="",$option);		
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->lang->line('store');		
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
				$row=$this->store_m->add();
				if($row==TRUE)
                {	                		                	
					redirect("{$this->page_redirect}/");     	
                }
                else $this->add("This Account have already !");														              	                	                                																			
			}			
		}
	}
	public function edit($id="",$error="")
	{	
		if($id!="")
		{			
			$row=$this->store_m->index($id);			
			if($row==TRUE)
			{					
				$data['error']=$error;
				$row1=$this->store_m->select_account();						
				if($row1==TRUE)
				{
					foreach($row1 as $value):						
					$option[$value->acc_id]=$value->mem_name;										
					endforeach;
				}									
				$data['ctrl'] = $this->createCtrl($row,$option);		
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->lang->line('store');		
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/page_edit",$data);
				$this->load->view('template/footer');
			}						
		}		
	}
	public function edit_value($id)
	{
		
		if(isset($_POST["btnSubmit"]))
		{							           			
			if($this->validation()==TRUE)
			{										
				$row=$this->store_m->edit($id);	
				if($row==TRUE)
	            {             		                	
					redirect("{$this->page_redirect}");	
	            }
	            else echo $this->edit($id,"This Account have already !");								
									 																				            	                	                                												
			}
			else{$this->edit($id,$error="");}			
		}
		elseif (isset($_POST["btnCancel"])) 
		{
			redirect('admin/store_c');
		}
	}	

	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->store_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option)
		{				
			if($row!="")
			{			
				$row1=$row->str_code;				
				$row2=$row->mem_name;
				$row3=$row->str_name;
				$row4=$row->str_type;					
				$row5=$row->str_img;					
				$row6=$row->str_desc;
				$row7=$row->acc_id;				
			}											
			//$ctrl = array();
			$ctrl = array(
							array(
									'type'=>'text',
									'name'=>'txtStrCode',
									'id'=>'txtStrCode',									
									'value'=>$row==""? set_value("txtStrCode") : $row1,					
									'placeholder'=>'Enter Store code here...',									
									'class'=>'form-control',
									'label'=>'Store Code',									
								),							
							array(
									'type'=>'dropdown',
									'name'=>'ddlAccCode',
									'value'=>$row==""? set_value("ddlAccCode") : $row2,
									'option'=>$option,
									'selected'=>$row==""?NULL:$row7,
									'class'=>'class="form-control"',
									'label'=>'Member name',									
								),
							array(
									'type'=>'text',
									'name'=>'txtStrName',
									'id'=>'txtStrName',
									'value'=>$row==""? set_value("txtStrName") : $row3,
									'placeholder'=>'Enter Store name here...',
									'required'	=>'required',
									'class'=>'form-control',
									'label'=>'Store name'
								),
							array(
									'type'=>'text',
									'name'=>'txtStrType',
									'id'=>'txtStrType',
									'value'=>$row==""? set_value("txtStrType") : $row4,
									'placeholder'=>'Enter Store type here...',									
									'class'=>'form-control',
									'label'=>'Store type'
								),
							array(
									'type'=>'upload',
									'name'=>'txtStrImg',
									'id'=>'txtStrImg',
									'value'=>$row==""? set_value("txtStrImg") : $row5,																																																											
									'class'=>'form-control',
									'label'=>'Chose file',
									"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row5)."' style='width:70px;' />",
								),														
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'value'=>$row==""? set_value("txtDesc") : $row6,
									'label'=>'Description'
								)
					);
			return $ctrl;
		}
}
?>