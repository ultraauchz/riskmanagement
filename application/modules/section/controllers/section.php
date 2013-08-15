<?php
class section extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('section_model','section');
	}
	public $menu_id = 44;
	public function index()
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="section";
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$condition = "";
			if(@$_GET['division_id'] !='' && @$_GET['section_id'] != '')
			{
				$condition = "section.divisionid ='".$_GET['division_id']."' AND section.id ='".$_GET['section_id']."' ";
			}
			else if(@$_GET['division_id'] !='')
			{
				$condition = "section.divisionid ='".$_GET['division_id']."' ";
			}else if(@$_GET['section_id'] !=''){
				$condition = "section.id ='".$_GET['section_id']."' ";
			}
				
			$data['result'] = $this->section->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->section->pagination();					
			$this->template->build('index',$data);
		}else{
			
			redirect('front');	
		}
	}	
	function form($id=false)
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="section";
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');			
			$data['rs'] = @$this->section->get_row($id);								
			$this->template->build('form',$data);
			
			if($id>0){
			$action='View';
			$description = $action.' '.$menu_name.' : '.$data['rs']['title'];		
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
			if(permission($menu_id, 'canedit')=='')redirect('section');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('section');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}
		$id = $this->section->save($_POST);		
		set_notify('success', lang('save_data_complete'));
		redirect('section');
	} 
	function delete($id=FALSE){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('section');		
		$section = $this->section->get_row($id);
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$section['title'];		
		save_log($menu_id,$action,$description);
		$this->section->delete($id);
		redirect('section');
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