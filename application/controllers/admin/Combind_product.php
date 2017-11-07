<?php
	class Combind_product extends CI_Controller
	{	var $page_redirect;
		var $pageHeader,$panelTitle,$cancel;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('combind_product_m','cp');
			$this->load->model("AccountModel",'accm');
			$this->page_redirect="admin/Combind_product";
		}

		public function index()
		{
			$this->load->view('template/header');
			$this->load->view('template/left');
			$page="admin/Combind_product";
			$data['pageHeader'] = $this->lang->line('menu20');
			$data["action_url"]=array("{$page}/add","{$page}/edit","{$page}/delete"/*,"{$page}/change_password"*/);
			$data["tbl_hdr"]=array($this->lang->line("code"),$this->lang->line('shop'),$this->lang->line('supplier'),$this->lang->line('user_create'),$this->lang->line('date_create'));
			$row=$this->cp->index();
			$i=0;
			if($row!=""){
				foreach($row as $value):
				$data["tbl_body"][$i]=array(
											"<a href=".base_url($this->page_redirect.'/combind_detail/'.$value->com_id)." title='Product Detail'>".$value->com_code."</a>",
											$value->Shop,
											$value->Supplier,
											$value->user_crea,
											$value->date_crea,
											$value->com_id
										);
				$i=$i+1;
				endforeach;
			}
			$this->load->view('admin/page_view',$data);
			$this->load->view('template/footer');
		}

		public function combind_detail($id="")
		{
			// $data["supplyer"]=$this->cp->get_supply($id);
			// $data["detail"]=$this->cp->combind_detail($id);
			// $data['cancel'] = $this->lang->line('admin/Product_c');
			// $this->load->view('template/header');
			// $this->load->view('template/left');
			// $this->load->view('admin/combind_detail.php',$data);
			// $this->load->view('template/footer');
		}

		public function add(){
			$this->load->view('template/header');
			$data["acc_info"]=$this->cp->get_account();
			$this->load->view('admin/combind_product',$data);
			$this->load->view('template/footer');
		}

		public function add_value (){
			$json=json_decode($this->input->post("str"));
			$row=$this->cp->add($json);
			if($row===TRUE){
				redirect("admin/Combind_product");
			}
		}

		public function edit($id){
			$data["id"] = $id;
			$msg = "";
			if(isset($_POST["btnSubmit"]))
			{
				$jsonData = json_decode($_POST["txtStr"]);
				$result = $this->cp->editProduct($jsonData,$id);
				if($result)
				{
					redirect(base_url("admin/combind_product"));
				}else{
					$msg = "There is a problem with inserting data.";
					$data["msg"] = $msg;
					$this->load->view('template/header');
					$this->load->view('template/left');
					$this->load->view('admin/edit_combind',$data);
					$this->load->view('template/footer');
				}
			}else{
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/edit_combind',$data);
				$this->load->view('template/footer');
			}
		}

		public function delete($id){
			if($id!=""){
					$result = $this->cp->deleteProduct($id);
					if($result){
						redirect(base_url("admin/combind_product"));
					}else{
						return false;
					}
			}
		}
	} // Class
