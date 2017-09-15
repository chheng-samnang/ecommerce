<?php
	class blogController extends CI_Controller
	{
		var $pageHeader,$panelTitle,$cancelString;
		public function __construct()
		{
			parent::__construct();
			$this->pageHeader=$this->lang->line("blog");
			$this->panelTitle=$this->lang->line("blog");
			$this->cancelString = 'blog';
			$this->load->model('Blog_m','bm');
		}

		public function index($bl_id="")
		{
			$this->load->view('template/header');
			$this->load->view('template/left');
			$page="admin/blogController";
			$data['pageHeader'] = $this->pageHeader;					
			$data["action_url"]=array("{$page}/add","{$page}/edit","{$page}/delete"/*,"{$page}/change_password"*/);
			$data["tbl_hdr"]=array($this->lang->line("blog_name"),$this->lang->line("image"),$this->lang->line("image"),$this->lang->line("user_create"),$this->lang->line("date_create"));		
			$row=$this->bm->index($bl_id);		
			$i=0;		
			foreach($row as $value):
				$poto = $value->img;
				if(empty($poto)) $poto = "default.png";			
				$data["tbl_body"][$i]=array(
											$value->title,
											"<img class='img-thumbnail' src='".base_url('assets/uploads/'.$poto)."' width='50' >",
											substr($value->bl_desc, 0, 20)."...",
											$value->user_crea,					
											$value->date_crea,
											$value->bl_id
										);
				$i=$i+1;
			endforeach;								
				$this->load->view('admin/page_view',$data);
				$this->load->view('template/footer');
		} 

		# ============== select brand =========================
		public function validation(){
			$this->form_validation->set_rules("txtblogName","Blog","required");
			$this->form_validation->set_rules("txtUpload","Image","required");
			if($this->form_validation->run()==TRUE){
				return TRUE;
			}else{return FALSE;}
		}
		public function validation1(){
			$this->form_validation->set_rules("txtblogName","Blog","required");
			if($this->form_validation->run()==TRUE){
				return TRUE;
			}else{return FALSE;}
		}
		public function add()
		{
			if(isset($_POST['btnSubmit']))
			{	if($this->validation()==TRUE){
					$this->bm->insert_blog();
					redirect("admin/blogController");	
				}else{
					$data['action'] = "admin/blogController/add";
					$data['pageHeader'] = $this->pageHeader;
					$data['ctrl'] = $this->createCtrl();
					$data['cancel'] = "admin/blogController";
					$data['multipart'] = true;
					$this->load->view('template/header');
					$this->load->view('template/left');
					$this->load->view('admin/page_add',$data);
					$this->load->view('template/footer');
				}
			}else
			{
				$data['action'] = "admin/blogController/add";
				$data['pageHeader'] = $this->pageHeader;
				$data['ctrl'] = $this->createCtrl();
				$data['cancel'] = "admin/blogController";
				$data['multipart'] = true;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_add',$data);
				$this->load->view('template/footer');
			}
		} 

		# ===================== add brand =================


		public function edit($id="")
		{
				$row= $this->bm->get_blog($id);
				$data['ctrl'] = $this->editCtrl($id);
				$data['action'] = '';
				$data['pageHeader'] = $this->pageHeader;
				$data['panelTitle'] = $this->panelTitle;
				$data['cancel'] = $this->cancelString;
			
			if(isset($_POST['btnSubmit']))
			{
				if($this->validation1){
					$this->bm->update_blog($id);
					redirect('admin/blogController');
				}else{
					$row= $this->bm->get_blog($id);
					$data['ctrl'] = $this->editCtrl($id);
					$data['action'] = '';
					$data['pageHeader'] = $this->pageHeader;
					$data['panelTitle'] = $this->panelTitle;
					$data['cancel'] = $this->cancelString;	
				}
				
				
			}elseif (isset($_POST["btnCancel"])) 
			{
				redirect('admin/blogController');
			}
		
			else
			{
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_edit',$data);
				$this->load->view('template/footer');
			}
		
		}

		# ============= edit brand ===================

		public function delete($id="")
		{
			if ($id!="") 
			{
				$this->bm->delete_blog($id);
				redirect('admin/blogController');
			}
		}
		

		# ================ delete Brand ===============

		public function editCtrl($id=""){

		$query = $this->bm->get_blog($id);
		$pos = array("enable"=>"Enable","disable"=>"Disable");
		$ctrl = array(
				array(
							"type"	=>	"text",
							"name"	=>	"txtblogName",
							"id"	=>	"txtblogName",
							"class"	=>	"form-control",
							"placeholder"	=>	"Enter Ad Name here...",
							"value"	=>	set_value("txtAdName",$query->title),
							"label"	=>	"Blog Name",
						),
					
					array(
							'type'	=>	'dropdown',
							'name'	=>	'ddlstatus',
							'id'	=>	'ddlstatus',
							'option'=>	$pos,
							'selected'	=> $query->status,
							'class'	=>	'class="form-control"',
							'label'	=>	'Position'
						),
					array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	'Image',
								"img"=> $query->img==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$query->img)."' style='width:70px;' />",	
						),
					array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'id'	=>	'txtDesc',
								'class'	=>	'form-control',
								'value'	=>	set_value("txtDesc",$query->bl_desc),
								'label'	=>	'Description'
						)
			);
		return $ctrl;
	}
		

	public function createCtrl()
	{
		$pos = array("enable"=>"Enable","disable"=>"Disable");
		$ctrl = array(
					array(
							"type"	=>	"text",
							"name"	=>	"txtblogName",
							"id"	=>	"txtblogName",
							"class"	=>	"form-control",
							"placeholder"	=>	"Enter Blog Name here...",
							"label"	=>	$this->lang->line("blog_name"),
						),
					
					array(
							'type'	=>	'dropdown',
							'name'	=>	'ddlstatus',
							'id'	=>	'ddlstatus',
							'option'=>	$pos,
							'class'	=>	'class="form-control"',
							'label'	=>	$this->lang->line("status")
						),
					
					array(
								'type'	=>	'upload',
								'name'	=>	'txtUpload',
								'id'	=>	'txtUpload',
								'img'	=>	'',
								'label'	=>	$this->lang->Line("image"),
								// "img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row1)."' style='width:70px;' />",	
						),
					array(
								'type'	=>	'textarea',
								'name'	=>	'txtDesc',
								'id'	=>	'txtDesc',
								'class'	=>	'form-control',
								'label'	=>	$this->lang->line("descr")
						)
				);
		return $ctrl;
	}

		# ================ Create Control form =======================

	} // Class