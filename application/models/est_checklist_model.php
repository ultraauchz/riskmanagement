<?
class est_checklist_model extends MY_Model{
	public $table = 'est_checklist';
	public $join = 'join division on est_checklist.divisionid = division.id 
	                join section on est_checklist.sectionid = section.id ';
	public $select = 'est_checklist.*, division.title as division_title , section.title as section_title';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>