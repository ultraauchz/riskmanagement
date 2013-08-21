<?
class est_checklist_model extends MY_Model{
	public $table = 'est_checklist';
	public $join = ' join section on est_checklist.sectionid = section.id 
					 join section_type on section.section_type_id = section_type.id';
	public $select = 'est_checklist.*, section_type.title as section_type_title , section.title as section_title';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>