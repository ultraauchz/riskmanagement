<?php
class Users extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
       
    }

    function index()
    {	
		$this->template->build('admin/index');
	}
	function login(){
		if(!empty($_POST)){
			if(login($_POST['username'],$_POST['password'])){
				set_notify('success','ยินดีต้อนรับ');				
				redirect('seminar_data/admin/seminar_data');
			}else{
				set_notify('error','ไม่สามารถเข้าใช้ได้');
				redirect('users/admin/users/index');
			}			
		}
	}
	function logout(){
		logout();
		redirect('admin');
	}
	
}
      