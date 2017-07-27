<?php
class Slide_c extends CI_Controller
{
	var $pageHeader,$page_redirect,$cancel;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Slideshow';		
		$this->page_redirect="admin/slide_c";							
		$this->load->model("slide_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;					
		$data["action_url"]=array("{$this->page_redirect}/add","{$this->page_redirect}/edit","{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);
		$data["tbl_hdr"]=array("Slide name","Description","URL","Image","Status","User create","Date create","User update","Date update",);		
		$row=$this->slide_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$poto = $value->slide_path;
			if(empty($poto)) $poto = "default.png";
			$data["tbl_body"][$i]=array(
										$value->slide_name,
										$value->slide_desc,
										$value->slide_url,
										"<img class='img-thumbnail' src='".base_url("assets/uploads/".$poto)."' style='width:70px;' />",										
										$value->slide_status==1?"Enable" : "Disable",										
										$value->user_crea,										
										$value->date_crea,
										$value->user_updt,
										$value->date_updt==NULL?NULL:date("d-m-Y",strtotime($value->date_updt)),										
										$value->slide_id
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation()
	{
		$this->form_validation->set_rules('txtSlidename','Slide name','required');			
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	
	public function add()
	{		
		$option = array('1'=>'Enable','0'=>'Disable');
		$data['ctrl'] = $this->createCtrl($row="",$option);				
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['multipart'] = true;
		$data['pageHeader'] = $this->pageHeader;		
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
					$row=$this->slide_m->add();															              
	                if($row==TRUE)
	                {	
	                	redirect("{$this->page_redirect}/");                		                								
	                }	                	                                																			
				}
			else{$this->add();}		
		}		
	}
	public function edit($id="")
	{		
		if($id!="")
		{

			$row=$this->slide_m->index($id);			
			if($row==TRUE)
			{											
				$option = array('1'=>'Enable','0'=>'Disable');
				$data['multipart'] = true;								
				$data['ctrl'] = $this->createCtrl($row,$option);		
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->pageHeader;		
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/page_edit",$data);
				$this->load->view('template/footer');
			}			
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{		
		if(isset($_POST["btnSubmit"]))
		{									
			if($this->validation()==TRUE)
			{																					
				$row=$this->slide_m->edit($id);	
				if($row==TRUE)
	            {	                		                	
					redirect("{$this->page_redirect}/");	
	            }																		 																				            	                	                                											
			}
			else {$this->edit($id);}						
		}
		elseif (isset($_POST["btnCancel"])) 
		{
			redirect('slide');
		}
	}	
	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->slide_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option)
		{				
			if($row!="")
			{			
					$row1=$row->slide_name;
					$row2=$row->slide_url;
					$row3=$row->slide_path;
					$row4=$row->slide_status;
					$row5=$row->slide_desc;
					$row6=$row->slide_status;				
			}											
			//$ctrl = array();
			$ctrl = array(
							array(
									'type'=>'text',
									'name'=>'txtSlidename',
									'id'=>'txtSlidename',									
									'value'=>$row==""? set_value("txtSlidename") : $row1,					
									'placeholder'=>'Enter Slide name here...',
									'required'	=>'required',
									'class'=>'form-control',
									'label'=>'Slide Name',
									'onClick'=>'alertName()'
								),
							array(
									'type'=>'text',
									'name'=>'txtSlideUrl',
									'id'=>'txtSlideUrl',
									'value'=>$row==""? set_value("txtSlideUrl") : $row2,
									'placeholder'=>'Enter Slide URL here...',
									'class'=>'form-control',
									'label'=>'URL'
								),
							array(
									'type'=>'upload',
									'name'=>'txtUpload',
									'id'=>'txtUpload',
									'value'=>$row==""? set_value("txtUpload") : $row3,																		
									'class'=>'form-control',
									'label'=>'Chose Image',
									"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row3)."' style='width:70px;' />",										
								),							
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'value'=>$row==""? set_value("ddlStatus") : $row4,
									'option'=>$option,
									'selected'=>$row==""? NULL : $row6,
									'class'=>'class="form-control"',
									'label'=>'Status',									
								),
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'value'=>$row==""? set_value("txtDesc") : $row5,
									'label'=>'Description'
								)




							/*
							array(
								array(
										'type'=>'checkbox',
										'name'=>'chkSex[]',
										'value'=>'M',
										'label'=>'Male',
									'chkLabel'=>'Gender'
										
									),
								array(
										'type'=>'checkbox',
										'name'=>'chkSex[]',
										'value'=>'F',
										'label'=>'Female',
										'chkLabel'=>'Gender'
										
									)
								),
							array(
							'type'=>'textarea',
							'name'=>'txtDesc',
							'label'=>'Description'
							)*/
					);
			return $ctrl;
		}
}
?>