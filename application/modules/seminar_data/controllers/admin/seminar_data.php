<?php
class seminar_data extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('seminar_data_model','seminar_data');//ส่วนของก (ชิ้อ model,ชื้อฐานจ้อมูล)
        $this->load->model('seminar_regist_model','seminar_regist');//ส่วนของก
    }

    function index()
    {
        //$data['seminar'] = $this->seminar_data->get(FALSE,TRUE);
		$data['seminar'] = $this->seminar_data->get("SELECT seminar_data.id,seminar_data.title,seminar_end_date,seminar_start_date,COUNT(seminar_id) as cnt
FROM seminar_data left JOIN seminar_regist
on seminar_data.id = seminar_regist.seminar_id
GROUP BY id");
       	$data['pagination'] = $this->seminar_data->pagination();		
        $this->template->build('admin/index',$data);
    }
	
	function form($id=false)
    {
        $data['seminar'] = $this->seminar_data->get_row($id);
		$data['resgist'] = $this->seminar_regist->where('seminar_id='.$id)->get(FALSE,TRUE);
       // $data['pagination'] = $this->seminar_data->pagination();		
        $this->template->build('admin/form',$data);
    }
	function report($id=false)
	{
        $data['seminar'] = $this->seminar_data->get_row($id);
		$data['resgist'] = $this->seminar_regist->where('seminar_id='.$id)->get(FALSE,TRUE);
	 $this->template->build('admin/report',$data);	
	}
function form_one($id=false)
{
	  $data['seminar'] = $this->seminar_data->get_row($id);
		$data['resgist'] = $this->seminar_regist->get(FALSE,TRUE);
       // $data['pagination'] = $this->seminar_data->pagination();		
        $this->template->build('admin/form_one',$data);
}
	
	function save(){
		
		$this->seminar_regist->delete('seminar_id',$_POST['seminar_id']);
		if(isset($_POST['first_name'])){
				foreach($_POST['first_name'] as $key=>$item){
					if($_POST['first_name'][$key]){
						if($_POST['first_name'][$key]!=''){
						$data['seminar_id'] = @$_POST['seminar_id'];
						$data['title'] = @$_POST['title'][$key];
						$data['first_name'] = @$_POST['first_name'][$key];
						$data['last_name'] = @$_POST['last_name'][$key];
						$data['position'] = @$_POST['position'][$key];							
						$data['position_bussiness'] = @$_POST['position_bussiness'][$key];
						$data['institution'] = @$_POST['institution'][$key];
						$data['email'] = @$_POST['email'][$key];
						$data['phone'] = @$_POST['phone'][$key];							
						$data['mobile'] = @$_POST['mobile'][$key];
						$this->seminar_regist->save($data);
						}
					}
				}	
			}
		
		redirect('seminar_data/admin/seminar_data/index');
		
	}
}