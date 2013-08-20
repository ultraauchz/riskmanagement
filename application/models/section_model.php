<?
class section_model extends MY_Model{
	public $table = 'section';
	public $join =' left join section_type on section.section_type_id = section_type.id ';
	public $select = 'section.* , section_type.title section_type_title ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>