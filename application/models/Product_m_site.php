<?php
	class product_m_site extends CI_Model
	{
		var $userCrea;
		public function __construct()
		{
			parent:: __construct();
			$this->userCrea = isset($this->session->UserLogin)?$this->session->UserLogin:"N/A";
			$this->load->model("orderModel","om");
		}

		public function get_product($id="",$str="")
		{
			if($id!=""&&$str!="")
			{
				$query = $this->db->get_where('tbl_product',array('p_id'=>$id,'str_id'=>$str));
				return $query->row();
			}
		}

		public function process_transaction($wal_id,$tran_type,$amount)
		{

			$data = array(
							"wal_id"	=>	$wal_id,
							"tran_type" =>	$tran_type,
							"tran_amt"	=>	$amount,
							"tran_date"	=>	date("Y-m-d H:i:s"),
							"tran_status"	=>	"1"
				);
			$this->db->insert("tbl_wallet_transaction",$data);

			$ord_code = $this->om->generate_order_code();
			$data = array(
							"ord_code"	=>	$ord_code,
							"ord_date"	=>	date("Y-m-d"),
							"mem_id"	=>	$this->session->memLogin,
							"ord_status"=>	"pending",
							"user_crea"	=>	$this->session->memLogin,
							"date_crea"	=>	date("Y-m-d")
				);
			$this->db->insert("tbl_order_hdr",$data);

			foreach ($_SESSION["product"] as $key => $value) {
				$data = array(
								"ord_code"	=>	$ord_code,
								"p_id"		=>	$value["id"],
								"qty"		=>	$value["qty"],
								"price"		=>	$value["price"],
								"discount"	=>	"0",
								"str_id"	=>	$value["str"],
								"total"		=>	$value["qty"]*$value["price"]
					);
				$this->db->insert("tbl_order_det",$data);
			}

			foreach ($_SESSION["product"] as $key => $value) {
				$type = isset($value["type"])?$value["type"]:"n/a";
				$data = array(
								"p_id"	=>	$value["id"],
								"str_id"=>	$value["str"],
								"qty"	=>	$value["qty"],
								"stk_type"	=>	$type,
								"stk_flow"	=>	"stock_out",
								"user_crea"	=>	$this->session->memLogin,
								"date_crea"	=>	date("Y-m-d")
					);
				$this->db->insert("tbl_stock",$data);
			}

		}
		public function insert_order_det()
		{
				$ord_code = "ord".date("YmdHis");
				$mem_id = $this->input->post('txt_mem_id');

				$data = array(
								'ord_code'	=>	$ord_code,
								'ord_date'	=>	date("Y-m-d"),
								'mem_id'	=>	$mem_id,
								'ord_status'=>	'Pending',
								'user_crea'	=>	$this->userCrea,
								'date_crea'	=>	date("Y-m-d")
							);
				$this->db->insert('tbl_order_hdr',$data);

				foreach ($_SESSION['product'] as $key => $value)
				{

				$data = array(

								'ord_code'	=>	$ord_code,
								'str_id'	=>	$value['str'],
								'p_id'		=>	$value['id'],
								'qty'		=>	$value['qty'],
								'price'		=>	$value['price'],
								'total'		=>	($value['qty'] * $value['price'])

								);
							$this->db->insert('tbl_order_det',$data);
				$type = isset($_SESSION['type'])?$_SESSION['type']:"n/a";
							$data = array(
											'p_id'	=>	$value['id'],
											'str_id'=>	$value['str'],
											'qty'	=>	$value['qty'],
											'stk_flow'	=>	$type,
											'stk_type'	=>	'stock out',
											// 'user_crea'	=>	$this->userCrea,
											'date_crea'	=>	date('Y-m-d')
								);
							$this->db->insert("tbl_stock",$data);

		}
	}
		public function validate_member($name,$password)
		{
			if($name!=""&&$password!="")
			{
				$query = $this->db->query("SELECT * FROM tbl_account a INNER JOIN tbl_member m ON a.mem_id=m.mem_id where mem_name='$name' and acc_password='$password'");

					if($query->num_rows()>0)
					{
						$ord_code = "ord".date("YmdHis");
						$mem_code = $query->row()->mem_code;
						$data = array(
										'ord_code'	=>	$ord_code,
										'ord_date'	=>	date("Y-m-d"),
										'mem_code'	=>	$mem_code,
										'ord_status'=>	'Pending',
										'user_crea'	=>	$this->userCrea,
										'date_crea'	=>	date("Y-m-d")
							);
						$this->db->insert('tbl_order_hdr',$data);

						foreach ($_SESSION['product'] as $key => $value) {
							$data = array(
											'ord_code'	=>	$ord_code,
											'str_id'	=>	$value['str'],
											'p_id'		=>	$value['id'],
											'qty'		=>	$value['qty'],
											'price'		=>	$value['price'],
											'total'		=>	($value['qty'] * $value['price'])
								);
							$this->db->insert('tbl_order_det',$data);
							$type = isset($_SESSION['type'])?$_SESSION['type']:"n/a";
							$data = array(
											'p_id'	=>	$value['id'],
											'str_id'=>	$value['str'],
											'qty'	=>	$value['qty'],
											'stk_flow'	=>	'stock out',
											'stk_type'	=>	$type,
											'user_crea'	=>	$this->userCrea,
											'date_crea'	=>	date('Y-m-d')
								);
							$this->db->insert("tbl_stock",$data);
						}
					return true;
				}else
				{
					return false;
				}
			}
		}
		public function get_member_id($email)
		{
			if($email!="")
			{
				$query = $this->db->get_where("tbl_member",array("mem_email"=>$email));
				if($query->num_rows()>0)
				{
					return $query->row()->mem_id;
				}else
				{
					return array();
				}
			}
		}
		public function update_member_password($mem_id)
		{
			$data = array(
							'mem_password' => $this->input->post('txtPassword')

				);
			$this->db->where("mem_id",$mem_id);
			$this->db->update("tbl_member",$data);
		}
		public function select_member($mem_id)
		{
				$query = $this->db->query("SELECT * FROM tbl_member WHERE mem_id={$mem_id} ORDER BY mem_id ASC");
				return $query->row();
		}
		public function get_price($id)
		{
			$this->db->select('price');
			$query = $this->db->get_where('tbl_product',array('p_id'=>$id));
			return $query->row();
		}
		public function index()
		{
			$query=$this->db->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_media AS m ON m.p_id=p.p_id GROUP BY m.p_id ASC");
			return $query->result();
		}
		public function product_page_detail($pro_id){
			if($pro_id!==""){

				$query=$this->db->query("SELECT * FROM tbl_promotion AS pro INNER JOIN tbl_promotion_det AS pd ON pro.`pro_id`=pd.`pro_id` RIGHT JOIN tbl_product AS p ON p.`p_id`=pd.`p_id` LEFT JOIN tbl_category AS c ON p.`cat_id`=c.`cat_id` LEFT JOIN tbl_media AS m ON m.`p_id`=p.`p_id` LEFT JOIN tbl_store AS s ON s.`str_id`=p.`str_id` LEFT JOIN tbl_brand AS b ON b.`brn_id`=p.`brn_id` WHERE p.p_id={$pro_id} GROUP BY m.p_id ASC");


				//$query=$this->db->query("SELECT p.p_id, p.p_name, p.price, p.model, p.date_release, p.dimension, p.size, p.color, p.p_desc, m.p_id, m.path, c.cat_id, c.cat_name, b.brn_name, s.str_id, s.str_name, pro.pro_type, pd.pro_id, pro.pro_id,p.p_type FROM tbl_promotion AS pro INNER JOIN tbl_promotion_det AS pd ON pro.`pro_id`=pd.`pro_id` RIGHT JOIN tbl_product AS p ON p.`p_id`=pd.`p_id` LEFT JOIN tbl_category AS c ON p.`cat_id`=c.`cat_id` LEFT JOIN tbl_media AS m ON m.`p_id`=p.`p_id` LEFT JOIN tbl_store AS s ON s.`str_id`=p.`str_id` LEFT JOIN tbl_brand AS b ON b.`brn_id`=p.`brn_id` WHERE p.p_id={$pro_id} GROUP BY m.p_id ASC");


				return $query->row();
			}
		}
		public function slideshow()
		{
			$this->db->where('slide_status', 1);
			$query=$this->db->get("tbl_slide");

			return $query->result();
		}

		public function category1($cat_id)
		{
			//$this->db->where('slide_status', 1);

			// $this->db->where('cat_id');
			// $this->db->limit(1);
			$query=$this->db->query("SELECT cat_id, cat_name FROM tbl_category WHERE cat_id={$cat_id}");
			return $query->result();

		}

		public function brand($cat_id)
		{
			if ($cat_id!=="")
			{
				$query=$this->db->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_media AS m ON m.p_id=p.p_id WHERE p.cat_id={$cat_id} GROUP BY m.p_id ASC");
				return $query->result();
			}
		}

		public function generate_acc_code()
		{
			$result="";
			$query =  $this->db->query("SELECT IFNULL(MAX(acc_code),0) AS acc_code FROM tbl_account");
			$acc_code = $query->row()->acc_code;
			if($acc_code!="0")
			{
				$tmp = intval(substr($acc_code,3,strlen($acc_code)-3))+1;
				$result = "acc".str_pad($tmp,7,"0",STR_PAD_LEFT);
			}else
			{
				$result = "acc0000001";
			}

			return $result;
		}

		public function register_member()
		{
			$mem_id="";
			$mem_code = "mem".date('YmdHis');
			$ord_code = "ord".date("YmdHis");
			$acc_code = $this->generate_acc_code();
			$acc_id = "";

			$data = array(
							'mem_code'	=>	$mem_code,
							'mem_name'	=>	$this->input->post('txtName'),
							'mem_phone'	=>	$this->input->post('txtPhone'),
							'mem_email'	=>	$this->input->post('txtEmail'),
							'mem_password'	=>	$this->input->post('txtPassword'),
							'mem_addr'	=>	$this->input->post('txtAddr'),
							'mem_status'=>	'0',
							'reg_date'	=>	date('Y-m-d')

				);
			$this->db->insert('tbl_member',$data);

			$query = $this->db->get_where("tbl_member",array("mem_code"=>$mem_code));
			if($query->num_rows()>0)
			{
				$mem_id = $query->row()->mem_id;
				$data = array(
								"acc_code"	=>	$acc_code,
								"mem_id"	=>	$mem_id,
								"acc_type"	=>	"general",
								"loc_id"	=>	"0",
								"user_crea"	=>	$this->session->memLogin,
								"date_crea"	=>	date("Y-m-d")
					);
				$this->db->insert("tbl_account",$data);

				$query = $this->db->get_where("tbl_account",array("acc_code"=>$acc_code));
				if($query->num_rows()>0)
				{
					$acc_id = $query->row()->acc_id;
					$wallet_code = "wal".date("YmdHis");
					$data = array(
									"acc_id"	=>	$acc_id,
									"wal_code"	=>	$wallet_code,
									"wal_status"=>	"0",
									"user_crea"	=>	$this->session->memLogin,
									"date_crea"	=>	date("Y-m-d")
						);
					$this->db->insert("tbl_wallet",$data);
				}
			}
		}

		public function get_account_id($mem_id)
		{
			$query = $this->db->get_where("tbl_account",array("mem_id"=>$mem_id));
			if($query->num_rows()>0)
			{
				return $query->row()->acc_id;
			}else
			{
				return "n/a";
			}
		}
		public function get_wallet_id($acc_id)
		{
			$query = $this->db->get_where("tbl_wallet",array("acc_id"=>$acc_id));
			if($query->num_rows()>0)
			{
				return $query->row()->wal_id;
			}else
			{
				return "n/a";
			}
		}
		public function get_wallet_bal($wal_id)
		{
			$balance = $this->db->query("SELECT SUM(CASE WHEN tran_type='cash_out' THEN tran_amt*(-1) ELSE tran_amt END) AS tran_amt FROM tbl_wallet_transaction where tran_status='1' and wal_id='$wal_id'");
			return $balance->row();
		}
		public function get_wallet_code($wal_id)
		{
			$query = $this->db->get_where("tbl_wallet",array("wal_id"=>$wal_id));
			if($query->num_rows()>0)
			{
				return $query->row()->wal_code;
			}else
			{
				return "Transaction not found.";
			}
		}
	}
