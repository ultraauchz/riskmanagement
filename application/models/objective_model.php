<?
class objective_model extends MY_Model{
	public $table = 'objective';
	public $join = ' left join objective_type on objective.objective_type = objective_type.id ';
	public $select = 'objective.*, objective_type.title as objective_type_title ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>