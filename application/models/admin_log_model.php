<?
class admin_log_model extends MY_Model{
	public $table = 'admin_log';
	public $join = ' left join users on admin_log.user_id = users.id ';
	public $select = 'admin_log.*, users.username ';
    function __construct()
    {
        parent::__construct();
    }
}
?>