<?
class users_model extends MY_Model{
	public $table = 'users';
	public $join =' left join usertype on users.usertype = usertype.id ';
	public $select = 'users.* , usertype.name usertype_name ';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>