<?php
class administratormodel extends CI_Model{
	function __construct(){  
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
    }

    function getGraduates($id){
    	$query = $this->db->select('accounts_fname
    							  , accounts_lname
    							  , accounts_mname
    							  , account_college
                                  , accounts_email')
    					  ->from('tbl_accounts')
    					  ->where('account_college',$id)
                          ->where('accounts_type','ALUMNI')
    					  ->get();
    	return $query->result();
    }
}
?>