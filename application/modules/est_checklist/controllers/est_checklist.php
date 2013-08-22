<?php
class est_checklist extends Public_Controller
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
	public $urlpage = 'est_checklist';
	public function index($pid=0)
	{
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
			$data['result'] = $this->estchecklist->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->estchecklist->pagination();					
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
		$data['urlpage'] = $this->urlpage;
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');
			if(permission($menu_id, 'can_access_all') == 'on'){
				$condition = "";
				$data['rs'] = @$this->estchecklist->where($condition)->get_row($id);								
				$this->template->build('form',$data);
			}else{
				$condition = " sectionid ='". login_data('sectionid')."' AND est_checklist.id = '".$id."' ";
				$condition1 = " section.id ='". login_data('sectionid')."' ";
				$data['result1'] = $this->section->where($condition1)->get_row();
				$data['rs'] = @$this->estchecklist->where($condition)->get_row();
				if($id != ''){
					if($data['rs']['id'] != ''){							
						$this->template->build('form',$data);
					}else{
						redirect('est_checklist');
					}
				}else{
					$this->template->build('form',$data);
				}
			}	
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.' : '.$data['rs']['est_name'];		
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
			if(permission($menu_id, 'canedit')=='')redirect('est_checklist');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['est_name'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('est_checklist');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['est_name'];		
			save_log($menu_id,$action,$description);
		}
		$est_date = explode('-',$_POST['est_date']);
		$_POST['est_date'] = $est_date[2]."-".$est_date[1]."-".$est_date[0];
		$id = $this->estchecklist->save($_POST);
		//est_title_id คือ hidden ที่เก็บไอดี ของแต่ล่ะข้อ
		//check_value คือ checkbox
			if(isset($_POST['est_title_id'])){
   				foreach($_POST['est_title_id'] as $key=>$_POST['num_i']){
   				 	if($_POST['est_title_id'][$key]){
    					$data['pid'] = $id;
						$_POST['check_value'][$key] == '' ? 0 :  $_POST['check_value'][$key];	
    					$data['est_title_id'] = $_POST['est_title_id'][$key];
    					$data['check_value'] = $_POST['check_value'][$key];
						$data['id'] = $_POST['detail_id'][$key];
    					$this->est_detail->save($data);
    					}
   					} 
  			 }
		set_notify('est_title', lang('save_data_complete'));
		redirect('est_checklist');
	} 
	function delete($id=FALSE){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('est_checklist');		
		$estchecklist = $this->estchecklist->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$estchecklist['est_name'];		
		save_log($menu_id,$action,$description);
		$this->estchecklist->delete($id);
		$condition = "pid = '".$id."'";
		$this->db->Execute('delete from est_checklist_detail where pid = ?',$id);
		redirect('est_checklist');
	}
	
	function load_est_detail_form($id=false){
		#$this->db->debug=true;
		$year_data = @$_POST['year_data'];
		$data['year_data'] = $year_data;
		if($year_data != ''){
		$data['main_title'] = $this->est_title->where('pid=0 and year_data='.$year_data)->get(false,true);
		}
		if(@$data['main_title']['id'] == '' && $data['year_data'] != ''){
			$data['main_title'] = $this->est_title->where('pid=0 and year_data = (select max(year_data) from est_title where year_data <='.$year_data.' )')->get(false,true);
		}
		
		if(@$_POST['year_data']>0 && @$_POST['sectionid'] > 0){
			$rs = @$this->estchecklist->where(' year_data='.$_POST['year_data']." AND sectionid=".$_POST['sectionid'])->get_row();
			@$id = $rs['id'];
			
		}else if($id > 0){
			$rs = @$this->estchecklist->get_row($id);
		}
		
		$data['id']=@$id;
		$data['rs']=@$rs;
		$this->load->view('est_detail_form',$data);
		
	}
	function report_section($type = NULL){
		  if($_GET['q'] != ''){
		  	$type = 'report';
		  }
			$text = ($type == 'report') ? '--แสดงภาควิชา/หน่วยงาน--' : '--กรุณาเลือกกลุ่มวิชา/หน่วยงาน--';
			
		$result = $this->db->GetArray('select id,title as text from section where section_type_id = ? order by title',$_GET['q']);
	    dbConvert($result);
	    if($type == 'report' and !empty($_GET['q'])) array_unshift($result, array('id' => '', 'text' => $text));
		echo $result ? json_encode($result) : '[{"id":"","text":"'.$text.'"}]';
		
	}
}
?>