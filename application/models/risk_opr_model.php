<?
class risk_opr_model extends MY_Model{
	public $table = 'risk_opr';
    public $join =  ' join risk_est on risk_est.id = risk_opr.risk_est_id 
	                  join section on risk_est.sectionid = section.id 
	                  join objective obj1 on risk_est.objectiveid_1 = obj1.id
	                  join objective obj2 on risk_est.objectiveid_2 = obj2.id
	                  join objective obj3 on risk_est.objectiveid_3 = obj3.id
	                  join mission on risk_est.missionid = mission.id
	                  join process on risk_est.processid = process.id ';
					  
	public $select = ' risk_opr.* ,risk_est.*, section.title as section_title , 
					  obj1.title as objective_title1, obj2.title as objective_title2 , obj3.title as objective_title3 , 
					  mission.title as mission_title , process.title as process_title ,
					  (select fl_import  from file_upload where id = risk_opr.fl_upload_id1 ) as fl_import1 ,
					  (select fl_import  from file_upload where id = risk_opr.fl_upload_id2 ) as fl_import2 ,
					  (select fl_import  from file_upload where id = risk_opr.fl_upload_id3 ) as fl_import3 , 
					  (select fl_import  from file_upload where id = risk_opr.fl_upload_id4 ) as fl_import4 ,
					  (select fl_name  from file_upload where id = risk_opr.fl_upload_id1 ) as fl_name1 ,
					  (select fl_name  from file_upload where id = risk_opr.fl_upload_id2 ) as fl_name2 ,
					  (select fl_name  from file_upload where id = risk_opr.fl_upload_id3 ) as fl_name3 , 
					  (select fl_name  from file_upload where id = risk_opr.fl_upload_id4 ) as fl_name4 ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>