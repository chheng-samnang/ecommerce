<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class AccountController extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;
	function __construct()
	{
		parent::__construct();
		$this->page_redirect = "account";
		$this->action="account/add";
		$this->pageHeader="account";
		$this->cancel = "account";
		$this->load->model("accountModel","am");
		$this->load->model("locationModel","lm");
	}

	function index()
	{
		$data['pageHeader'] = $this->lang->line('account');
		$data['tbl_hdr'] = array($this->lang->line("code").$this->lang->line("account"),$this->lang->line("name").$this->lang->line("member"),$this->lang->line("status"),$this->lang->line("gender"),$this->lang->line("type").$this->lang->line("account"),$this->lang->line("image"));
		$query = $this->am->get_account();
		$i=0;
		if(!empty($query))
		{
			foreach ($query as $key => $value) {
			$sex = $value->sex=="M"?"Male":"Female";
			$poto = $value->acc_img;
			if(empty($poto)) $poto = 'default.png';
			$data["tbl_body"][$i] = array(
											$value->acc_code,
											$value->mem_name,
											$value->status=="1"?$this->lang->line("enable"):$this->lang->line("disable"),
											$sex,
											$value->acc_type,
											"<img class='img-thumbnail' src='assets/uploads/".$poto."' style='width:43px;' />",
											$value->acc_id
				);
			$i++;
			}
		}else
		{
			$data["tbl_body"][$i] = array();
		}	
		$data['action_url'] = array($this->page_redirect.'/add',
									$this->page_redirect.'/edit',
									$this->page_redirect.'/delete',
									$this->page_redirect.'/changpassword',
									) ;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function add(){ 
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|callback__check_length[6,10]');
			if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
		}

	function add_account()
	{
		if(isset($_POST['btnSubmit']))
		{		
			if($this->input->post("txtPassword")==$this->input->post("txtConfirm"))
			{
				$this->am->insert_account();
				redirect("account");	
			}else
			{
				$data['error']="confirm-password must be the same password...! ";
				$data['action'] = $this->action;
				$data['multipart'] = true;
				$data['pageHeader'] = $this->lang->line('account');
				$data['ctrl'] = $this->createCtrl();
				$data['cancel'] = $this->cancel;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_add',$data);
				$this->load->view('template/footer');
			}
		}else
		{
			$data['action'] = $this->action;
			$data['multipart'] = true;
			$data['pageHeader'] = $this->lang->line('account');
			$data['ctrl'] = $this->createCtrl();
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}
	public function validation(){
		$this->form_validation->set_rules("confirmPassword","Confirm password","required");
		$this->form_validation->set_rules("newpassword","Password","required");
		if($this->form_validation->run()==TRUE){
			return true;
		}else{return false;}
	}
	public function changpassword($id="",$error=""){
			$data['error']=$error;
			$data["acc_id"]=$id;
			$data['action'] = $this->action;
			$data['multipart'] = true;
			$data['pageHeader'] = $this->lang->line('account');
			$data['ctrl'] = $this->createCtrl();
			$data['cancel'] = $this->cancel;
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/acc_change_password',$data);
			$this->load->view('template/footer');
	}
	public function save_chage_password(){
		if($this->validation()==TRUE){
			if($this->input->post("newpassword")==$this->input->post("confirmPassword")){
			 	$row=$this->am->changpassword();
			 	if($row==TRUE){
			 		$this->index();
			 }
			}else{
				$error="confirm password must be the same password....!";
				$acc_id=$this->input->post("acc_id");
				$this->changpassword($acc_id,$error);}
		}else{$this->changpassword();}
	}
	function createCtrl()
	{
		$query = $this->am->loadMember();

		foreach ($query as $key => $value) {
			$option1[0] = $this->lang->line("choose_one");
			$option1[$value->mem_id] = $value->mem_name;
		}
		$location = $this->lm->get_location();
		
		foreach ($location as $key => $value) {
			$option4[0]	=	$this->lang->line("choose_one");
			$option4[$value->loc_id] = $value->loc_name;
		}
		$acc = date('s');
		$option2 = array('0'=>$this->lang->line("choose_one"),'F'=>$this->lang->line("female"),'M' =>$this->lang->line("male"));
		$option5 = array('1'=>$this->lang->line("enable"),'0'=>$this->lang->line("disable"));
		$option3 = array('General'=>$this->lang->line("general"),'Agent'=>$this->lang->line("agent"),'Shop-owner'=>$this->lang->line("shop-owner"),'Bussiness'=>$this->lang->line("bussiness"),'Association'=>$this->lang->line("association"));
		
		$ctrl = array(
						array(
								'type'	=>	'text',
								'name'	=>	'txtAccCode',
								'id'	=>	'txtAccCode',
								'readonly'=>'readonly',
								'placeholder'=>$this->lang->line("account").$this->lang->line("code")."....",
								'value'	=>	"acc00".$acc,
								'class'	=>	'form-control',
								'label'	=>	$this->lang->line("account").$this->lang->line("code")
							),
						array(
								'type'	=>	'password',
								'name'	=>	'txtPassword',
								'id'	=>	'txtPassword',
								'placeholder'=>$this->lang->line("password")."....",
								'class'	=>	'form-control',
								'label'	=>	$this->lang->line("password"),
								'required'	=>	''
							),
						array(
								'type'	=>	'password',
								'name'	=>	'txtConfirm',
								'id'	=>	'txtConfirm',
								'placeholder'=>$this->lang->line("con​firm").$this->lang->line("password")."....",
								'class'	=>	'form-control',
								'label'	=>	$this->lang->line("con​firm").$this->lang->line("password"),
								'required'	=>	''
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlMember',
								'id'	=>	'ddlMember',
								'option'=>	$option1,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("member")
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlGender',
								'id'	=>	'ddlGender',
								'option'=>	$option2,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("gender")
							),

						array(
								'type'	=>	'text',
								'name'	=>	'txtDob',
								'id'	=>	'txtDob',
								'placeholder'=>$this->lang->line("con​firm").$this->lang->line("password")."....",
								'class'	=>	'form-control datetimepicker',
								'label'	=>	$this->lang->line("dateOfBirth"),
								'value'	=>	set_value('txtDob',''),
								'required'	=>	''
							),
						array(
								'type'	=>	'textarea',
								'name'	=>	'txtPob',
								'id'	=>	'txtPob',
								'class'	=>	'form-control',
								'value'	=>	set_value('txtPob',''),
								'label'	=>	$this->lang->line("placeOfBirth")
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlAccType',
								'id'	=>	'ddlAccType',
								'option'=>	$option3,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("type").$this->lang->line("account")	
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtCompany',
								'id'	=>	'txtCompany',
								'placeholder'=>$this->lang->line("companey")."....",
								'class'	=>	'form-control',
								'value'	=>	set_value('txtCompany',''),
								'label'	=>	$this->lang->line("companey")
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtPosition',
								'id'	=>	'txtPosition',
								'placeholder'=>$this->lang->line("position")."....",
								'class'	=>	'form-control',
								'value'	=>	set_value('txtPosition',''),
								'label'	=>	$this->lang->line("position")
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtContact',
								'id'	=>	'txtContact',
								'placeholder'=>$this->lang->line("phone")."....",
								'class'	=>	'form-control',
								'value'	=>	set_value("txtContact",""),
								'label'	=>	$this->lang->line("phone")
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlLocation',
								'id'	=>	'ddlLocation',
								'option'=>	$option4,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("location")
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlStatus',
								'id'	=>	'ddlStatus',
								'option'=>	$option5,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("status")
							),
						array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	$this->lang->line("image")
							),
			);
		return $ctrl;
	}
	
	function editCtrl($id)
	{
		$account = $this->am->get_account($id);
		$query = $this->am->loadMember();

		foreach ($query as $key => $value) {
			$option1[0] = $this->lang->line("choose_one");
			$option1[$value->mem_id] = $value->mem_name;
		}
		$location = $this->lm->get_location();
		
		foreach ($location as $key => $value) {
			$option4[0]	=	$this->lang->line("choose_one");
			$option4[$value->loc_id] = $value->loc_name;
		}
		$option2 = array('0'=>$this->lang->line("choose_one"),'F'=>$this->lang->line("female"),'M' =>$this->lang->line("male"));
		$option5 = array('1'=>$this->lang->line("enable"),'0'=>$this->lang->line("disable"));
		$option3 = array('General'=>$this->lang->line("general"),'Agent'=>$this->lang->line("agent"),'Shop-owner'=>$this->lang->line("shop-owner"),'Bussiness'=>$this->lang->line("bussiness"),'Association'=>$this->lang->line("association"));
		
		$ctrl = array(
						array(
								'type'	=>	'text',
								'name'	=>	'txtAccCode',
								'id'	=>	'txtAccCode',
								'readonly'=>'readonly',
								'placeholder'=>$this->lang->line("account").$this->lang->line("code")."...",
								'value'	=>	set_value('txtAccCode',$account->acc_code),
								'class'	=>	'form-control',
								'label'	=>	$this->lang->line("account").$this->lang->line("code")
							),
						
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlMember',
								'id'	=>	'ddlMember',
								'option'=>	$option1,
								'selected'	=>	$account->mem_id,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("member")
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlGender',
								'id'	=>	'ddlGender',
								'option'=>	$option2,
								'selected'	=>	$account->sex,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("gender")
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtDob',
								'id'	=>	'txtDob',
								'placeholder'=>$this->lang->line("dateOfBirth")."...",
								'class'	=>	'form-control datetimepicker',
								'label'	=>	$this->lang->line("dateOfBirth"),
								'value'	=>	set_value('txtDob',$account->dob),
								'required'	=>	''
							),
							array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlAccType',
								'id'	=>	'ddlAccType',
								'option'=>	$option3,
								'selected'	=>	$account->acc_type,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("type").$this->lang->line("account")	
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtCompany',
								'id'	=>	'txtCompany',
								'placeholder'=>$this->lang->line("company")."...",
								'class'	=>	'form-control',
								'value'	=>	set_value('txtCompany',$account->company),
								'label'	=>	$this->lang->line("companey")
							),
							array(
								'type'	=>	'text',
								'name'	=>	'txtPosition',
								'id'	=>	'txtPosition',
								'placeholder'=>$this->lang->line("position")."...",
								'class'	=>	'form-control',
								'value'	=>	set_value('txtPosition',$account->position),
								'label'	=>	$this->lang->line("position")
							),
						array(
								'type'	=>	'text',
								'name'	=>	'txtContact',
								'id'	=>	'txtContact',
								'placeholder'=>$this->lang->line("phone")."...",
								'class'	=>	'form-control',
								'value'	=>	set_value("txtContact",$account->contact_phone),
								'label'	=>	$this->lang->line("contact")
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlLocation',
								'id'	=>	'ddlLocation',
								'option'=>	$option4,
								'selected'	=>	$account->loc_id,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("location")
							),
						array(
								'type'	=>	'textarea',
								'name'	=>	'txtPob',
								'id'	=>	'txtPob',
								'class'	=>	'form-control',
								'value'	=>	set_value('txtPob',$account->pob),
								'label'	=>	$this->lang->line("PlaseOfBirth")
							),
						array(
								'type'	=>	'dropdown',
								'name'	=>	'ddlStatus',
								'id'	=>	'ddlStatus',
								'option'=>	$option5,
								'selected'=>$account->status,
								'class'	=>	'class="form-control"',
								'label'	=>	$this->lang->line("status")
							),	
						
						array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	$this->lang->line("account")
							)
			);
		return $ctrl;
	}
	
	function edit_account($id)
	{
		if($id!="")
		{
			if(isset($_POST['btnSubmit']))
			{
				$this->am->update_model($id);
				redirect('account');
			}else
			{
				$data['action'] = "account/edit/".$id;
				$data['multipart'] = true;
				$data['pageHeader'] = $this->lang->line('account');
				$data['ctrl'] = $this->editCtrl($id);
				$data['cancel'] = $this->page_redirect;
				if (isset($_POST["btnCancel"])) 
				{
					redirect('account');
				}
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');
			}
		}
	}
	function delete_account($id)
	{
		if($id!="")
		{
			$this->am->delete_account($id);
			redirect('account');
		}
	}
}
?>
