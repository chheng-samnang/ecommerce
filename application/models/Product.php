<?php
	class Product extends CI_Model
	{
		var $userCrea;
		public function __construct()
		{
			parent:: __construct();
			$this->userCrea = isset($this->session->UserLogin)?$this->session->UserLogin:"N/A";
		}

		public function get_product($id="",$str="")
		{
			if($id!=""&&$str!="")
			{
				$query = $this->db->get_where('tbl_product',array('p_id'=>$id,'str_id'=>$str));
				return $query->row();
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
							$data = array(
											'p_id'	=>	$value['id'],
											'str_id'=>	$value['str'],
											'qty'	=>	$value['qty'],
											'stk_type'	=>	'stock out',
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
				$query=$this->db->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_media AS m ON m.p_id=p.p_id 
										INNER JOIN tbl_category AS c ON c.cat_id=p.cat_id INNER JOIN tbl_brand AS b ON b.brn_id=p.brn_id WHERE p.p_id={$pro_id} GROUP BY m.p_id ASC");
				// $this->db->where('p_id',$pro_id);
				// $query=$this->db->get("tbl_product");
				return $query->row();
			}
			// if($pro_id!==""){
			// 	$this->db->where('p_id',$pro_id);
			// 	$query=$this->db->get("tbl_product");
			// 	return $query->row();
			// }
			
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

		public function register_member()
		{
			$mem_code = "mem".date('YmdHis');
			$ord_code = "ord".date("YmdHis");

			$data = array(
							'mem_code'	=>	$mem_code,
							'mem_name'	=>	$this->input->post('txtRegName'),
							'mem_phone'	=>	$this->input->post('txtRegPhone'),
							'mem_email'	=>	$this->input->post('txtRegEmail'),
							'mem_status'=>	'1',
							'reg_date'	=>	date('Y-m-d')

				);
			$this->db->insert('tbl_member',$data);

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
			}
		}
	}