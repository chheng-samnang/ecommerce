<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class OrderController extends CI_Controller
{
	var $pageHeader,$page_redirect,$action,$cancel;
	function __construct()
	{
		parent::__construct();
		$this->page_redirect = "order";
		$this->pageHeader="Order";
		$this->load->model("orderModel","om");
	}

	function index()
	{
		$data['member'] = $this->om->get_member();
		$this->load->view('template/header');
		$this->load->view('admin/order_pos',$data);
		$this->load->view('template/footer');
	}
}
?>