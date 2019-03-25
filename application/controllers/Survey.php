<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Survey extends CI_Controller{
	function __construct(){  
        parent::__construct();
       	$this->load->model('surveymodel');
    }


    public function initialize(){

    	
    }

}
?>