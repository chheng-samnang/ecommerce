<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Productkh extends CI_Controller 
	{
		var $itemNum;
		public function __construct()
			{
				parent::__construct();
				$this->load->model('product_m_site','pm');
				$this->load->model('home_m','hm');
				$this->itemNum = isset($this->session->product)?count($this->session->product):0;
			}
	    public function index()
		{	
			
			
				
				$data['advertisement']=$this->hm->adv();
				$data['category_kh']=$this->hm->categorykh();
				$data['itemNum'] = $this->itemNum;
			
					$this->load->view('layout_site/header_top');
					$this->load->view('layout_site/nav_kh',$data);
					//$this->load->view('layout_site/category',$data);
					$this->load->view('product_page', $data);
					$this->load->view('layout_site/footer');
				
					
		}

	    public function product_page_detail($pro_id)
	    {
			if($pro_id!==""){
				$data["de_value"]=$this->pm->product_page_detail($pro_id);
				$data['advertisement']=$this->hm->adv();
				$data['category']=$this->hm->category();
				$data['itemNum'] = $this->itemNum;
				 if($data!==""){
				 	$this->load->view('layout_site/header_top');
					$this->load->view('layout_site/nav',$data);
					//$this->load->view('layout_site/category', $data);
					$this->load->view('product_detail',$data);
					$this->load->view('layout_site/footer');
				 }
			}
		}	

		public function brand($cat_id="")
		{
				$data['products']=$this->pm->brand($cat_id);
				$data["bastseller"]=$this->hm->product_bestsller();
				$data['brand']=$this->pm->category1($cat_id);
				$data['category']=$this->hm->category();
				
			if($data!=="")
			{
					$this->load->view('layout_site/header_top');
					$this->load->view('layout_site/nav',$data);
					$this->load->view('layout_site/category',$data);
					$this->load->view('brand_v',$data);
					$this->load->view('layout_site/footer');
			}
		}

		public function add_to_cart($name,$id,$qty,$str)
		{
			$query = $this->pm->get_price($id);
			$data = array(
							'name'	=>	$name,
					        'id'    => $id,
					        'qty' 	=> $qty,
					        'price'	=> $query->price,
					        'str'	=>	$str
							);
			
			$_SESSION['product'][] = $data;
			echo count($_SESSION['product']);
		}

		public function process($type)
		{
			$name = "";
			$password = "";
			if($type=="register")
			{
				$this->pm->register_member();
				$this->clear_session();
			}else
			{
				$name = $this->input->post("txtLoginName");
				$password = $this->input->post("txtLoginPassword");

				$validation = $this->pm->validate_member($name,$password);
				if($validation)
				{
					$this->clear_session();
				}else
				{
					echo "fail";
				}
			}
		}

		public function display_cart()
		{

			$str = "<table class='table table-striped'>";
			$str .= "<thead>";
			$str .= "<tr>";
			$str .= "<th>No.</th>";
			$str .= "<th>Name</th>";
			$str .= "<th>Quantity</th>";
			$str .= "<th>Price</th>";
			$str .= "<th>Action</th>";
			$str .= "</tr>";
			$str .= "</thead>";
			$str .= "<tbody>";
			foreach ($_SESSION['product'] as $key => $value) {
				$str .= "<tr>";
				$str .= "<td>".($key+1)."</td>";
				$str .= "<td>".$value['name']."</td>";
				$str .= "<td>".$value['qty']."</td>";
				$str .= "<td>".$value['price']."</td>";
				$str .= '<td><button id="btnRemove" onclick="itemRemove('.$key.')">Remove</button></td>';
				$str .= "</tr>";
			}
			
			$str .= "</tbody>";
			$str .= "</table>";
			echo $str;

		}

		public function clear_session()
		{
			session_destroy();
			redirect("product_c");
		}

		public function show_session()
		{
			var_dump($_SESSION['product']);
		}

		public function remove_item($id)
		{
			unset($_SESSION['product'][$id]);
			echo count($_SESSION['product']);
		}

		public function checkout()
		{
			$data["bastseller"]=$this->hm->product_bestsller();
			$data['category']=$this->hm->category();
			$data['product'] = $_SESSION['product'];
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav',$data);
			$this->load->view('layout_site/category',$data);
			$this->load->view('checkout',$data);
			$this->load->view('layout_site/footer');
		}
	}