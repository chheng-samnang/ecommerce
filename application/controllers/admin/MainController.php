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
	}

	function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/main');
		$this->load->view('template/footer');
	}
}
?>