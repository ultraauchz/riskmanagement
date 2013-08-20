<?
class est_checklist_model extends MY_Model{
	public $table = 'est_checklist';
	public $join = 'join section_type on est_checklist.section_type_id = section_type.id 
	                join section on est_checklist.sectionid = section.id ';
	public $select = 'est_checklist.*, section_type.title as section_type_title , section.title as section_title';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>