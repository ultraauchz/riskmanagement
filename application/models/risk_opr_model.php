<?
class risk_opr_model extends MY_Model{
	public $table = ' risk_opr ';
    public $join =  ' join risk_est on risk_est.id = risk_opr.risk_est_id
    				  join division on risk_est.divisionid = division.id 
	                  join section on risk_est.sectionid = section.id 
	                  join objective obj1 on risk_est.objectiveid_1 = obj1.id
	                  join objective obj2 on risk_est.objectiveid_2 = obj2.id
	                  join objective obj3 on risk_est.objectiveid_3 = obj3.id
	                  join mission on risk_est.missionid = mission.id
	                  join process on risk_est.processid = process.id ';
	public $select = ' risk_opr.* ,risk_est.*, division.title as division_title , section.title as section_title , 
					  obj1.title as objective_title1, obj2.title as objective_title2 , obj3.title as objective_title3 , 
					  mission.title as mission_title , process.title as process_title ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>