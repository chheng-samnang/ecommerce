<?php
class Login_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	function index(){
		echo "model";
	}
	public function validateUser($username)
	{
		if($username!="")
		{
			$query = $this->db->get_where('tbl_user',array('user_code'=>$username));
			if($query->num_rows()>0)
			{
				return true;
			}else
			{
				return 0;
			}
		}
	}
	public function validatePassword($password)
	{
		
	    $user_paswd = do_hash($password);
		if($user_paswd!="")
		{
			$query = $this->db->get_where('tbl_user',array('user_pass'=>$user_paswd));
			if($query->num_rows()>0)
			{
				return true;
			}else
			{
				return 0;
			}
		}
	}

	public function getUsercode($user)
	{
		$query = $this->db->get_where('tbl_user',array('user_name'=>$user));
		return $query->row();
	}
}
?>