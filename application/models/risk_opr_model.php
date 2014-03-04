<?
class risk_opr_model extends MY_Model{
	public $table = 'risk_opr';
    public $join =  '   
    				  join risk_est on risk_est.id = risk_opr.risk_est_id 
    				  inner join risk_est_head on risk_est.risk_est_head_id = risk_est_head.id
	                  join section on risk_est_head.sectionid = section.id 
	                  join objective obj1 on risk_est_head.objectiveid_1 = obj1.id
	                  join objective obj2 on risk_est_head.objectiveid_2 = obj2.id
	                  join mission on risk_est_head.missionid = mission.id';
					  
	public $select = ' risk_opr.*, risk_est_head.year_data ,risk_est.event_risk , risk_est.manage_risk,risk_est_head.sectionid,
					   risk_est_head.objective_3,risk_est_head.process,
					   section.title as section_title ,obj1.title as objective_title1, obj2.title as objective_title2 ,
					   mission.title as mission_title ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>