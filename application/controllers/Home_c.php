<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Home_c extends CI_Controller
	{
		var $itemNum;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Home_m','hm');
			$this->itemNum = isset($this->session->product)?count($this->session->product):0;
		}
		public function index()
		{
			$data['category']=$this->hm->category();
			$data["bastseller"]=$this->hm->product_bestsller();
			$data["record"]=$this->hm->slideshow();
			$data['itemNum'] = $this->itemNum;
			$data['product'] = $this->hm->get_product();
			$data["slide_once"]=$this->hm->slideshow_once(); // fist Slide
			$data["slide_multi"]=$this->hm->slideshow();

			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav',$data);
			$this->load->view('layout_site/category', $data);   // Category and Bastseller
			$this->load->view('layout_site/slideshow', $data);  // Slideshow
			$this->load->view('layout_site/footer');
		}
		public function product_page()
		{
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('layout_site/category');
			$this->load->view('product_page');
			$this->load->view('layout_site/footer');
			
		}
		public function product_page_detail(){
			$this->load->view('layout_site/header_top');
			$this->load->view('layout_site/nav');
			$this->load->view('layout_site/category');
			$this->load->view('product_detail');
			$this->load->view('layout_site/footer');
		}

		

	}
