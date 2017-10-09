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
			$data['pageHeader'] = $this->lang->line('combind_product');	
			$data["action_url"]=array("{$page}/add","{$page}/edit","{$page}/delete"/*,"{$page}/change_password"*/);
			$data["tbl_hdr"]=array($this->lang->line('product_code'),$this->lang->line('product_name'),$this->lang->line('category'),$this->lang->line('price'),$this->lang->line('account'));
			$row=$this->cp->index();		
			$i=0;		
			if($row!=""){
				foreach($row as $value):			
				$data["tbl_body"][$i]=array(
											"<a href=".base_url($this->page_redirect.'/combind_detail/'.$value->p_id)." title='Product Detail'>".$value->p_code."</a>",
											$value->p_name,
											$value->cat_name,
											$value->price,				
											$value->acc_type,
											$value->p_id
										);
				$i=$i+1;
				endforeach;								
			}
			$this->load->view('admin/page_view',$data);
			$this->load->view('template/footer');
		}

		public function combind_detail($id="")
		{	$data["supplyer"]=$this->cp->get_supply($id);
			$data["detail"]=$this->cp->combind_detail($id);
			$data['cancel'] = $this->lang->line('admin/Product_c');	
			$this->load->view('template/header');
			$this->load->view('template/left');		
			$this->load->view('admin/combind_detail.php',$data);
			$this->load->view('template/footer');	
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
		public function edit(){

		}
		public function delete(){

		}


	} // Class