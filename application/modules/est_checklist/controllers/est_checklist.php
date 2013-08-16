<?php
class est_checklist extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('est_checklist_model','estchecklist');
		$this->load->model('est_title_model','est_title');
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
			$condition = "";
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
			$data['rs'] = @$this->estchecklist->get_row($id);								
			$this->template->build('form',$data);
			
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
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('est_checklist');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}
		$id = $this->estchecklist->save($_POST);		
		set_notify('est_title', lang('save_data_complete'));
		redirect('est_checklist');
	} 
	function delete($id=FALSE){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('mission');		
		$mission = $this->estchecklist->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$mission['est_name'];		
		save_log($menu_id,$action,$description);
		$this->estchecklist->delete($id);
		redirect('est_checklist');
	}
	
	function load_est_detail_form(){
		$year_data = @$_POST['year_data'];
		$data['year_data'] = $year_data;
		if($year_data != ''){
		$data['main_title'] = $this->est_title->where('pid=0 and year_data='.$year_data)->get(false,true);
		}
		$this->load->view('est_detail_form',$data);
		
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