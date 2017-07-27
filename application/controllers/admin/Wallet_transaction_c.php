<?php
class Wallet_transaction_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Wallet transaction';
		$this->page_redirect="admin/wallet_transaction_c";								
		$this->load->model("wallet_transaction_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;					
		$data["action_url"]=array("{$this->page_redirect}/add","{$this->page_redirect}/edit","{$this->page_redirect}/is_trash"/*,"{$this->page_redirect}/change_password"*/);
		$data["tbl_hdr"]=array("Member name","Wallet code","Transaction type","Status","Transaction amount","Transaction Date");		
		$row=$this->wallet_transaction_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										$value->mem_name,										
										$value->wal_code,										
										$value->tran_type,
										$value->tran_status==1?"Enable" : "Disable",										
										$value->tran_amt,										
										date("d-m-Y h:i:s a",strtotime($value->tran_date)),																				
										$value->wal_tran_id																				
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function validation()
	{			
		$this->form_validation->set_rules('txtTranAmt','Transaction amount','required');										
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}	
	public function add($error="")
	{
		$option = array('1'=>'Enable','0'=>'Disable');
		$data['error']=$error;
		$row=$this->wallet_transaction_m->select_wallet();				
		if($row==TRUE)
		{
			foreach($row as $value):						
			$option1[$value->wal_id]=$value->mem_name;				
			endforeach;
		}					
		$data['ctrl'] = $this->createCtrl($row="",$option,$option1);		
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->pageHeader;		
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
				$row=$this->wallet_transaction_m->add();
				if($row==TRUE)
                {	                		                	
					redirect("{$this->page_redirect}/");     	
                }
                else $this->add("This Account have already !");														              	                	                                																			
			}			
		}
	}
	public function edit($id="")
	{	
		if($id!="")
		{			
			$row=$this->wallet_transaction_m->index($id);			
			if($row==TRUE)
			{					
				$option = array('1'=>'Enable','0'=>'Disable');				
				$row1=$this->wallet_transaction_m->select_wallet();				
				if($row1==TRUE)
				{
					foreach($row1 as $value):						
					$option1[$value->wal_id]=$value->mem_name;				
					endforeach;
				}								
				$data['ctrl'] = $this->createCtrl($row,$option,$option1);		
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->pageHeader;		
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
				$row=$this->wallet_transaction_m->edit($id);	
				if($row==TRUE)
	            {             		                	
					redirect("{$this->page_redirect}/");	
	            }	            									 																				            	                	                                												
			}
			else{$this->edit($id);}			
		}
	}	

	public function is_trash($id="")
	{
		if($id!="")
		{
			$row=$this->wallet_transaction_m->is_trash($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}
	public function createCtrl($row="",$option,$option1)
		{				
			if($row!="")
			{										
				$row1=$row->wal_code;
				$row2=$row->tran_status;
				$row3=$row->tran_amt;									
				$row4=$row->wal_tran_id;				
			}											
			//$ctrl = array();
			$ctrl = array(														
							array(
									'type'=>'dropdown',
									'name'=>'ddlWalCode',
									'value'=>$row==""? set_value("ddlWalCode") : $row1,
									'option'=>$option1,
									'selected'=>$row==""?NULL:$row4,
									'class'=>'class="form-control"',
									'label'=>'Member name',									
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
									'type'=>'text',
									'name'=>'txtTranAmt',
									'id'=>'txtTranAmt',
									'value'=>$row==""? set_value("txtTranAmt") : $row3,
									'placeholder'=>'Enter Transaction amount here...',
									'required'	=>'required',
									'class'=>'form-control',
									'label'=>'Transaction amount'
								),
					);
			return $ctrl;
		}
}
?>