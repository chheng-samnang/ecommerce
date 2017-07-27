<?php
class Wallet_transaction_m extends CI_Model
{			
	private $userLog="admin";		
	public function __construct()
	{
		parent::__construct();				
	}
	public function index($id="")
	{
		if($id=="")
		{			
			$query=$this->db->query("SELECT tran.*,wal_code,mem_name FROM tbl_wallet_transaction AS tran INNER JOIN tbl_wallet AS wal ON tran.wal_id=wal.wal_id INNER JOIN tbl_account AS acc ON wal.acc_id=acc.acc_id INNER JOIN tbl_member AS mem ON acc.mem_id=mem.mem_id WHERE is_trash=1 ORDER BY wal_tran_id DESC ");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query=$this->db->query("SELECT tran.*,wal_code,mem_name FROM tbl_wallet_transaction AS tran INNER JOIN tbl_wallet AS wal ON tran.wal_id=wal.wal_id INNER JOIN tbl_account AS acc ON wal.acc_id=acc.acc_id INNER JOIN tbl_member AS mem ON acc.mem_id=mem.mem_id WHERE wal_tran_id={$id} AND is_trash=1");				
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function select_wallet()
	{		
		$query=$this->db->query("SELECT CONCAT(mem.mem_name,' Code=',wal.wal_code) as mem_name,wal.wal_id FROM tbl_wallet AS wal JOIN tbl_account AS acc ON wal.acc_id=acc.acc_id JOIN tbl_member AS mem ON acc.mem_id=mem.mem_id");
		$result=$query->result();
		if($result){return $result;}
	}
	public function add()
	{		
		date_default_timezone_set("Asia/Phnom_Penh");			
		$data= array(
					"wal_id" => $this->input->post("ddlWalCode"),
					"tran_type" =>"in",
					"tran_status" => $this->input->post("ddlStatus"),
					"is_trash" =>1,																
					"tran_amt" => $this->input->post("txtTranAmt"),
					"user_crea"=>$this->userLog,																
					"tran_date" => date('Y-m-d H:i:s')
					 );
		$query=$this->db->insert("tbl_wallet_transaction",$data);		
		if($query){return $query;}		
	}
	public function edit($id)
	{			
		date_default_timezone_set("Asia/Phnom_Penh");	 	
		if($id==TRUE)
		{
				$data= array(
					"wal_id" => $this->input->post("ddlWalCode"),					
					"tran_status" => $this->input->post("ddlStatus"),																
					"tran_amt" => $this->input->post("txtTranAmt"),
					"user_updt"=>$this->userLog,																	
					"date_updt" => date('Y-m-d H:i:s')
					 );
			$this->db->where("wal_tran_id",$id);
			$query=$this->db->update("tbl_wallet_transaction",$data);
			if($query==TRUE){return $query;}							
		}
						
	}
	public function is_trash($id)
	{
		if($id==TRUE)
		{			
			$this->db->where("wal_tran_id",$id);
			$query=$this->db->update("tbl_wallet_transaction",array("is_trash"=>0));
			if($query==TRUE){return $query;}
		}
	}
	
}
?>