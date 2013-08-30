<?php
class checklist extends Public_Controller
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
		$pid=0;
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] == 'on'){
				$condition = " 1=1 ";
				if(@$_GET['sectionid'] !='')
				{
					$condition .= "AND est_checklist.sectionid ='".$_GET['sectionid']."'  ";
				}
				if(@$_GET['year_data'] !=''){
					$condition .= "AND est_checklist.year_data ='".$_GET['year_data']."' ";
				}
				
				}else{
					$condition1 = " section.id ='". login_data('sectionid')."' ";
					$data['result1'] = $this->section->where($condition1)->get_row();
					$condition = " est_checklist.sectionid ='". login_data('sectionid')."' ";
					if(@$_GET['year_data'] !=''){
						$condition .= "AND est_checklist.year_data ='".$_GET['year_data']."' ";	
						}
				}
			if(@$_GET['year_data'] !='' && @$_GET['sectionid'] !=''){
				$data['result'] = $this->estchecklist->where($condition)->order_by('id','desc')->get_row();					
			}else{
				$data['result']['id'] = '';
			}
			
		switch($mode){
			case 'export':
				$this->load->view('checklist/export',$data);
			break;
			case 'print':
				$this->load->view('checklist/print',$data);
			break;
			default:
				if(@$_GET['sectionid'] !='' && @$_GET['year_data'] !=''){
					$this->template->build('checklist/index',$data);
				}elseif(@$_GET['year_data'] !='' && @$_GET['sectionid'] =='' && $data['rs']['permis'] == 'on'){
					$data['result'] = $this->estchecklist->where($condition)->order_by('id','desc')->get_row();
					$this->template->build('checklist/median',$data);
				}
				
			break;
		}
		
		
			
		}
		else{
			
			redirect('front');	
		}
	}		
}
?>