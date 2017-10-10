<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberLogin extends CI_Controller
{
	var $msg;
	var $memLogin;
	var $pageHeader,$page_redirect,$cancel;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Member';		
		$this->page_redirect="admin/memberLogin";							
		$this->load->model("promotion_m", "pm");
		$this->load->model("staf_m");
		$this->load->model("locationModel");
		$this->load->model("memberLogin_model","ml");
		$this->load->model("Wallet_m","wm");
		$this->load->model("home_m","hm");
		$this->msg = "";
	}

	public function index()
	{
		$validate = false;
		$data["msg"] = $this->msg;
		$this->form_validation->set_rules("txtUser","User","required");
		$this->form_validation->set_rules("txtPass","Password","required|max_length[100]");
		if(isset($_POST["btnLogin"])&&$this->form_validation->run()===true)
		{
			$userName = $this->input->post("txtUser");
			$pwd = $this->input->post("txtPass");
			$accType=$this->input->post("ddlAccType");
			$validate = $this->ml->validate_member($userName,$pwd,$accType);
			if($validate==false)
			{
				$data["msg"] = "Member name/ password/ account type is incorrect";
				$this->load->view("admin/login_member.php",$data);
			}else{
				if($validate->status!="0"){
					$this->profile($validate->acc_id);
				}else{
					$data["msg"] = "Your account not accept to login...!";
					$this->load->view("admin/login_member.php",$data);
				}

			}
		}else
		{	
			$this->load->view("admin/login_member.php",$data);
		}
	}

	public function Logout()
	{
		session_destroy();
		redirect('memberLogin');
	}
	public function chage_password($id)
	{
			$this->form_validation->set_rules('newpassword', 'New Password','required');
			$this->form_validation->set_rules('confirmPassword','Confirm New Password','required|matches[newpassword]');

			if($this->form_validation->run()==TRUE)
			{
				$this->ml->updatePassword($id);
				redirect('admin/MemberLogin/log_info');
			}
				$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
				$data["member"] = $this->ml->get_member($this->session->memLogin);
				$data["location"] = $this->ml->get_location();
				$this->load->view('layout_site/header_top');
				$this->load->view('layout_site/nav');
				$this->load->view('chage_password',$data);
				$this->load->view('layout_site/footer');
	}

	public function profile($acc_id="",$error="")
	{	
		if($acc_id!="")
		{
			$this->session->unset_userdata("promotion");
			$this->session->acc_id = $acc_id;
			$data["template"]=$this->hm->get_template();
			$data["acc_id"] = $acc_id;
			$mem_id = $this->ml->get_mem_id($acc_id);
			$data["services"] = $this->ml->get_service($this->session->acc_id);
			$data["account"] = $this->ml->get_account($this->session->memLogin);
			$data["active_account"]=$this->ml->get_active_account($this->session->acc_id);
			$data["wallet"]=$this->ml->get_wallet($this->session->acc_id);
			$data["wallet_transaction"]=$this->ml->select_wallet_transaction($this->session->acc_id);
			$data["acc"]=$this->ml->get_account_validation($this->session->acc_id);
			$data["product"] = $this->ml->get_product($this->session->acc_id);
			$data["shop_product"] = $this->ml->get_shop_product($this->session->acc_id);
			$data["new_order"]= $this->ml->get_new_order($this->session->acc_id);
			$data["shop"]=$this->ml->selectshop($acc_id);
			$data["member"] = $this->ml->get_member($this->session->memLogin);
			$data["pro"] = $this->ml->promotion($this->session->acc_id);
			$data["order1"]= $this->ml->get_order_hdr1($mem_id);
			$data["profile"] = $this->ml->get_account_validation($acc_id);
			$data["inventory"] = $this->ml->get_inventory($acc_id);
			$data["store"] = $this->ml->get_shop($this->session->acc_id);
			$data["location"] = $this->locationModel->get_location();
			$data["staf_info"] = $this->staf_m->index();
			$data["error"]=$error;
			$this->load->view("layout_site/header_top1",$data);
			$this->load->view("layout_site/nav");
			$this->load->view("admin/member_profile",$data);
			$this->load->view("layout_site/footer");
		}else
		{
			$this->load->view("admin/login_member.php",$data);
		}
	}	


	public function validation(){
		$this->form_validation->set_rules("ConPassword","Confirm password","required");
		$this->form_validation->set_rules("Newpassword","Password","required");
		if($this->form_validation->run()==TRUE){
			return true;
		}else{return false;}
	}	

	public function pro_validation(){ 	
		$this->form_validation->set_rules("txtName","Account Name","required");
		$this->form_validation->set_rules("ddlGender","Gender","required");
		$this->form_validation->set_rules("ddlLocation","location","required");
		$this->form_validation->set_rules("txtContact","Conract-Us","trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]");
		if($this->form_validation->run()==TRUE){
			return true;
		}else{return false;}
	}

	public function edit_profile()
	{
		if($this->pro_validation()==TRUE)
		{
			$row=$this->ml->saveProfile();
				if($row==TRUE){
					$acc_id=$this->input->post("acc_id");
			 		$this->profile($acc_id);
				}
		}else{
			$acc_id=$this->input->post("acc_id");
		 	$this->profile($acc_id);
		}
	
	}
	 public function change_password(){
		 	if($this->validation()==TRUE){
		 		if($this->input->post("Newpassword")==$this->input->post("ConPassword")){
		 			$row=$this->ml->change_password();
		 			if($row==TRUE){
		 				$acc_id=$this->input->post("acc_id");
			 			$this->profile($acc_id);
		 			}
		 		}else{
		 			$acc_id=$this->input->post("acc_id");
		 			$error="confirm password must be the same password...!";
		 			$this->profile($acc_id,$error);
		 		}
		 	}else{
		 		$acc_id=$this->input->post("acc_id");
		 		$this->profile($acc_id);
		 	}
	}
	

	public function addstaf()
	{
		$data["stafCode"] = $this->staf_m->staf_code();
		$data["acc_info"] = $this->staf_m->get_account();
		$this->form_validation->set_rules("ddlStaf","Staf name","required");
		$this->form_validation->set_rules("txtPassword","Password","required");
		$this->form_validation->set_rules('txtConfirmPassword', 'Confirm Password', 'required');
		if($this->form_validation->run()===false)
		{
				$this->load->view("layout_site/header_top");
				$this->load->view("layout_site/nav");
				$this->load->view("addStaf",$data);
				$this->load->view("layout_site/footer");			
		}else{
			if($this->input->post("txtPassword")==$this->input->post("txtConfirmPassword")){
				$this->staf_m->insertStaf();
				redirect(base_url()."profile/".$this->session->acc_id);
			}
		}
	}

	public function editStaf($id=""){
		if($id!=""){
			$data["acc_info"]=$this->staf_m->get_account();
			$data["edit"]=$this->staf_m->index($id);
			$this->load->view("layout_site/header_top");
			$this->load->view("layout_site/nav");
			$this->load->view("editStaf",$data);
			$this->load->view("layout_site/footer");
		}
		if(isset($_POST["btnEdit"])){
				$row=$this->staf_m->edit();
				if($row===TRUE){
				$acc_id=$this->session->acc_id;
				$this->profile($acc_id);
				}
		}
	}
	public function change_password_staf($id="",$error=""){
		if($id!=""){
			$data["acc_info"]=$this->staf_m->get_account();
			$data["error"]=$error;
			$data["change"]=$this->staf_m->index($id);
			$this->load->view("layout_site/header_top");
			$this->load->view("layout_site/nav");
			$this->load->view("change_staf_password",$data);
			$this->load->view("layout_site/footer");
		}
	}
	public function save_staf_password(){
		$id=$this->input->post("txtSt_id");
		$this->form_validation->set_rules("txtOldPassword","old password","required");
		$this->form_validation->set_rules("txtPassword","new password","required");
		$this->form_validation->set_rules("txtConfirmPassword","confirm password","required");
		if($this->form_validation->run()==TRUE){
			if($this->input->post("Password") == $this->input->post("txtOldPassword")){
				if($this->input->post("txtPassword")==$this->input->post("txtConfirmPassword")){
					$row=$this->staf_m->change_password();
					if($row===TRUE){
						$acc_id=$this->session->acc_id;
						$this->profile($acc_id);
					}
				}else{$this->change_password_staf($id,$error="confirm password must by the same password..!");}
			}else{$this->change_password_staf($id,$error="incorrect old password...!");}
		}else{$this->change_password_staf($id);}
	}

	public function addInventory()
	{
		$data["itemCode"] = $this->ml->get_inventory_code();
		$data["category"] = $this->ml->get_category();
		$data["brand"] = $this->ml->get_brand();
		$this->form_validation->set_rules("txtName","Item Name","required|trim|max_length[200]|alpha_numeric_spaces");
		$this->form_validation->set_rules("ddlCat","Category","required|numeric");
		$this->form_validation->set_rules("ddlBrand","Brand","required|numeric");
		$this->form_validation->set_rules("txtInvDesc","Description","trim|max_length[1000]");
		$this->form_validation->set_rules("txtPrice","Price","required|trim|max_length[20]|alpha_numeric");
		$this->form_validation->set_rules("txtColor","Color","trim|max_length[20]|alpha_numeric_spaces");
		$this->form_validation->set_rules("txtSize","Size","trim|max_length[20]|alpha_numeric_spaces");
		$this->form_validation->set_rules("txtModel","Model","trim|max_length[100]|alpha_numeric_spaces");
		$this->form_validation->set_rules("txtDimension","Dimension","trim|max_length[50]|alpha_numeric_spaces");
		$this->form_validation->set_rules("ddlStatus","Status","required|trim|max_length[11]|numeric");
		if($this->form_validation->run()===false)
		{
			$this->load->view("layout_site/header_top");
			$this->load->view("layout_site/nav");
			$this->load->view("addInventory",$data);
			$this->load->view("layout_site/footer");
		}else {
			$acc_id = $this->session->acc_id;
			$this->ml->insertInventory();
			redirect(base_url()."profile/".$acc_id);
		}
	}
	public function updateOrderStatus($id,$status)
	{
		$this->ml->updateOrderStatus($id,$status);
	}
	public function log_info()
	{
		$data["services"] = $this->ml->get_service($this->session->acc_id);
		$data["account"] = $this->ml->get_account($this->session->memLogin);
		$data["active_account"]=$this->ml->get_active_account($this->session->acc_id);
		$data["wallet"]=$this->ml->get_wallet($this->session->acc_id);
		$data["acc"]=$this->ml->get_account_validation($this->session->acc_id);
		$data["product"] = $this->ml->get_product($this->session->acc_id);
		$data["shop"]=$this->ml->selectshop($this->session->acc_id);
		$data["member"] = $this->ml->get_member($this->session->memLogin);
		$this->load->view("layout_site/header_top");
		$this->load->view("layout_site/nav");
		$this->load->view("admin/member_profile",$data);
		$this->load->view("layout_site/footer");
	}

	public function acc_setup(){
		$this->form_validation->set_rules('txt_dob', 'date of birth', 'required');
		$this->form_validation->set_rules('txt_gender', 'gender', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('txt_acc_type', 'account type', 'required');
		$this->form_validation->set_rules('txtaccCode', 'account code', 'required');
		$this->form_validation->set_rules('ddlLocation', 'location', 'required');
		if ($this->form_validation->run()==TRUE) 

		{	$row=$this->ml->AccTypeValidate($this->session->memLogin);
			if($row!==true){
				$this->ml->addAccount();
				redirect('profile/'.$this->session->acc_id);
			}else{
				$data["error"]="this member of account type have already... ";
				$data["member"] = $this->ml->select($this->session->memLogin);
				$data["location"] = $this->ml->get_location();
				$this->load->view('layout_site/header_top');
				$this->load->view('layout_site/nav');
				$this->load->view('addAccount',$data);
				$this->load->view('layout_site/footer');
			}
		}else{ $this->addAccount(); }
	}

	public function addAccount()
	{	
			$data["member"] = $this->ml->select($this->session->memLogin);
			$data["location"] = $this->ml->get_location();
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('addAccount',$data);
			$this->load->view('layout_site/footer');

	}

	public function editAccount($id)
	{
		$this->form_validation->set_rules('txtaccCode', 'Input Your Account Code', 'required');
		$this->form_validation->set_rules('txt_gender', 'Chose Gender', 'required');
		if ($this->form_validation->run()==TRUE) 
		{
			$this->ml->updateAccount($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
		$data["member"] = $this->ml->select_member($this->session->memLogin);
		$data["location"] = $this->ml->get_location();
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		
		$this->load->view('editAccount',$data);
		$this->load->view('layout_site/footer');
	}
	public function validation1(){
		$this->form_validation->set_rules('txt_price','Input Your Price','required');
		$this->form_validation->set_rules('type_pro_code','product_code alredy input','required|is_unique[tbl_product.p_code]');
		$this->form_validation->set_rules('txt_product','Input Your Product Name','required');
		$this->form_validation->set_rules('txt_category','Chose category','required');
		$this->form_validation->set_rules('txt_brand','Chose Brand','required');
		if($this->form_validation->run()==TRUE){
			return TRUE;
		}else{return FALSE;}
	}
	public function addProduct()
	{	
		if($this->validation1()==TRUE)
		{  
			if($this->input->post("type_pro_code")!="")
			{
				$data["template"]=$this->hm->get_template();
				$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
				$data["brand"] = $this->ml->get_brand();
				$data["store"]=$this->ml->val_store($this->session->acc_id);
				$data["category"] = $this->ml->get_category();
				$data["pro_code"]=$this->ml->get_pro_code($this->session->acc_id);
				$this->load->view('layout_site/header_top');
				$this->load->view('layout_site/nav');
				$this->load->view('addProduct', $data);
				$this->load->view('layout_site/footer');
			}
		}else{
			$data["template"]=$this->hm->get_template();
			$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
			$data["brand"] = $this->ml->get_brand();
			$data["store"]=$this->ml->val_store($this->session->acc_id);
			$data["category"] = $this->ml->get_category();
			$data["pro_code"]=$this->ml->get_pro_code($this->session->acc_id);
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('addProduct', $data);
			$this->load->view('layout_site/footer');
		}
	}
	public function addProduct1(){
			$data["template"]=$this->hm->get_template();
			$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
			$data["brand"] = $this->ml->get_brand();
			$data["supplyer"] = $this->ml->get_supplyer();
			$data["store"]=$this->ml->val_store($this->session->acc_id);
			$data["category"] = $this->ml->get_category();
			$data["pro_code"]=$this->ml->get_pro_code($this->session->acc_id);
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('addProduct1', $data);
			$this->load->view('layout_site/footer');
	} /*========-------shop owner addProduct*/

	public function editProduct($id)
	{
		$this->form_validation->set_rules('txtStockQty','Input Your Stock Qty','required');
		$this->form_validation->set_rules('txt_price','Input Your Price','required');
		$this->form_validation->set_rules('txt_product','Input Your Product Name','required');
		if($this->form_validation->run()==TRUE)
		{	
			$this->ml->updateProduct($id);
		    redirect('profile/'.$this->session->acc_id);
		}
		$data["template"]=$this->hm->get_template();
		$data["product"] = $this->ml->get_product_validation($id);
		$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
		$data["brand"] = $this->ml->get_brand();
		$data["store"]=$this->ml->val_store($this->session->acc_id);
		$data["category"] = $this->ml->get_category();	
		$this->load->view('layout_site/header_top',$data);
		$this->load->view('layout_site/nav');
		$this->load->view('editProduct', $data);
		$this->load->view('layout_site/footer');
	}

	public function addShop()
	{
		$this->form_validation->set_rules('txt_shop_name','Input Your Shop Name','required');
		$this->form_validation->set_rules('txt_shop_type','Input Your Shop Type','required');
		$this->form_validation->set_rules('txt_shop_code','Input Your Shop Code','required');
		if ($this->form_validation->run()==TRUE) 
		{
			$this->ml->addShop();
			redirect('profile/'.$this->session->acc_id);
		}
		$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('shop/addshop', $data);
		$this->load->view('layout_site/footer');
	}

	public function editShop($id)
	{
		$this->form_validation->set_rules('txt_shop_name','Input Your Shop Name','required');
		$this->form_validation->set_rules('txt_shop_type','Input Your Shop Type','required');
		$this->form_validation->set_rules('txt_shop_code','Input Your Shop Code','required');
		if($this->form_validation->run()==TRUE)
		{
			$this->ml->updateshop($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
		$data["shop"]=$this->ml->get_store($id);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('shop/editshop', $data);
		$this->load->view('layout_site/footer');
	}

	public function addMember()
	{
 		$this->form_validation->set_rules('txt_mem_email', 'Email Address', 'trim|required|max_length[255]|xss_clean|valid_email|prep_for_form');
		$this->form_validation->set_rules('txt_mem_phone','Input Your Phone Number 10','required|regex_match[/^[+-0-9]{8,15}$/]');
		$this->form_validation->set_rules('txt_mem_code','Input Your Member Code','required');
		$this->form_validation->set_rules('password','Your Password','required');
		$this->form_validation->set_rules('confirmPassword','Confirm Password','required|matches[password]');
		if ($this->form_validation->run()==TRUE) 
		{
			$this->ml->addMember();
			redirect('profile/'.$this->session->acc_id);
		}
		// $data["account"]=$this->ml->get_account_validation($this->session->acc_id);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('member/addmember');
		$this->load->view('layout_site/footer');
	}

	public function editMember($id)
	{
		$this->form_validation->set_rules('txt_mem_email', 'Email Address', 'trim|required|max_length[255]|xss_clean|valid_email|prep_for_form');
		$this->form_validation->set_rules('txt_mem_phone','Input Your Phone Number 10','required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('txt_mem_code','Input Your Member Code','required');
		
		if ($this->form_validation->run()==TRUE) 
		{
			$this->ml->editMember($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["member"] = $this->ml->select_member($id);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('member/editmember', $data);
		$this->load->view('layout_site/footer');
	}
	public function get_order_update($order_code=""){
		$data["order_info1"]=$this->ml->get_order_update($order_code);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view("edit_get_order",$data);
		$this->load->view('layout_site/footer');
	}
	public function order_update(){
		$row=$this->ml->order_update();
		if($row==TRUE){
			redirect('profile/'.$this->session->acc_id);
		}
	}
	public function trash_order($ord_code){
		if($ord_code!=""){
			$row=$this->ml->trash_order($ord_code);
			if($row==true){
				redirect('profile/'.$this->session->acc_id);
			}
		}
	}
	public function untrash_order($ord_code){
		if($ord_code!=""){
			$row=$this->ml->un_trash($ord_code);
			if($row==true){
				redirect('profile/'.$this->session->acc_id);
			}
		}
	}
	public function chage_password_member($id)
	{
		$this->form_validation->set_rules('password','Input New Password','required');
		$this->form_validation->set_rules('confirmPassword','Confirm New Password','required|matches[password]');
		if($this->form_validation->run()==TRUE)
		{
			$this->ml->update_password_memeber($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["member"] = $this->ml->select_member($id);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('member/change_password',$data);
		$this->load->view('layout_site/footer');
	}

	public function addservice()
	{
		$this->form_validation->set_rules('txt_price','Input Your Price','required');
		$this->form_validation->set_rules('txt_service','Input Your Service Name','required');
		
		if($this->form_validation->run()==TRUE)
		{
			$this->ml->addService();
			redirect('profile/'.$this->session->acc_id);
		}

		$data["template"]=$this->hm->get_template();
		$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
		$data["brand"] = $this->ml->get_brand();
		$data["store"]=$this->ml->val_store($this->session->acc_id);
		$data["category"] = $this->ml->get_category();
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('services/addservices', $data);
		$this->load->view('layout_site/footer');
	}

	public function editService($id)
	{
		$this->form_validation->set_rules('txt_price','Input Your Price','required');
		$this->form_validation->set_rules('txt_service','Input Your Service Name','required');
		if($this->form_validation->run()==TRUE)
		{
			$this->ml->editService($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["services"] = $this->ml->get_service_validation($id);
		$data["account"]=$this->ml->get_account_validation($this->session->acc_id);
		$data["brand"] = $this->ml->get_brand();
		$data["store"]=$this->ml->val_store($this->session->acc_id);
		$data["category"] = $this->ml->get_category();
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('services/editservice', $data);
		$this->load->view('layout_site/footer');
	}

	public function addFund()
	{
		$this->form_validation->set_rules('txt_amount','Input Your Amount','required');
		$this->form_validation->set_rules('txt_transaction_date','Choose Your Transaction Date','required');
		
		if($this->form_validation->run()==TRUE)
		{
			$row=$this->ml->addFund();
			if($row){
				redirect('profile/'.$this->session->acc_id);
			}
		}else{
			$data["template"]=$this->hm->get_template();
			$data["wallet"]=$this->ml->get_wallet($this->session->acc_id);
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('addFund', $data);
			$this->load->view('layout_site/footer');
		}
	}

	public function remove_fund($wal_tran_id)
	{
		$this->ml->delete_wallet_transaction($wal_tran_id);
		redirect('profile/'.$this->session->acc_id);
	}

	public function view_order_detail($ord_code="")
	{
		if($ord_code!="")
		{
			$data["acc_id"] = $this->session->acc_id;
			$data["product"] = $this->ml->get_order_det($ord_code);
			$data["member"] = $this->ml->get_member_info($ord_code);
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('viewOrderDet',$data);
			$this->load->view('layout_site/footer');
		}else {
			echo "Invalid Order ID.";
		}
	}

	public function Cancel()
	{
		redirect('profile/'.$this->session->acc_id);
	}

	public function add_promotion()
	{
		// $this->form_validation->set_rules('txt_amount','Input Your Amount','required');
		// $this->form_validation->set_rules('txt_transaction_date','Choose Your Transaction Date','required');
		
		// if($this->form_validation->run()==TRUE)
		// {
		// 	$this->ml->addFund();
		// 	redirect('profile/'.$this->session->acc_id);
		// }
		$data['action'] = "{$this->page_redirect}/pro_type";
		$data['product_cat'] = $this->pm->product_cat();
		$data['pro_occasion'] = $this->pm->pro_occasion();
		$data["store"] = $this->ml->get_shop($this->session->acc_id);
		$this->load->view('layout_site/header_top1');
		$this->load->view('layout_site/nav');
		$this->load->view('addPromotion', $data);
		$this->load->view('layout_site/footer');
	}

	public function pro_type()
	{	
		$data['action'] = "{$this->page_redirect}/add_promotion1";			
		$data['pageHeader'] = $this->pageHeader;		
		$data['cancel'] = $this->page_redirect;				 		
		$promotion1=array(																	
								$this->input->post("txtFrom"),
								$this->input->post("txtTo"),
								$this->input->post("ddlCategory"),
								$this->input->post("ddlOcc"),
								$this->input->post("txtProName"),
								$this->input->post("ddlType"),
								$this->input->post("txtStore")								
							);
		$this->session->set_userdata("promotion",$promotion1);		
		if($this->input->post("ddlType")=="d")
		{			
			$this->load->view('layout_site/header_top1');
			$this->load->view('layout_site/nav');
			$this->load->view('promotiom_discount',$data);
			$this->load->view('layout_site/footer');
		}
		elseif($this->input->post("ddlType")=="a")
		{
			$this->load->view('layout_site/header_top1');
			$this->load->view('layout_site/nav');
			$this->load->view('promotion_add_product',$data);
			$this->load->view('layout_site/footer');
		}				
	}
	
	public function add_promotion1()
	{			
		$this->pm->add_promotion();						
		$this->add_promotion();			
	}

	public function delete($id)
	{
		$this->pm->delete($id);
		$this->Cancel();
	}

	public function pro_detail($id="")
	{
		$data["detail"]=$this->ml->promotion_det($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('layout_site/header_top1');
		$this->load->view('layout_site/nav');	
		$this->load->view('pro_detail',$data);
		$this->load->view('layout_site/footer');	
	}
	
}
?>