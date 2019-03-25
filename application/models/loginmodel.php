<?php
class loginmodel extends CI_Model{

	  function __construct(){  
        parent::__construct();
      //  $this->output->enable_profiler(TRUE);
    }

	function validateAccount($userid,$userpw){
		$query = $this->db->query('SELECT * from `tbl_accounts` WHERE account_ID = "'.$userid.'" AND password = "'.$userpw.'"');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	function getGroups($userid){
		$query = $this->db->query('SELECT * from `tbl_groups` INNER JOIN tbl_groups_member ON tbl_groups_member.groups_id = tbl_groups.groups_id WHERE tbl_groups_member.accounts_ID = "'.$userid.'"');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	function getPosts($userid){
		$query = $this->db->query('SELECT * from tbl_post INNER JOIN tbl_groups_member ON tbl_groups_member.group_id = tbl_post.group_id INNER JOIN tbl_accounts on tbl_accounts.accountID = tbl_post.ID INNER JOIN tbl_groups ON tbl_groups.group_ID = tbl_groups_member.group_ID WHERE tbl_groups_member.account_ID = "'.$userid.'"');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
	}

	function getDetails($userid){
		$this->db->select('accounts_fname,accounts_lname,accounts_email,accounts_type,course_abbv');
		$this->db->from('tbl_accounts');
		$this->db->join('tbl_course', 'tbl_course.course_id = tbl_accounts.account_course');
		$this->db->where('account_ID', $userid);
		$query = $this->db->get();
		return $query->row();

	}

	function getDetailsProf($userid){
		$this->db->select('accounts_fname,accounts_lname,accounts_email,accounts_type');
		$this->db->from('tbl_accounts');
		$this->db->where('account_ID', $userid);
		$query = $this->db->get();
		return $query->row();
	}

	function getUserType($userid){
		$this->db->select('accounts_type');
		$this->db->from('tbl_accounts');
		$this->db->where('account_ID', $userid);
		$query = $this->db->get();
		return $query->row();
	}
		
}