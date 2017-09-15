<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_controller extends CI_Controller {
	function __construct(){
					parent::__construct();
					$this->pageHeader='User';		
					$this->cancelString = 'user_controller';
					$this->load->model('user_model','um');
					$this->cancelString = 'admin/User_controller';
			 }
    public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/left');
		$page="admin/user_controller";
		$data['pageHeader'] = $this->lang->line('user');
		$data["action_url"]=array("{$page}/add","{$page}/edit","{$page}/delete","{$page}/change_password");
		$data["tbl_hdr"]=array($this->lang->line("user_name"),$this->lang->line("user_code"),$this->lang->line("descr"),$this->lang->line("type"),$this->lang->line("status"),$this->lang->line("user_create"),$this->lang->line("user_create"),$this->lang->line("user_update"),$this->lang->line("date_update"));	
		$id="";	
		$row=$this->um->index($id);		
		$i=0;		
		foreach($row as $value):			
			$data["tbl_body"][$i]=array(
										$value->user_name,
										$value->user_code,
										$value->user_desc,
										$value->user_type,
										$value->user_status=="1"?$this->lang->line("enable"):$this->lang->line("disable"),
										$value->user_crea,
										$value->date_crea,
										$value->user_updt,
										$value->date_updt,
										$value->user_id
									);
		    $i=$i+1;
		endforeach;								
		$this->load->view('admin/page_user_view',$data);
		$this->load->view('template/footer');
    }
    public function add()
	{   
		$row="";
		$option= array('1'=>$this->lang->line("enable"),'0'=>$this->lang->line("disable"));
		$option1=array(''=>$this->lang->line("user_type"),'admin'=>$this->lang->line("admin"),'general'=>$this->lang->line("general"),'editer'=>$this->lang->line("editer"),'super'=>$this->lang->line("super"));
		$data['ctrl'] = $this->createCtrl($row,$option,$option1);
		$data['action'] = 'index.php/admin/user_controller/add';
		$data['pageHeader'] = $this->lang->line('user');		
		$data['cancel'] = $this->cancelString;
		if(isset($_POST['btnSubmit']))
		{ 
		   $this->form_validation->set_rules('txtUserCode','User Code','required');
		   $this->form_validation->set_rules('txtUsername','User Name','required');
		   $this->form_validation->set_rules('txtPassword','User Password','required');
		   if($this->form_validation->run()==false){
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_add',$data);
				$this->load->view('template/footer');
			   }else{
			   	$this->um->user_create();	
				redirect('index.php/admin/user_controller');
			   }
		}else
		{
			
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}
	public function edit($id){
		$option = array('1'=>'Enable','0'=>'Disable');
		$option1=array(''=>'User Type','admin'=>'admin','general'=>'general','editer'=>'editer','super'=>'super');
		 if($id!==""){
		 	$row=$this->um->index($id);
		 }
		$data['ctrl'] = $this->createCtrl($row,$option,$option1);
		$data['action'] = "admin/user_controller/edit/{$id}";
		$data['pageHeader'] = $this->lang->line('user');		
		//$this->cancelString = 'admin/User_controller';
		if(isset($_POST['btnCancel']))
		{
			 redirect('user_controller');
		}
		if(isset($_POST['btnSubmit']))
		{
		  $this->um->user_udate($id);
		 redirect('admin/user_controller');
		}else
		{	 
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_edit',$data);
		}
	}
	public function createCtrl($row,$option,$option1)
		{			
		if($row!==""){
				foreach ($row as  $value) {
				$value_1=$value->user_code;	 	
			    $value_2=$value->user_name;
			    $value_3=$value->user_desc;
			    $value_4=$value->user_status;
			    $value_5=$value->user_id;
			    }
			    $ctrl = array( 
							array(
									'type'=>'text',
									'name'=>'txtUsercode',
									'id'=>'txtUserCode',
									'class'=>'form-control',
									'label'=>$this->lang->line("user_code"),
									'value'=>$value_1?$value_1:NULL,
									'required'=>'',
								),
							array(
									'type'=>'text',
									'name'=>'txtUsername',
									'id'=>'txtUsername',
									'class'=>'form-control',
									'label'=>$this->lang->line("user_name"),
									'value'=>$value_2?$value_2:NULL
								),
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'option'=>$option,
									'selected'=>$value_4,
									'class'=>'class="form-control"',
									'label'=>$this->lang->line("status")
								),
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'class'=>'form-control',
									'label'=>$this->lang->line("descr"),
									'value'=>$value_3?$value_3:NULL
								)
							
				);
			}else
			{
		        $ctrl = array(
					array(
							'type'=>'text',
							'name'=>'txtUserCode',
							'id'=>'txtUserCode',
							'class'=>'form-control',
							'label'=>$this->lang->line("user_code"),
							'required'=>'',
						),
					array(
							'type'=>'text',
							'name'=>'txtUsername',
							'id'=>'txtUsername',
							'class'=>'form-control',
							'label'=>$this->lang->line("user_name"),
						),
					array(
						'type'=>'password',
						'name'=>'txtPassword',
						'id'=>'txtPassword',
						'class'=>'form-control',
						'label'=>$this->lang->line("password1")
					),
					array(
						'type'=>'password',
						'name'=>'txtConfirm',
						'id'=>'txtConfirm',
						'class'=>'form-control',
						'label'=>$this->lang->line("con​firm")
					),
					array(
							'type'=>'dropdown',
							'name'=>'txtUsertype',
							'option'=>$option1,
							'class'=>'class="form-control"',
							'label'=>$this->lang->line("user_type")
						),
					array(
							'type'=>'dropdown',
							'name'=>'ddlStatus',
							'option'=>$option,
							'class'=>'class="form-control"',
							'label'=>$this->lang->line("status")
						),
					array(
							'type'=>'textarea',
							'name'=>'txtDesc',
							'class'=>'form-control',
							'label'=>$this->lang->line("descr")
						)
					);
				}
			return $ctrl;
		}
	public function delete($id){
     if($id!==""){
     	 $this->um->delete($id);
     	 redirect('admin/user_controller');
     	}
	}
	public function validation(){
		$this->form_validation->set_rules('txtPasswd','Password','required');
		$this->form_validation->set_rules('txtNewPassword','New Password','required');
		$this->form_validation->set_rules('txtConfirm','Comfirm Password','required');
		if($this->form_validation->run()==TRUE){
			return TRUE;
		}else{ return FALSE; }

	}

	public function change_password($id="",$error="")
	{	$data["error"]=$error;
		$data['cancel'] = $this->cancelString;
		$data['option'] = array('1'=>$this->lang->line("enable"),'0'=>$this->lang->line("disable"));
		$row=$this->um->index($id);
		
		foreach ($row as  $value) {
			$user_passwd=$value->user_pass;
			$data['ctrl'] = $this->changeCtrl($id);
			$data['action'] = "admin/user_controller/change_password/{$id}";
			$data['pageHeader'] = $this->pageHeader;		
		}

		if(isset($_POST['btnCancel']))
 		{
			 redirect('admin/user_controller'); 		
		}

		if(isset($_POST['btnSubmit']))
		{	
			if($this->validation()==TRUE)
			{	
				$row=$this->um->check_passwd($this->input->post("user_id"),$this->input->post("password"));
				if($row==TRUE){
					if($this->input->post("txtNewPassword")==$this->input->post("txtConfirm"))
					{	
						$row=$this->um->updatePassword();		
						if($row==TRUE){
							redirect("admin/user_controller");
						}
					}else{
						$data["error"]="Confirm password must by the same password...!";
						$this->load->view('template/header');
						$this->load->view('template/left');
						$this->load->view('admin/change_passwd',$data);  
					}
				}else{
						$data["error"]="incorrect password...!";
						$this->load->view('template/header');
						$this->load->view('template/left');
						$this->load->view('admin/change_passwd',$data); 
				}
			}else
			{	$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/change_passwd',$data);  
			}
		}else
		{	 
			$this->load->view('template/header');
			//$this->load->view('template/left');
			$this->load->view('admin/change_passwd',$data);  
		}
	}

	public function changeCtrl($id="")
		{			
			    $ctrl = array(
			    			array(
									'type'=>'password',
									'name'=>'txtPasswd',
									'id'=>'txtpasswd',
									'class'=>'form-control',
									'label'=>$this->lang->line("password1"),
								), 
							array(
									'type'=>'password',
									'name'=>'txtNewPassword',
									'id'=>'txtNewPassword',
									'class'=>'form-control',
									'label'=>$this->lang->line("new_password"),
								),
							array(
									'type'=>'password',
									'name'=>'txtConfirm',
									'id'=>'txtConfirm',
									'class'=>'form-control',
									'label'=>$this->lang->line("con​firm").$this->lang->line("password1"),
								),
							array(
									'type'=>'hidden',
									'value'=>$id,
									'name'=>'user_id',
								)
				);
				return $ctrl;
		}
	function logout()
	{
		session_destroy();
		$data['msg'] = 'This user has been logout successfully.';	
		$this->load->view('template/login',$data);
	}
}
