<?php
class est_title extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('est_title_model','est_title');
	}
	public $menu_id = 54;
	public $urlpage = 'est_title';
	public function index($pid=0)
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		if(is_login()){
			if(permission($menu_id, 'canview')!='on')redirect('front');
			$condition = "";
			$condition = " pid = ".$pid;
			if(@$pid > 0){
				$data['main'] = @$this->est_title->get_row($pid);				
				if($data['main']['pid'] == 0){
				$data['main'] = @$this->est_title->get_row($pid);
				}else if($data['main']['pid'] != 0 ){
				$condition1 = "pid = 0 AND id = ". $data['main']['pid'];
				$data['main'] = @$this->est_title->where($condition1)->get_row();
				$condition2 = "id =". @$pid;
				$data['main2'] = @$this->est_title->where($condition2)->get_row();
				}
				
			}else{
				$data['main'] = @$this->est_title->get_row($pid);	
			}
			$data['pid'] = $pid;
			$data['result'] = $this->est_title->where($condition)->order_by('id','desc')->get();
			$data['pagination'] = $this->est_title->pagination();					
			$this->template->build('index',$data);
		}
		else{
			
			redirect('front');	
		}
	}	
	function form($pid=0,$id=false)
	{
		$menu_id=$this->menu_id;
		$data['menu_id'] = $menu_id;
		$data['urlpage'] = $this->urlpage;
		$menu_name = GetMenuProperty($menu_id,'title');		
		$data['id']=$id;
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('front');		
			$data['pid'] = $pid;
			if(@$pid > 0){
				$data['main'] = @$this->est_title->get_row($pid);				
				if($data['main']['pid'] == 0){
				$data['main'] = @$this->est_title->get_row($pid);
				
				}else if($data['main']['pid'] != 0 ){
				$condition1 = "pid = 0 AND id = ". $data['main']['pid'];
				$data['main'] = @$this->est_title->where($condition1)->get_row();
				$condition2 = "id =". @$pid;
				$data['main2'] = @$this->est_title->where($condition2)->get_row();
				}
				
			}else{
				$data['main'] = @$this->est_title->get_row($pid);	
			}
			$data['rs'] = @$this->est_title->get_row($id);
											
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
			if(permission($menu_id, 'canedit')=='')redirect('est_title');
			$action='Update';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('est_title');	
			$action='Add';
			$description = $action.' '.$menu_name.' : '.$_POST['title'];		
			save_log($menu_id,$action,$description);
		}
		$id = $this->est_title->save($_POST);		
		set_notify('est_title', lang('save_data_complete'));
		redirect('est_title/index/'.$_POST['pid']);
	} 
	function delete($pid=false,$id=false){
		$menu_id=$this->menu_id;
		$menu_name = GetMenuProperty($menu_id,'title');		
		if(permission($menu_id, 'candelete')=='')redirect('mission');		
		$est_title = $this->est_title->get_row($id);
			$condition1 = "pid = ".$id;
		$est_title_1 = $this->est_title->where($condition1)->get();
		
		foreach($est_title_1 as $row){
			$condition2 = "pid = ".$row['id'];
			$est_title_2 = $this->est_title->where($condition2)->get_row();
			if($row['id'] != ''){
				$this->db->Execute('delete from est_title where pid = ?',$row['id']);
				$this->db->Execute('delete from est_title where pid = ?',$id);
			}
		}
		$action='Delete';
		$description = $action.' '.$menu_name.' : '.$est_title['title'];		
		save_log($menu_id,$action,$description);
		$this->est_title->delete($id);
		redirect('est_title/index/'.$pid);
	}
}
?>