<?php
class risk_est extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('section_model','section');
	}
	public $menu_id = 52;
	public function index()
	{
		$menu_id = $this->menu_id;
		$data='';		
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$this->template->build('index',$data);
	}
	
	public function form()
	{
		$menu_id = $this->menu_id;
		$data='';		
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$this->template->build('form',$data);
	}
}
?>	