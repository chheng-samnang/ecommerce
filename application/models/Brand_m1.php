<?php
	class Brand_m extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function index($brn_id="")
		{
			if ($brn_id=="") 
			{
				$query=$this->db->get("tbl_brand");
				return $query->result();
			}
			else 
			{
				$this->db->where('brn_id', $brn_id);
				
				$query=$this->db->get('tbl_brand');
				return $query->result();
			}
		}

		# =========== select brand ====================

		public function add()
		{
			$data = array(

						'brn_name'=>$this->input->post('txtBrandname'),
						'brn_desc'=>$this->input->post('txtBrandDesc'),
						'user_crea'=>1,
						'date_crea'=>date('Y-m-d')
						);
			$this->db->insert('tbl_brand', $data);

		}

		# ================ add brand ===================

		public function edit($brn_id)
		{
	
			echo $brn_id;
				$data = array(

						'brn_name'=>$this->input->post('txtBrandname'),
						'brn_desc'=>$this->input->post('txtBrandDesc'),
						'user_updt'=>2,
						'date_updt'=>date('Y-m-d')

						);


			$this->db->where('brn_id', $brn_id);
			$this->db->update('tbl_brand', $data);
	
			
		}

		# ================ edit brand ==================

		public function delete($brn_id)
		{
			$this->db->where('brn_id', $brn_id);
			$this->db->delete('tbl_brand');
		}

		# ================ delete brand ================
	}
