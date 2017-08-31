<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Home_m','hm');
			$this->load->model('Product_M','pm');
			$this->load->model("contact_us_m",'cm');
			$this->load->model("about_m");
		}
		
		public function index()
		{
			$data["template"]=$this->hm->get_template();
			$data["advertisement"]=$this->hm->adv();
			$data['marquee'] = $this->hm->get_marquee();
			$data['category']=$this->hm->category();
			$data["slide_once"]=$this->hm->slideshow_once(); // fist Slide
			$data["slide_multi"]=$this->hm->slideshow();     // Next Slide
			$this->load->view('layout_site/header_top', $data); // Header top
			$this->load->view('layout_site/nav', $data);        // Navigation
			$this->load->view('layout_site/slideshow', $data);  // Slideshow
			$this->load->view('layout_site/footer');            // Footer
		}
		
		public function kh()
		{
			$data["template"]=$this->hm->get_template();
			$data["advertisement"]=$this->hm->adv();
			$data['marquee'] = $this->hm->get_marquee();
			$data['category']=$this->hm->category();
			$data["slide_once"]=$this->hm->slideshow_once(); // fist Slide
			$data["slide_multi"]=$this->hm->slideshow();     // Next Slide
			$this->load->view('layout_site/header_top', $data); // Header top
			$this->load->view('layout_site/nav_kh', $data);        // Navigation
			$this->load->view('layout_site/slideshow', $data);  // Slideshow
			$this->load->view('layout_site/footer');  
		}

		public function ch()
		{
			$data["template"]=$this->hm->get_template();
			$data["advertisement"]=$this->hm->adv();
			$data['marquee'] = $this->hm->get_marquee();
			$data['category']=$this->hm->category();
			$data["slide_once"]=$this->hm->slideshow_once(); // fist Slide
			$data["slide_multi"]=$this->hm->slideshow();     // Next Slide

			$this->load->view('layout_site/header_top', $data); // Header top
			$this->load->view('layout_site/nav_ch', $data);        // Navigation

			$this->load->view('layout_site/slideshow', $data);  // Slideshow
			
			$this->load->view('layout_site/footer');  
		}

		public function chackout()
		{
			$data["template"]=$this->hm->get_template();
			$data["leng"]=$this->hm->change_leng();
			$this->load->view('layout_site/header_top', $data);
			$this->load->view('layout_site/nav');
			$this->load->view('chack_out_v');
			$this->load->view('layout_site/footer');
		}

		public function contact()
		{
			$data["template"]=$this->hm->get_template();
			$data["contact"]=$this->cm->get_contact_us();
			$this->load->view('layout_site/header_top',$data); // Header top
			$this->load->view('layout_site/nav');// Navigation
			$this->load->view('contact',$data);// Slideshow
			$this->load->view('layout_site/footer1');  
		}

		public function about()
		{
			$data["template"]=$this->hm->get_template();
			$data["about"]=$this->about_m->get_about();
			$this->load->view('layout_site/header_top',$data); // Header top
			$this->load->view('layout_site/nav');        // Navigation
			$this->load->view('about_us');  // Slideshow
			$this->load->view('layout_site/footer');  
		}
	}
