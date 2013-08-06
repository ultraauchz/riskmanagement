<?php
Class Home extends  Public_Controller{
	function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		if(is_login()){		
			redirect('front');
		}
		else{
			$this->load->view('login_page');	
		}
	}
	public function login()
	{
			//$data['message']="Please Login with Admin Member";
			redirect('front');
	}
	public function signin()
	{
		$status = login($_POST['username'],$_POST['password']);
		if($status==1)
		{
			save_log(98,'Log in','Log In To System');
			redirect('front');
		}
		else
		{
			redirect('home');
		}
	}
	public function signout(){
		save_log(99,'Log Out','Log Out To System');
		logout();
		
		redirect('home');
	}
}