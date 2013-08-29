<?php
class riskopr extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('risk_est_model','risk');
		$this->load->model('risk_est_control_model','risk_control');
		$this->load->model('risk_est_kri_model','risk_kri');
		$this->load->model('risk_level_model','risk_level');
		$this->load->model('risk_opr_model','risk_opr');
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
		$data['quarter'] = $_GET['quarter'];
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
			if(@$_GET['year_data'] !='' && @$_GET['sectionid'] !=''){
				$data['result_est'] = $this->risk->where($condition)->order_by('id','desc')->get_row();
				$data['result']	= $this->risk_opr->where("risk_est_id=".@$data['result_est']['id'])->order_by('id','desc')->get_row();		
			}else{
				$data['result']['id'] = '';
			}
			
		switch($mode){
			case 'export':
				$this->load->view('riskopr/export',$data);
			break;
			case 'print':
				$this->load->view('riskopr/print',$data);
			break;
			default:
				$this->template->build('riskopr/index',$data);
			break;
		}
		
		
			
		}
		else{
			
			redirect('front');	
		}
	}		
}
?>