<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function Dashboard()
    {
        parent::__construct();
        
        $this->_is_logged_in();
    }
	
    function index()
    {   
        $this->load->view('dashboard');
    }

}