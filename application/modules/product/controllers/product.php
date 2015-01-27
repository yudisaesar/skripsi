<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class product extends MY_Controller {
     
    function product()
    {
        parent::__construct();
        //Check login
        $this->_is_logged_in();
        
        //Load model
        $this->load->model('product_mod');
    }
    
    public function index()
    {
        //$this->_is_administrator();
        
        $data['rows'] = $this->product_mod->get_product();
        $data['breadcrumb'] = $this->breadcrumb();
        $this->load->view('product', $data);
    }
     
    public function create()
    {
        //$this->_is_administrator();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
        $this->form_validation->set_rules('no_batch', 'no batch', 'required');
        $this->form_validation->set_rules('lot_no', 'lot no', 'required');
        $this->form_validation->set_rules('cont_no', 'cont no', 'trim|required');
        $this->form_validation->set_rules('potency', 'potency', 'required');
        $this->form_validation->set_rules('exp_date', 'exp date', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $nama_produk = $this->input->post("nama_produk");
            $no_batch = $this->input->post("no_batch");
            $lot_no = $this->input->post("lot_no");
            $cont_no = $this->input->post("cont_no");
            $potency = $this->input->post("potency");
            $exp_date = $this->input->post("exp_date");

               $data_post = array (
                   'nama_produk' => $nama_produk,
                   'no_batch' => $no_batch,
                   'lot_no' => $lot_no,
                   'cont_no' => $cont_no,
                   'potency' => $potency,
                   'exp_date' => $exp_date,
               );

                $this->product_mod->add($data_post);
                redirect('product');
                

        }
        $data['breadcrumb'] = $this->breadcrumb('create');
        $this->load->view('product_add',$data);
    }

    public function edit($id=0)
    {
        //$this->_is_administrator();
        
        $row = $this->product_mod->get_byuid($id);
        if(!$row) {
            redirect('product');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
        $this->form_validation->set_rules('no_batch', 'no batch', 'required');
        $this->form_validation->set_rules('lot_no', 'lot no', 'required');
        $this->form_validation->set_rules('cont_no', 'cont no', 'trim|required');
        $this->form_validation->set_rules('potency', 'potency', 'required');
        $this->form_validation->set_rules('exp_date', 'exp date', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $nama_produk = $this->input->post("nama_produk");
            $no_batch = $this->input->post("no_batch");
            $lot_no = $this->input->post("lot_no");
            $cont_no = $this->input->post("cont_no");
            $potency = $this->input->post("potency");
            $exp_date = $this->input->post("exp_date");

                $data_edit = array (
                   'nama_produk' => $nama_produk,
                   'no_batch' => $no_batch,
                   'lot_no' => $lot_no,
                   'cont_no' => $cont_no,
                   'potency' => $potency,
                   'exp_date' => $exp_date,
                );

                $this->product_mod->update($data_edit, $row->id);
                redirect('product');
            }
   
        $data['row'] = $row;
        $data['breadcrumb'] = $this->breadcrumb('edit');
        $this->load->view('product_edit',$data);
    }
     
    

    private function breadcrumb($action='index')
    {
        $data = array();
        $data[] = array('url' => site_url('product'),'title'=>'Product'); 
        
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