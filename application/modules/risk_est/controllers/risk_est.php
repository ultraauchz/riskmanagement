<?php
class risk_est extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('risk_est_model','risk');
	}
	public $menu_id = 52;
	public function index()
	{
		$menu_id = $this->menu_id;
		$data='';		
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$condition = "";
			$data['result'] = $this->risk->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->risk->pagination();					
			$this->template->build('index',$data);
		}
		else{
			
			redirect('front');	
		}
	}
	
	public function form($id=false)
	{
		$menu_id = $this->menu_id;	
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$menu_name = GetMenuProperty($menu_id,'title');	
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');			
			$data['rs'] = @$this->risk->get_row($id);								
			$this->template->build('form',$data);
			
			if($id>0){
			$action='View';		
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
			if(permission($menu_id, 'canedit')=='')redirect('section');
			$action='Update';
			$start_date = explode('-',$_POST['start_date']);
			$_POST['start_date'] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['end_date']);
			$_POST['end_date'] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('section');	
			$action='Add';
			$start_date = explode('-',$_POST['start_date']);
			$_POST['start_date'] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['end_date']);
			$_POST['end_date'] = $end_date[2]."-".$end_date[1]."-".$end_date[0];		
			save_log($menu_id,$action,$description);
		}
		$id = $this->risk->save($_POST);		
		set_notify('risk_est', lang('save_data_complete'));
		redirect('risk_est');
	} 
}
?>	