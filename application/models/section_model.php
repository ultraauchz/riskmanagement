<?
class section_model extends MY_Model{
	public $table = 'section';
	public $join =' left join division on section.divisionid = division.id ';
	public $select = 'section.* , division.title division_title ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>