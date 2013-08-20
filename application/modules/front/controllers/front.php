<?php
Class front extends  Public_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		if(is_login()){
			$menu_id = 2;
			if(permission($menu_id, 'can_access_all') == 'on'){
				
				$month = date('m');
				if($_GET['year_data'] != ''){
					$year=$_GET['year_data'];
				}else{
					if($month > '09'){
						$year = date('Y')+543+1;
					}else{
						$year = date('Y')+543;
					}
				}
				$sql = "select section.id, section.title as section_title,
						(select count(*) from risk_est where year_data= $year and sectionid=section.id)as nform3,
						(select count(*) from risk_opr left join risk_est on risk_opr.risk_est_id = risk_est.id  
						where risk_est.year_data= $year and sectionid=section.id)as nform4,
						(select count(*) from est_checklist where year_data= $year and sectionid=section.id)as nchecklist
						from section order by section_type_id asc , title asc";
				$data['year']=$year;
				$data['result'] = $this->db->GetArray($sql);
				$this->template->build('show',$data);	
			}else{
				$this->template->build('index');
			}		
		}
		else{
			redirect('home');
		}
	}
		
}