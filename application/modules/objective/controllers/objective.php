<?php
class objective extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('objective_model','objective');
		$this->load->model('objective_type_model','objective_type');
	}
	public $menu_id = 51;

	public function index()
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="objective";
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			$condition = "";
			$data['objective_type']=@$_GET['objective_type'];
			if($data['objective_type'] != '')
			{
			 $condition = "objective_type =".$data['objective_type'];
			}
			$data['result'] = $this->objective->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->objective->pagination();					
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
		$data['urlpage']="objective";
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');			
			$data['rs'] = @$this->objective->get_row($id);
			if(@$_GET['objective_type'])
			{
				$data['rs']['objective_type']= @$_GET['objective_type'];
			}				
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
			if(permission($menu_id, 'canedit')=='')redirect('objective');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('objective');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}
		$objective_type = $_POST['objective_type'];
		$id = $this->objective->save($_POST);		
		set_notify('objective', lang('save_data_complete'));
		redirect("objective/?objective_type=$objective_type");
	} 
	function delete($id=FALSE){
		$menu_id=$this->menu_id;
		$objective_type = $_GET['objective_type'];
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('objective');		
		$objective = $this->objective->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$objective['title'];		
		save_log($menu_id,$action,$description);
		$this->objective->delete($id);
		redirect("objective/?objective_type=$objective_type");
	}
}
?>