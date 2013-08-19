<?php
class user extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('users_model','users');
		$this->load->model('usertype_model','usertype');
		$this->load->model('usertype_detail_model','usertype_detail');
		$this->load->model('section_model','section');
	}
	
	public function index()
	{
		$menu_id=2;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="user";
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$condition = " 1=1 ";
			if(@$_GET['section_id'] !=''){
				$condition .= " AND sectionid = '".$_GET['section_id']."' ";
			}
			if(@$_GET['name_search'] !=''){
				$condition .= " AND ( name LIKE '%".$_GET['name_search']."%' OR
								     username LIKE '%".$_GET['name_search']."%' OR
								     email LIKE '%".$_GET['name_search']."%' ) ";
			}

			$data['result'] = $this->users->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->users->pagination();				
			$this->template->build('index',$data);
		}
		else{
			
			redirect('front');	
		}
	}	
	function form($id=false)
	{
		$menu_id=2;		
		$data['menu_id'] = $menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		$data['lang']='en';
		if(is_login()){
			$data['usertype'] = $this->usertype->get(FALSE,TRUE);
			$data['province'] = $this->db->getarray("SELECT * from province ORDER BY name_".$data['lang']);
			$data['country'] = $this->db->getarray("SELECT * from country ORDER BY name");	
			if(permission($menu_id, 'canview')=='')redirect('front');			
			$data['rs'] = @$this->users->where($condition)->get_row($id);								
			$this->template->build('form',$data);
			
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.' : '.$data['rs']['name'];		
			save_log($menu_id,$action,$description);
			}
		}
		else{			
			redirect('front');	
		}
	}
	
	function user_profile(){		
		$menu_id=2;		
		$data['menu_id'] = $menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(is_login()){
			$id = login_data('id');
			$data['id']=$id;
			$data['rs'] = @$this->users->where($condition)->get_row($id);
			$condition_1 = "section.id = ".login_data('sectionid');
			$data['result'] = @$this->section->where($condition_1)->get_row();								
			$this->template->build('user_profile',$data);
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.' : '.$data['rs']['name'];		
			save_log($menu_id,$action,$description);
			}
		}
		else{			
			redirect('front');	
		}
	}
	

	public function save(){
		//$this->db->debug = true;
		$menu_id=2;		
		$menu_name = GetMenuProperty($menu_id,'title');
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('user');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['name'];	
			$_POST['updatedate'] =  date("Y-m-d H:i:s");	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('user');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['name'];	
			$_POST['registerdate'] =  $_POST['id']!='' && $_POST['password']=='' ? $_POST['registerdate'] : date("Y-m-d H:i:s");	
			save_log($menu_id,$action,$description);
		}
		$_POST['password'] =  $_POST['id']!='' && $_POST['password']=='' ? $_POST['current_password'] : $_POST['password'];
		
		$id = $this->users->save($_POST);		
		//set_notify('success', lang('save_data_complete'));
		redirect('user');
	}
	
	public function user_profile_save(){
		//$this->db->debug = true;
		$menu_id=2;		
		$menu_name = GetMenuProperty($menu_id,'title');
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('user');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['name'];
			$_POST['updatedate'] =  date("Y-m-d H:i:s");
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('user');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['name'];
			$_POST['registerdate'] =  $_POST['id']!='' && $_POST['password']=='' ? $_POST['registerdate'] : date("Y-m-d H:i:s");	
			save_log($menu_id,$action,$description);
		}
		$_POST['password'] =  $_POST['id']!='' && $_POST['password']=='' ? $_POST['current_password'] : $_POST['password'];
		$id = $this->users->save($_POST);		
		set_notify('success', lang('save_data_complete'));
		redirect('user');
	} 
	 
	function delete($id=FALSE){
		$menu_id=2;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('user');		
		$users = $this->users->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$users['name'];		
		save_log($menu_id,$action,$description);
		$this->users->delete($id);
		redirect('user');
	}
	
	function check_email($id=false)
	{
		$user = $this->users->where("email = '".$_GET['email']."'")->get_row();
		// ถ้ามี  email ใน db
		if(@$user){
			// ถ้าเป็นเคสแก้ไข profile
			if(@$id){
				$emailfromid = $this->users->get_row($id);
				// เทียบ email ในช่อง input กับ email จาก id ที่ส่งมา
				if($emailfromid['email'] == $user['email']){
					echo 'true';
				}else{
					echo 'false';
				}
			}
		}else{
			echo 'true';
		}
	}

	function check_username($id=false){
		$user = $this->users->where("username = '".$_GET['username']."'")->get_row();
		// ถ้ามี  username ใน db
		if($user){
			// ถ้าเป็นเคสแก้ไข profile
			if($id){
				$userfromid = $this->users->get_row($id);
				// เทียบ username ในช่อง input กับ username จาก id ที่ส่งมา
				if($userfromid['username'] == $user['username']){
					echo 'true';
				}else{
					echo 'false';
				}
			}
		}else{
			echo 'true';
		}
    }
	function report_section($type = NULL){
		  if($_GET['q'] != ''){
		  	$type = 'report';
		  }
			$text = ($type == 'report') ? '--แสดงภาควิชาทั้งหมด--' : '--กรุณาเลือกกลุ่มวิชา--';
			
		$result = $this->db->GetArray('select id,title as text from section where divisionid = ? order by title',$_GET['q']);
	    dbConvert($result);
	    if($type == 'report' and !empty($_GET['q'])) array_unshift($result, array('id' => '', 'text' => $text));
		echo $result ? json_encode($result) : '[{"id":"","text":"'.$text.'"}]';
		
	}
}
?>