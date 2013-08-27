<?php
Class Home extends  Public_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('users_model','users');
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
	
	public function forgot_password(){
		$this->load->view('forgot_page');	
	}
	
	public function send_password(){
		if($_POST['email']){
			$user = $this->users->where("email='".$_POST['email']."'")->get_row();
			if($user['email']!=''){
				$this->send_forgot_email($user);	
			}
		}
	}
	
	
	function send_forgot_email($user) {
		require_once('include/PHPMailer/class.phpmailer.php');
		$CI = &get_instance();		
		//$user = $CI->db->getrow("SELECT * FROM regist_person WHERE id=".$user_id);
		$mail_to = $user['email'];
		$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
		$subject = 'ข้อมูลผู้ใช้ ระบบบริหารความเสี่ยง คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล';
		//$headers = "MIME-Version: 1.0" . "\r\n";
		//$headers .= "Content-Type: text/html; charset=utf-8" . "\r\n";
		//$headers .= "From: Canon Marketing Thailand Co.Ltd. \r\n";
		//$mail_to = 'spical_4@hotmail.com, t_auchz@hotmail.com';
		//$mail_to.= $option_email != '' ? ",".$option_email : "";
		$message = 'เรียน คุณ '.$user['name'].',<br>';
		$message.= 'ข้อมูลการเข้าใช้งานระบบของคุณคือ<br><br>';
		$message.= 'Username:'.$user['username'].'<br>';
		$message.= 'Password:'.$user['password'].'<br><br>';
		$message.= 'คลิ้ก <a href="" target="_blank">ที่นี่</a> เพื่อเข้าสู่ระบบ<br><br>';
		$message.= '</b>';
	
			$mail             = new PHPMailer(); // defaults to using php "mail()"
			/*
			$mail->CharSet = "utf-8";
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->Host       = "mail1.favouritehosting.com";
			$mail->Port       = 25;
			$mail->Username   = "secretariat@dengue2013bangkok.com";
			$mail->Password   = "Dengue@2013";
			*/
			//$mail->AddReplyTo("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
			//$mail->SetFrom("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
			
			
			$mail->CharSet = "utf-8";
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->Host       = "smtp.mail.yahoo.com";
			$mail->Port       = 25;
			$mail->Username   = "favouritedesign18@yahoo.com";
			$mail->Password   = "55555555";
			
			$mail->SetFrom('favouritedesign18@yahoo.com', 'secretariat@dengue2013bangkok.com');
			$mail->AddReplyTo("favouritedesign18@yahoo.com", "secretariat@dengue2013bangkok.com");
			
					
			$body             = $message;
			//$body             = ereg_replace ("[\]",'',$body);
			
			$address = $mail_to;
			$mail->AddAddress($user['email'], $user['name']);		
			$mail->Subject    = $subject;	
			
			$mail->MsgHTML($body);		
			if(!$mail->Send()) {
			  //echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  //echo "Message sent!";
			}
		//mail($mail_to, $subject, $message, $headers);
	}
}