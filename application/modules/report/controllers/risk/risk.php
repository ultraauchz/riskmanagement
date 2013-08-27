<?php
class risk extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
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
					$condition .= "AND risk_est.sectionid ='".$_GET['sectionid']."'  ";
				}
				if(@$_GET['year_data'] !=''){
					$condition .= "AND risk_est.year_data ='".$_GET['year_data']."' ";
				}
				
				}else{
					$condition1 = " section.id ='". login_data('sectionid')."' ";
					$data['result1'] = $this->section->where($condition1)->get_row();
					$condition = " risk_est.sectionid ='". login_data('sectionid')."' ";
					if(@$_GET['year_data'] !=''){
						$condition .= "AND risk_est.year_data ='".$_GET['year_data']."' ";	
						}
				}
		
			
		switch($mode){
			case 'export':
				$data['sectionid']=$_POST['sectionid'];
				$this->load->view('risk/export',$data);
			break;
			case 'print':
				$this->load->view('risk/print',$data);
			break;
			default:
				$this->template->build('risk/index',$data);
			break;
		}
		
		
			
		}
		else{
			
			redirect('front');	
		}
	}		
}
?>