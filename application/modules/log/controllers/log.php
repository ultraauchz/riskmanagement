<?php
class log extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_log_model','log');
	}
	
	public function index()
	{
		$menu_id=19;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="admin_log";
		$data['admin_menu'] = $this->db->getarray("SELECT * FROM admin_menu order by title ");
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('admin');
			$condition = "1=1";
			//$condition .= @$_GET['type']!='' ? " AND page='".$_GET['type']."'" : "";
			$condition .= @$_GET['action'] != '' ?  " AND action='".$_GET['action']."' " : "";
			$condition.= @$_GET['menu'] !=''? " AND menu_id=".$_GET['menu'] : "";
			$condition.= @$_GET['search']!='' ? " AND (users.name LIKE '%".$_GET['search']."%' or users.email LIKE '%".$_GET['search']."%') ": "";
			$data['result'] = $this->log->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->log->pagination();					
			$this->template->build('index',$data);
		}
		else{
			
			redirect('admin');	
		}
	}	
	
	function delete($id=FALSE){
			$this->log->delete($id);
		redirect('admin_log');
	}
}
?>