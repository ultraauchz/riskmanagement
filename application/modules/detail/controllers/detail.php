<?php
class detail extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('risk_est_detail_model','est_detail');
		$this->load->model('risk_opr_detail_model','opr_detail');
		$this->load->model('risk_detail_model','index_detail');
		$this->load->model('explanation_risk_detail_model','explanation_risk');
	}
	public $urlpage = 'detail';
	
	public function index(){
		#$this->db->debug = true;
		$menu_id=64;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$data['result'] = $this->index_detail->get_row(1);
			$this->template->build('detail',$data);
			}else{
				redirect('front');
			}
	}
	public function detail_form(){
		$menu_id=64;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canedit')!='on')redirect('front');
			$data['result'] = $this->index_detail->get_row(1);
			$this->template->build('detail_form',$data);
			}else{
				redirect('front');
			}
	}
	public function detail_save(){
		$menu_id=64;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		$title = "รายละเอียดโครงการ";
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('front');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$title;	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('front');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$title;		
			save_log($menu_id,$action,$description);
		}
		$this->index_detail->save($_POST);
		set_notify('detail', lang('save_data_complete'));
		redirect('detail');
	}
	
	
	public function detail_est(){
		#$this->db->debug = true;
		$menu_id=61;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$data['result'] = $this->est_detail->get_row(1);
			$this->template->build('detail_est',$data);
			}else{
				redirect('front');
			}
	}
	public function detail_est_form(){
		$menu_id=61;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canedit')!='on')redirect('front');
			$data['result'] = $this->est_detail->get_row(1);
			$this->template->build('detail_est_form',$data);
			}else{
				redirect('front');
			}
	}
	public function detail_est_save(){
		$menu_id=61;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		$title = "จัดการข้อมูลคําอธิบายการกรอกข้อมูลในรายงานการวิ เคราะห์ เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (แบบฟอร์ม3)";
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('front');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$title;	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('front');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$title;		
			save_log($menu_id,$action,$description);
		}
		$this->est_detail->save($_POST);
		set_notify('detail/detail_est', lang('save_data_complete'));
		redirect('detail/detail_est');
	}
	
	public function detail_opr(){
		#$this->db->debug = true;
		$menu_id=61;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$data['result'] = $this->opr_detail->get_row(1);
			$this->template->build('detail_opr',$data);
			}else{
				redirect('front');
			}
	}
	public function detail_opr_form(){
		$menu_id=61;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canedit')!='on')redirect('front');
			$data['result'] = $this->opr_detail->get_row(1);
			$this->template->build('detail_opr_form',$data);
			}else{
				redirect('front');
			}
	}
	public function detail_opr_save(){
		$menu_id=61;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		$title = "จัดการข้อมูลคําอธิบายการกรอกข้อมูลในรายงานการวิ เคราะห์ เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (แบบฟอร์ม3)";
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('front');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$title;	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('front');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$title;		
			save_log($menu_id,$action,$description);
		}
		$this->opr_detail->save($_POST);
		set_notify('detail/detail_opr', lang('save_data_complete'));
		redirect('detail/detail_opr');
	}
//	explanation_risk_manage คำธิบายแนวทางการจัดการความเสี่ยง
	public function explanation_risk_manage(){
		#$this->db->debug = true;
		$menu_id=65;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$data['result'] = $this->explanation_risk->get_row(1);
			$this->template->build('detail_explanation_risk',$data);
			}else{
				redirect('front');
			}
	}
	public function explanation_risk_form(){
		$menu_id=65;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canedit')!='on')redirect('front');
			$data['result'] = $this->explanation_risk->get_row(1);
			$this->template->build('detail_explanation_risk_form',$data);
			}else{
				redirect('front');
			}
	}
	public function explanation_risk_save(){
		$menu_id=65;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		$title = "คำธิบายแนวทางการจัดการความเสี่ยง";
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('front');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$title;	
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('front');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$title;		
			save_log($menu_id,$action,$description);
		}
		$this->explanation_risk->save($_POST);
		set_notify('detail/explanation_risk_manage', lang('save_data_complete'));
		redirect('detail/explanation_risk_manage');
	}
}
?>