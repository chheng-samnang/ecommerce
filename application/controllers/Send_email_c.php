<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	
class Send_email_c extends CI_Controller 
{
	private $thumbnail_url="";
	function __construct(){
		parent::__construct();
		$this->load->model('Home_m','hm');
		$this->load->model("contact_us_m",'cm');
	}

	public function validation(){
		$this->form_validation->set_rules('txtName','Name','required');
		$this->form_validation->set_rules('txtEmail','Email','required');
		$this->form_validation->set_rules('txtSmg','Massage','required');
		if($this->form_validation->run()==TRUE){
			return TRUE;}else{return False;}
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
	public function sendEmail(){	
		if($this->validation()==TRUE)
		{	
			$this->email->from($this->input->post('txtYourEmail'),$this->input->post("txtName"));
			$this->email->to($this->input->post("toEmail"));				
			$this->email->subject($this->input->post('txtSubject'));
			$this->email->message($this->input->post('areaMessage'));
			if($this->email->send()){
				redirect($this->uri->segment(1).'/'.$this->uri->segment(2));
			}else{redirect($this->uri->segment(1).'/'.$this->uri->segment(2));}	
		}else{
			$this->contact();
		}	
	}
}
?>