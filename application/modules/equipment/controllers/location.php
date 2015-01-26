<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class location extends MY_Controller {
     
    function location()
    {
        parent::__construct();
        //Check login
        $this->_is_logged_in();
        
        //Load model
        $this->load->model('location_mod');
    }
    
    public function index()
    {
        //$this->_is_administrator();
        
        $data['rows'] = $this->location_mod->get_location();
        $data['breadcrumb'] = $this->breadcrumb();
        $this->load->view('location', $data);
    }
     
    public function create()
    {
        //$this->_is_administrator();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $name = $this->input->post("name");
            $deskripsi = $this->input->post("deskripsi");

               $data_post = array (
                   'name' => $name,
                   'deskripsi' => $deskripsi,
               );

                $this->location_mod->add($data_post);
                redirect('equipment/location');
                
        }
        $data['breadcrumb'] = $this->breadcrumb('create');
        $this->load->view('location_add',$data);
    }

    public function edit($id=0)
    {
        //$this->_is_administrator();
        
        $row = $this->location_mod->get_byuid($id);
        if(!$row) {
            redirect('equipment/location');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $name = $this->input->post("name");
            $deskripsi = $this->input->post("deskripsi");

                $data_edit = array (
                   'name' => $name,
                   'deskripsi' => $deskripsi,
                );

                $this->location_mod->update($data_edit, $row->id);
                redirect('equipment/location');
            }
   
        $data['row'] = $row;
        $data['breadcrumb'] = $this->breadcrumb('edit');
        $this->load->view('location_edit',$data);
    }
     
    

    private function breadcrumb($action='index')
    {
        $data = array();
        $data[] = array('url' => site_url('equipment/location'),'title'=>'Location'); 
        
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