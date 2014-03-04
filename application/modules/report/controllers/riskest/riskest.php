<?php
class riskest extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('risk_est_model','risk');
		$this->load->model('risk_est_head_model','risk_head');
		$this->load->model('risk_est_control_model','risk_control');
		$this->load->model('risk_est_kri_model','risk_kri');
		$this->load->model('risk_level_model','risk_level');
		$this->load->model('section_model','section');
	}
	public $menu_id = 55;
	public $urlpage = 'report/riskest';
	public function index($mode=false)
	{
		$pid=0;
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		
		//$this->db->debug = true;
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			
			$condition = " 1=1 ";
				if(@$_GET['objectiveid_1'] !=''){
					$condition .= "AND risk_est_head.objectiveid_1 ='".$_GET['objectiveid_1']."' ";
				}
				if(@$_GET['objectiveid_2'] !=''){
					$condition .= "AND risk_est_head.objectiveid_2 ='".$_GET['objectiveid_2']."' ";
				}
				if(@$_GET['objectiveid_2'] !=''){
					$condition .= "AND risk_est_head.objectiveid_2 ='".$_GET['objectiveid_2']."' ";
				}
				if(@$_GET['objective_3'] !=''){
					$condition .= "AND risk_est_head.objective_3 ='".$_GET['objective_3']."' ";
				}
				if(@$_GET['missionid'] !=''){
					$condition .= "AND risk_est_head.missionid ='".$_GET['missionid']."' ";
				}
				if(@$_GET['process'] !=''){
					$condition .= "AND risk_est_head.process ='".$_GET['process']."' ";
				}
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] == 'on'){
				
				if(@$_GET['sectionid'] !='')
				{
					$condition .= "AND risk_est_head.sectionid ='".$_GET['sectionid']."'  ";
				}
				if(@$_GET['year_data'] !=''){
					$condition .= "AND risk_est_head.year_data ='".$_GET['year_data']."' ";
				}

			}else{
					$condition1 = " section.id ='". login_data('sectionid')."' ";
					$data['result1'] = $this->section->where($condition1)->get_row();
					$condition .= " AND risk_est_head.sectionid ='". login_data('sectionid')."' ";
					if(@$_GET['year_data1'] !=''){
						$_GET['year_data'] = $_GET['year_data1'];
						 $condition .= "AND risk_est_head.year_data ='".$_GET['year_data1']."' ";	
						}
			}
			 if(@$_GET['year_data'] !='' && @$_GET['sectionid'] !=''){
				   // $this->db->debug =true;	
				    $select = "DISTINCT risk_est_head.sectionid, risk_est_head.objectiveid_1 ,  risk_est_head.objectiveid_2 , risk_est_head.objective_3 , risk_est_head.missionid , risk_est_head.process";
					$join = ' 
	                join section on risk_est_head.sectionid = section.id 
	                join objective obj1 on risk_est_head.objectiveid_1 = obj1.id
	                join objective obj2 on risk_est_head.objectiveid_2 = obj2.id
	                join mission on risk_est_head.missionid = mission.id';
					
					$select .= ' ,risk_est_head.*, section.title as section_title , 
					  obj1.title as objective_title1, obj2.title as objective_title2 , 
					  mission.title as mission_title  ';
					
					$data['result'] = $this->risk_head->select($select)->join($join)->where($condition)->order_by('objectiveid_1', 'asc' , 'objectiveid_2', 'asc' ,'objective_3', 'asc' , 'missionid' ,'asc' , 'process', 'asc')->get();
					//print_r($data['result']);
					//$this->db->debug =true;
					if(count($data['result']) == '0'){
						$urlpage = $this->urlpage;
						set_notify('error', 'การเข้าถึงข้อมูลไม่ถูกต้อง');
						redirect($urlpage);
					}

			}else{
				
					$data['result'] = "";

			}
			
		switch($mode){
			case 'export':
				$this->load->view('riskest/export',$data);
			break;
			case 'print':
				$this->load->library('Pdf');
				
				$this->load->view('riskest/print_pdf',$data);
				//$this->load->view('riskest/print',$data);
			break;
			default:
				$this->template->build('riskest/index',$data);
			break;
		}
		
		
			
		}
		else{
			
			redirect('front');	
		}
	}
	function report_section(){
		$year_data = @$_POST['year_data'];

				echo form_dropdown('sectionid',get_option('id','title','section'," id IN (SELECT sectionid FROM risk_est_head WHERE year_data='".$year_data."') order by title "),@$_GET['sectionid'],'style="width:370px"','--เลือกภาควิชา--');

	}
	function report_objectiveid_1(){
		$year_data = @$_POST['year_data'];
		$data['rs']['permis'] = permission('55', 'can_access_all');
			if($data['rs']['permis'] == 'on'){
				$sectionid = @$_POST['sectionid'];
			}else{
			    $sectionid = login_data('sectionid');
			}
	
			echo form_dropdown('objectiveid_1',get_option('id','title','objective'," id IN (SELECT objectiveid_1 FROM risk_est_head WHERE year_data='".$year_data."' and sectionid='".$sectionid."') order by title "),'','style="width:550px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย--');
		
	}
	function report_objectiveid_2(){
		$year_data = @$_POST['year_data'];
		$sectionid = @$_POST['sectionid'];
		$objectiveid_1 = @$_POST['objectiveid_1'];
	
			echo form_dropdown('objectiveid_2',get_option('id','title','objective'," id IN (SELECT objectiveid_2 FROM risk_est_head WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."') order by title "),'','style="width:550px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน--');
		
	}
	function report_objective_3(){
		$year_data = @$_POST['year_data'];
		$sectionid = @$_POST['sectionid'];
		$objectiveid_1 = @$_POST['objectiveid_1'];
		$objectiveid_2 = @$_POST['objectiveid_2'];
	
			echo form_dropdown('objective_3',get_option('objective_3 AS id','objective_3 as title','risk_est_head'," objective_3 IN (SELECT DISTINCT objective_3 FROM risk_est_head WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."' and objectiveid_2='".$objectiveid_2."') order by title "),'','style="width:450px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน--');
		
	}
	function report_missionid(){
		$year_data = @$_POST['year_data'];
		$sectionid = @$_POST['sectionid'];
		$objectiveid_1 = @$_POST['objectiveid_1'];
		$objectiveid_2 = @$_POST['objectiveid_2'];
		$objective_3 = @$_POST['objective_3'];
	
			echo form_dropdown('missionid',get_option('id','title','mission'," id IN (SELECT missionid FROM risk_est_head WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."' and objectiveid_2='".$objectiveid_2."' and objective_3 ='".$objective_3."') order by title "),'','','--เลือกภาระกิจ--');
		
	}
	function report_process(){
		$year_data = @$_POST['year_data'];
		$sectionid = @$_POST['sectionid'];
		$objectiveid_1 = @$_POST['objectiveid_1'];
		$objectiveid_2 = @$_POST['objectiveid_2'];
		$objective_3 = @$_POST['objective_3'];
		$missionid = @$_POST['missionid'];
	
			echo form_dropdown('process',get_option('process as id','process as title','risk_est_head'," process IN (SELECT DISTINCT process FROM risk_est_head WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."' and objectiveid_2='".$objectiveid_2."' and objective_3 ='".$objective_3."' and missionid ='".$missionid."') order by title "),'','','--เลือกกระบวนงาน--');
		
	}
	
	
}	

?>