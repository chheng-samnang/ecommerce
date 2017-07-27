<?php
class Promotion_c extends CI_Controller
{
	var $userCrea;
	var $str;	
	var $pageHeader,$page_redirect,$cancel;	
	public function __construct()
	{
		parent::__construct();
		$this->str = isset($this->session->str)?$this->session->str:"9";
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";
		$this->pageHeader='Promotion';		
		$this->page_redirect="admin/promotion_c";							
		$this->load->model("promotion_m");			
	}
	public function index()
	{		
		$this->session->unset_userdata("promotion");
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->lang->line('promotion');		
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",/*1=>"{$this->page_redirect}/edit",*/2=>"{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);
		$data["tbl_hdr"]=array("Product name","Category","Image","Promotion type","Promotion name","Date from","Date to");		
		$row=$this->promotion_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):

			$poto = $value->path; if(empty($poto)) $poto = "default.png";
			$data["tbl_body"][$i]=array(
										"<a href=".base_url($this->page_redirect.'/pro_detail/'.$value->pro_det_id)." title='Promotion Detail'>".$value->p_name."</a>",
										$value->cat_name,																				
										"<img class='img-thumbnail' src='".base_url("assets/uploads/".$poto)."' style='width:70px;' />",
										$value->pro_type=='d' ? 'Discount' : ($value->pro_type=='a' ? 'Add product' : 'kupun'),																														
										$value->pro_name!=NULL ? $value->pro_name : $value->occ_name,																				
										date("d-m-Y",strtotime($value->date_from)),
										date("d-m-Y",strtotime($value->date_to)),										
										$value->pro_det_id
									
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view', $data);
		$this->load->view('template/footer');
	}		
	public function add()
	{						
		$data['action'] = "{$this->page_redirect}/pro_type";		
		$data['pageHeader'] = $this->lang->line('promotion');		
		$data['cancel'] = $this->page_redirect;
		$data['product_cat'] = $this->promotion_m->product_cat();
		$data['pro_occasion'] = $this->promotion_m->pro_occasion();
		$data['stoe_name'] = $this->promotion_m->get_store();
		$this->load->view('template/header');		
		$this->load->view('admin/promotion_add',$data);
		$this->load->view('template/footer');		
	}
	public function pro_type()
	{	
		$data['action'] = "{$this->page_redirect}/add_promotion";			
		$data['pageHeader'] = $this->lang->line('promotion');		
		$data['cancel'] = $this->page_redirect;				 		
		$promotion1=array(																	
									$this->input->post("txtFrom"),
									$this->input->post("txtTo"),
									$this->input->post("ddlCategory"),
									$this->input->post("ddlOcc"),
									$this->input->post("txtProName"),
									$this->input->post("ddlType"),
									$this->input->post("ddlStore")								
								);
		$this->session->set_userdata("promotion",$promotion1);		
		if($this->input->post("ddlType")=="d")
		{			
			$this->load->view('template/header');
			$this->load->view('admin/promotion_discount',$data);
			$this->load->view('template/footer');
		}
		elseif($this->input->post("ddlType")=="a")
		{
			$this->load->view('template/header');
			$this->load->view('admin/promotion_add_product',$data);
			$this->load->view('template/footer');
		}				
	}
	public function add_promotion()
	{			
		$this->promotion_m->add_promotion();						
		$this->add();			
	}
	
	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->promotion_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function pro_detail($id="")
	{
		$data["detail"]=$this->promotion_m->index($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$this->load->view('admin/pro_detail.php',$data);
		$this->load->view('template/footer');	
	}	
}
?>