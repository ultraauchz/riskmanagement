<?
class risk_opr_model extends MY_Model{
	public $table = 'risk_opr';
    public $join = 'join risk_est on risk_est.id = risk_opr.risk_est_id';
	public $select = 'risk_opr.* , risk_est.*';
	
    function __construct()
    {
        parent::__construct();
    }
}
?>