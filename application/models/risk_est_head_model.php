<?
class risk_est_head_model extends MY_Model{
	public $table = 'risk_est_head';
	/*
	public $join = '
					join risk_est on risk_est_head.id = risk_est.risk_est_head_id
	                join section on risk_est_head.sectionid = section.id 
	                join objective obj1 on risk_est_head.objectiveid_1 = obj1.id
	                join objective obj2 on risk_est_head.objectiveid_2 = obj2.id
	                join mission on risk_est_head.missionid = mission.id
	                join risk_type on risk_est.risk_type_id = risk_type.id';
	 * 
	 */
	public $join = '
					left join risk_est on risk_est_head.id = risk_est.risk_est_head_id 
	                left join section on risk_est_head.sectionid = section.id 
	                left join objective obj1 on risk_est_head.objectiveid_1 = obj1.id
	                left join objective obj2 on risk_est_head.objectiveid_2 = obj2.id
	                left join mission on risk_est_head.missionid = mission.id';
	public $select = 'distinct risk_est_head.* ,section.title as section_title , 
					  obj1.title as objective_title1, obj2.title as objective_title2 , 
					  mission.title as mission_title ';
	
    function __construct()
    {
        parent::__construct();
    }
	
}
?>