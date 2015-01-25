<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Account extends MY_Controller {
     
    function Account()
    {
        parent::__construct();
        //Check login
        $this->_is_logged_in();
        
        //Load model
        $this->load->model('user_mod');
    }
    
    public function index()
    {
        //$this->_is_administrator();
        
        $data['rows'] = $this->user_mod->get_users();
        $data['breadcrumb'] = $this->breadcrumb();
        $this->load->view('user', $data);
    }
     
    public function create()
    {
        //$this->_is_administrator();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('full_name', 'full name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('password_repeat', 'Retype Password', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $full_name = $this->input->post("full_name");
            $role = $this->input->post("role");

            $is_user  = $this->user_mod->get_byemail($email);

            //Jika email belum ada di database
            if(!$is_user)
            {
               $data_post = array (
                   'email' => $email,
                   'password' => $this->_encode_password($password),
                   'full_name' => $full_name,
                   'role' => $role,
                   'create_time' => date_now(true)
               );

                $user_id = $this->user_mod->add($data_post);
                if($user_id){
                    redirect('account');
                }else {
                    $data["error_message"] = "Terdapat masalah pada server, silahkan ulangi";
                }
            }
            else
            {
                $data["error_message"] = "Email already used by another user.";
            }
        }

        $data['role'] = $this->role->get_role();
        $data['breadcrumb'] = $this->breadcrumb('create');
        $this->load->view('user_add',$data);
    }

    public function edit($id=0)
    {
        //$this->_is_administrator();
        
        $row = $this->user_mod->get_byuid($id);
        if(!$row) {
            redirect('account');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('full_name', 'full name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'min_length[4]|matches[password_repeat]');
        $this->form_validation->set_rules('password_repeat');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post("email");
            $password = $this->input->post("password");
            $full_name = $this->input->post("full_name");
            $role = $this->input->post("role");

            $is_user = FALSE;
            if($email != $row->email) {
                $is_user  = $this->user_mod->get_byemail($email);
            }

            //Jika email belum ada di database
            if(!$is_user)
            {
                $data_edit = array (
                    'email' => $email,
                    'full_name' => $full_name,
                    'role' => $role,
                );

                if($password != '') {
                    $data_edit['password'] = $this->_encode_password($password);
                }

                $this->user_mod->update($data_edit, $row->id);
                redirect('account');
            }
            else
            {
                $data["error_message"] = "Email already used by another user.";
            }
        }

        $data['row'] = $row;
        $data['role'] = $this->role->get_role();
        $data['breadcrumb'] = $this->breadcrumb('edit');
        $this->load->view('user_edit',$data);
    }
     
    

    private function breadcrumb($action='index')
    {
        $data = array();
        $data[] = array('url' => site_url('account'),'title'=>'User Accounts'); 
        
        //Untuk halaman create / add
        if($action=='create'){
            $data[] = array('url' => FALSE,'title'=>'Add'); 
        }
        
        //Untuk halaman edit
        if($action=='edit'){
            $data[] = array('url' => FALSE,'title'=>'Edit'); 
        }
        
        if($action=='change_password'){
            $data[] = array('url' => FALSE,'title'=>'Change Password'); 
        }
        
        if($action=='profile'){
            $data[] = array('url' => FALSE,'title'=>'Profile'); 
        }
        
        //Untuk halaman index
        if($action=='index'){
            $data[] = array('url' => FALSE,'title'=>'List'); 
        }
        
        return $data;
    }
    
    function change_password()
    {
        $user = $this->user;
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger error col-md-offset-3 col-md-6">', '</div>');
        $this->form_validation->set_rules('current', 'Current password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

        $data["status"] = "";
        if ($this->form_validation->run() == TRUE)
        {
            $current = $this->input->post("current");
            $password = $this->input->post("password");
            $is_true = $user->password == $this->_encode_password($current) ? TRUE : FALSE;

            if($is_true)
            {
                $data_update = array(
                    'password' => $this->_encode_password($password)
                );

                $this->user_mod->update($data_update,$user->id);
                 $data['status'] = "success";
            }
            else{
                $data['status'] = "error";
            }
        }
        $data['breadcrumb'] = $this->breadcrumb('change_password');
        $this->load->view('change_password',$data);
    }
    
    function profile()
    {
        $row = $this->user;
        $data['row'] = $row;
        $data['breadcrumb'] = $this->breadcrumb('profile');
        $this->load->view('profile',$data);
    } 
}