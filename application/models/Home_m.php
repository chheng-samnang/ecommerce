<?php
	class Home_m extends CI_Model
	{
		
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{

		}
		public function get_product()
		{
			$query = $this->db->query("SELECT * FROM tbl_product p INNER JOIN tbl_media m ON p.p_id=m.`p_id`");
			if($query->num_rows()>0)
			{
				return $query->result();
			}else
			{
				return array();
			}
		}
		public function slideshow_once()
		{
			$query=$this->db->query("SELECT slide_name, slide_desc, slide_path FROM tbl_slide WHERE slide_status=1 ORDER BY slide_id ASC LIMIT 1");

			return $query->result();
		}
		public function slideshow()
		{
			$query=$this->db->query("SELECT slide_name, slide_desc, slide_path FROM tbl_slide WHERE slide_status=1 ORDER BY slide_id DESC");

			return $query->result();
		}

		public function category()
		{
			//$this->db->where('slide_status', 1);
			$query=$this->db->query("SELECT  * FROM tbl_category");

			return $query->result();
		}


		public function categorykh()
		{
			$query=$this->db->query("SELECT  cat_id, cat_name_kh FROM tbl_category");

			return $query->result();
		}

		public function categorych()
		{
			$query=$this->db->query("SELECT  cat_id, cat_name_ch FROM tbl_category");

			return $query->result();
		}

		public function product_bestsller()
		{
			
			$query=$this->db->query("SELECT p.p_id, p.p_name, p.price, m.p_id, m.path FROM tbl_product AS p INNER JOIN tbl_media  AS m ON m.p_id=p.p_id GROUP BY m.p_id  ORDER BY p.p_id DESC LIMIT 3");
			return $query->result();
				
		}

		public function product_related()
		{
			$query=$this->db->query("SELECT p.p_id, p.p_name, p.price, m.p_id, m.path FROM tbl_product AS p INNER JOIN tbl_media  AS m ON m.p_id=p.p_id GROUP BY m.p_id  ORDER BY p.p_id DESC LIMIT 8");
			return $query->result();
		}


		public function change_leng()
		{
			$query=$this->db->query("SELECT cat_name, cat_name_kh, cat_name_ch FROM tbl_category  LIMIT 1");
				return $query->row();
				
		}


		public function adv()

		{
				$query=$this->db->query("SELECT * FROM tbl_advertisement");
				return $query->result();
			
		}

		public function get_marquee()
		{
			$query = $this->db->get_where("tbl_sysdata",array('key_type'=>'marquee'));
			if($query->num_rows()>0)
			{
				return $query->row();
			}else
			{
				return array();
			}
		}

		public function get_template()
		{
			$query = $this->db->query("SELECT key_id, key_type, key_data, key_data1 FROM tbl_sysdata WHERE key_type='template' and key_data=1");
			if($query==TRUE){return $query->row();
			}		
		}


	}