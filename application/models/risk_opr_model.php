<?
class risk_opr_model extends MY_Model{
	public $table = 'risk_opr';
    public $join =  ' join risk_est on risk_est.id = risk_opr.risk_est_id 
	                  join section on risk_est.sectionid = section.id 
	                  join objective obj1 on risk_est.objectiveid_1 = obj1.id
	                  join objective obj2 on risk_est.objectiveid_2 = obj2.id
	                  join mission on risk_est.missionid = mission.id';
					  
	public $select = ' risk_opr.*, risk_est.year_data ,risk_est.event_risk , risk_est.manage_risk,risk_est.sectionid,
					   risk_est.objective_3,risk_est.process,
					   section.title as section_title ,obj1.title as objective_title1, obj2.title as objective_title2 ,
					   mission.title as mission_title ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>