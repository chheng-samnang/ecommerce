<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class memberLogout extends CI_Controller
{
	var $msg;
	var $memLogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model("memberLogin_model","mm");
		$this->load->model("Wallet_m","wm");
		$this->msg = "";
		
	}

	public function index()
	{
		session_destroy();
		$validate = false;
		$data["msg"] = $this->msg;
		$this->form_validation->set_rules("txtEmail","Email","required|valid_email|max_length[50]");
		$this->form_validation->set_rules("txtPass","Password","required|max_length[100]");

		if(isset($_POST["btnLogin"])&&$this->form_validation->run()===true)
		{
			$email = $this->input->post("txtEmail");
			$pwd = $this->input->post("txtPass");
			$validate = $this->mm->validate_member($email,$pwd);

			if($validate!==true)
			{
				$data["msg"] = $validate;

				$this->load->view("admin/logout_member",$data);
			}else
			{

				$data["account"] = $this->mm->get_account($this->session->memLogin);
				$data["member"] = $this->mm->get_member($this->session->memLogin);
				$this->load->view("layout_site/header_top");
				$this->load->view("layout_site/nav");
				$this->load->view("admin/choose_account",$data);
				$this->load->view("layout_site/footer");
			}
		}else
		{
			$this->load->view("admin/logout_member",$data);
		}
		
	}
}
