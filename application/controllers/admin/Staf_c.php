<?php
class Staf_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Staff';
		$this->page_redirect="admin/staf_c";								
		$this->load->model("staf_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->lang->line('store');						
		$data["action_url"]=array("{$this->page_redirect}/add","{$this->page_redirect}/edit");
		$data["tbl_hdr"]=array($this->lang->line("staf_id"),$this->lang->line("staf_name")
			,$this->lang->line("status"),$this->lang->line("image")
			,$this->lang->line("store_name"),$this->lang->line("descr"),$this->lang->line("user_create")
			,$this->lang->line("date_create"));		
		$row=$this->staf_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$poto = $value->acc_img;
			if(empty($poto)) $poto = "default.png";
			$data["tbl_body"][$i]=array(
										$value->st_code,
										$value->mem_name,
										$value->stf_status=='1'?'Enable':"Desable",
										"<img class='img-thumbnail' src='".base_url("assets/uploads/".$poto)."' style='width:70px;' />",										
										$value->str_name==''?'No Store':$value->str_name,
										$value->descr,										
										$value->user_create,										
										date("d-m-Y",strtotime($value->date_create)),
										$value->st_id
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

	public function edit($id="",$error=""){	
		if($id!=""){			
			$row=$this->staf_m->index($id);			
			if($row==TRUE){					
				$data['error']=$error;
				$row1=$this->staf_m->index();						
				$option= array('1'=>$this->lang->line("enable"),'0'=>$this->lang->line("disable"));								
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
	public function edit_value($id){
		if(isset($_POST["btnSubmit"]))
		{	echo $id;
			$row=$this->staf_m->edit_status($id);	
			if($row==TRUE)
            {redirect("{$this->page_redirect}");}
            else echo $this->edit($id,"This Account have already !");			
		}elseif (isset($_POST["btnCancel"])) 
		{redirect('admin/staf_c');}
	}	
	public function createCtrl($row="",$option)
	{				
			if($row!="")
			{			
				$row1=$row->st_code;
				$row2=$row->stf_status;
				$row3=$row->st_id;				
			}											
			//$ctrl = array();
			$ctrl = array(
							array(
									'type'=>'text',
									'name'=>'txtStaffCode',
									'id'=>'txtStrCode',									
									'value'=>$row==""? set_value("txtStaffCode") : $row1,					
									'class'=>'form-control',
									'readonly'=>'',
									'label'=>'Store Code',									
								),							
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'value'=>$row==""? set_value("ddlStatus") : $row2,
									'option'=>$option,
									'selected'=>$row==""?NULL:$row2,
									'class'=>'class="form-control"',
									'label'=>'Status',									
								),
							array(
									'type'=>'hidden',
									'name'=>'txtSt_id',
									'value'=>$row3,
									'label'=>'',	
								),
					);
			return $ctrl;
		}
}
?>