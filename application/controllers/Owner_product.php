<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Owner_product extends CI_Controller 
	{
		var $itemNum;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Owner_product_m');
			$this->itemNum = isset($this->session->product)?count($this->session->product):0;
		}

	    public function index()
		{	
			$data['advertisement']=$this->hm->adv();
			$data['category']=$this->hm->category();
			$data['itemNum'] = $this->itemNum;
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav',$data);
			//$this->load->view('layout_site/category',$data);
			$this->load->view('product_page', $data);
			$this->load->view('layout_site/footer');
		}
		public function add_product(){
			$row = $this->Owner_product_m->add_product();
			if($row==TRUE){
				redirect("admin/memberLogin");
			}
		}
	}
