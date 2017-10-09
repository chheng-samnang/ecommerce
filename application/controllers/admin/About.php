<?php
	class About extends CI_Controller
	{	var $page_redirect;
		var $pageHeader,$panelTitle,$cancel;
		public function __construct()
		{	
			parent::__construct();
			$this->load->model('about_m');
			$this->page_redirect="admin/About";	
		}

		public function index($brn_id="")
		{
			$this->load->view('template/header');
			$this->load->view('template/left');
			$page="admin/About";
			$data['pageHeader'] = $this->lang->line('about');				
			$data["action_url"]=array("{$page}/add","{$page}/edit","{$page}/delete"/*,"{$page}/change_password"*/);
			
			$data["tbl_hdr"]=array($this->lang->line('image'),$this->lang->line('descr'),$this->lang->line('user').$this->lang->line('create'),$this->lang->line('date').$this->lang->line('create'),$this->lang->line('user').$this->lang->line('update'),$this->lang->line('date').$this->lang->line('update'));
			$row=$this->about_m->index();	
			$i=0;	
			if($row==TRUE){
				foreach ($row as  $value) {
					$data["tbl_body"][$i]=array(
											"<img class='img-thumbnail' src='".base_url("assets/uploads/".$value->about_img)."' style='width:70px;' />",
											$value->descr,
											$value->user_create,
											$value->date_create,
											$value->user_update,
											$value->date_update,
											$value->id
										);
				$i=$i+1;
				}		
			}
				$this->load->view('admin/page_view',$data);
				$this->load->view('template/footer');
		} 

		# ============== select brand =========================
		public function valication(){

			$this->form_validation->set_rules("txtDescr","descript","required");
			$this->form_validation->set_rules("txtUpload","Upload file","required");

			if($this->form_validation->run()==TRUE){
				return TRUE;
			}else{return false;}
		}
		public function valication1(){
			$this->form_validation->set_rules("txtDescr","descript","required");
			if($this->form_validation->run()==TRUE){return TRUE;}else{return false;}
		}
		public function add($row="")
		{
			// $data['option'] = array('1'=>'Enable','0'=>'Disable');
			$data['ctrl'] = $this->createCtrl($row);
			$data['action'] = 'admin/About/add';
			$data['pageHeader'] = $this->lang->line('about');	
			$data['panelTitle'] = $this->panelTitle;
			$data['cancel'] = $this->page_redirect;

			if(isset($_POST['btnSubmit']))
			{	
				if($this->valication()==TRUE){
					$this->about_m->add();
					redirect('admin/About');
				}else{
					$this->load->view('template/header');
					$this->load->view('template/left');
					$this->load->view('admin/page_add',$data);
					$this->load->view('template/footer');	
				}
			}
			else
			{	
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/page_add',$data);
				$this->load->view('template/footer');
			}
		} 

		# ===================== add brand =================


		public function edit($id="")
		{	
					$row= $this->about_m->index($id);
					$data['ctrl'] = $this->createCtrl($row);
					$data['action'] = '';
					$data['pageHeader'] = $this->lang->line('about');	
					$data['panelTitle'] = $this->panelTitle;
					$data['cancel'] = $this->page_redirect;
				if(isset($_POST['btnCancel']))
				{	
					redirect('admin/About');
				}
				if(isset($_POST['btnSubmit']))
				{	if($this->valication1()==true){
						$this->about_m->edit($brn_id);
						redirect('admin/About');
					}else{
						$this->load->view('template/header');
						$this->load->view('template/left');
						$this->load->view('admin/page_edit',$data);
						$this->load->view('template/footer');
					}
				}else
				{	
					$this->load->view('template/header');
					//$this->load->view('template/left');
					$this->load->view('admin/page_edit',$data);
					$this->load->view('template/footer');
				}
		}
		# ============= edit brand ==================
		public function delete($brn_id="")
		{
			if ($brn_id!="") 
			{
				$row=$this->about_m->delete($brn_id);
				if($row==TRUE){redirect('admin/About');}
			}
		}

		# ================ delete Brand ===============

		public function createCtrl($row="")
		{	
				if($row!=""){
				$row1 = $row->descr;
				$row2 = $row->about_img;
				}
				$ctrl = array(	
								array(
										'type'	=>	'upload',
										'name'	=>	'txtUpload',
										'id'	=>	'txtUpload',
										"img"=>$row==""? set_value("txtUpload") :"<img class='img-thumbnail' src='".base_url("assets/uploads/".$row2)."' style='width:70px;' />",
										'label'	=>	$this->lang->line('image')
								),	
								array(
										'type'=>'textarea',
										'name'=>'txtDescr',
										'label'=>$this->lang->line('descr'),
										'value'=>$row? $row1:NULL,
										'rows'=>'4'
									)
						);
			return $ctrl;
		}

		# ================ Create Control form =======================

	} // Class