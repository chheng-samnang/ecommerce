<?php
class Wallet_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Wallet';
		$this->page_redirect="admin/wallet_c";								
		$this->load->model("wallet_m");
		$this->load->model('product_m_site','pm');
		$this->cancelString = "admin/wallet_c";
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->lang->line('wallet');					
		$data["action_url"]=array("{$this->page_redirect}/add","{$this->page_redirect}/edit","{$this->page_redirect}/delete","{$this->page_redirect}/transaction");
		$data["tbl_hdr"]=array("Member name","Account code","Wallet code","Description","Status","User creat","Date create");		
		$row=$this->wallet_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										$value->mem_name,
										$value->acc_code,										
										$value->wal_code,										
										$value->wal_desc,
										$value->wal_status==1?"Enable" : "Disable",										
										$value->user_crea,										
										date("d-m-Y",strtotime($value->date_crea)),
												
										$value->wal_id																				
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function edit_transaction($wal_tran_id)
	{
		if($wal_tran_id!="")
		{
			$data["transaction"] = $this->wallet_m->get_wallet_transaction_wal_tran_id($wal_tran_id);
			$data["wal_tran_id"] = $wal_tran_id;
			$data["type"] = array("none"=>"Choose One","cash_in"=>"Cash In","cash_out"=>"Cash Out");
			$this->form_validation->set_rules("txtAmt","Amount","required|trim|numeric");
			$this->form_validation->set_rules("txtTranDate","Transaction Date","required|trim");
			if($this->form_validation->run()===false)
			{
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/edit_transaction',$data);
				$this->load->view('template/footer');
			}else
			{
				$this->wallet_m->update_transaction($wal_tran_id);
				redirect("admin/wallet_c");
			}
		}else
		{
			echo "Invalid E-Wallet Transaction ID.";
		}
	}
	public function delete_transaction($wal_tran_id)
	{
		if($wal_tran_id!="")
		{
			$this->wallet_m->delete_transaction($wal_tran_id);
			redirect("admin/wallet_c");
		}else
		{
			echo "Invalid Transaction ID.";
		}
	}
	public function transaction($tran_id="")
	{
		if($tran_id!="")
		{
			$status="";
			$data["wallCode"] = $this->pm->get_wallet_code($tran_id);
			$data["balance"] = $this->pm->get_wallet_bal($tran_id);
			$data["wal_id"] = $tran_id;
			if(empty($data["balance"]->tran_amt))
			{
				$data["balance"]->tran_amt = 0;
			}
			
			if(!empty($this->uri->segment(5)))
			{
				$status = $this->uri_segment(5);
				$wal_id = $this->uri_segment(4);
				$data["wallet_tran"] = $this->wallet_m->get_wallet_transaction_by_status();
				
			}else
			{
				$data["wallet_tran"] = $this->wallet_m->get_wallet_transaction($tran_id);	
				
			}

			$this->load->view('template/header');
			$this->load->view('template/left');
			$this->load->view('admin/wallet_transaction',$data);
			$this->load->view('template/footer');


		}else
		{
			echo "Invalid Transaction ID.";
		}
	}
	public function add_transaction($wal_id)
	{
		if($wal_id!="")
		{
			$data['wal_id'] = $wal_id;
			$this->form_validation->set_rules("txtAmt","Amount","required|trim|numeric");
			$this->form_validation->set_rules("txtTranDate","Transaction Date","required|trim");
			if($this->form_validation->run()===false)
			{
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view('admin/add_transaction',$data);
				$this->load->view('template/footer');	
			}else
			{
				$this->wallet_m->insert_wallet_transaction($wal_id);
				redirect("admin/wallet_c/transaction/".$wal_id);	
			}
		}else
		{
			echo "Invalid Wallet ID!";

		}
		
	}
	public function validation()
	{		
		$this->form_validation->set_rules('txtWalCode','Wallet code','required');										
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	
	public function add($error="")
	{
		$option = array('1'=>'Enable','0'=>'Disable');
		$data['error']=$error;
		$row=$this->wallet_m->select_account();				
		if($row==TRUE)
		{
			foreach($row as $value):						
			$option1[$value->acc_id]=$value->mem_name;				
			endforeach;
		}					
		$data['ctrl'] = $this->createCtrl($row="",$option,$option1);		
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->lang->line('wallet');			
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/page_add',$data);
		$this->load->view('template/footer');		
	}
	public function add_value()
	{
		if(isset($_POST["btnSubmit"]))
		{			
			if($this->validation()==TRUE)
			{										
				$row=$this->wallet_m->add();
				if($row==TRUE)
                {	                		                	
					redirect("{$this->page_redirect}/");     	
                }
                else $this->add("This Account have already !");														              	                	                                																			
			}			
		}
	}
	public function edit($id="",$error="")
	{	
		if($id!="")
		{			
			$row=$this->wallet_m->index($id);			
			if($row==TRUE)
			{					
				$option = array('1'=>'Enable','0'=>'Disable');
				$data['error']=$error;
				$row1=$this->wallet_m->select_account();				
				if($row1==TRUE)
				{
					foreach($row1 as $value):						
					$option1[$value->acc_id]=$value->mem_name;				
					endforeach;
				}								
				$data['ctrl'] = $this->createCtrl($row,$option,$option1);		
				$data['action'] = "{$this->page_redirect}/edit_value/".$id;
				$data['pageHeader'] = $this->lang->line('wallet');			
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/page_edit",$data);
				$this->load->view('template/footer');
			}						
		}		
	}
	public function edit_value($id="")
	{
		
		if(isset($_POST["btnSubmit"]))
		{							           			
			if($this->validation()==TRUE)
			{										
				$row=$this->wallet_m->edit($id);	
				if($row==TRUE)
	            {             		                	
					redirect("{$this->page_redirect}/");	
	            }
	            else echo $this->edit($id,"This Account have already !");								
									 																				            	                	                                												
			}
			else{$this->edit($id,$error="");}			
		}
		elseif (isset($_POST["btnCancel"])) 
		{
			redirect("{$this->page_redirect}/");
		}
	}	

	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->wallet_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option,$option1)
		{				
			if($row!="")
			{										
				$row1=$row->wal_code;
				$row2=$row->wal_status;
				$row3=$row->wal_desc;									
				$row4=$row->acc_id;				
			}											
			//$ctrl = array();
			$ctrl = array(														
							array(
									'type'=>'dropdown',
									'name'=>'ddlAccCode',
									'value'=>$row==""? set_value("ddlAccCode") : $row4,
									'option'=>$option1,
									'selected'=>$row==""?NULL:$row4,
									'class'=>'class="form-control"',
									'label'=>'Member name',									
								),
							array(
									'type'=>'text',
									'name'=>'txtWalCode',
									'id'=>'txtWalCode',
									'value'=>$row==""? set_value("txtWalCode") : $row1,
									'placeholder'=>'Enter Wallet code here...',
									'required'	=>'required',
									'class'=>'form-control',
									'label'=>'Wallet code'
								),
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'value'=>$row==""? set_value("ddlStatus") : $row2,
									'option'=>$option,
									'selected'=>$row==""?NULL:$row2,
									'class'=>'class="form-control"',
									'label'=>'Status',									
								),																			
							array(
									'type'=>'textarea',
									'name'=>'txtDesc',
									'value'=>$row==""? set_value("txtDesc") : $row3,
									'label'=>'Description'
								)
					);
			return $ctrl;
		}
}
?>