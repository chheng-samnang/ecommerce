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

		$this->load->model("memberLogin_model","mm");
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
			$email = $this->input->post("txtUser");
			$pwd = $this->input->post("txtPass");
			$validate = $this->mm->validate_member($email,$pwd);
			if($validate!==true)
			{
				$data["msg"] = $validate;
				
				$this->load->view("admin/login_member.php",$data);
			}else
			{
				$data["template"]=$this->hm->get_template();
				$data["account"] = $this->mm->get_account($this->session->memLogin);
				
				$data["member"] = $this->mm->get_member($this->session->memLogin);
				$this->load->view("layout_site/header_top1", $data);
				$this->load->view("layout_site/nav",$data);
				$this->load->view("admin/choose_account",$data);
				$this->load->view("layout_site/footer");
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
				$this->mm->updatePassword($id);
				redirect('admin/MemberLogin/log_info');
			}
				$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
				$data["member"] = $this->mm->get_member($this->session->memLogin);
				$data["location"] = $this->mm->get_location();
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
			$mem_id = $this->mm->get_mem_id($acc_id);

			$data["services"] = $this->mm->get_service($this->session->acc_id);
			$data["account"] = $this->mm->get_account($this->session->memLogin);
			$data["active_account"]=$this->mm->get_active_account($this->session->acc_id);
			$data["wallet"]=$this->mm->get_wallet($this->session->acc_id);
			$data["wallet_transaction"]=$this->mm->select_wallet_transaction($this->session->acc_id);
			$data["acc"]=$this->mm->get_account_validation($this->session->acc_id);
			$data["product"] = $this->mm->get_product($this->session->acc_id);
			$data["shop"]=$this->mm->selectshop($acc_id);
			$data["member"] = $this->mm->get_member($this->session->memLogin);
			$data["pro"] = $this->mm->promotion($this->session->acc_id);
			$data["order"]	= $this->mm->get_order_hdr($mem_id);
			$data["profile"] = $this->mm->get_account_validation($acc_id);
			$data["inventory"] = $this->mm->get_inventory($acc_id);
			$data["store"] = $this->mm->get_shop($this->session->acc_id);
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

	 public function change_password(){
		 	if($this->validation()==TRUE){
		 		if($this->input->post("Newpassword")==$this->input->post("ConPassword")){
		 			$row=$this->mm->change_password();
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
	public function addInventory()
	{
		$data["itemCode"] = $this->mm->get_inventory_code();
		$data["category"] = $this->mm->get_category();
		$data["brand"] = $this->mm->get_brand();

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
			$this->mm->insertInventory();
			redirect(base_url()."profile/".$acc_id);
		}
	}
	public function updateOrderStatus($id,$status)
	{
		$this->mm->updateOrderStatus($id,$status);
	}
	public function log_info()
	{
				$data["services"] = $this->mm->get_service($this->session->acc_id);
				$data["account"] = $this->mm->get_account($this->session->memLogin);
				$data["active_account"]=$this->mm->get_active_account($this->session->acc_id);
				$data["wallet"]=$this->mm->get_wallet($this->session->acc_id);
				$data["acc"]=$this->mm->get_account_validation($this->session->acc_id);
				$data["product"] = $this->mm->get_product($this->session->acc_id);
				$data["shop"]=$this->mm->selectshop($this->session->acc_id);
				$data["member"] = $this->mm->get_member($this->session->memLogin);
				$this->load->view("layout_site/header_top");
				$this->load->view("layout_site/nav");
				$this->load->view("admin/member_profile",$data);
				$this->load->view("layout_site/footer");
	}

	public function addAccount()
	{
		$this->form_validation->set_rules('txtaccCode', 'Input Your Account Code', 'required');
		if ($this->form_validation->run()==TRUE) 
		{
			$this->mm->addAccount();
			redirect('profile/'.$this->session->acc_id);
		}
		$data["member"] = $this->mm->select($this->session->memLogin);
		$data["location"] = $this->mm->get_location();
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
			$this->mm->updateAccount($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
		$data["member"] = $this->mm->select_member($this->session->memLogin);
		$data["location"] = $this->mm->get_location();
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		
		$this->load->view('editAccount',$data);
		$this->load->view('layout_site/footer');
	}

	public function addProduct()
	{
		$this->form_validation->set_rules('txt_price','Input Your Price','required');
		$this->form_validation->set_rules('txt_product','Input Your Product Name','required');
		$this->form_validation->set_rules('txt_category','Chose category','required');
		$this->form_validation->set_rules('txt_brand','Chose Brand','required');
		if($this->form_validation->run()==TRUE)
		{
			$this->mm->addProduct();
			redirect('profile/'.$this->session->acc_id);
		}

		$data["template"]=$this->hm->get_template();
		$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
		$data["brand"] = $this->mm->get_brand();
		$data["store"]=$this->mm->val_store($this->session->acc_id);

		$data["category"] = $this->mm->get_category();
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('addProduct', $data);
		$this->load->view('layout_site/footer');
		
	}

	public function editProduct($id)
	{
		$this->form_validation->set_rules('txtStockQty','Input Your Stock Qty','required');
		$this->form_validation->set_rules('txt_price','Input Your Price','required');
		$this->form_validation->set_rules('txt_product','Input Your Product Name','required');
		if($this->form_validation->run()==TRUE)
		{

			$this->mm->updateProduct($id);
		    redirect('profile/'.$this->session->acc_id);
		}

		$data["template"]=$this->hm->get_template();

		$data["product"] = $this->mm->get_product_validation($id);
		$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
		$data["brand"] = $this->mm->get_brand();
		$data["store"]=$this->mm->val_store($this->session->acc_id);


		$data["category"] = $this->mm->get_category();	
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
			$this->mm->addShop();
			redirect('profile/'.$this->session->acc_id);
		}
		$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
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
			$this->mm->updateshop($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
		$data["shop"]=$this->mm->get_store($id);
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
			$this->mm->addMember();
			redirect('profile/'.$this->session->acc_id);
		}
		// $data["account"]=$this->mm->get_account_validation($this->session->acc_id);
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
			$this->mm->editMember($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["member"] = $this->mm->select_member($id);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('member/editmember', $data);
		$this->load->view('layout_site/footer');
	}

	public function chage_password_member($id)
	{
		$this->form_validation->set_rules('password','Input New Password','required');
		$this->form_validation->set_rules('confirmPassword','Confirm New Password','required|matches[password]');
		if($this->form_validation->run()==TRUE)
		{
			$this->mm->update_password_memeber($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["member"] = $this->mm->select_member($id);
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
			$this->mm->addService();
			redirect('profile/'.$this->session->acc_id);
		}

		$data["template"]=$this->hm->get_template();
		$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
		$data["brand"] = $this->mm->get_brand();
		$data["store"]=$this->mm->val_store($this->session->acc_id);

		$data["category"] = $this->mm->get_category();
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
			$this->mm->editService($id);
			redirect('profile/'.$this->session->acc_id);
		}
		$data["services"] = $this->mm->get_service_validation($id);
		$data["account"]=$this->mm->get_account_validation($this->session->acc_id);
		$data["brand"] = $this->mm->get_brand();
		$data["store"]=$this->mm->val_store($this->session->acc_id);

		$data["category"] = $this->mm->get_category();
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
			$this->mm->addFund();
			redirect('profile/'.$this->session->acc_id);
		}

		$data["template"]=$this->hm->get_template();
		$data["wallet"]=$this->mm->get_wallet($this->session->acc_id);
		$this->load->view('layout_site/header_top');
		$this->load->view('layout_site/nav');
		$this->load->view('addFund', $data);
		$this->load->view('layout_site/footer');
	}

	public function remove_fund($wal_tran_id)
	{
		
		$this->mm->delete_wallet_transaction($wal_tran_id);
		redirect('profile/'.$this->session->acc_id);
	}

	public function view_order_detail($ord_code="")
	{
		if($ord_code!="")
		{
			$data["acc_id"] = $this->session->acc_id;
			$data["product"] = $this->mm->get_order_det($ord_code);
			$data["member"] = $this->mm->get_member_info($ord_code);
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
		// 	$this->mm->addFund();
		// 	redirect('profile/'.$this->session->acc_id);
		// }
		$data['action'] = "{$this->page_redirect}/pro_type";

		echo "Hello";
		$data['product_cat'] = $this->pm->product_cat();
		$data['pro_occasion'] = $this->pm->pro_occasion();
		$data["store"] = $this->mm->get_shop($this->session->acc_id);
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
		$data["detail"]=$this->mm->promotion_det($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('layout_site/header_top1');
		$this->load->view('layout_site/nav');	
		$this->load->view('pro_detail',$data);
		$this->load->view('layout_site/footer');	
	}
	
}
?>