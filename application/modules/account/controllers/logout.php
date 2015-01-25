<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
     $data_session = array(
         'email' => '',
         'user_id' => '',
         'is_logged_in' => false
     );
     $this->session->unset_userdata($data_session);
     redirect('login', 'refresh');
 }

}

