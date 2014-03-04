<?php
class risk_est extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('risk_est_model','risk');
		$this->load->model('risk_est_head_model','risk_head');
		$this->load->model('risk_opr_model','risk_opr');
		$this->load->model('risk_est_control_model','risk_control');
		$this->load->model('risk_est_kri_model','risk_kri');
		$this->load->model('risk_level_model','risk_level');
		$this->load->model('section_model','section');
		$this->load->model('file_upload_model','file_upload');
		$this->load->model('risk_est_detail_model','est_detail');
		$this->load->model('risk_opr_detail_model','opr_detail');
		$this->load->model('explanation_risk_detail_model','explanation_risk');
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
					$condition .= "AND risk_est_head.sectionid ='".$_GET['section_id']."'  ";
				}
				if(@$_GET['year_data'] !=''){
					$condition .= "AND risk_est_head.year_data ='".$_GET['year_data']."' ";
				}
				if(@$_GET['missionid'] != ''){
					$condition .= "AND risk_est_head.missionid ='".$_GET['missionid']."' ";
				}
				if(@$_GET['event_risk'] != ''){
					$condition .= "AND risk_est.event_risk like '%".$_GET['event_risk']."%' ";
				}
				
			}else{
				$condition1 = " section.id ='". login_data('sectionid')."' ";
				$data['result1'] = $this->section->where($condition1)->get_row();
				$condition = " risk_est_head.sectionid ='". login_data('sectionid')."' ";
				if(@$_GET['year_data'] !=''){
				$condition .= "AND risk_est_head.year_data ='".$_GET['year_data']."' ";	
				}
				if(@$_GET['missionid'] != ''){
					$condition .= "AND risk_est_head.missionid ='".$_GET['missionid']."' ";
				}
				if(@$_GET['event_risk'] != ''){
					$condition .= "AND risk_est.event_risk like '%".$_GET['event_risk']."%' ";
				}
				
			}
			//$this->db->debug = true;
			
				$data['result'] = $this->risk_head->where($condition)->order_by('id','desc')->get();
				$data['pagination'] = $this->risk_head->pagination();					
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
		$data['detail_est'] = $this->est_detail->get_row(1);
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
	
	public function risk_dtl()
	{
		//$this->db->debug = true;
		$risk_est_head_id = @$_POST['risk_est_head_id'];
		$id = @$_POST['id'];
		$menu_id = $this->menu_id;	
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$data['detail_est'] = $this->est_detail->get_row(1);
		$menu_name = GetMenuProperty($menu_id,'title');	
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] != 'on'){
				$condition = " risk_est_head.sectionid ='". login_data('sectionid')."' AND risk_est.id = '".$id."' ";
				$condition1 = " section.id ='". login_data('sectionid')."' ";
				$data['result1'] = $this->section->where($condition1)->get_row();
				$data['rs'] = @$this->risk->where($condition)->get_row();
			}else{
				$data['rs'] = @$this->risk->get_row($id);
			}		
				if($id != ''){
					if(permission($menu_id, 'can_access_all') != 'on'){
						if($data['rs']['id'] !=''){
						$this->load->view('form_est_dtl',$data);
						}else{
						redirect('risk_est');
						}
					}else{
						$this->load->view('form_est_dtl',$data);
					}	
				}else{
					$this->load->view('form_est_dtl',$data);
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
	
	public function form_head($id=false)
	{
		//$this->db->debug = true;
		$menu_id = $this->menu_id;	
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$data['detail_est'] = $this->est_detail->get_row(1);
		$menu_name = GetMenuProperty($menu_id,'title');	
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] != 'on'){
				
				$condition = " risk_est_head.sectionid ='". login_data('sectionid')."' AND risk_est_head.id = '".$id."' ";
				$condition1 = " section.id ='". login_data('sectionid')."' ";
				$data['result1'] = $this->section->where($condition1)->get_row();
				$data['rs'] = @$this->risk_head->where($condition)->get_row();
			}else{
				$data['rs'] = @$this->risk_head->get_row($id);
			}		
				if($id != ''){
					if(permission($menu_id, 'can_access_all') != 'on'){
						if($data['rs']['id'] !=''){
						$this->template->build('form_head',$data);
						}else{
						redirect('risk_est');
						}
					}else{
						$this->template->build('form_head',$data);
					}	
				}else{
					$this->template->build('form_head',$data);
				}		
					
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.'(ส่วนที่แรก) : ปีงบประมาน'.$data['rs']['year_data'].' '.$data['rs']['section_title'].' '.$data['rs']['mission_title']
						   .' กระบวนงาน'.$data['rs']['process'];	
			save_log($menu_id,$action,$description);		
			}
		}
		else{			
			redirect('front');	
		}
	}
	
	public function form_head_view($id=false)
	{
		//$this->db->debug = true;
		$menu_id = $this->menu_id;	
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$data['detail_est'] = $this->est_detail->get_row(1);
		$menu_name = GetMenuProperty($menu_id,'title');	
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] != 'on'){
				$condition = " risk_est_head.sectionid ='". login_data('sectionid')."' AND risk_est_head.id = '".$id."' ";
				$condition1 = " section.id ='". login_data('sectionid')."' ";
				$data['result1'] = $this->section->where($condition1)->get_row();
				$data['rs'] = @$this->risk_head->where($condition)->get_row();
			}else{
				$data['rs'] = @$this->risk_head->get_row($id);
			}		
				if($id != ''){
					if(permission($menu_id, 'can_access_all') != 'on'){
						if($data['rs']['id'] !=''){
							$this->template->build('form_head_view',$data);
						}else{
							redirect('risk_est');
						}
					}else{
						$this->template->build('form_head_view',$data);
					}	
				}else{
					$this->template->build('form_head_view',$data);
				}		
					
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.'(ส่วนที่สอง) : ปีงบประมาน '.$data['rs']['year_data'].' '.$data['rs']['section_title'].' '.$data['rs']['mission_title']
						   .' กระบวนงาน'.$data['rs']['process'];	
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
			
			$data['rs'] = @$this->risk->get_row($id);
			//$this->db->debug = true;
			$data['rs_opr'] = $this->risk_opr->where($condition)->get('','true');	
							
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
				
					$action='View';
					$description = $action.' '.$menu_name.' : '.$data['rs']['event_risk'];	
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
			if(permission($menu_id, 'canedit')=='')redirect('risk_est');
			$action='Update';
			$description = $action.' '.$menu_name.' : เหตุการณ์ความเสี่ยง '.$_POST['event_risk'];	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('risk_est');	
			$action='Add';
			$description = $action.' '.$menu_name.' : เหตุการณ์ความเสี่ยง '.$_POST['event_risk'];		
			save_log($menu_id,$action,$description);
		}
		$_POST['start_date'] =  date_to_mysql($_POST['start_date']);
		$_POST['end_date'] = date_to_mysql($_POST['end_date']);
		$condition_level = " risk_remain_1_val = ".$_POST['remain_risk_1'] . " AND risk_remain_2_val = ".$_POST['remain_risk_2'];
		$level = $this->risk_level->where($condition_level)->get_row();
		$_POST['risk_level'] = $level['level_desc'];
		
		$pid = $this->risk->save($_POST);
		/////save risk_control		
		$this->db->Execute('delete from risk_est_control where risk_est_id ='.$pid);
		if(isset($_POST['control_risk'])){
		   foreach($_POST['control_risk'] as $key=>$_POST['i']){
		    if($_POST['control_risk'][$key]){
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
		    $data['risk_est_id'] = $pid;
		    $data['kri_risk'] = $_POST['kri_risk'][$key];
		    $data['kri_risk_count'] = $_POST['kri_risk_count'][$key];
			$data['kri_risk_unit'] = $_POST['kri_risk_unit'][$key];
		    $this->risk_kri->save($data);
		    }
		   } 
		  }
		
		set_notify('risk_est', lang('save_data_complete'));
		redirect('risk_est/form_head_view/'.$_POST['risk_est_head_id']);
	}

	public function save_head(){
		//$this->db->debug = true;
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');
		$pid = $this->risk_head->save($_POST);
		$risk_head = $this->risk_head->get_row($pid);
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('risk_est');
			$action='Update';
			$description = $action.' '.$menu_name.'(ส่วนที่แรก) : ปีงบประมาน '.$risk_head['year_data'].' '.$risk_head['section_title'].' '.$risk_head['mission_title']
						   .' กระบวนงาน'.$risk_head['process'];	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('risk_est');	
			$action='Add';
			$description = $action.' '.$menu_name.'(ส่วนที่แรก) : ปีงบประมาน  '.$risk_head['year_data'].' '.$risk_head['section_title'].' '.$risk_head['mission_title']
						   .' กระบวนงาน'.$risk_head['process'];			
			save_log($menu_id,$action,$description);
		}
		
		
		
		
		set_notify('risk_est', lang('save_data_complete'));
		redirect('risk_est/form_head_view/'.$pid);
	}

	public function save_opr(){
		//$this->db->debug = true;
		$menu_id=53;
		$menu_name = GetMenuProperty($menu_id,'title');

		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('risk_est');
			$action='Update';
			for($i=1;$i<=4;$i++){
				if($_POST['plot_start_date'.$i] != ''){
					$_POST['plot_start_date'.$i] = date_to_mysql($_POST['plot_start_date'.$i]);
				}
				if($_POST['plot_end_date'.$i] != ''){
					echo $_POST['plot_end_date'.$i] = date_to_mysql($_POST['plot_end_date'.$i]);
				}
				if($_POST['results_start_date'.$i] != ''){
					$_POST['results_start_date'.$i] = date_to_mysql($_POST['results_start_date'.$i]);
				}
				if($_POST['results_end_date'.$i] != ''){
					$_POST['results_end_date'.$i] = date_to_mysql($_POST['results_end_date'.$i]);
				}
			}
			
			$description = $action.' '.$menu_name.' : '.$_POST['event_risk_opr'];	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('risk_est');	
			$action='Add';
			for($i=1;$i<=4;$i++){
				if($_POST['plot_start_date'.$i] != ''){
					 $_POST['plot_start_date'.$i] = date_to_mysql($_POST['plot_start_date'.$i]);
				}
				if($_POST['plot_end_date'.$i] != ''){
					 $_POST['plot_end_date'.$i] = date_to_mysql($_POST['plot_end_date'.$i]);
				}
				if($_POST['results_start_date'.$i] != ''){
					$_POST['results_start_date'.$i] = date_to_mysql($_POST['results_start_date'.$i]);
				}
				if($_POST['results_end_date'.$i] != ''){
					$_POST['results_end_date'.$i] = date_to_mysql($_POST['results_end_date'.$i]);
				}
			}
			$description = $action.' '.$menu_name.' : '.$_POST['event_risk_opr'];	
			save_log($menu_id,$action,$description);
		}
		
		
		$id = $this->risk_opr->save($_POST);
		//return FALSE;	
		for($i=1;$i<=4;$i++){
			if($_FILES['fl_import'.$i]['name']!=''){
				$ext = pathinfo($_FILES['fl_import'.$i]['name'], PATHINFO_EXTENSION);
				$data['risk_est_id']=$_POST['risk_est_id'];	
				$data['risk_opr_id'] = $id;		
				$file_name = 'risk_est'."_(".$data['risk_est_id'].")_".date("Y_m_d_H_i_s")."_($i)".'.'.$ext;
				$data['fl_import'] = $file_name;
				$data['fl_name']=$_FILES['fl_import'.$i]['name'];
				$data['quarter'] = $i;
				/*---for insert value to info table ---*/
				$data_opr['fl_upload_id'.$i] =$this->file_upload->save($data);
				/*--end--*/
				$uploaddir = 'import_file/risk_est/';
				$fpicname = $uploaddir.$file_name;
				move_uploaded_file($_FILES['fl_import'.$i]['tmp_name'], $fpicname);
				
				$data_opr['id'] = $id;
				$this->risk_opr->save($data_opr);
			}
		}
				
		set_notify('risk_est', lang('save_data_complete'));
	    redirect('risk_est/form_opr/'.$_POST['risk_est_id']);
	}
 
 	public function opr_dtl(){
 		$menu_id = 53;	
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = 'risk_est';
		$menu_name = GetMenuProperty($menu_id,'title');	
		
 		@$risk_est_id = $_POST['risk_est_id'];
		@$risk_opr_id = $_POST['risk_opr_id'];
		
		
			$data['risk_est_id'] = $risk_est_id; 
			$data['detail_opr'] = $this->opr_detail->get_row(1);
			$data['detail_risk_manage'] = $this->explanation_risk->get_row(1);
			
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');
			#$this->db->debug = true;			
			if(@$risk_est_id != '' && $risk_opr_id == ''){
				$data['risk_est'] = $this->risk->get_row($risk_est_id);
				$data['rs'] = '';
			}else if($risk_opr_id != ''){
				$data['risk_est'] = $this->risk->get_row($risk_est_id);
				$data['rs'] = $this->risk_opr->get_row($risk_opr_id);
			}
									
			$data['rs']['permis'] = permission($menu_id, 'can_access_all');
			if($data['rs']['permis'] != 'on'){
				if($data['risk_est']['sectionid'] == login_data('sectionid')){
					$this->load->view('form_opr_dtl.php',@$data);	
				}else{
					redirect('risk_est');
				}						
			}else{
				$this->load->view('form_opr_dtl.php',@$data);
			}	
			if(@$data['rs']['id'] != ''){		
					$action='View';
					$description = $action.' '.$menu_name.' : '.@$data['rs']['event_risk_opr'];	
					save_log($menu_id,$action,$description);
						
			}
		}else{			
			redirect('front');	
		}
		
	}
 
 
	function delete_risk($id=FALSE,$risk_h=FALSE){
			
		$menu_id = $this->menu_id;
		$permis = permission($menu_id, 'can_access_all');
		if($permis != 'on'){
			$condition = " risk_est_head.sectionid ='". login_data('sectionid')."' AND risk_est_head.id = '".$risk_h."' AND risk_est.id = '".$id."' ";
			$chk_owner = @$this->risk->where($condition)->get();
			$num_row_chk = count($chk_owner);
			if($num_row_chk = 0){
				redirect('risk_est');
			}
		}		
			
			$menu_name = GetMenuProperty($menu_id,'title');		
			if(permission($menu_id, 'candelete')=='')redirect('risk_est');		
			$risk_est = $this->risk->get_row($id);
			$action='Delete';
			$description = $action.' '.$menu_name.' : เหตุการณ์ความเสี่ยง '.$risk_est['event_risk'];		
			save_log($menu_id,$action,$description);
			$this->risk->delete($id);
			$this->db->Execute('delete from risk_opr where risk_est_id = ?',$id);
			$this->db->Execute('delete from risk_est_kri where risk_est_id ='.$id);
			$this->db->Execute('delete from risk_est_control where risk_est_id ='.$id);
			
			redirect('risk_est/form_head_view/'.$risk_h);
		
	}
	
	function delete_risk_opr($id=FALSE,$risk_est=FALSE){
		$menu_id = 53;
		$permis = permission($menu_id, 'can_access_all');
		if($permis != 'on'){
			$condition = " risk_est_head.sectionid ='". login_data('sectionid')."' AND risk_est.id = '".$risk_est."' AND risk_opr.id = '".$id."' ";
			$chk_owner = $this->risk_opr->where($condition)->get();
			echo $num_row_chk = count($chk_owner);
			if($num_row_chk = 0){
				redirect('risk_est');
			}
		}

			$menu_name = GetMenuProperty($menu_id,'title');		
			if(permission($menu_id, 'candelete')=='')redirect('risk_est');		
			$risk_opr = $this->risk_opr->get_row($id);
			$action='Delete';
			$description = $action.' '.$menu_name.' : กิจกรรมการดำเนินงาน '.$risk_opr['event_risk_opr'];		
			save_log($menu_id,$action,$description);
			
			$this->risk_opr->delete($id);
			$fl_upload = $this->file_upload->where("risk_est_id = '".$risk_est."' and risk_opr_id = '".$id."' ")->get();
			foreach($fl_upload as $fl){
				$this->file_upload->delete($fl['id']);
				unlink("import_file/risk_est/".$fl['fl_import']);
			}
			
			redirect('risk_est/form_opr/'.$risk_est);
		
	}

	function delete_risk_head($id=FALSE){
			
		$menu_id=$this->menu_id;
		$permis = permission($menu_id, 'can_access_all');
		if($permis != 'on'){	
			$condition = " risk_est_head.sectionid ='". login_data('sectionid')."' AND risk_est_head.id = '".$id."' ";
			$chk_owner = @$this->risk_head->where($condition)->get();
			$num_row_chk = count($chk_owner);
			if($num_row_chk = 0){
				redirect('risk_est');
			}
		}		
		
			
			$menu_name = GetMenuProperty($menu_id,'title');		
			if(permission($menu_id, 'candelete')=='')redirect('risk_est');		
			$risk_head = $this->risk_head->get_row($id);
			$action='Delete';
			$description = $action.' '.$menu_name.'(ส่วนที่แรก) : ปีงบประมาน '.$risk_head['year_data'].' '.$risk_head['section_title'].' '.$risk_head['mission_title']
						   .' กระบวนงาน'.$risk_head['process'];		
			save_log($menu_id,$action,$description);
			 
			$chk_risk = $this->risk->where("risk_est_head_id = '".$id."' ")->get();
			$num_risk = count($chk_risk);
			if($num_risk != '0'){
				foreach ($chk_risk as $key => $risk) {
					$this->risk->delete($risk['id']);
					$this->db->Execute('delete from risk_opr where risk_est_id = ?',$risk['id']);
					$this->db->Execute('delete from risk_est_kri where risk_est_id ='.$risk['id']);
					$this->db->Execute('delete from risk_est_control where risk_est_id ='.$risk['id']);
				}
			}
			$this->risk_head->delete($id);
		
			redirect('risk_est');
	}
	/*
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
	*/
	function del_fl(){ // ลบไฟล์หลักฐาน
		$menu_id=$this->menu_id;
		$id = $_POST['id'];
		$risk_est_id = $_POST['risk_est_id'];
		$risk_opr_id = $_POST['risk_opr_id'];
		$rel_id = $_POST['rel_id'];
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('risk_est');		
		$fl = $this->file_upload->get_row($id);
		$action='Delete';
		$this->file_upload->delete($id);
		unlink("import_file/risk_est/".$fl['fl_import']);
		//redirect('risk_est/form_opr/'.$risk_est_id);
		$risk_opr = $this->risk_opr->get_row($risk_opr_id);
		$description = $action.' '.$menu_name.' : ลบไฟล์เอกสาร '.$fl['fl_name'].' ของกิจกรรมการดำเนินงาน '.$risk_opr['event_risk_opr'];
		save_log($menu_id,$action,$description);
		
			$fl_upload = $this->file_upload->where("risk_est_id = ".$risk_est_id." and quarter = ".$rel_id." and risk_opr_id = ".$risk_opr_id)->get();
				foreach($fl_upload as $fl){
				 	if($fl['id'] != ''){
				  	echo	"<div style='width: 600px;display: inline-block; margin-top: 10px'><a href='import_file/risk_est/".$fl['fl_import']."' target='_blank' >".$fl['fl_name']."</a></div>
					  		<a href='".$fl['id']."' rel_id='".$rel_id."' risk_opr_id = '".$risk_opr_id."' style='text-decoration:none;' onclick='return false;' title='Delete' class='btn btn-small btn-danger del_fl'><i class=' icon-trash'></i>ลบ</a>
					  		<br />";
			  		}
				}
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