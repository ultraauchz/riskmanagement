<?php
class risk_est extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('risk_est_model','risk');
		$this->load->model('risk_opr_model','risk_opr');
		$this->load->model('risk_est_control_model','risk_control');
		$this->load->model('risk_est_kri_model','risk_kri');
		$this->load->model('risk_level_model','risk_level');
		$this->load->model('section_model','section');
		$this->load->model('file_upload_model','file_upload');
	}
	public $menu_id = 52;
	public function index()
	{
		$menu_id = $this->menu_id;		
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			#$this->db->debug=true;
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] == 'on'){
				$condition = " 1=1 ";
				if(@$_GET['section_id'] !='')
				{
					$condition .= "AND risk_est.sectionid ='".$_GET['section_id']."'  ";
				}
				if(@$_GET['year_data'] !=''){
					$condition .= "AND risk_est.year_data ='".$_GET['year_data']."' ";
				}
				if(@$_GET['missionid'] != ''){
					$condition .= "AND risk_est.missionid ='".$_GET['missionid']."' ";
				}
				if(@$_GET['event_risk'] != ''){
					$condition .= "AND risk_est.event_risk like '%".$_GET['event_risk']."%' ";
				}
				
			}else{
				$condition1 = " section.id ='". login_data('sectionid')."' ";
				$data['result1'] = $this->section->where($condition1)->get_row();
				$condition = " risk_est.sectionid ='". login_data('sectionid')."' ";
				if(@$_GET['year_data'] !=''){
				$condition .= "AND risk_est.year_data ='".$_GET['year_data']."' ";	
				}
				if(@$_GET['missionid'] != ''){
					$condition .= "AND risk_est.missionid ='".$_GET['missionid']."' ";
				}
				if(@$_GET['event_risk'] != ''){
					$condition .= "AND risk_est.event_risk like '%".$_GET['event_risk']."%' ";
				}
				
			}
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
		//$this->db->debug = true;
		$menu_id = $this->menu_id;	
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$menu_name = GetMenuProperty($menu_id,'title');	
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] != 'on'){
				$condition = " sectionid ='". login_data('sectionid')."' AND risk_est.id = '".$id."' ";
				$condition1 = " section.id ='". login_data('sectionid')."' ";
				$data['result1'] = $this->section->where($condition1)->get_row();
				$data['rs'] = @$this->risk->where($condition)->get_row();
			}else{
				$data['rs'] = @$this->risk->get_row($id);
			}		
				if($id != ''){
					$start_date = explode('-',$data['rs']['start_date']);
					$data['rs']['start_date'] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
					$end_date = explode('-',$data['rs']['end_date']);
					$data['rs']['end_date'] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
					if(permission($menu_id, 'can_access_all') != 'on'){
						if($data['rs']['id'] !=''){
						$this->template->build('form',$data);
						}else{
						redirect('risk_est');
						}
					}else{
						$this->template->build('form',$data);
					}	
				}else{
					$this->template->build('form',$data);
				}		
					
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.' : '.$data['rs']['event_risk'];	
			save_log($menu_id,$action,$description);		
			}
		}
		else{			
			redirect('front');	
		}
	}
	
	public function form_opr($id=false)
	{
		$menu_id = 53;	
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$menu_name = GetMenuProperty($menu_id,'title');	
		$data['risk_est_id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');
			#$this->db->debug = true;
			$condition = "risk_opr.risk_est_id = ".$id;			
			$data['rs'] = @$this->risk_opr->where($condition)->get_row();
			if(@$data['rs']['id'] == ''){
			$data['rs'] = @$this->risk->get_row($id);
			$data['rs']['risk_est_id']=$id;
			$data['rs']['id']='';
			}else{
				
				for($i=1;$i<=4;$i++){
					$start_date = explode('-',$data['rs']['plot_start_date'.$i]);
					$data['rs']['plot_start_date'.$i] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
						if($data['rs']['plot_start_date'.$i] == "00-00-0000")
						{
							$data['rs']['plot_start_date'.$i] = '';
						}
					$end_date = explode('-',$data['rs']['plot_end_date'.$i]);
					$data['rs']['plot_end_date'.$i] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
						if($data['rs']['plot_end_date'.$i] == "00-00-0000")
						{
							$data['rs']['plot_end_date'.$i] = '';
						}
					
					$start_date = explode('-',$data['rs']['results_start_date'.$i]);
					$data['rs']['results_start_date'.$i] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
						if($data['rs']['results_start_date'.$i] == "00-00-0000")
						{
							$data['rs']['results_start_date'.$i] = '';
						}
					$end_date = explode('-',$data['rs']['results_end_date'.$i]);
					$data['rs']['results_end_date'.$i] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
						if($data['rs']['results_end_date'.$i] == "00-00-0000")
						{
							$data['rs']['results_end_date'.$i] = '';
						}	
				}	
			}	
										
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] != 'on'){
				if($data['rs']['sectionid'] == login_data('sectionid')){
					$this->template->build('form_opr',$data);	
				}else{
					redirect('risk_est');
				}						
			}else{
				$this->template->build('form_opr',$data);
			}
			
			if($id>0){
			if(@$data['rs']['event_risk_opr'] != ''){
			$action='View';
			$description = $action.' '.$menu_name.' : '.$data['rs']['event_risk_opr'];	
			save_log($menu_id,$action,$description);
			}		
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
			if(permission($menu_id, 'canedit')=='')redirect('risk_est');
			$action='Update';
			$start_date = explode('-',$_POST['start_date']);
			$_POST['start_date'] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['end_date']);
			$_POST['end_date'] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
			$description = $action.' '.$menu_name.' : '.$_POST['event_risk'];	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('risk_est');	
			$action='Add';
			$start_date = explode('-',$_POST['start_date']);
			$_POST['start_date'] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['end_date']);
			$_POST['end_date'] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
			$description = $action.' '.$menu_name.' : '.$_POST['event_risk'];		
			save_log($menu_id,$action,$description);
		}
		$condition_level = " risk_remain_1_val = ".$_POST['remain_risk_1'] . " AND risk_remain_2_val = ".$_POST['remain_risk_2'];
		$level = $this->risk_level->where($condition_level)->get_row();
		$_POST['risk_level'] = $level['level_desc'];
		
		$pid = $this->risk->save($_POST);
		/////save risk_control		
		$this->db->Execute('delete from risk_est_control where risk_est_id ='.$pid);
		if(isset($_POST['control_risk'])){
		   foreach($_POST['control_risk'] as $key=>$_POST['i']){
		    if($_POST['control_risk'][$key]){
		    $i++;
		    $data['risk_est_id'] = $pid;
		    $data['control_risk'] = $_POST['control_risk'][$key];
		    $data['estimate_control_risk'] = $_POST['estimate_control_risk'][$key];
		    $this->risk_control->save($data);
		    }
		   } 
		  }
		/////save rick_kri
		$this->db->Execute('delete from risk_est_kri where risk_est_id ='.$pid);
		if(isset($_POST['kri_risk'])){
		   foreach($_POST['kri_risk'] as $key=>$_POST['control_i']){
		    if($_POST['kri_risk'][$key]){
		    $i++;
		    $data['risk_est_id'] = $pid;
		    $data['kri_risk'] = $_POST['kri_risk'][$key];
		    $data['kri_risk_count'] = $_POST['kri_risk_count'][$key];
			$data['kri_risk_unit'] = $_POST['kri_risk_unit'][$key];
		    $this->risk_kri->save($data);
		    }
		   } 
		  }
		
		set_notify('risk_est', lang('save_data_complete'));
		redirect('risk_est');
	}

	public function save_opr(){
		#$this->db->debug = true;
		$menu_id=53;
		$menu_name = GetMenuProperty($menu_id,'title');
		
		for($i=1;$i<=4;$i++){
			if($_FILES['fl_import'.$i]['name']!=''){
				$ext = pathinfo($_FILES['fl_import'.$i]['name'], PATHINFO_EXTENSION);
				$data['risk_est_id']=$_POST['risk_est_id'];			
				$file_name = 'risk_est'."_(".$data['risk_est_id'].")_".date("Y_m_d_H_i_s")."_($i)".'.'.$ext;
				$data['fl_import'] = $file_name;
				$data['fl_name']=$_FILES['fl_import'.$i]['name'];
				$data['quarter'] = $i;
				/*---for insert value to info table ---*/
				$_POST['fl_upload_id'.$i] =$this->file_upload->save($data);
				/*--end--*/
				$uploaddir = 'import_file/risk_est/';
				$fpicname = $uploaddir.$file_name;
				move_uploaded_file($_FILES['fl_import'.$i]['tmp_name'], $fpicname);
			}
		}
		
		
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('risk_est');
			$action='Update';
			for($i=1;$i<=4;$i++){
			$start_date = explode('-',$_POST['plot_start_date'.$i]);
			$_POST['plot_start_date'.$i] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['plot_end_date'.$i]);
			$_POST['plot_end_date'.$i] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
			
			$start_date = explode('-',$_POST['results_start_date'.$i]);
			$_POST['results_start_date'.$i] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['results_end_date'.$i]);
			$_POST['results_end_date'.$i] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
			}
			
			$description = $action.' '.$menu_name.' : '.$_POST['event_risk_opr'];	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('risk_est');	
			$action='Add';
			for($i=1;$i<=4;$i++){
			$start_date = explode('-',$_POST['plot_start_date'.$i]);
			$_POST['plot_start_date'.$i] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['plot_end_date'.$i]);
			$_POST['plot_end_date'.$i] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
			
			$start_date = explode('-',$_POST['results_start_date'.$i]);
			$_POST['results_start_date'.$i] = $start_date[2]."-".$start_date[1]."-".$start_date[0];
			$end_date = explode('-',$_POST['results_end_date'.$i]);
			$_POST['results_end_date'.$i] = $end_date[2]."-".$end_date[1]."-".$end_date[0];
			}
			$description = $action.' '.$menu_name.' : '.$_POST['event_risk_opr'];	
			save_log($menu_id,$action,$description);
		}
		
		
			
		
		$id = $this->risk_opr->save($_POST);		
		set_notify('risk_est', lang('save_data_complete'));
		redirect('risk_est');
	}
 
	function delete($id=FALSE){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('risk_est');		
		$risk_est = $this->risk->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$risk_est['event_risk'];		
		save_log($menu_id,$action,$description);
		$this->risk->delete($id);
		$this->db->Execute('delete from risk_opr where risk_est_id = ?',$id);
		redirect('risk_est');
	}
	
	function delete_fl($id=FALSE,$risk_est_id=FALES){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('risk_est');		
		$fl = $this->file_upload->get_row($id);
		$action='Delete';
		$this->file_upload->delete($id);
		unlink("import_file/risk_est/".$fl['fl_import']);
		redirect('risk_est/form_opr/'.$risk_est_id);
	}
	function report_section($type = NULL){
		  if($_GET['q'] != ''){
		  	$type = 'report';
		  }
			$text = ($type == 'report') ? '--แสดงภาควิชาทั้งหมด--' : '--กรุณาเลือกกลุ่มวิชา--';
			
		$result = $this->db->GetArray('select id,title as text from section where divisionid = ? order by title',$_GET['q']);
	    dbConvert($result);
	    if($type == 'report' and !empty($_GET['q'])) array_unshift($result, array('id' => '', 'text' => $text));
		echo $result ? json_encode($result) : '[{"id":"","text":"'.$text.'"}]';
		
	}
	

}
?>	