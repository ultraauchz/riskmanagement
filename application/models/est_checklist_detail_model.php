<?
class est_checklist_detail_model extends MY_Model{
	public $table = 'est_checklist_detail';
	//public $join = 'join est_checklist on est_checklist_detail.pid = est_checklist.id ';
	//public $select = 'est_checklist_detail.*, est_checklist.* ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>