<?php
class Admin extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if(is_login()){		
			redirect('seminar_data/admin/seminar_data');
		}
		else{
			$this->load->view('login');	
		}
	}
	public function login()
	{
			//$data['message']="Please Login with Admin Member";
			redirect('admin');
	}
	public function signin()
	{
		$status = login($_POST['username'],$_POST['password']);
		if($status==1)
		{
			save_log(98,'Log in','Log In To Admin System');
			redirect('seminar_data/admin/seminar_data');
		}
		else
		{
			redirect('admin');
		}
	}
	public function signout(){
		save_log(99,'Log Out','Log Out To Admin System');
		logout();
		
		redirect('admin');
	}
}
?>