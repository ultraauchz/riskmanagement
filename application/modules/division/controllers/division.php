<?php
class division extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('division_model','division');
	}
	
	public function index()
	{
		$menu_id=48;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="division";
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('admin');
			$condition = "";
			$data['result'] = $this->division->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->division->pagination();					
			$this->template->build('index',$data);
		}
		else{
			
			redirect('front');	
		}
	}	
	function form($id=false)
	{
		$menu_id=48;		
		$data['menu_id'] = $menu_id;
		$data['urlpage']="divisioin";
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');			
			$data['rs'] = @$this->division->get_row($id);								
			$this->template->build('form',$data);
			
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.' : '.$data['rs']['title'];		
			save_log($menu_id,$action,$description);
			}
		}
		else{			
			redirect('front');	
		}
	}
	public function save(){
		//$this->db->debug = true;
		$menu_id=48;		
		$menu_name = GetMenuProperty($menu_id,'title');
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('division');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('admin_user');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}
		$id = $this->division->save($_POST);		
		set_notify('success', lang('save_data_complete'));
		redirect('division');
	} 
	function delete($id=FALSE){
		$menu_id=48;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('admin_user');		
		$users = $this->users->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$users['name'];		
		save_log($menu_id,$action,$description);
		$this->users->delete($id);
		redirect('user');
	}
}
?>