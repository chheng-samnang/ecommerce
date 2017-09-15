<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class MainController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("main_m");
	}
	function index()
	{	$data["new_mem"]=$this->main_m->new_member();
		$data["stock"]=$this->main_m->stock();
		$data["store"]=$this->main_m->index();
		$data["inventory"]=$this->main_m->inventory();
		$data["order"]=$this->main_m->order();
		$data["member"]=$this->main_m->member();
		$data["cat_and_pro"] = $this->main_m->get_cat_pro();
		$data["order_pro"] =$this->main_m->get_order();
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/main',$data);
		$this->load->view('template/footer');
	}
}
?>