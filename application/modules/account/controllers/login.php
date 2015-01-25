<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_mod','',TRUE);
        $this->_is_login();
    }

    function index()
    {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run()) 
        {
            $url = $this->input->get("url");
            //Jika berhasil user akan di arahkan ke private area 
            if(!empty($url))
                redirect($url);
            else
                $this->_redirect_home();
        }

        $this->load->view('login');
    }

    function check_database($password)
    {
        //validasi field terhadap database 
        $email = $this->input->post('email');

        //query ke database
        $result = $this->login_mod->login($email, $this->_encode_password($password));

        if($result) 
        {
            if($result->is_lock)
            {
                $this->form_validation->set_message('check_database', 'User akun anda dalam masalah, silahkan hubungi administrator!');
                return false;
            }
            else{
                $data_session = array(
                    'user_id' => $result->id,
                    'is_logged_in' => true,
                    'fullname' => $result->full_name,
                    'role' => $result->role
                );
                $this->set_session($data_session);
                return TRUE;
            }
        } 
        else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}