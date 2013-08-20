<?
class risk_est_model extends MY_Model{
	public $table = 'risk_est';
	public $join = '
	                join section on risk_est.sectionid = section.id 
	                join objective obj1 on risk_est.objectiveid_1 = obj1.id
	                join objective obj2 on risk_est.objectiveid_2 = obj2.id
	                join objective obj3 on risk_est.objectiveid_3 = obj3.id
	                join mission on risk_est.missionid = mission.id
	                join process on risk_est.processid = process.id ';
	public $select = 'risk_est.*, section.title as section_title , 
					  obj1.title as objective_title1, obj2.title as objective_title2 , obj3.title as objective_title3 , 
					  mission.title as mission_title , process.title as process_title ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>