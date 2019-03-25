<?php
class grouppagecontroller extends CI_Controller{

	function __construct(){
        parent::__construct();
        $this->load->model('loginmodel');
        $this->load->model('newsfeedmodel');
        $this->load->model('grouppagemodel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function insertPost(){
        $userid = $this->session->tempdata('accountID');
        $groupId = $this->input->post('id');
        $text = $this->input->post('text');
        $date = $this->input->post('datetime');
        $checkusertype = $this->grouppagemodel->checkAccountType($userid);

        if($checkusertype == "STUDENT"){
            $checkifEmpty = $this->grouppagemodel->checkifEmpty($groupId);
            if($checkifEmpty == NULL){
                $lastgroupid = 0;
                $groupIdStringLength = strlen($groupId) + 1;
                $postIncrement = substr($lastgroupid, $groupIdStringLength) + 1;
                $this->grouppagemodel->addPost($userid,$groupId,$text,$date,$postIncrement);
                $data = $this->loginmodel->getDetails($userid);

            }else{
                $lastgroupid = $this->grouppagemodel->getLastPost($groupId);
                $groupIdStringLength = strlen($groupId) + 1;
                $postIncrement = substr($lastgroupid, $groupIdStringLength) + 1;
                $this->grouppagemodel->addPost($userid,$groupId,$text,$date,$postIncrement);

                $data = $this->loginmodel->getDetails($userid);
            }
        }else{
            $checkifEmpty = $this->grouppagemodel->checkifEmpty($groupId);
            if($checkifEmpty == NULL){
                $lastgroupid = 0;
                $groupIdStringLength = strlen($groupId) + 1;
                $postIncrement = substr($lastgroupid, $groupIdStringLength) + 1;
                $this->grouppagemodel->addPost($userid,$groupId,$text,$date,$postIncrement);
                $data = $this->loginmodel->getDetailsProf($userid);

            }else{
                $lastgroupid = $this->grouppagemodel->getLastPost($groupId);
                $groupIdStringLength = strlen($groupId) + 1;
                $postIncrement = substr($lastgroupid, $groupIdStringLength) + 1;
                $this->grouppagemodel->addPost($userid,$groupId,$text,$date,$postIncrement);
                $data = $this->loginmodel->getDetailsProf($userid);
            }
        }
        echo json_encode($data);
    }



    public function createGroup(){
        $userid = $this->session->tempdata('accountID');
        $groupName = $this->input->post('groupName');
        $lastgroupid = $this->grouppagemodel->getLastGroup();
        $groupincreament = substr($lastgroupid, 6) + 1;
        $groupId = $this->grouppagemodel->newGroup($userid,$groupincreament,$groupName);

        echo json_encode($groupId);
    }

    public function loadGroup($groupId) {
        $userid = $this->session->tempdata('accountID');
        $data['userid'] = $userid;
        $data['init'] = $this->grouppagemodel->getGrouppost($groupId);
        $data['events'] = $this->grouppagemodel->getEvents($groupId);
        $data['GroupMembers'] = $this->grouppagemodel->getMembers($groupId);
        $data['groupId'] = $groupId;
        $usertype = $this->grouppagemodel->checkAccountType($userid);
        echo $this->load->view('header', NULL, TRUE);
        if($usertype == "STUDENT"){
            echo $this->load->view('gpagestud', $data, TRUE);
        }else{
            echo $this->load->view('gpageprof',$data,TRUE);
        }

    }


    public function search(){
        $search = $this->input->post('search');
        $groupID = $this->input->post('groupID');
        $checkifExist = $this->grouppagemodel->checkifExist($search);
        if($checkifExist == NULL){
             $this->output->set_status_header('400');
            $details = $this->data['message'] = 'Error';
        }else{
                $data = $this->grouppagemodel->searchMember($search,$groupID);
                if($data == NULL){
                    $details = $this->grouppagemodel->insertMember($search,$groupID);
                }else{
                    $this->output->set_status_header('400');
                    $details = $this->data['message'] = 'Error';
                }
        }

        echo json_encode($details);
    }

    public function removeUser(){


    }

    public function createevent(){
        $accountid = $this->input->post('accountid');
        $id = $this->input->post('id');
        $eventName = $this->input->post('eventName');
        $eventDescr = $this->input->post('eventDescr');
        $eventDate = $this->input->post('eventDate');
        $this->grouppagemodel->addEvent($id,$eventName,$eventDescr,$eventDate,$accountid);
        $data = $this->loginmodel->getDetailsProf($accountid);
        echo json_encode($data);
    }
}

?>
