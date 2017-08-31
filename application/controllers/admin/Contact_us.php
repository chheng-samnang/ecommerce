<?php
	class Contact_us extends CI_Controller
	{
		var $pageHeader,$panelTitle,$cancel;
		public function __construct()
		{
			parent::__construct();

			$this->pageHeader='Contact-Us';
			$this->panelTitle='Contact';
			$this->cancel = 'admin/Contact_us';
			$this->load->model('contact_us_m');
		}

		public function index($brn_id="")
		{
			$this->load->view('template/header');
			$this->load->view('template/left');
			$page="admin/Contact_us";
			$data['pageHeader'] = $this->lang->line('contact');				
			$data["action_url"]=array("{$page}/add","{$page}/edit","{$page}/delete"/*,"{$page}/change_password"*/);
			$data["tbl_hdr"]=array($this->lang->line('phone')."1",$this->lang->line('phone')."2",$this->lang->line('email'),$this->lang->line('website'),$this->lang->line('address'),$this->lang->line('facebook'),$this->lang->line('user').$this->lang->line('create'),$this->lang->line('date').$this->lang->line('create'),$this->lang->line('user').$this->lang->line('update'),$this->lang->line('date').$this->lang->line('update'));		
			$row=$this->contact_us_m->index();	
			$i=0;
			if($row==TRUE){
				foreach ($row as  $value) {
					$data["tbl_body"][$i]=array(
											$value->phone1,
											$value->phone2,
											$value->email,
											$value->web,
											$value->addr,
											$value->fb,
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
			$this->form_validation->set_rules('phone1','Phone1','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
			$this->form_validation->set_rules('phone2','Phone1','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules("addr","address","required");
			if($this->form_validation->run()==TRUE){
				return TRUE;
			}else{return false;}
		}
		public function add($row="")
		{
			// $data['option'] = array('1'=>'Enable','0'=>'Disable');
			$data['ctrl'] = $this->createCtrl($row);
			$data['action'] = 'admin/Contact_us/add';
			$data['pageHeader'] = $this->lang->line('contact');	
			$data['panelTitle'] = $this->panelTitle;
			$data['cancel'] = $this->cancel;

			if(isset($_POST['btnSubmit']))
			{	
				if($this->valication()==TRUE){
					$this->contact_us_m->add();
					redirect('admin/Contact_us');
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


		public function edit($brn_id="")
		{	
					$row= $this->contact_us_m->index($brn_id);
					$data['ctrl'] = $this->createCtrl($row);
					$data['action'] = '';
					$data['pageHeader'] = $this->lang->line('contact_us');	
					$data['panelTitle'] = $this->panelTitle;
					$data['cancel'] = $this->cancel;
				if(isset($_POST['btnCancel']))
				{	
					redirect('admin/Contact_us');
					
				}
				if(isset($_POST['btnSubmit']))
				{	if($this->valication()==true){
						$this->contact_us_m->edit($brn_id);
						redirect('admin/Contact_us');
					}else{
						$this->load->view('template/header');
						$this->load->view('template/left');
						$this->load->view('admin/page_edit',$data);
						$this->load->view('template/footer');
					}
				}
			
			else
				{
					$this->load->view('template/header');
					$this->load->view('template/left');
					$this->load->view('admin/page_edit',$data);
					$this->load->view('template/footer');
				}
		
		}
		# ============= edit brand ==================
		public function delete($id="")
		{
			if ($id!="") 
			{
				$row=$this->contact_us_m->delete($id);
				if($row==TRUE){redirect('admin/Contact_us');}
			}
		}

		# ================ delete Brand ===============

		public function createCtrl($row)
		{
				if($row!=""){
					foreach ($row as $value) 
					{
						$row1 = $value->contact_desc;
						$row2 = $value->phone1;
						$row3 = $value->phone2;
						$row4 = $value->addr;
						$row5 = $value->fb;
						$row6 = $value->web;
						$row7 = $value->email;
					}
				}

				$ctrl = array(
						array(
										'type'=>'text',
										'name'=>'phone1',
										'id'=>'phone1',
										'value'=>$row? $row2:NULL,
										'placeholder'=>$this->lang->line('phone').'1',
										'class'=>'form-control',
										'label'=>$this->lang->line('phone').'1',										
									),
								array(
										'type'=>'text',
										'name'=>'phone2',
										'id'=>'phone2',
										'value'=>$row? $row3:NULL,
										'placeholder'=>$this->lang->line('phone').'2...',
										'class'=>'form-control',
										'label'=>$this->lang->line('phone').'2',
									),
									array(
										'type'=>'text',
										'name'=>'email',
										'id'=>'email',
										'value'=>$row? $row7:NULL,
										'placeholder'=>$this->lang->line('email'),
										'class'=>'form-control',
										'label'=>$this->lang->line('email'),
									),
								array(
										'type'=>'textarea',
										'name'=>'addr',
										'label'=>$this->lang->line('address'),
										'value'=>$row? $row4:NULL,
										'rows'=>'4'
									),
								array(
										'type'=>'textarea',
										'name'=>'desce',
										'label'=>$this->lang->line('descr'),
										'value'=>$row? $row1:NULL,
										'rows'=>'6'
									),
								array(
										'type'=>'text',
										'name'=>'fb',
										'id'=>'fb',
										'value'=>$row?$row5:NULL,
										'placeholder'=>$this->lang->line('fb').'..',
										'class'=>'form-control',
										'label'=>$this->lang->line('fb'),
									),
								array(
										'type'=>'text',
										'name'=>'web',
										'id'=>'web',
										'value'=>$row? $row7:NULL,
										'placeholder'=>$this->lang->line('website').'...',
										'class'=>'form-control',
										'label'=>$this->lang->line('website'),
									),
								);
			return $ctrl;
		}

		# ================ Create Control form =======================

	} // Class