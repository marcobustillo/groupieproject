<?php

class grouppagemodel extends CI_Model{

	function __construct(){  
        parent::__construct();
       // $this->output->enable_profiler(TRUE);
    }

    function getGrouppost($groupid){
	   $query = $this->db->select('accounts_fname
                            , accounts_lname
                            , post_content
                            , post_date')
                         ->from('tbl_groups
                            , tbl_accounts
                            , tbl_post')
                         ->where('tbl_groups.groups_ID',$groupid)
                         ->where('tbl_groups.groups_ID = tbl_post.groups_ID')
                         ->where('tbl_post.account_ID = tbl_accounts.account_ID')
                         ->order_by('post_date','desc')
                         ->get();
        return $query->result();
    }

    function getEvents($groupid){
        $query = $this->db->select('events_name
                                  , events_description
                                  , events_date
                                  , accounts_fname
                                  , accounts_lname')
                          ->from('tbl_events')
                          ->join('tbl_accounts','tbl_accounts.account_ID = tbl_events.account_ID')
                          ->where('groups_ID',$groupid)
                          ->get();
        return $query->result();
    }

    function addPost($userid,$groupId,$text,$date,$increment){
        $this->db->set('account_ID',$userid)
                 ->set('groups_ID',$groupId)
                 ->set('post_content',$text)
                 ->set('post_date',$date)
                 ->set('post_ID',$groupId.'-'.$increment)
                ->insert('tbl_post');
    }

    function addEvent($groupid,$eventName,$eventDescr,$eventDate,$accountid){
        $this->db->set('groups_ID',$groupid)
                 ->set('events_name',$eventName)
                 ->set('events_description',$eventDescr)
                 ->set('events_date',$eventDate)
                 ->set('account_ID',$accountid)
                 ->insert('tbl_events');
    }

     function insertMember($search,$groupID){
        $this->db->set('accounts_ID',$search)
                 ->set('groups_ID',$groupID)
                 ->insert('tbl_groups_member');
        $query = $this->db->select('accounts_fname
                         , accounts_lname')
                  ->from('tbl_accounts')
                  ->where('account_ID',$search)
                  ->get();
        return $query->result();
    }

    function newGroup($userid,$groupincrement,$groupName){
        $this->db->set('groups_ID','00-00-'.$groupincrement)
                 ->set('groups_Name',$groupName)
                 ->insert('tbl_groups');
        $this->db->set('accounts_ID',$userid)
                 ->set('groups_ID','00-00-'.$groupincrement)
                 ->insert('tbl_groups_member');
        return '00-00-'.$groupincrement;
    }

    function newGroup2($groupID){
      $query = $this->db->select('*')
               ->from('tbl_groups')
               ->where('groups_ID',$groupID)
               ->get();
      return $query->result();
    }

    function getLastPost($groupId){
        $query = $this->db->select('post_ID')
                          ->from('tbl_post')
                          ->where('tbl_post.groups_ID',$groupId)
                          ->order_by('LENGTH(post_ID)','desc')
                          ->order_by('post_ID','desc')
                          ->limit(1)
                          ->get();

        $query_row = $query->row();

        return $query_row->post_ID;
    }

    function getLastGroup(){
        $query = $this->db->select('groups_ID')
                          ->from('tbl_groups')
                          ->order_by('LENGTH(groups_ID)','desc')
                          ->order_by('groups_ID','desc')
                          ->limit(1)
                          ->get();
        $query_row = $query->row();
        return $query_row->groups_ID;                  
    }

    function checkifEmpty($groupid){
        $query = $this->db->query('SELECT * from `tbl_post` WHERE groups_ID = "'.$groupid.'"');
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return NULL;
        }
    }

    function checkAccountType($userid){
        $query = $this->db->select('accounts_type')
                 ->from('tbl_accounts')
                 ->where('account_ID',$userid)
                 ->get();
        $query_row = $query->row();
        return $query_row->accounts_type;
    }

    function checkifExist($search){
        $query = $this->db->select('account_ID')
                          ->from('tbl_accounts')
                          ->where('account_ID',$search)
                          ->get();
        return $query->result();
    }

    function searchMember($search,$groupID){
        $query = $this->db->select('accounts_fname
                                  , accounts_lname,')
                          ->from('tbl_accounts,tbl_groups_member,tbl_groups')
                          ->where('tbl_groups_member.accounts_ID',$search)
                          ->where('tbl_groups_member.groups_ID',$groupID)
                          ->where('tbl_groups_member.accounts_ID = tbl_accounts.account_ID')
                          ->where('tbl_groups.groups_ID = tbl_groups_member.groups_ID')
                          ->get();
        return $query->result();
    }

    function getMembers($groupID){
        $query = $this->db->select('accounts_fname
                                  , accounts_lname
                                  , course_abbv
                                  , accounts_email')
                          ->from('tbl_accounts,tbl_groups_member,tbl_course')
                          ->where('tbl_groups_member.groups_ID',$groupID)
                          ->where('tbl_accounts.account_ID = tbl_groups_member.accounts_ID')
                          ->where('tbl_course.course_ID = tbl_accounts.account_course')
                          ->get();
        return $query->result();
    }
}