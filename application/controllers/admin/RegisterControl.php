<?php
	class RegisterControl extends CI_Controller
	{
		public function __construct()
		{	
			parent::__construct();
			$this->pageHeader='Member';		
			$this->page_redirect="admin/registerControl";							
			$this->load->model("accountModel","am");
			$this->load->model("locationModel","lm");
			$this->userLog="Admin";
		}
		function index(){
			$data['acct_ype'] = array('General'=>'General','Agent'=>'Agent','Shop-owner'=>'Shop-owner');
			$data['action'] = "{$this->page_redirect}/add";		
			$data['pageHeader'] = $this->pageHeader;
			$data['cancel'] = "{$this->page_redirect}/add/member_log";	
			$data['location'] = $this->lm->get_location();
			$data['member_list'] = $this->am->loadMember();
			$this->load->view('admin/member_register',$data);
			$this->load->view('template/footer');
		}// redirect to register page

		function add()
		{	
			$this->form_validation->set_rules('txtAccCode','Account code','required');
			$this->form_validation->set_rules('txtPassword',' password','required');	
			$this->form_validation->set_rules('txtConPasswd','Confirm','required');
			$this->form_validation->set_rules('ddlMember','Menmber','required');	
			$this->form_validation->set_rules('txtDob','Date Of Birth','required');
			$this->form_validation->set_rules('txtEmail','Email','required');	
			$this->form_validation->set_rules('ddlAccType','','required');	
			$this->form_validation->set_rules('txtCompany','Account Type','required');	
			$this->form_validation->set_rules('txtPosition','Position','required');
			$this->form_validation->set_rules('txtContact','Contact','required');	
			$this->form_validation->set_rules('ddlLocation','Location','required');		
			if($this->form_validation->run()==false){
				redirect("admin/memberLogin");
			}else{
			$this->am->insert_account();
			redirect("admin/memberLogin");
			}
		}//register new member 
	}
?>