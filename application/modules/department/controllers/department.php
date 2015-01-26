<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class department extends MY_Controller {
     
    function department()
    {
        parent::__construct();
        //Check login
        $this->_is_logged_in();
        
        //Load model
        $this->load->model('department_mod');
    }
    
    public function index()
    {
        //$this->_is_administrator();
        
        $data['rows'] = $this->department_mod->get_department();
        $data['breadcrumb'] = $this->breadcrumb();
        $this->load->view('department', $data);
    }
     
    public function create()
    {
        //$this->_is_administrator();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('abbr', 'abbr', 'required');
        $this->form_validation->set_rules('desc', 'desc', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $name = $this->input->post("name");
            $abbr = $this->input->post("abbr");
            $desc = $this->input->post("desc");

               $data_post = array (
                   'name' => $name,
                   'abbr' => $abbr,
                   'desc' => $desc,
               );

                $this->department_mod->add($data_post);
                redirect('department');
                

        }
        $data['breadcrumb'] = $this->breadcrumb('create');
        $this->load->view('department_add',$data);
    }

    public function edit($id=0)
    {
        //$this->_is_administrator();
        
        $row = $this->department_mod->get_byuid($id);
        if(!$row) {
            redirect('department');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('abbr', 'abbr', 'required');
        $this->form_validation->set_rules('desc', 'desc', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $name = $this->input->post("name");
            $abbr = $this->input->post("abbr");
            $desc = $this->input->post("desc");

                $data_edit = array (
                   'name' => $name,
                   'abbr' => $abbr,
                   'desc' => $desc,
                );

                $this->department_mod->update($data_edit, $row->id);
                redirect('department');
            }
   
        $data['row'] = $row;
        $data['breadcrumb'] = $this->breadcrumb('edit');
        $this->load->view('department_edit',$data);
    }
     
    

    private function breadcrumb($action='index')
    {
        $data = array();
        $data[] = array('url' => site_url('department'),'title'=>'Department'); 
        
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
}