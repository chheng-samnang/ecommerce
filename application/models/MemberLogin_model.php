<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class memberLogin_model extends CI_Model
{
	private $userLog="admin";
	var $userCrea;
	var $str;
	function __construct()
	{
		parent::__construct();
		$this->str = isset($this->session->str)?$this->session->str:"1";
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
	}

	public function change_password(){
		$data = array("mem_password"=>$this->input->post("Newpassword"));
		$mem_code=$this->input->post("mem_code");
		$this->db->where("mem_code",$mem_code);
		$query=$this->db->update("tbl_member",$data);
		if($query){return true;}
	}


	function validate_member($accName="",$password="",$accType="")
	{
		$result = false;$msg = "";
		if($accName!=""&&$password!="")
		{
			if($accType=="Staf"){
				$query = $this->db->query("SELECT * FROM tbl_staf AS st INNER JOIN tbl_account AS acc ON st.acc_id=acc.acc_id INNER JOIN tbl_member AS mb ON acc.mem_id=mb.mem_id LEFT JOIN tbl_store st ON acc.`acc_id`=st.`acc_id` WHERE mb.mem_name='$accName' AND st.staf_password='$password' AND stf_status='1'");
			}
			else{
				$query = $this->db->query("SELECT *,acc.acc_id FROM `tbl_account` AS acc INNER JOIN `tbl_member` AS mb ON acc.mem_id=mb.mem_id LEFT JOIN tbl_store st ON acc.`acc_id`=st.`acc_id` WHERE (mb.mem_name='$accName' OR mb.mem_email='$accName' OR mb.mem_phone='$accName') AND acc.acc_password='$password' AND acc_type='$accType'");
			}
			if($query->num_rows()>0)
			{
				$this->session->memLogin = $query->row()->mem_id;
				$this->session->acc_id = $query->row()->acc_id;
				$this->session->str_id = $query->row()->str_id;
				return $query->row();
			}else{return false ;}
		}else{ return $msg = "User Name and Password cannot be empty.";}
	}

	public function LogTocheckOut($email="",$password=""){
		$result = false;$msg = "";

		if($email!=""&&$password!="")
		{
			$query = $this->db->query("SELECT * FROM `tbl_account` AS acc INNER JOIN `tbl_member` AS mb ON acc.mem_id=mb.mem_id WHERE mb.mem_email='$email' AND acc.acc_password='$password'");
			if($query->num_rows()>0)
			{

				if($query->row()->mem_password==$password)
				{
					$this->session->memLogin = $query->row()->mem_id;
					return true;
				}else
				{return $msg = "Password is incorrect!";}
			}else
			{ return $msg = "User Name is incorrect!";}
		}else
		{ return $msg = "User Name and Password cannot be empty.";}
	}

	public function updateOrderStatus($id,$status)
	{
		$data = array("ord_status"=>$status);
		$this->db->where("ord_id",$id);
		$this->db->update("tbl_order_hdr",$data);
	}

	public function select($id="")
	{
		$query = $this->db->query("SELECT * FROM tbl_member WHERE mem_id={$id}");
		return $query->row();
	}

	public function get_member($mem_id="")
	{
		if ($mem_id!="")
		{
			$query = $this->db->query("SELECT * FROM tbl_member  WHERE mem_id={$mem_id}");
			return $query->result();
		}
		else
		{
			$query = $this->db->get_where("tbl_member", array("mem_id"=>$mem_id));
			return $query->row();
		}
	}

	public function get_new_order(){
		$query = $this->db->query("SELECT qty FROM tbl_order_hdr AS od INNER JOIN tbl_order_det AS ot ON od.ord_code=ot.ord_code INNER JOIN tbl_product AS p ON p.p_id=ot.p_id WHERE ord_status='pending'");
		if($query->num_rows()>0){return $query->result();}
		else{return 0;}
	}

	public function get_supplyer(){
		$query = $this->db->query("SELECT mem_name,acc_id FROM tbl_member AS mem INNER JOIN tbl_account AS acc ON mem.mem_id=acc.mem_id WHERE acc_type='Shop-owner'");
		return $query->result();
	}
	public function check_member($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_account as a INNER JOIN tbl_member as m on a.mem_id= m.mem_id where m.mem_id={$id}");
		return $query->row();
	}
	public function select_member($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_member WHERE mem_id={$id}");
		return $query->row();
	}
	public function AccTypeValidate($id=""){
	    $acc_type=$this->input->post("txt_acc_type");
		$query = $this->db->query("SELECT * FROM `tbl_account`  WHERE acc_type='$acc_type' AND mem_id='$id'");
		if($query->num_rows()>0){ return TRUE; }
	}
	public function addAccount()
	{
		$data = array(
				"mem_id"=>$this->input->post('txt_mem_id'),
				"acc_code"=>$this->input->post('txtaccCode'),
				"acc_img"	=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
				"acc_password"=>$this->input->post('password'),
				"acc_type"=>$this->input->post('txt_acc_type'),
				"status"=>"1",
				"loc_id"=>$this->input->post('ddlLocation'),
				"date_crea"=> date('Y-m-d')
			);
		$this->db->insert("tbl_account", $data);
		if($this->input->post("txt_acc_type")=="Shop-owner"){
		$query1=$this->db->query("SELECT acc_id FROM tbl_account where acc_code='{$this->input->post('txtaccCode')}' ORDER BY acc_id DESC");

		$id=$query1->row()->acc_id;
		$str_code="STR".$id;
		$data1=array(
			"str_code"=> $str_code,
			"acc_id"=> $id,
			"str_desc"=>$this->input->post("txtStor_Type"),
			"str_name"=>$this->input->post("txtStor_name"),
			);

		$row = $this->db->insert("tbl_store",$data1);
		if($row===TRUE){ return TRUE; }
		}
	}

	public function updateAccount($id="")
	{
		$row=$this->get_product_validation($id);
		if($this->input->post('txtImgName')!=""){
			unlink("assets/uploads/".$row->acc_img);
			$data = array(
				"mem_id"=>$this->input->post('txt_mem_id'),
				"acc_code"=>$this->input->post('txtaccCode'),
				"sex"=>$this->input->post('txt_gender'),
				"dob"=>$this->input->post('txt_dob'),
				"company"=>$this->input->post('txt_company'),
				"position"=>$this->input->post('txt_position'),
				"acc_img"	=>	!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
				"acc_type"=>$this->input->post('txt_acc_type'),
				"loc_id"=>$this->input->post('ddlLocation'),
				"date_crea"=> date('Y-m-d')
			);
		}else{

			$data = array(
				"mem_id"=>$this->input->post('txt_mem_id'),
				"acc_code"=>$this->input->post('txtaccCode'),
				"sex"=>$this->input->post('txt_gender'),
				"dob"=>$this->input->post('txt_dob'),
				"company"=>$this->input->post('txt_company'),
				"position"=>$this->input->post('txt_position'),
				"acc_type"=>$this->input->post('txt_acc_type'),
				"loc_id"=>$this->input->post('ddlLocation'),
				"date_crea"=> date('Y-m-d')
			);
		}
		$this->db->where('acc_id', $id);
		$this->db->update('tbl_account', $data);

	}

	public function addProduct()
	{
			$result = false;
			$data = array(
					"p_name"=>$this->input->post('txt_product'),
					"p_code"=>$this->input->post("type_pro_code"),
					"p_type"=>"product",
					"str_id"=>$this->input->post('txt_str_id'),
					"acc_id"=>$this->input->post('txt_acc_id'),
					"cat_id"=>$this->input->post('txt_category'),
					"brn_id"=>$this->input->post('txt_brand'),
					"price"=>$this->input->post('txt_price'),
					"model"=>$this->input->post('txt_model'),
					"color"=>$this->input->post('txt_color'),
					"size"=>$this->input->post('txt_size'),
					"date_release"=>$this->input->post('txt_release'),
					"dimension"=>$this->input->post('txt_dimension'),
					"p_status"=>$this->input->post('txt_status'),
					"p_desc"=>$this->input->post('txt_Desc'),
					"date_crea"=> date('Y-m-d')
				);
			$this->db->insert("tbl_product", $data);
			$query1=$this->db->query("SELECT p_id FROM tbl_product ORDER BY p_id DESC");

			$id=$query1->row()->p_id;
			$data1 = array(
							'p_id' =>$id,
							'path'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
							"date_crea" => date('Y-m-d')
							);
			$this->db->insert("tbl_media",$data1);
			#Stock Qty
			$data = array(
							'p_id'	=>	$id,
							"str_id"=>$this->input->post('txt_str_id'),
							'qty'	=>	$this->input->post('txtStockQty'),
							'stk_type'	=>	'stock in',
							'date_crea'	=>	date('Y-m-d')
				);
			$this->db->insert("tbl_stock",$data);
			$result = true;
			return $result;
	}

	public function get_pro_code($acc_id=""){
		$query = $this->db->query("SELECT IFNULL(MAX(p_code),0) AS p_code FROM tbl_product WHERE p_type='product' and acc_id='{$acc_id}'");
		if($query->row()->p_code=="0"){
			return "P000001";
		}else{
			$p_code = $query->row()->p_code;
			$tmp = substr($p_code,1,strlen($p_code)-1)+1;
			return $result = "P".str_pad($tmp,6,"0",STR_PAD_LEFT);
		}
	}

	public function check_pr_code($p_code=""){
			$query = $this->db->query("SELECT * FROM tbl_product WHERE p_code='$p_code'");
			if($query->num_rows()>0)
			{return false;}
			else{return true;}
	}

	public function get_product($id)
	{
		$query = $this->db->query("SELECT tbl_media.path,str.str_name,str.str_id,cat.cat_name,cat.cat_id,brn.brn_id,brn.brn_name,p.p_id, p.p_code, p.p_status, p.p_name,
            qty,p.p_desc,p.short_desc,p.price,p.color,p.size,p.model,p.date_release,p.dimension,p.user_crea,p.date_crea,p.user_updt,p.date_updt,p.p_type
						FROM tbl_product AS p
						LEFT JOIN tbl_store AS str ON p.str_id=str.str_id
						LEFT JOIN tbl_category AS cat ON p.cat_id=cat.cat_id
						LEFT JOIN tbl_brand AS brn ON p.brn_id=brn.brn_id
						LEFT JOIN tbl_media ON p.p_id=tbl_media.p_id
						LEFT JOIN tbl_stock s ON p.p_id=s.p_id WHERE p.acc_id={$id} and p.p_type='product' ORDER BY p.p_id DESC");
		return $query->result();
	}

    public function get_shop_product(){
    	$query = $this->db->query("SELECT  p.p_id,p_name,med.path,cat_name,p_code,p_status,brn_name,price,mem_name,str_name
																	FROM tbl_combind_det AS com INNER JOIN tbl_product AS p ON com.p_id=p.p_id
																	LEFT JOIN tbl_media AS med ON p.p_id=med.p_id
																	LEFT JOIN tbl_brand AS br ON p.brn_id=br.brn_id
																	LEFT JOIN tbl_category AS cat ON  p.cat_id=cat.cat_id
																	INNER JOIN tbl_account AS acc ON p.acc_id=acc.acc_id
																	LEFT JOIN tbl_store AS st ON acc.acc_id=st.acc_id
																	INNER JOIN tbl_member AS mem ON acc.mem_id=mem.mem_id");
    	if($query->num_rows()>0){ return $query->result(); }
    }

    public function get_product1($id=""){
    	$query = $this->db->query("SELECT price,p_type,color,size,model,store_qty,shop_owner_status tbl_shop_owner_product AS sop INNER JOIN tbl_product AS p ON sop.p_id=p.p_id
    	INNER JOIN tbl_account AS acc ON p.acc_id=acc.acc_id INNER JOIN tbl_member AS mb ON acc.mem_id=mb.mem_id INNER JOIN tbl_category ON p.cat_id=c.cat_id
    	INNER JOIN tbl_brand AS br ON p.brn_id=br.brn_id");
    	if($query->num_rows()>0){return result();}
    }

	public function updateProduct($id)
	{
		if($id==TRUE)
		{
			if($this->input->post("type_pro_code")=="")
			{
					$pro_code=$this->input->post('txt_product_code');
				}else{$pro_code=$this->input->post("type_pro_code");}

			if(!empty($this->input->post('txtImgName')))
			{
				$data= array(
					"p_code"=>$this->input->post('txt_product_code'),
					"p_name"=>$this->input->post('txt_product'),
					"p_type"=>"product",
					// "str_id"=>$this->input->post('txt_str_id'),
					"acc_id"=>$this->session->acc_id,
					"cat_id"=>$this->input->post('txt_category'),
					"brn_id"=>$this->input->post('txt_brand'),
					"price"=>$this->input->post('txt_price'),
					"model"=>$this->input->post('txt_model'),
					"color"=>$this->input->post('txt_color'),
					"size"=>$this->input->post('txt_size'),
					"date_release"=>$this->input->post('txt_release'),
					"dimension"=>$this->input->post('txt_dimension'),
					"p_status"=>$this->input->post('txt_status'),
					"p_desc"=>$this->input->post('txt_Desc'),
					"date_crea"=> date('Y-m-d')
				);
				$this->db->where("p_id",$id);
				$query=$this->db->update("tbl_product",$data);
				#media

				$row=$this->get_product_validation($id);
				unlink("assets/uploads/".$row->path);
				$data1 = array(
						'path'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",

						"date_updt" => date('Y-m-d')
						);
				$this->db->where("p_id",$id);
				$this->db->update("tbl_media",$data1);
				if($query==TRUE){return $query;}

				$data = array(
					'p_id'	=>	$id,
					'stk_id'=>$this->input->post('txt_stk_id'),
					'qty'=>$this->input->post('txtStockQty')
					);
				$this->db->where("stk_id",$id);
				$this->db->update("tbl_stock",$data);
			}
			else
			{
				$data= array(
					"p_code"=>$pro_code,
					"p_name"=>$this->input->post('txt_product'),
					"str_id"=>$this->input->post('txt_str_id'),
					"acc_id"=>$this->session->acc_id,
					"cat_id"=>$this->input->post('txt_category'),
					"brn_id"=>$this->input->post('txt_brand'),
					"price"=>$this->input->post('txt_price'),
					"model"=>$this->input->post('txt_model'),
					"color"=>$this->input->post('txt_color'),
					"size"=>$this->input->post('txt_size'),
					"date_release"=>$this->input->post('txt_release'),
					"dimension"=>$this->input->post('txt_dimension'),
					"p_status"=>$this->input->post('txt_status'),
					"p_desc"=>$this->input->post('txt_Desc'),
					"date_crea"=> date('Y-m-d')
				);
				$this->db->where("p_id",$id);
				$query=$this->db->update("tbl_product",$data);
				if($query==TRUE){return $query;}
				$data = array(
					'p_id'	=>	$id,
					'stk_id'=>$this->input->post('txt_stk_id'),
					'qty'=>$this->input->post('txtStockQty')
					);
				$this->db->where("stk_id",$id);
				$this->db->update("tbl_stock",$data);
			}
		}
	}

	public function saveProfile(){

		$acc_id=$this->input->post("acc_id");
		if($this->input->post("txtImgName"))
		{

			if($this->input->post("oldImg")){
				unlink("assets/uploads/".$this->input->post("oldImg"));
			}

			$data = array(
				"sex"=>$this->input->post('ddlGender'),
				"company"=>$this->input->post('txtCompanyName'),
				"dob"=>$this->input->post('txtDob'),
				"pob"=>$this->input->post('txtPob'),
				"position"=>$this->input->post('txtPosition'),
				"acc_img"=>$this->input->post('txtImgName'),
				"contact_phone"=>$this->input->post('txtContact'),
				"loc_id"=>$this->input->post('ddlLocation'),
				"date_updt"=> date('Y-m-d'));
		}else{
			$data = array(
				"sex"=>$this->input->post('ddlGender'),
				"company"=>$this->input->post('txtCompanyName'),
				"dob"=>$this->input->post('txtDob'),
				"pob"=>$this->input->post('txtPob'),
				"position"=>$this->input->post('txtPosition'),
				"contact_phone"=>$this->input->post('txtContact'),
				"loc_id"=>$this->input->post('ddlLocation'),
				"date_updt"=> date('Y-m-d'));
			}

			$this->db->where("acc_id",$this->input->post("acc_id"));
			$row=$this->db->update('tbl_account',$data);
				if($row==TRUE){
					$data=array(
						"mem_name"	=>	$this->input->post("txtName"),
						"mem_fname"	=> $this->input->post("txtFName", TRUE),
						"mem_lname"	=>	$this->input->post('txtLName', TRUE),
						"mem_marital_status"	=>	$this->input->post('ddlMartialStatus', TRUE),
						"mem_nationality"	=>	$this->input->post('txtNationality', TRUE),
						"mem_skill"	=>	$this->input->post('txtSkill', TRUE)
					);
					$this->db->where("mem_id",$this->input->post("mem_id"));
					$row=$this->db->update("tbl_member",$data);
					if($row==TRUE){return TRUE;}
				}
	}

	public function updatePassword($id)
	{
		$data = array(
				"acc_password"=>$this->input->post('newpassword')
			);
		$this->db->where('acc_id', $id);
		$this->db->update('tbl_account', $data);
	}

	public function get_account_validation($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_account a inner join tbl_member m on a.mem_id=m.mem_id WHERE acc_id={$id}");
		return $query->row();
	}

	public function get_active_account($id="")
	{
		if($id!="")
		{
			$this->db->select("*");
			$this->db->from("tbl_account");
			$this->db->join("tbl_location","tbl_account.loc_id=tbl_location.loc_id");
			$this->db->where("mem_id",$id);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result();
			}else
			{return array();}
		}
	}

	public function get_account($id="")
	{
		if($id!="")
		{
			$this->db->select("*");
			$this->db->from("tbl_account");
			$this->db->join("tbl_location","tbl_account.loc_id=tbl_location.loc_id");
			$this->db->where("mem_id",$id);
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result();
			}else
			{return array();}
		}
	}

	public function get_product_validation($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_product AS p
							LEFT JOIN tbl_store AS str ON p.str_id=str.str_id
							LEFT JOIN tbl_category AS cat ON p.cat_id=cat.cat_id
							LEFT JOIN tbl_brand AS brn ON p.brn_id=brn.brn_id
							LEFT JOIN tbl_media ON p.p_id=tbl_media.p_id
							LEFT JOIN tbl_stock s ON p.p_id=s.p_id  WHERE p.p_id={$id} ");
			return $query->row();
	}

	public function get_location()
	{
		$query = $this->db->get('tbl_location');
		if ($query->num_rows()>0) {
			return $query->result();
		}else
		{
			return array();
		}
	}

	public function get_store($id="")
	{
		if($id=="")
		{
			$query = $this->db->query("SELECT * FROM tbl_store");
			return $query->result();
		}else
		{
			$query = $this->db->query("SELECT * FROM tbl_store WHERE str_id={$id}");
			return $query->row();
		}
	}

	public function val_store($id)
	{
		$query = $this->db->query("SELECT str_id, acc_id, str_name FROM tbl_store  WHERE acc_id={$id}");
		if($query->num_rows()>0)
		{
			return $query->row();
		}
	}
	public function get_brand()
	{
		$query = $this->db->get('tbl_brand');
		if ($query->num_rows()>0) {
			return $query->result();
		}else
		{
			return array();
		}
	}

	public function get_category()
	{
		$query = $this->db->query(" SELECT cat_id,cat_name FROM tbl_category WHERE parent_id='0'");
		if ($query->num_rows()>0) {
			return $query->result();
		}else
		{
			return array();
		}
	}

	public function selectshop($id)

	{
		$query = $this->db->query("SELECT st.str_id, st.str_code, st.str_name, st.str_type, st.str_img, st.str_desc, st.date_crea, st.date_updt FROM tbl_store AS st INNER JOIN tbl_account AS a ON st.acc_id=a.acc_id WHERE st.acc_id={$id}");
		return $query->result();
	}

	public function get_shop($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_store AS s INNER JOIN tbl_account AS a ON s.`acc_id`=a.`acc_id` WHERE s.acc_id={$id}");
		return $query->row();
	}

	public function addShop()
	{
		$data = array(
					"str_code"=>$this->input->post('txt_shop_code'),
					"acc_id"=>$this->input->post('txt_acc_id'),
					"str_name"=>$this->input->post('txt_shop_name'),
					"str_type"=>$this->input->post('txt_shop_type'),
					"str_desc"=>$this->input->post('txt_Desc'),
					"str_img"=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
					"date_crea"=>date('Y-m-d')
			);
		$this->db->insert('tbl_store', $data);
	}

	public function updateshop($id)
	{
		$row=$this->get_product_validation($id);
		unlink("assets/uploads/".$row->str_img);
		$data = array(
					"str_code"=>$this->input->post('txt_shop_code'),
					"str_name"=>$this->input->post('txt_shop_name'),
					"str_type"=>$this->input->post('txt_shop_type'),
					"str_img"=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
					"str_desc"=>$this->input->post('txt_Desc'),
					"date_updt"=>date('Y-m-d')
			);
		$this->db->where('str_id', $id);
		$this->db->update('tbl_store', $data);
	}
	public function mem_id(){
		$query = $this->db->query("SELECT mem_id FROM tbl_member ORDER BY mem_id DESC");
		return $query->row();
	}
	public function addMember()
	{
		$data = array(
					"mem_code"=>$this->input->post('txt_mem_code'),
					"mem_name"=>$this->input->post('txt_mem_name'),
					"mem_phone"=>$this->input->post('txt_mem_phone'),
					"mem_email"=>$this->input->post('txt_mem_email'),
					"mem_status"=>$this->input->post('txt_status'),
					"mem_addr"=>$this->input->post('txt_address'),
					"mem_desc"=>$this->input->post('txt_desc'),
					"valid_code"=>$this->input->post('txt_validcode'),
					"mem_password"=>$this->input->post('password'),
					"reg_date"=>date('Y-m-d')

			);
		$row=$this->db->insert('tbl_member',$data);
		if($row==TRUE){
			return TRUE;}

	}

	public function editMember($id)
	{
		$data = array(

					"mem_code"=>$this->input->post('txt_mem_code'),
					"mem_name"=>$this->input->post('txt_mem_name'),
					"mem_phone"=>$this->input->post('txt_mem_phone'),
					"mem_email"=>$this->input->post('txt_mem_email'),
					"mem_status"=>$this->input->post('txt_status'),
					"mem_addr"=>$this->input->post('txt_address'),
					"mem_desc"=>$this->input->post('txt_desc'),
					"valid_code"=>$this->input->post('txt_validcode'),

					"reg_date"=>date('Y-m-d')
			);
		$this->db->where('mem_id',$id);
		$this->db->update('tbl_member',$data);
	}

	public function update_password_memeber($id)
	{
		$data = array(
				"mem_password"=>$this->input->post('password')
			);
		$this->db->where('mem_id', $id);
		$this->db->update('tbl_member', $data);
	}

	public function get_service($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_category AS c ON p.cat_id=c.cat_id  RIGHT JOIN tbl_media AS m ON p.p_id=m.p_id WHERE p.acc_id={$id} AND p.p_type='service'");
		return $query->result();
	}

	public function get_service_validation($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_product AS p INNER JOIN tbl_category AS c ON p.cat_id=c.cat_id INNER JOIN tbl_store AS s ON p.str_id=s.str_id RIGHT JOIN tbl_media AS m ON p.p_id=m.p_id WHERE p.acc_id={$id}  and p.p_type='service' or p.p_id={$id}");
		return $query->row();
	}

	public function get_wallet($id)
	{
		$query =$this->db->query("SELECT * FROM tbl_wallet AS w INNER JOIN tbl_account AS a ON w.acc_id=a.acc_id WHERE w.acc_id='$id'");
		return $query->row();
	}

	public function select_wallet_transaction($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_wallet_transaction  AS t INNER JOIN tbl_wallet AS w ON t.wal_id=w.wal_id WHERE w.acc_id='$id'");
		return $query->result();
	}

	public function delete_wallet_transaction($wal_tran_id)
	{
		$this->db->where("wal_tran_id",$wal_tran_id);
		$this->db->delete("tbl_wallet_transaction");
	}

	public function addService()
	{
		$data = array(
					"p_name"=>$this->input->post('txt_service'),
					"p_code"=>$this->input->post('txt_service_code'),
					"p_type"=>"service",
					"str_id"=>$this->input->post('txt_str_id'),
					"acc_id"=>$this->input->post('txt_acc_id'),
					"cat_id"=>$this->input->post('txt_category'),
					"brn_id"=>$this->input->post('txt_brand'),
					"price"=>$this->input->post('txt_price'),
					"model"=>$this->input->post('txt_model'),
					"color"=>$this->input->post('txt_color'),
					"size"=>$this->input->post('txt_size'),
					"date_release"=>$this->input->post('txt_release'),
					"dimension"=>$this->input->post('txt_dimension'),
					"p_status"=>$this->input->post('txt_status'),
					"p_desc"=>$this->input->post('txt_Desc'),
					"date_crea"=> date('Y-m-d')
				);
			$this->db->insert("tbl_product", $data);
			$query1=$this->db->query("SELECT p_id FROM tbl_product ORDER BY p_id DESC");
			$id=$query1->row()->p_id;
			$data1 = array(
							'p_id' =>$id,
							'path'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
							"date_crea" => date('Y-m-d')
							);
			$this->db->insert("tbl_media",$data1);
	}

	public function editService($id)
	{
		if($id==TRUE)
		{
			if(!empty($this->input->post('txtImgName')))
			{
				$data= array(
					"p_name"=>$this->input->post('txt_service'),
					"p_type"=>"service",
					"str_id"=>$this->input->post('txt_str_id'),
					"acc_id"=>$this->input->post('txt_acc_id'),
					"cat_id"=>$this->input->post('txt_category'),
					"price"=>$this->input->post('txt_price'),
					"date_release"=>$this->input->post('txt_release'),
					"p_status"=>$this->input->post('txt_status'),
					"p_desc"=>$this->input->post('txt_Desc'),
					"date_crea"=> date('Y-m-d')
						 );
				$this->db->where("p_id",$id);
				$query=$this->db->update("tbl_product",$data);
				#media

				$row=$this->get_product_validation($id);
				unlink("assets/uploads/".$row->path);
				$data1 = array(
						'path'=>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",
						"date_updt" => date('Y-m-d')
						);
				$this->db->where("p_id",$id);
				$this->db->update("tbl_media",$data1);
				if($query==TRUE){return $query;}
			}
			else
			{
				$data= array(

					"p_name"=>$this->input->post('txt_service'),
					"p_type"=>"service",
					"str_id"=>$this->input->post('txt_str_id'),
					"acc_id"=>$this->input->post('txt_acc_id'),
					"cat_id"=>$this->input->post('txt_category'),
					"price"=>$this->input->post('txt_price'),
					"date_release"=>$this->input->post('txt_release'),
					"p_status"=>$this->input->post('txt_status'),
					"p_desc"=>$this->input->post('txt_Desc'),
					"date_crea"=> date('Y-m-d')
						 );
				$this->db->where("p_id",$id);
				$query=$this->db->update("tbl_product",$data);
				if($query==TRUE){return $query;}
			}
		}
	}

	public function addFund()
	{
		$data = array(
					"wal_id"=>$this->input->post('txt_wal_id'),
					"tran_type"=>"cash_in",
					"tran_amt"=>$this->input->post('txt_amount'),
					"tran_date"=>date("Y-m-d h:i:sa"),
					"tran_status"=>"0"
			);
		$query=$this->db->insert("tbl_wallet_transaction", $data);
		if($query){ return true;}
	}

	public function get_mem_id($acc_id)
	{
		$query = $this->db->get_where("tbl_account",array("acc_id"=>$acc_id));
		if($query->num_rows()>0)
		{
		  return $query->row()->mem_id;
		}else {
			return array();
		}
	}
	public function get_order_update($ord_id=""){
		$query=$this->db->query("SELECT * FROM tbl_order_hdr AS orh INNER JOIN tbl_order_det AS ord ON orh.ord_code=ord.ord_code  WHERE ord_id='$ord_id'");
		return $query->row();
	}
	public function order_update($id=""){
		$data = array("ord_status" => $this->input->post("ddlOrdStatus"));
		$this->db->where("ord_id",$this->input->post("ord_id"));
		$query=$this->db->update("tbl_order_hdr",$data);
		if($query==TRUE){return true;}
	}

	public function trash_order($ord_code=""){
		$data = array("ord_status" => "trash");
		$this->db->where("ord_code",$ord_code);
		$query=$this->db->update("tbl_order_hdr",$data);
		if($query==TRUE){return true;}
	}
	public function un_trash($ord_code=""){
		$data = array("ord_status" => "pending");
		$this->db->where("ord_code",$ord_code);
		$query=$this->db->update("tbl_order_hdr",$data);
		if($query==TRUE){return true;}
	}
	public function get_order_hdr1($mem_id="")
	{

		$query=$this->db->query("SELECT * FROM tbl_order_hdr AS orh INNER JOIN tbl_member AS mb ON orh.mem_id=mb.mem_id WHERE orh.mem_id='$mem_id' AND ord_status='order'");
		if($query->num_rows()>0)
		{return $query->result();
		}else{array();}
	}

	public function get_order_det($ord_code)
	{
		$this->db->select("*");
		$this->db->from("tbl_order_det");
		$this->db->join("tbl_product","tbl_order_det.p_id=tbl_product.p_id");
		$this->db->where("tbl_order_det.ord_code",$ord_code);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}else {
			return array();
		}
	}

	public function get_member_info($ord_code)
	{
		$this->db->select("mem_id");
		$mem_id = $this->db->get_where("tbl_order_hdr",array("ord_code"=>$ord_code));
		if($mem_id->num_rows()>0)
		{
			$query = $this->db->get_where("tbl_member",array("mem_id"=>$mem_id->row()->mem_id)) ;
			if($query->num_rows()>0)
			{
				return $query->row();
			}else {
				return array();
			}
		}else {
			return array();
		}
	}

	public function get_inventory($acc_id)
	{
			$this->db->select("*");
			$this->db->from("tbl_product");
			$this->db->join("tbl_media","tbl_product.p_id=tbl_media.p_id");
			$this->db->where(array("acc_id"=>$acc_id,"p_type"=>"inventory"));
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result();
			}else {
				return array();
			}
	}

	public function get_inventory_code()
	{
		$invID = $this->db->query("SELECT IFNULL(MAX(p_code),0) AS p_code FROM tbl_product WHERE p_type='inventory'");
		if($invID->num_rows()>0&&$invID->row()->p_code!="0")
		{
			$id = $invID->row()->p_code;
			$tmp  = intval(substr($id,3,strlen($id)-3))+1;
			$result = "inv".str_pad($tmp,7,"0",STR_PAD_LEFT);
			return $result;
		}else {
			return "inv0000001";
		}
	}

	public function get_p_id($p_code)
	{
		$query = $this->db->get_where("tbl_product",array("p_code"=>$p_code,"p_type"=>"inventory"));
		if($query->num_rows()>0)
		{
			return $query->row()->p_id;
		}else {
			return array();
		}
	}
	public function insertInventory()
	{
			$data = array(
					"p_code"	=>	$this->input->post("txtCode"),
					"acc_id"	=>	$this->session->acc_id,
					"str_id"	=>	$this->session->str_id,
					"cat_id"	=>	$this->input->post("ddlCat"),
					"brn_id"	=>	$this->input->post("ddlBrand"),
					"p_name"	=>	$this->input->post("txtName"),
					"p_desc"	=>	$this->input->post("txtInvDesc"),
					"price"	=>	$this->input->post("txtPrice"),
					"color"	=>	$this->input->post("txtColor"),
					"size"	=>	$this->input->post("txtSize"),
					"model"	=>	$this->input->post("txtModel"),
					"date_release"	=>	$this->input->post("txtDateRelease"),
					"dimension"	=>	$this->input->post("txtDimension"),
					"p_type"	=>	"inventory",
					"p_status"	=>	$this->input->post("ddlStatus"),
					"user_crea"	=>	$this->session->memLogin,
					"date_crea"	=>	date("Y-m-d")
		);
		$this->db->insert("tbl_product",$data);

		$img = $this->input->post("txtImgName");
		if($img!="")
		{
			$p_code = $this->input->post("txtCode");
			$p_id = $this->get_p_id($p_code);
			$data = array(
											"p_id"	=>	$p_id,
											"path"	=>	$img,
											"media_type"	=>	"inventory",
											"user_crea"	=>	$this->session->memLogin,
											"date_crea"	=>	date("Y-m-d")
			);
			$this->db->insert("tbl_media",$data);
		}
	}

	public function promotion($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_promotion_det AS det JOIN tbl_promotion AS pro ON det.pro_id=pro.pro_id LEFT JOIN
		tbl_promotion_occasion AS occ ON pro.occ_id=occ.occ_id LEFT JOIN tbl_media AS me ON det.p_id=me.p_id JOIN tbl_product AS
		p ON det.p_id=p.p_id JOIN tbl_category AS cat ON pro.cat_id=cat.cat_id LEFT JOIN tbl_store AS st ON pro.`str_id`=st.`str_id`
		LEFT JOIN tbl_account AS a ON st.`acc_id`=a.`acc_id` WHERE st.`acc_id`='$id' ORDER BY pro_name DESC");
		return $query->result();
	}

	public function promotion_det($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_promotion_det AS det JOIN tbl_promotion AS pro ON det.pro_id=pro.pro_id LEFT JOIN
		tbl_promotion_occasion AS occ ON pro.occ_id=occ.occ_id LEFT JOIN tbl_media AS me ON det.p_id=me.p_id JOIN tbl_product AS p ON det.p_id=p.p_id JOIN tbl_category AS cat ON pro.cat_id=cat.cat_id LEFT JOIN tbl_store AS st ON pro.`str_id`=st.`str_id` LEFT JOIN tbl_account AS a ON st.`acc_id`=a.`acc_id` WHERE det.`pro_det_id`='$id'");
		return $query->row();
	}
}
?>
