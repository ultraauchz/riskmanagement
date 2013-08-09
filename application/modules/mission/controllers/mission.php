<?php
class mission extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('mission_model','mission');
	}
	public $menu_id = 50;
	public function index()
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="mission";
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$condition = "";
			$data['result'] = $this->mission->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->mission->pagination();					
			$this->template->build('index',$data);
		}
		else{
			
			redirect('front');	
		}
	}	
	function form($id=false)
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="mission";
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');			
			$data['rs'] = @$this->mission->get_row($id);								
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
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('mission');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('mission');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}
		$id = $this->mission->save($_POST);		
		set_notify('mission', lang('save_data_complete'));
		redirect('mission');
	} 
	function delete($id=FALSE){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('mission');		
		$mission = $this->mission->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$mission['title'];		
		save_log($menu_id,$action,$description);
		$this->mission->delete($id);
		redirect('mission');
	}
}
?>