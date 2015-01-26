<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class alat extends MY_Controller {
     
    function alat()
    {
        parent::__construct();
        //Check login
        $this->_is_logged_in();
        
        //Load model
        $this->load->model('alat_mod');
        $this->load->model('equipment/location_mod');
    }
    
    public function index()
    {
        //$this->_is_administrator();
        
        $data['rows'] = $this->alat_mod->get_alat();
        $data['breadcrumb'] = $this->breadcrumb();
        $this->load->view('alat', $data);
    }
     
    public function create()
    {
        //$this->_is_administrator();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('location_id', 'location', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $kode = $this->input->post("kode");
            $name = $this->input->post("name");
            $location_id = $this->input->post("location_id");

               $data_post = array (
                   'kode' => $kode,
                   'name' => $name,
                   'location_id' => $location_id,
               );

                $this->alat_mod->add($data_post);
                redirect('equipment/alat');
                

        }
        $data['location'] = $this->location_mod->get_location();
        $data['breadcrumb'] = $this->breadcrumb('create');
        $this->load->view('alat_add',$data);
    }

    public function edit($id=0)
    {
        //$this->_is_administrator();
        
        $row = $this->alat_mod->get_byuid($id);
        if(!$row) {
            redirect('equipment/alat');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('location_id', 'location', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $kode = $this->input->post("kode");
            $name = $this->input->post("name");
            $location_id = $this->input->post("location_id");

                $data_edit = array (
                   'kode' => $kode,
                   'name' => $name,
                   'location_id' => $location_id,
                );

                $this->alat_mod->update($data_edit, $row->id);
                redirect('equipment/alat');
            }
   
        $data['location'] = $this->location_mod->get_location();
        $data['row'] = $row;
        $data['breadcrumb'] = $this->breadcrumb('edit');
        $this->load->view('alat_edit',$data);
    }
     
    

    private function breadcrumb($action='index')
    {
        $data = array();
        $data[] = array('url' => site_url('equipment/alat'),'title'=>'Equipment'); 
        
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