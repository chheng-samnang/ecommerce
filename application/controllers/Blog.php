<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Blog extends CI_Controller
	{
		private $limit = 3;
		public function __construct()
		{
			parent::__construct();
			
			// $this->load->model('Home_m','hm');
			 $this->load->model('Blog_m','bm');
			 $this->load->library('pagination');
		}

		public function index()
		{
			$keyword=$this->input->post('keyword');
		        $data['blog']=$this->bm->search($keyword, $this->limit); // Search blog
				$data['popular_blog']=$this->bm->popular_blog();
				$total_rows=$this->bm->count();
		        $config['total_rows']=$total_rows;
		        $config['per_page']=$this->limit;
		        $config['uri_segment']=3;
		        $config['base_url']=site_url("blog/index");

		        $this->pagination->initialize($config);
		        $data['page_link']=$this->pagination->create_links();
			
				$this->load->view('layout_site/style');
				$this->load->view('blog', $data, compact($data));
				$this->load->view('layout_site/footer');
			
	       
		}

		public function blog_detail($bl_id)
		{

			if($bl_id!="")
			{
				$data["blog_comment"]=$this->bm->blog_comment($bl_id);
				$data['de_blog']=$this->bm->blog_detail($bl_id);
				$data['popular_blog']=$this->bm->popular_blog();

				$this->form_validation->set_rules('title', 'Input Your comment', 'required');
				if($this->form_validation->run()==TRUE)
				{
					$this->bm->comment();
					redirect("blog/blog_detail/".$bl_id);
				}
				$this->load->view('layout_site/style');
				$this->load->view('blog_detail', $data);
				$this->load->view('layout_site/footer1');
			}
		}

		// public function comment()
		// {
		// 	$this->form_validation->set_rules('title', 'Input Your comment', 'required');
		// 	if($this->form_validation->run()==TRUE)
		// 	{
		// 		$this->bm->comment();
		// 		redirect("blog_detail/".$bl_id);
		// 	}
		// 		$data["blog_comment"]=$this->bm->blog_comment($bl_id);
		// 		$data['de_blog']=$this->bm->blog_detail($bl_id);
		// 		$data['popular_blog']=$this->bm->popular_blog();
				
		// 		$this->load->view('layout_site/style');
		// 		$this->load->view('blog_detail', $data);
		// 		$this->load->view('layout_site/footer1');
		// }

		#================== blog detail =========================

	}
