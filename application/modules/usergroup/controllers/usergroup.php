<?php
class usergroup extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_menu_model','admin_menu');
		$this->load->model('usertype_model','usertype');
		$this->load->model('usertype_detail_model','usertype_detail');		
	}
	
	public function index()
	{
		$menu_id=1;
		$data['menu_id'] = $menu_id;
		$data['urlpage']="usergroup";
		if(is_login()){
			if(permission($menu_id, 'canview')=='')redirect('admin');
			$condition = "1=1";
			//$condition .= @$_GET['type']!='' ? " AND page='".$_GET['type']."'" : "";
			$data['result'] = $this->usertype->order_by('id','desc')->get();
			$data['pagination']=$this->usertype->pagination();
			$this->template->build('index',$data);
		}
		else{			
			redirect('admin');	
		}
	}
	
	public function form($id=FALSE)
	{
		$menu_id=1;
		$curr_menu = $this->db->getone("SELECT title FROM admin_menu where id=".$menu_id);
		//$menu_name = array('','Admin Group','Admin User','Bank','Banners','Contact List','Compatible Products','Member','News','Newsletter','Order','Product Category','Product','Promotion Coupon','Shipping Rate','Transfer List','System Config','Stock Notification','Admin Log','Admin Export','Promotion News');
		//$data['admin_menu'] = $this->admin_menu->order_by('title','asc')->get(FALSE,TRUE);
		//if(permission($menu_id, 'canview')=='')redirect('admin');
		//$data['menu_name']=$menu_name;
		$data['id'] = $id;
		$data['rs'] = @$this->usertype->get_row($id);
		if($id>0){
		$action='View';
		$description = $action.' '.$curr_menu.' : '.$data['rs']['name'];		
		save_log($menu_id,$action,$description);			
		}
		$this->template->build('form',$data);
	}
	
	public function save(){
		//$this->db->debug = true;		
		$menu_id=1;
		$curr_menu = $this->db->getone("SELECT title FROM admin_menu where id=".$menu_id);
		
		if($_POST['id']!='')
		{
			if(permission($menu_id, 'canedit')=='')redirect('usergroup');
			$action='Update';
			$description = 'Update '.$curr_menu.' : '.$_POST['name'];
			
		}else{
			if(permission($menu_id, 'canadd')=='')redirect('usergroup');
			$action='Add';
			$description = 'Add '.$curr_menu.' : '.$_POST['name'];	
		}
		
		$id = $this->usertype->save($_POST);		
		$this->usertype_detail->delete("usertype_id",$id);		
		$admin_menu = $this->admin_menu->get(FALSE,TRUE);
		foreach($admin_menu as $item):
			$data['usertype_id'] = $id;
			$data['menu_id']=$item['id'];
			$data['canview'] = @$_POST['canview'.$item['id']];
			$data['canadd'] = @$_POST['canadd'.$item['id']];
			$data['canedit'] = @$_POST['canedit'.$item['id']];
			$data['candelete'] = @$_POST['candelete'.$item['id']];
			$this->usertype_detail->save($data);
		endforeach;
		save_log($menu_id,$action,$description);	
		//set_notify('success', lang('save_data_complete'));
		redirect('usergroup');
	} 
	function delete($id=FALSE){
		$menu_id=1;
		$curr_menu = $this->db->getone("SELECT title FROM admin_menu where id=".$menu_id);
		$action='Delete';				
		if(permission($menu_id, 'candelete')=='')redirect('admin_usergroup');
		if($id){
			$usertype = $this->usertype->get_row($id);
			$description = 'Delete '.$curr_menu.' : '.$usertype['name'];			
			$this->usertype_detail->delete('usertype_id',$id);
			$this->usertype->delete($id);
			save_log($menu_id,$action,$description);	
			//set_notify('success', lang('delete_data_complete'));
		}
		redirect('admin_usergroup');
	}
}
?>