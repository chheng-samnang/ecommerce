<?php
class Slide_controller extends CI_Controller
{
	var $pageHeader,$panelTitle,$cancelString;
	function __construct()
	{
		parent::__construct();
		$this->pageHeader='Form Add Slideshow';
		$this->panelTitle='Slideshow Info';
		$this->cancelString = 'slide_controller';
	}

	function add_slide()
	{
		$data['option'] = array('1'=>'Enable','0'=>'Disable');
		$data['ctrl'] = $this->createCtrl();
		
		$data['action'] = 'add_slide';
		$data['pageHeader'] = $this->pageHeader;
		$data['panelTitle'] = $this->panelTitle;
		$data['cancel'] = $this->cancelString;


		if(isset($_POST['btnSubmit']))
		{
			#your code here
		}else
		{
			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/page_add',$data);
			$this->load->view('template/footer');
		}
	}

	function createCtrl()
		{
			//$ctrl = array();
			$ctrl = array(
							array(
									'type'=>'text',
									'name'=>'txtSlidename',
									'id'=>'txtSlidename',
									'placeholder'=>'Enter Slide name here...',
									'class'=>'form-control',
									'label'=>'Slide Name',
									'onClick'=>'alertName()'
								),
							array(
									'type'=>'text',
									'name'=>'txtSlideUrl',
									'id'=>'txtSlideUrl',
									'placeholder'=>'Enter Slide URL here...',
									'class'=>'form-control',
									'label'=>'URL'
								),
							array(
									'type'=>'text',
									'name'=>'txtSlidePath',
									'id'=>'txtSlidePath',
									'placeholder'=>'Enter Slide Path here...',
									'class'=>'form-control',
									'label'=>'Path'
								),
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'class'=>'class="form-control"',
									'label'=>'Status'
								),
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'label'=>'Description'
								)




							/*
							array(
								array(
										'type'=>'checkbox',
										'name'=>'chkSex[]',
										'value'=>'M',
										'label'=>'Male',
									'chkLabel'=>'Gender'
										
									),
								array(
										'type'=>'checkbox',
										'name'=>'chkSex[]',
										'value'=>'F',
										'label'=>'Female',
										'chkLabel'=>'Gender'
										
									)
								),
							array(
							'type'=>'textarea',
							'name'=>'txtDesc',
							'label'=>'Description'
							)*/
					);
			return $ctrl;
		}
}
?>