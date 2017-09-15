<?php
class Member_c extends CI_Controller
{
	var $pageHeader,$page_redirect;
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Member';
		$this->page_redirect="admin/member_c";
		$this->load->model("member_m");
		$this->cancelString = 'member_m';
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/left');
		$data['pageHeader'] = $this->lang->line('member');	
		$data["action_url"]=array("{$this->page_redirect}/add","{$this->page_redirect}/edit","{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);
		$data["tbl_hdr"]=array($this->lang->line("member").$this->lang->line("code"),$this->lang->line("name"),$this->lang->line("address"),$this->lang->line("phone"),$this->lang->line("email"),$this->lang->line("date"),$this->lang->line("status"),$this->lang->line("descr"),$this->lang->line("valid").$this->lang->line("code"));
		
		$row=$this->member_m->index();
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										$value->mem_code,
										$value->mem_name,
										$value->mem_addr,
										$value->mem_phone,
										$value->mem_email,
										$value->reg_date,
										$value->mem_status==1?"Enable" : "Disable",
										$value->mem_desc,
										$value->valid_code,
										$value->mem_id
									);
			$i=$i+1;
		endforeach;
		}
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation()
	{
		$this->form_validation->set_rules('txtMemberName','Member name','required');
		$this->form_validation->set_rules('txtMemberPhone','Member phone','required');
		$this->form_validation->set_rules('txtMemberEmail','Member Email','required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
	public function add($error="")
	{	$data["error"]=$error;
		$option = array('1'=>'Enable','0'=>'Disable');
		$data['ctrl'] = $this->createCtrl($row="",$option);
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->lang->line('member');	
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
				if($this->input->post("txtPassword")==$this->input->post("txtConPassword")){
					$row=$this->member_m->add();
	                if($row==TRUE)
	                {
					    redirect("{$this->page_redirect}/");
	                }
				}else{$this->add("password must by the same confirm password..!");}
			}
			else{$this->add();}
		}
		if(isset($_POST["btnCancel"]))
		{
			$this->index();
		}
	}
	public function edit($id="")
	{
		if($id!="")
		{
			$row=$this->member_m->index($id);
			if($row==TRUE)
			{
				$option = array('1'=>'Enable','0'=>'Disable');
				$data['cancel'] = $this->page_redirect;
				$data['ctrl'] = $this->createCtrl($row,$option);
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->lang->line('member');	
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
				$row=$this->member_m->edit($id);
				if($row==TRUE)
	            {
					redirect("{$this->page_redirect}/");
	            }
			}
			else
			{
				$this->edit($id);
			}
		}
		elseif(isset($_POST['btnCancel']))
		{
					
			redirect('admin/member_c');
					
		}
	}

	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->member_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option)
		{
			if($row!="")
			{
					$row1=$row->mem_code;
					$row2=$row->mem_name;
					$row3=$row->mem_phone;
					$row4=$row->mem_email;
					$row5=$row->reg_date;
					$row6=$row->valid_code;
					$row7=$row->mem_status;
					$row8=$row->mem_addr;
					$row9=$row->mem_desc;
					$row10=$row->mem_status;
			}
			//$ctrl = array();
			$ctrl = array(
							array(
									'type'=>'text',
									'name'=>'txtMemberCode',
									'id'=>'txtMemberCode',
									'value'=>$row==""? set_value("txtMemberCode") : $row1,
									'placeholder'=>$this->lang->line("code").$this->lang->line("member")."......",
									'class'=>'form-control',
									'label'=>$this->lang->line("code").$this->lang->line("member"),
								),
							array(
									'type'=>'text',
									'name'=>'txtMemberName',
									'id'=>'txtMemberName',
									'value'=>$row==""? set_value("txtMemberName") : $row2,
									'placeholder'=>$this->lang->line("member_name"),
									'required'=>'required',
									'class'=>'form-control',
									'label'=>$this->lang->line("member_name"),
								),
							array(
								'type'=>'text',
								'name'=>'txtMemberPhone',
								'id'=>'txtMemberPhone',
								'value'=>$row==""? set_value("txtMemberPhone") : $row3,
								'placeholder'=>$this->lang->line("phone").$this->lang->line("member")."......",
								'required'=>'required',
								'class'=>'form-control',
								'label'=>$this->lang->line("phone").$this->lang->line("member"),
							),
							array(
								'type'=>'email',
								'name'=>'txtMemberEmail',
								'id'=>'txtMemberEmail',
								'value'=>$row==""? set_value("txtMemberEmail") : $row4,
								'placeholder'=>$this->lang->line("email")."......",
								'required'=>'required',
								'class'=>'form-control',
								'label'=>$this->lang->line("email"),
							),
							array(
								'type'=>'date',
								'name'=>'txtRegisterDate',
								'id'=>'txtRegisterDate',
								'value'=>$row==""? set_value("txtRegisterDate") : $row5,
								'placeholder'=>'Enter Register date here...',
								'class'=>'form-control datetimepicker',
								'label'=>$this->lang->line("register").$this->lang->line("date"),
							),
							array(
								'type'=>'text',
								'name'=>'txtValidCode',
								'id'=>'txtValidCode',
								'value'=>$row==""? set_value("txtValidCode") : $row6,
								'placeholder'=>$this->lang->line("code").$this->lang->line("valid").".....",
								'class'=>'form-control',
								'label'=>$this->lang->line("valid").$this->lang->line("code"),
							),
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'value'=>$row==""? set_value("ddlStatus") : $row7,
									'option'=>$option,
									'selected'=>$row==""? NULL : $row10,
									'class'=>'class="form-control"',
									'label'=>$this->lang->line("status"),
								),
							array(
									'type'=>'password',
									'name'=>'txtPassword',
									'class'=>'form-control',
									'label'=>$this->lang->line("password"),
								),
							array(
									'type'=>'password',
									'name'=>'txtConPassword',
									'class'=>'form-control',
									'label'=>$this->lang->line("con​firm"),
								),
							array(
									'type'=>'textarea',
									'name'=>'txtAddr',
									'value'=>$row==""? set_value("txtAddr") : $row8,
									'label'=>$this->lang->line("address")
								),
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'value'=>$row==""? set_value("textarea") : $row9,
									'label'=>$this->lang->line("descr")
								),
							);
			return $ctrl;
		}
}
?>
