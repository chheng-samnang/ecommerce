<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Product extends CI_Controller
	{
		var $itemNum;
		var $msg;

		var $memLogin;
		var $acc_id;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('product_m_site','pm');
			$this->load->model("memberLogin_model","mm");
			$this->load->model('home_m','hm');
			$this->itemNum = isset($this->session->product)?count($this->session->product):0;
		}

	    public function index()
		{
				$data["template"]=$this->hm->get_template();
				$data['advertisement']=$this->hm->adv();
				$data['category']=$this->hm->category();
				$data['itemNum'] = $this->itemNum;
				$this->load->view('layout_site/header_top');
				$this->load->view('layout_site/nav',$data);
				$this->load->view('product_page', $data);
				$this->load->view('layout_site/footer');
		}


	    public function product_page_detail($pro_id)
	    {
			if($pro_id!==""){
				$data["template"]=$this->hm->get_template();
				$data["de_value"]=$this->pm->product_page_detail($pro_id);
				$data["type"] = $data['de_value']->p_type;
				$data['advertisement']=$this->hm->adv();
				$data['category']=$this->hm->category();
				$data['itemNum'] = $this->itemNum;
				$data["type"] = $data['de_value']->p_type;
				 if($data!==""){
				 	$this->load->view('layout_site/header_top');

					$this->load->view('layout_site/nav',$data);

					$this->load->view('product_detail',$data);
					$this->load->view('layout_site/footer');
				 }
			}
		}

		public function add_to_cart($name,$id,$qty,$str,$type)
		{
			$data["template"]=$this->hm->get_template();
			$query = $this->pm->get_price($id);
			$data = array(
							'name'	=>	$name,
					        'id'    => $id,
					        'qty' 	=> $qty,
					        'price'	=> $query->price,
					        'str'	=>	$str,
					        'type'	=>	$type
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
			/*$str .= "<th>P ID</th>";
			$str .= "<th>Str ID</th>";*/
			$str .= "<th>No.</th>";
			$str .= "<th>Name</th>";
			$str .= "<th>Quantity</th>";
			$str .= "<th>Price</th>";
			$str .= "<th>Action</th>";
			$str .= "</tr>";
			$str .= "</thead>";
			$str .= "<tbody>";
			if(isset($_SESSION['product']))
			{
				foreach ($_SESSION['product'] as $key => $value) {
					$str .= "<tr>";
					/*$str .= "<td>".$value['id']."</td>";
					$str .= "<td>".$value['str']."</td>";*/
					$str .= "<td>".($key+1)."</td>";
					$str .= "<td>".$value['name']."</td>";
					$str .= "<td>".$value['qty']."</td>";
					$str .= "<td>".$value['price']."</td>";
					$str .= '<td><button id="btnRemove" onclick="itemRemove('.$key.')">Remove</button></td>';
					$str .= "</tr>";
				}
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
			if(isset($_SESSION["product"]))
			{
				$data["template"]=$this->hm->get_template();
				$data["bastseller"]=$this->hm->product_bestsller();
				$data['category']=$this->hm->category();
				$data['product'] = $_SESSION['product'];
				$this->load->view('layout_site/header_top',$data);
				$this->load->view('layout_site/nav',$data);
				$this->load->view('checkout',$data);
				$this->load->view('layout_site/footer');
			}
			else
			{
				exit('No direct script access allowed');
			}
		}


		public function registerMember()
		{
			$this->form_validation->set_rules("txtName","Member Name","required|trim|max_length[100]|alpha_numeric_spaces");
			$this->form_validation->set_rules("txtPhone","Phone Number","required|trim|max_length[25]|alpha_numeric_spaces");
			$this->form_validation->set_rules("txtEmail","Email","trim|max_length[50]|valid_email");
			$this->form_validation->set_rules("txtAddr","Address","trim|max_length[500]");
			if($this->form_validation->run()===false)
			{
				$this->load->view('layout_site/header_top');
				$this->load->view('layout_site/nav');
				$this->load->view('register');
				$this->load->view('layout_site/footer');
			}else
			{
				$this->pm->register_member();
				$mem_id = $this->pm->get_member_id($this->input->post("txtEmail"));
				if(!empty($mem_id))
				{
					redirect("Product");
				}
			}
		}

		public function message_payment()
		{
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('message_payment_complete');
			$this->load->view('layout_site/footer');
		}
		public function payment_detail($payment_method_id="") #$payment_method_id = wal_id
		{	echo $payment_method_id;
			if($payment_method_id!=""){
				$ballance = $this->pm->get_wallet_bal($payment_method_id);
				if($ballance->tran_amt!=null)
				{
					if(isset($_SESSION['product']))
					{
						$total = 0;
						foreach ($_SESSION['product'] as $key => $value) {
							$total = $total + ($value["price"]*$value["qty"]);
						}
						if($ballance->tran_amt>=$total) #Enough/More fund
						{
							if(isset($_POST["btnProcess"])&&!empty($_SESSION["product"]))
							{
								$tran_type = "cash_out";
								$this->pm->process_transaction($payment_method_id,$tran_type,$total);
                				unset($_SESSION["product"]);
								redirect('product/message_payment');

							}else
							{
								$data["mem_id"] = $this->session->memLogin;
								$data["ballance"] = $ballance->tran_amt;
								$data['item'] = $_SESSION["product"];
								$data['pmID'] = $payment_method_id;
								$this->load->view('layout_site/header_top');
								$this->load->view('layout_site/nav');
								$this->load->view('payment_detail',$data);
								$this->load->view('layout_site/footer');
							}

						}else   #Insufficent fund
						{

							$data["insuff"] = "1";
							$data["mem_id"] = $this->session->memLogin;
							$data["ballance"] = $ballance->tran_amt;
							$data['item'] = $_SESSION["product"];
							$data['pmID'] = $payment_method_id;
							$this->load->view('layout_site/header_top');
							$this->load->view('layout_site/nav');
							$this->load->view('payment_detail',$data);
							$this->load->view('layout_site/footer');
						}

					}else
					{
						echo "There isn't any item in this cart.";
					}
				}else
				{
					echo "Cannot find any E-Wallet Transaction for this account!";
				}

			}else
			{
				echo "This account doesn't have an E-Wallet yet.";
			}
		}

		public function register_member_account($mem_id="")
		{
			if($mem_id!="")
			{
				$this->form_validation->set_rules("txtPassword","Password","required|trim|max_length[100]|alpha_numeric");
				$this->form_validation->set_rules("txtConfirm","Confirm Password","required|trim|max_length[100]|alpha_numeric|matches[txtPassword]");
				if($this->form_validation->run()===false)
				{
					$data['select_member']=$this->pm->select_member($mem_id);
					$data['memID'] = $mem_id;
					$this->load->view('layout_site/header_top');
					$this->load->view('layout_site/nav');
					$this->load->view('register_member_login',$data);
					$this->load->view('layout_site/footer');
				}else
				{
					$data["mem_id"] = $mem_id;
					$data["acc_id"] = $this->pm->get_account_id($mem_id);
					$data["wal_id"] = $this->pm->get_wallet_id($data["acc_id"]);
					$this->pm->update_member_password($mem_id);
					$this->session->memLogin = $mem_id;
					$this->load->view('layout_site/header_top');
					$this->load->view('layout_site/nav');
					//$this->load->view('payment',$data);
					redirect("Product");
					$this->load->view('layout_site/footer');
				}
			}
		}

		public function login($mem_id="")
		{

			$validate = false;
			$data["msg"] = $this->msg;
			$this->form_validation->set_rules("txtEmail","Email","required|max_length[50]");//valid_email|
			$this->form_validation->set_rules("txtPass","Password","required|max_length[100]");

			if(isset($_POST["btnLogin"])&&$this->form_validation->run()===true)
			{
				$email = $this->input->post("txtEmail");
				$pwd = $this->input->post("txtPass");
				$validate = $this->mm->validate_member($email,$pwd);
				if($validate!==true)
				{
					$data["msg"] = $validate;

					$this->load->view('layout_site/style');
					$this->load->view('Checkout/form_login',$data);
				}else
				{
					$data["mem_id"] = $this->session->memLogin;
					$data["acc_id"] = $this->pm->get_account_id($data["mem_id"]);
					$data["wal_id"] = $this->pm->get_wallet_id($data["acc_id"]);

					$this->load->view('layout_site/style');
					$this->load->view('payment',$data);

				}
			}else
			{
				$this->load->view('layout_site/style');
				$this->load->view('Checkout/form_login',$data);
			}
		}
	}
