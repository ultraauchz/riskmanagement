<?php
class seminar_data extends Front_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('seminar_data_model','seminar_data');//ส่วนของก
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
        $this->template->build('index',$data);
    }
	

	function form($sem_id,$id=false)
	{
	  	$data['seminar'] = $this->seminar_data->get_row($sem_id);
		if($id>0)$data['resgist'] = $this->seminar_regist->get_row($id);
       // $data['pagination'] = $this->seminar_data->pagination();		
        $this->template->build('form_one',$data);
	}
	function report($id=false)
	{
        $data['seminar'] = $this->seminar_data->get_row($id);
		$data['resgist'] = $this->seminar_regist->where('seminar_id='.$id)->get(FALSE,TRUE);
	 $this->template->build('report',$data);	
	}
	
	function save(){
	
		$this->seminar_regist->save($_POST);//////
		redirect('seminar_data/index')	;/////
		
		
	}
	function checkName(){
		$id=$this->seminar_regist->get("select * from seminar_regist where first_name ='".$_GET['first_name']."'");
		echo ($id)? "false":"true";
	}
	function date()
	{
	$id=$this->seminar_regist->db_to_th($datetime = '', $time = TRUE ,$format = 'F');
	}
}