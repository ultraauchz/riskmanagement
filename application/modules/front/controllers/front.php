<?php
Class front extends  Public_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		if(is_login()){
			$this->template->build('index');			
		}
		else{
			redirect('home');
		}
	}
		
}