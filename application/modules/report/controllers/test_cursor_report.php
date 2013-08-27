<?php
class test_cursor_report extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('est_checklist_model','estchecklist');
		$this->load->model('est_checklist_detail_model','est_detail');
		$this->load->model('est_title_model','est_title');
		$this->load->model('section_model','section');
	}
	public $menu_id = 55;
	public $urlpage = 'report/checklist';
	public function index($mode=false)
	{
		$this->template->build('test_cursor_report');
	}		
}
?>