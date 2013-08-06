<?php
function GenRandomString($length=5) {
    
    $string = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,5);

    return $string;
}

function GetCurrLang() {
	$uri = $_SERVER["REQUEST_URI"];
	$pos = strrpos($uri, "/en");
	$lang = $pos > 0 ? "en" : "th";
	return $lang;
}

function GetCurrURL($curr_lang = FALSE, $select_lang = FALSE) {
	$uri = $_SERVER["REQUEST_URI"];
	$url = $curr_lang == $select_lang ? $uri : str_replace('/' . $curr_lang, '/' . $select_lang, $uri);
	return $url;
}



function send_register_email($user_id=FALSE) {
	require_once('include/PHPMailer/class.phpmailer.php');
	$CI = &get_instance();
	$user = login_regist_data_row($user_id);
	//$user = $CI->db->getrow("SELECT * FROM regist_person WHERE id=".$user_id);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	$subject = 'Your register information from dengue2013bangkok.com';
	//$headers = "MIME-Version: 1.0" . "\r\n";
	//$headers .= "Content-Type: text/html; charset=utf-8" . "\r\n";
	//$headers .= "From: Canon Marketing Thailand Co.Ltd. \r\n";
	//$mail_to = 'spical_4@hotmail.com, t_auchz@hotmail.com';
	//$mail_to.= $option_email != '' ? ",".$option_email : "";
	$message = 'Dear '.$user['title_name'].$user['firstname'].'.'.$user['lastname'].',<br>';
	$message.= 'You have successfully created your profile to the registration system of The 3<sup>rd</sup> International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.<br><br>';
	$message.= 'Registration is completed only upon full payment of the appropriate amount.<br><br>';
	$message.= 'Please, login to our website in order to modify or update your personal information including abstract submission and payment.<br><br>';
	$message.= '<b>';
	$message.= 'Your personal information:'.$user['profile_register_date']."<br><br>";
	$message.= 'Registration ID:'.$user_id.'<br>';
	$message.= 'Name:'.$user['title_name'].$user['firstname'].'.'.$user['lastname'].'<br>';
	$message.= 'Country:'.$user['country_name'].'<br>';
	$message.= 'Username:'.$user['email'].'<br>';
	$message.= 'Password:'.$user['password'].'<br><br>';
	$message.= 'Click here to <a href="http://www.dengue2013bangkok.com" target="_blank">login</a> to your Conference profile.<br>';
	$message.= 'Click here to the website:<a href="http://www.dengue2013bangkok.com" target="_blank">www.dengue2013bangkok.com</a><br><br>';
	$message.= 'Sincerely,<br>';
	$message.= 'Dengue 2013, Secretariat';
	$message.= '</b>';

		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host       = "mail1.favouritehosting.com";
		$mail->Port       = 25;
		$mail->Username   = "secretariat@dengue2013bangkok.com";
		$mail->Password   = "Dengue@2013";
		
		$mail->AddReplyTo("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		$mail->SetFrom("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		
		/*
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
		*/
				
		$body             = $message;
		//$body             = ereg_replace ("[\]",'',$body);
		
		$address = $mail_to;
		$mail->AddAddress($address, $user['title_name'].$user['firstname'].'.'.$user['lastname']);		
		$mail->Subject    = $subject;	
		
		$mail->MsgHTML($body);		
		if(!$mail->Send()) {
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
	//mail($mail_to, $subject, $message, $headers);
}


function send_abstract_email($user_id=FALSE) {
	require_once('include/PHPMailer/class.phpmailer.php');
	$CI = &get_instance();
	$user = login_regist_data_row($user_id);
	//$user = $CI->db->getrow("SELECT * FROM regist_person WHERE id=".$user_id);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	$sql = " SELECT * FROM abstract WHERE person_id=".$user['id']." order by id ";
	$result = $CI->db->getarray($sql);
	$abstract_msg='';
	foreach($result as $item):
		$abstract_msg .= "Your abstract ".$item['code']." entitled:<br>";
		$abstract_msg .= "<b>".$item['title']."</b><br>";
		$abstract_msg .= "has been received in the Conference Office on ".$item['submission_date']."<br><br>";
		
	endforeach;
	
	$subject = 'Your abstract submission information from dengue2013bangkok.com';
	//$headers = "MIME-Version: 1.0" . "\r\n";
	//$headers .= "Content-Type: text/html; charset=utf-8" . "\r\n";
	//$headers .= "From: Canon Marketing Thailand Co.Ltd. \r\n";
	//$mail_to = 'spical_4@hotmail.com, t_auchz@hotmail.com';
	//$mail_to.= $option_email != '' ? ",".$option_email : "";
	$message = 'Dear '.$user['title_name'].$user['firstname'].'.'.$user['lastname'].',<br><br>';
	$message.= $abstract_msg;
	$message.= 'Thank you for submitting your abstract to the 3<sup>rd</sup> International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.<br><br>';
	$message.= 'Please note: Receipt of this notice does not indicate that your abstract has been accepted for presentation.<br><br>';	
	$message.= 'Sincerely,<br>';
	$message.= 'Dengue 2013, Secretariat';
	$message.= '</b>';

		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host       = "mail1.favouritehosting.com";
		$mail->Port       = 25;
		$mail->Username   = "secretariat@dengue2013bangkok.com";
		$mail->Password   = "Dengue@2013";
		
		$mail->AddReplyTo("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		$mail->SetFrom("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');

		$body             = $message;
		//$body             = ereg_replace ("[\]",'',$body);
		
		$address = $mail_to;
		$mail->AddAddress($address, $user['title_name'].$user['firstname'].'.'.$user['lastname']);		
		$mail->Subject    = $subject;	
		
		$mail->MsgHTML($body);		
		if(!$mail->Send()) {
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
	//mail($mail_to, $subject, $message, $headers);
}

function send_accepted_abstract($user_id=FALSE,$abstract_id=FALSE){
	
	$user = login_regist_data_row($user_id);
	//$user = $CI->db->getrow("SELECT * FROM regist_person WHERE id=".$user_id);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	$sql = " SELECT abstract.*, abstract_topics.title as topic_title, presentation_type.title presentation, abstract_status.title as abstract_status_title 
	FROM abstract 
	left join abstract_topics on abstract.topics = abstract_topics.id
	left join presentation_type on abstract.presentation_type = presentation_type.id
	left join abstract_status on abstract.abstract_status = abstract_status.id
	WHERE person_id=".$user['id']." order by id 
	";
	$result = $CI->db->getarray($sql);
	$abstract_msg='';
	foreach($result as $item):
		$abstract_msg .= "Abstract ID: ".$item['code']."<br>";
		$abstract_msg .= "Title:".$item['title']."<br>";
		$abstract_msg .= "Presentation type:".$item['presentation']."<br>";
		$abstract_msg .= "Status:".$item['abstract_status_title']."<br><br>";
		
	endforeach;


	require_once('include/PHPMailer/class.phpmailer.php');
	$CI = &get_instance();	
	
	$sql = " SELECT * FROM abstract WHERE id=".$abstract_id." order by id ";
	$abstract = $CI->db->getrow($sql);
	$user = login_regist_data_row($abstract['person_id']);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	
	$subject = 'Accepted abstract';	
	$message = 'Dear '.$user['title_name'].$user['firstname'].'.'.$user['lastname'].',<br><br>';	
	$message.= 'Thank you for submitting your abstract to the 3rd International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.<br><br>';
	
	$message.= 'Your abstract(s) are accepted by the scientific committees as follows;<br>';
	$message.= $abstract_msg;
	
	$message.= 'All presenters must register for the conference by 14 August 2013 to ensure that the abstract is included in the conference publication and in order to be scheduled for presentation.';
	$message.= 'Please find your update information in our website: <a href="http://www.dengue2013bangkok.com" target="_blank">www.dengue2013bangkok.com</a><br><br>';		
	
	$message.= 'Sincerely,<br>';
	$message.= 'Dengue 2013, Secretariat';

		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host       = "mail1.favouritehosting.com";
		$mail->Port       = 25;
		$mail->Username   = "secretariat@dengue2013bangkok.com";
		$mail->Password   = "Dengue@2013";
		
		$mail->AddReplyTo("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		$mail->SetFrom("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');

		$body             = $message;
		//$body             = ereg_replace ("[\]",'',$body);
		
		$address = $mail_to;
		$mail->AddAddress($address, $user['title_name'].$user['firstname'].'.'.$user['lastname']);		
		$mail->Subject    = $subject;	
		
		$mail->MsgHTML($body);		
		if(!$mail->Send()) {
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
	
}
function send_withdraw_delete_abstract($abstract_id=FALSE){

	require_once('include/PHPMailer/class.phpmailer.php');
	$CI = &get_instance();	
	
	$sql = " SELECT * FROM abstract WHERE id=".$abstract_id." order by id ";
	$abstract = $CI->db->getrow($sql);
	$user = login_regist_data_row($abstract['person_id']);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	
	$subject = 'Abstract withdrawn/canceled';	
	$message = 'Dear '.$user['title_name'].$user['firstname'].'.'.$user['lastname'].',<br><br>';	
	$message.= 'You have withdrawn/canceled your abstract;<br><br>';
	$message.= 'Abstract ID: '.$abstract['code'].'<br>';
	$message.= 'Abstract Title: '.$abstract['title'].'<br><br>';
	
	$message.= 'Please, <a href="http://www.dengue2013bangkok.com" target="_blank">login</a> and find your update information on the website.<br><br>';		
	
	$message.= 'Sincerely,<br>';
	$message.= 'Dengue 2013, Secretariat';

		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host       = "mail1.favouritehosting.com";
		$mail->Port       = 25;
		$mail->Username   = "secretariat@dengue2013bangkok.com";
		$mail->Password   = "Dengue@2013";
		
		$mail->AddReplyTo("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		$mail->SetFrom("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');

		$body             = $message;
		//$body             = ereg_replace ("[\]",'',$body);
		
		$address = $mail_to;
		$mail->AddAddress($address, $user['title_name'].$user['firstname'].'.'.$user['lastname']);		
		$mail->Subject    = $subject;	
		
		$mail->MsgHTML($body);		
		if(!$mail->Send()) {
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
	//mail($mail_to, $subject, $message, $headers);
	
}

function send_confirm_payment($user_id=FALSE){
	require_once('include/PHPMailer/class.phpmailer.php');
	$CI = &get_instance();
	$user = login_regist_data_row($user_id);
	//$user = $CI->db->getrow("SELECT * FROM regist_person WHERE id=".$user_id);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	$subject = 'Dengue 2013 registration completed';
	//$headers = "MIME-Version: 1.0" . "\r\n";
	//$headers .= "Content-Type: text/html; charset=utf-8" . "\r\n";
	//$headers .= "From: Canon Marketing Thailand Co.Ltd. \r\n";
	//$mail_to = 'spical_4@hotmail.com, t_auchz@hotmail.com';
	//$mail_to.= $option_email != '' ? ",".$option_email : "";
	$message = 'Dear '.$user['title_name'].$user['firstname'].'.'.$user['lastname'].',<br>';
	$message.= 'This is acknowledgement for attending the Third International Conference on Dengue and Dengue Haemorrhagic Fever 2013 on 21-23 October 2013, Bangkok, Thailand<br><br>';
	$message.= 'Please present this document at the registration desk.<br><br>';
	$message.= 'Your registering status is completed with;<br><br>';
	$message.= '<b>';	
	$message.= 'Registration ID:'.$user_id.'<br>';
	$message.= 'Register Name:'.$user['title_name'].$user['firstname'].' '.$user['lastname'].'<br>';
	$message.= 'Affiliation/Institute:'.$user['institute'].'<br>';	
	$message.= 'Country:'.$user['country_name'].'<br><br>';
	$message.= '</b>';	
	
	$message.= 'Please, login and find your update information in the participants list on the website;<br>
	<a href="http://www.dengue2013bangkok.com" target="_blank">www.dengue2013bangkok.com</a><br><br>';
	$message.= 'We look forward to seeing you at the conference venue.<br>';
	$message.= 'If you have any enquiries information, please do not hesitate to contact us.<br><br>';
		
	$message.= 'Sincerely,<br>';
	$message.= 'Dengue 2013, Secretariat';

	
		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host       = "mail1.favouritehosting.com";
		$mail->Port       = 25;
		$mail->Username   = "payment@dengue2013bangkok.com";
		$mail->Password   = "Dengue@2013";
		
		$mail->AddReplyTo("payment@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		$mail->SetFrom("payment@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');

		$body             = $message;
		//$body             = ereg_replace ("[\]",'',$body);
		
		$address = $mail_to;
		$mail->AddAddress($address, $user['title_name'].$user['firstname'].'.'.$user['lastname']);		
		$mail->Subject    = $subject;	
		
		$mail->MsgHTML($body);		
		if(!$mail->Send()) {
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
}

function send_change_password_email($user_id=FALSE) {
	require_once('include/PHPMailer/class.phpmailer.php');
	$CI = &get_instance();
	$user = login_regist_data_row($user_id);
	//$user = $CI->db->getrow("SELECT * FROM regist_person WHERE id=".$user_id);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	$subject = 'Your register information from dengue2013bangkok.com';
	//$headers = "MIME-Version: 1.0" . "\r\n";
	//$headers .= "Content-Type: text/html; charset=utf-8" . "\r\n";
	//$headers .= "From: Canon Marketing Thailand Co.Ltd. \r\n";
	//$mail_to = 'spical_4@hotmail.com, t_auchz@hotmail.com';
	//$mail_to.= $option_email != '' ? ",".$option_email : "";
	$message = 'Dear '.$user['title_name'].$user['firstname'].'.'.$user['lastname'].',<br>';
	$message.= 'You have successfully created your profile to the registration system of The 3<sup>rd</sup> International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.<br><br>';
	$message.= 'Registration is completed only upon full payment of the appropriate amount.<br><br>';
	$message.= 'Please, login to our website in order to modify or update your personal information including abstract submission and payment.<br><br>';
	$message.= '<b>';
	$message.= 'Your personal information:'.$user['profile_register_date']."<br><br>";
	$message.= 'Registration ID:'.$user_id.'<br>';
	$message.= 'Name:'.$user['title_name'].$user['firstname'].'.'.$user['lastname'].'<br>';
	$message.= 'Country:'.$user['country_name'].'<br>';
	$message.= 'Username:'.$user['email'].'<br>';
	$message.= 'Password:'.$user['password'].'<br><br>';
	$message.= 'Click here to <a href="http://www.dengue2013bangkok.com" target="_blank">login</a> to your Conference profile.<br>';
	$message.= 'Click here to the website:<a href="http://www.dengue2013bangkok.com" target="_blank">www.dengue2013bangkok.com</a><br><br>';
	$message.= 'Sincerely,<br>';
	$message.= 'Dengue 2013, Secretariat';
	$message.= '</b>';

		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host       = "mail1.favouritehosting.com";
		$mail->Port       = 25;
		$mail->Username   = "secretariat@dengue2013bangkok.com";
		$mail->Password   = "Dengue@2013";
		
		$mail->AddReplyTo("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		$mail->SetFrom("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');

		$body             = $message;
		//$body             = ereg_replace ("[\]",'',$body);
		
		$address = $mail_to;
		$mail->AddAddress($address, $user['title_name'].$user['firstname'].'.'.$user['lastname']);		
		$mail->Subject    = $subject;	
		
		$mail->MsgHTML($body);		
		if(!$mail->Send()) {
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
	//mail($mail_to, $subject, $message, $headers);
}

function send_forgot_email($user_id=FALSE) {
	require_once('include/PHPMailer/class.phpmailer.php');
	$CI = &get_instance();
	$user = login_regist_data_row($user_id);
	//$user = $CI->db->getrow("SELECT * FROM regist_person WHERE id=".$user_id);
	$mail_to = $user['email'];
	$user_id = str_pad($user['id'],4,'0',STR_PAD_LEFT);
	$subject = 'Your personal information from dengue2013bangkok.com';
	//$headers = "MIME-Version: 1.0" . "\r\n";
	//$headers .= "Content-Type: text/html; charset=utf-8" . "\r\n";
	//$headers .= "From: Canon Marketing Thailand Co.Ltd. \r\n";
	//$mail_to = 'spical_4@hotmail.com, t_auchz@hotmail.com';
	//$mail_to.= $option_email != '' ? ",".$option_email : "";
	$message = 'Dear '.$user['title_name'].$user['firstname'].'.'.$user['lastname'].',<br>';
	$message.= 'You have successfully created your profile to the registration system of The 3<sup>rd</sup> International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.<br><br>';
	$message.= 'Registration is completed only upon full payment of the appropriate amount.<br><br>';
	$message.= 'Please, login to our website in order to modify or update your personal information including abstract submission and payment.<br><br>';
	$message.= '<b>';
	$message.= 'Your personal information:'.$user['profile_register_date']."<br><br>";
	$message.= 'Registration ID:'.$user_id.'<br>';
	$message.= 'Name:'.$user['title_name'].$user['firstname'].'.'.$user['lastname'].'<br>';
	$message.= 'Country:'.$user['country_name'].'<br>';
	$message.= 'Username:'.$user['email'].'<br>';
	$message.= 'Password:'.$user['password'].'<br><br>';
	$message.= 'Click here to <a href="http://www.dengue2013bangkok.com" target="_blank">login</a> to your Conference profile.<br>';
	$message.= 'Click here to the website:<a href="http://www.dengue2013bangkok.com" target="_blank">www.dengue2013bangkok.com</a><br><br>';
	$message.= 'Sincerely,<br>';
	$message.= 'Dengue 2013, Secretariat';
	$message.= '</b>';

		$mail             = new PHPMailer(); // defaults to using php "mail()"
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host       = "mail1.favouritehosting.com";
		$mail->Port       = 25;
		$mail->Username   = "secretariat@dengue2013bangkok.com";
		$mail->Password   = "Dengue@2013";
		
		$mail->AddReplyTo("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		$mail->SetFrom("secretariat@dengue2013bangkok.com", 'International Conference on Dengue and Dengue Haemorrhagic Fever, 2013.');
		
		/*
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
		*/
				
		$body             = $message;
		//$body             = ereg_replace ("[\]",'',$body);
		
		$address = $mail_to;
		$mail->AddAddress($address, $user['title_name'].$user['firstname'].'.'.$user['lastname']);		
		$mail->Subject    = $subject;	
		
		$mail->MsgHTML($body);		
		if(!$mail->Send()) {
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  //echo "Message sent!";
		}
	//mail($mail_to, $subject, $message, $headers);
}
function convert_money_string($number) {

  $numberstr = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
  $digitstr = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');

  $number = str_replace(",","",$number); //ลบ comma
  $number = explode(".",$number); //แยกจุดทศนิยมออก

  //เลขจำนวนเต็ม
  $strlen = strlen($number[0]);
  $result = '';
  for($i=0;$i<$strlen;$i++) {
    $n = substr($number[0], $i,1);
    if($n!=0) {
      if($i==($strlen-1) AND $n==1){ $result .= 'เอ็ด'; } 
      elseif($i==($strlen-2) AND $n==2){ $result .= 'ยี่'; }
      elseif($i==($strlen-2) AND $n==1){ $result .= ''; }
      else{ $result .= $numberstr[$n]; }
      $result .= $digitstr[$strlen-$i-1];
    }
  }
  
  //จุดทศนิยม
  $strlen = strlen($number[1]);
  if ($strlen>2) { //ทศนิยมมากกว่า 2 ตำแหน่ง คืนค่าเป็นตัวเลข
    $result .= 'จุด';
    for($i=0;$i<$strlen;$i++) {
      $result .= $numberstr[(int)$number[1][$i]];
    }
  } else { //คืนค่าเป็นจำนวนเงิน (บาท)
    $result .= 'บาท';
    if ($number[1]=='0' OR $number[1]=='00' OR $number[1]=='') {
      $result .= 'ถ้วน';
    } else {
      //จุดทศนิยม (สตางค์)
      for($i=0;$i<$strlen;$i++) {
        $n = substr($number[1], $i,1);
        if($n!=0){
          if($i==($strlen-1) AND $n==1){$result .= 'เอ็ด';}
          elseif($i==($strlen-2) AND $n==2){$result .= 'ยี่';}
          elseif($i==($strlen-2) AND $n==1){$result .= '';}
          else{ $result .= $numberstr[$n];}
          $result .= $digitstr[$strlen-$i-1];
        }
      }
      $result .= 'สตางค์';
    }
  }
  return $result;
}

function GetMenuProperty($id, $field) {
	$CI = &get_instance();
	$result = $CI -> db -> getone("SELECT " . $field . " from admin_menu where id=" . $id);
	return $result;
}
?>
