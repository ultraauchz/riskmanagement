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
	}
	
	public function index()
	{
		$menu_id=2;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="user";
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('admin');
			$condition = "";
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
			if(permission($menu_id, 'canview')=='')redirect('admin');			
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
			if(permission($menu_id, 'canedit')=='')redirect('front');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['name'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('admin_user');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['name'];		
			save_log($menu_id,$action,$description);
		}
		$_POST['password'] =  $_POST['id']!='' && $_POST['password']=='' ? $_POST['current_password'] : $_POST['password'];
		$_POST['registerdate'] =  $_POST['id']!='' && $_POST['password']=='' ? $_POST['registerdate'] : date("Y-m-d H:i:s");
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
			if(permission($menu_id, 'canedit')=='')redirect('front');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['name'];
			$_POST['updatedate'] =  date("Y-m-d H:i:s");
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('admin_user');	
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
		if(permission($menu_id, 'candelete')=='')redirect('front');		
		$users = $this->users->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$users['name'];		
		save_log($menu_id,$action,$description);
		$this->users->delete($id);
		redirect('user');
	}
}
?>