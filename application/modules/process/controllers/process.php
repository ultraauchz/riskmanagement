<?php
class process extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('process_model','process');
	}
	public $menu_id = 46;
	public function index()
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="process";
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$condition = "";
			$data['result'] = $this->process->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->process->pagination();					
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
		$data['urlpage']="process";
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');			
			$data['rs'] = @$this->process->get_row($id);								
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
			if(permission($menu_id, 'canedit')=='')redirect('process');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('process');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}
		$id = $this->process->save($_POST);		
		set_notify('process', lang('save_data_complete'));
		redirect('process');
	} 
	function delete($id=FALSE){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('process');		
		$process = $this->process->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$process['title'];		
		save_log($menu_id,$action,$description);
		$this->process->delete($id);
		redirect('process');
	}
}
?>