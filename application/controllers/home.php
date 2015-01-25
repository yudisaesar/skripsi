<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    function Home()
    {
        parent::__construct();
    }

    function index()
     {
   if($this->session->userdata('logged_in'))
   {
           $this->load->view('home');
   }
   else 
   {
     redirect('login', 'refresh');
   }
 }

}
   
    function page_not_access()
    {
        $this->load->view('page_not_access');
    }
    function logout()
 {
      $this->session->sess_destroy();
   redirect('home', 'refresh');
     
 }
