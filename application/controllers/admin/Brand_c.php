<?php
	class Brand_c extends CI_Controller
	{
		var $pageHeader,$panelTitle,$cancel;
		public function __construct()
		{
			parent::__construct();

			$this->pageHeader='Brand';
			$this->panelTitle='Brand';
			$this->cancel = 'brand';
			$this->load->model('Brand_m','bm');
		}

		public function index($brn_id="")
		{
			
			$this->load->view('template/header');
			$this->load->view('template/left');
			$page="admin/Brand_c";
			$data['pageHeader'] = $this->lang->line('brand');				
			$data["action_url"]=array("{$page}/add","{$page}/edit","{$page}/delete"/*,"{$page}/change_password"*/);
			$data["tbl_hdr"]=array($this->lang->line('brand'),$this->lang->line('descr'),$this->lang->line('user').$this->lang->line('create'),$this->lang->line('date').$this->lang->line('create'),$this->lang->line('user').$this->lang->line('update'),$this->lang->line('date').$this->lang->line('update'));
			$row=$this->bm->index($brn_id);		
			$i=0;		
			foreach($row as $value):			
				$data["tbl_body"][$i]=array(
											$value->brn_name,
											$value->brn_desc,
											$value->user_crea,								
											$value->date_crea,
											$value->user_updt,
											$value->date_updt,
											$value->brn_id
										);
				$i=$i+1;
			endforeach;								
				$this->load->view('admin/page_view',$data);
				$this->load->view('template/footer');
		} 

		# ============== select brand =========================

		public function add($row="")
		{
			// $data['option'] = array('1'=>'Enable','0'=>'Disable');
			$data['ctrl'] = $this->createCtrl($row);
			$data['action'] = 'brand/add';
			$data['pageHeader'] = $this->lang->line('brand');	
			$data['panelTitle'] = $this->panelTitle;
			$data['cancel'] = $this->cancel;

			if(isset($_POST['btnSubmit']))
			{
				$this->bm->add();
				redirect('brand');
				
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
			
					$row= $this->bm->index($brn_id);
					$data['ctrl'] = $this->createCtrl($row);
					
					$data['action'] = '';
					$data['pageHeader'] = $this->lang->line('brand');	
					$data['panelTitle'] = $this->panelTitle;
					$data['cancel'] = $this->cancel;
				if(isset($_POST['btnCancel']))
				{
					
					redirect('admin/Brand_c');
					
				}
				if(isset($_POST['btnSubmit']))
				{
					echo "<script>alert('');</script>;";
					$this->bm->edit($brn_id);
					redirect('admin/Brand_c');
					
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

		public function delete($brn_id="")
		{
			if ($brn_id!="") 
			{
				$this->bm->delete($brn_id);
				redirect('admin/Brand_c');
			}
		}

		# ================ delete Brand ===============

		public function createCtrl($row)
		{

			if ($row!="") 
			{
					
				foreach ($row as $value) 
				{
						$row1 = $value->brn_name;
						$row2 = $value->brn_desc;
						
				}
				
					$ctrl = array(

								array(
										'type'=>'text',
										'name'=>'txtBrandname',
										'id'=>'txtBrandname',
										'required'=>'',
										'value'=>$row1? $row1:NULL,
										'placeholder'=>'Enter Brand name here...',
										'class'=>'form-control',
										'label'=>$this->lang->line("brand").$this->lang->line("name"),
										'onClick'=>'alertName()'
									),

								array(
										'type'=>'textarea',
										'name'=>'txtBrandDesc',
										'label'=>'Description',
										'value'=>$row2? $row2:NULL,
										'rows'=>'6'
									)
								);
			}
			else
			{
					$ctrl = array(
							
								array(
										'type'=>'text',
										'name'=>'txtBrandname',
										'id'=>'txtBrandname',
										'required'=>'',
										'placeholder'=>$this->lang->line("name").$this->lang->line("brand").'...',
										'class'=>'form-control',
										'label'=>$this->lang->line("name").$this->lang->line("brand"),
										'onClick'=>'alertName()'
									),

								array(
										'type'=>'textarea',
										'name'=>'txtBrandDesc',
										'label'=>$this->lang->line("descr"),
										'rows'=>'6'
									)
								);
			}
			return $ctrl;
		}

		# ================ Create Control form =======================

	} // Class