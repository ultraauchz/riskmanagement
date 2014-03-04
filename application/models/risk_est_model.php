<?
class risk_est_model extends MY_Model{
	public $table = 'risk_est';
	/*
	public $join = '
	                join section on risk_est.sectionid = section.id 
	                join objective obj1 on risk_est.objectiveid_1 = obj1.id
	                join objective obj2 on risk_est.objectiveid_2 = obj2.id
	                join mission on risk_est.missionid = mission.id
	                join risk_type on risk_est.risk_type_id = risk_type.id';
	public $select = 'risk_est.*, section.title as section_title , 
					  obj1.title as objective_title1, obj2.title as objective_title2 , 
					  mission.title as mission_title , risk_type.title as risk_type_title ';
	
	 * 
	 */
	 public $join = '
	 				join risk_est_head on risk_est.risk_est_head_id = risk_est_head.id 
	                join section on risk_est_head.sectionid = section.id 
	                join objective obj1 on risk_est_head.objectiveid_1 = obj1.id
	                join objective obj2 on risk_est_head.objectiveid_2 = obj2.id
	                join mission on risk_est_head.missionid = mission.id
	                join risk_type on risk_est.risk_type_id = risk_type.id';
	public $select = 'risk_est.*, risk_est_head.year_data, section.title as section_title ,
					  obj1.title as objective_title1, obj2.title as objective_title2 , 
					  risk_est_head.objective_3 , risk_est_head.process ,
					  mission.title as mission_title , risk_type.title as risk_type_title,
					  risk_est_head.sectionid ';
    function __construct()
    {
        parent::__construct();
    }
}
?>