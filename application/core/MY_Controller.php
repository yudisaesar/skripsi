<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  MY_Controller  extends  CI_Controller {

    var $version_id;
    var $version_title;
    var $version_year;
    var $varsion_currency;
    var $coa;
    var $company;
    var $token;
    var $user;

    function __construct()
    {
        parent::__construct();
		

        
        //Load model coa
        $this->load->model('account/role');
    }

    function set_session($data)
    {
        $this->session->set_userdata($data);
    }

    function _is_logged_in()
    {
        if(!is_membership())
        {
            $url_callback = uri_string();
            if(isset($_SERVER['QUERY_STRING'])){
               $url_callback .= !empty($_SERVER['QUERY_STRING']) ? '?' .$_SERVER['QUERY_STRING'] : ''; 
            }
            
            redirect('login?url='.$url_callback);
            die();
        }
        else{
            //Load model coa
            $this->load->model('account/user_mod');
            //Get data user
            $this->user = $this->user_mod->get_user_bysession();
            if(!$this->user){
                //Jika user tidak ditemukan dalam database
                redirect('logout');
            }
        }
    }

    function _is_login()
    {
        if(is_membership()){
            $this->_redirect_home();
        }
    }

    function _redirect_home()
    {
        redirect('/');
    }
    
    //Check user harus administrator
    function _is_administrator()
    {
        if($this->user->role != $this->role->administrator){
            $this->_redirect_home();
        }
    }

    function _is_page_access($page=FALSE)
    {
        if($page){
            if(!check_page_access($this->_page_access,$page)){
                redirect('page-not-access');
            }
        }
    }

    public function _encode_password($string)
    {
        $string .= xml('encryption_key');
	// Return the SHA-1 encryption
        return sha1($string);
    }
    
    /*
     * @INIT COA
     * Menampilkan coa yang sedang berjalan sesuai dengan page id dari coa tersebut
     * Result: Standar Object Class
     * [menu_id] ID Menu
     * [id] => ID COA
     * [code] => Code COA
     * [name] => COA Name
     * [description] => Remarks
     * [parent] => Induk ID COA
     * [department_id] => Map id department (dipisahkan dengan koma)
     * [rc_center_id] => Map id rc_center (dipisahkan dengan koma)
     * [business_type_id] => Map id business_type (dipisahkan dengan koma)
     * [company_id] => Map id company (dipisahkan dengan koma)
     * [group_abbr] => Nama group menu
     */
    /*public function init_coa()
    {
        //Load model coa
        $this->load->model('menu/menu_mod');
        $row = FALSE;
        if($this->token){
            $row = $this->menu_mod->get_bytoken($this->token);
        }
        
        //Arahkan ke halaman blank jika coa tidak ditemukan
        if(!$row){
            redirect(site_url('coa/no_active'));
        }
        
        //Arahkan ke halaman blank jika coa tidak ditemukan
        if($row->id < 0){
            redirect(site_url('coa/no_active'));
        }
        
        $this->coa = $row;
    }
    
    public function init_company()
    {
        $coa = $this->coa;
        //Arahkan ke halaman blank jika coa tidak ditemukan
        if(!$coa){
            redirect(site_url('coa/no_active'));
        }
        
        //Jika id company tidak ada maka diarahkan pada halaman informasi
        if(!$coa->company_id){
            redirect(site_url('coa/no_company?coa='.$coa->code));
        }
        //Load model class
        $this->load->model('company/company_mod');
        
        //Get company
        $company_id = explode(",", $coa->company_id);
        $rows = $this->company_mod->get_company_in($company_id);
        
        //Jika daftar company tidak ditemukan pada database
        if(!$rows){
            redirect(site_url('coa/no_company?coa='.$coa->code));
        }
        
        //Keluarkan daftar company berdasarkan coa terkait
        $this->company = $rows;
    }

    /*
     * @INIT Version
     * Function yang mengaktifkan secara otomatis version atau menampilkan version session bedasarkan version yang sedang aktif
     */
    /*private function init_version()
    {
        //Load model version
        $this->load->model('version/version_mod');
        
        //Get data row
        $row = $this->version_mod->get_row_actived();
        if($row)
        {
            $this->version_id = $row->id;
            $this->version_title = $row->title;
            $this->version_year = $row->year;
            $this->varsion_currency = $this->set_rows_currency($row->currency_rate,$row->currency_name);
        }
        else
        {
            $row = FALSE;
            //Update default row
            $status = $this->version_mod->set_default_actived();
            if($status){
                //Get data row
                $row = $this->version_mod->get_row_actived();
            }
            
            if($row)
            {
                $this->version_id = $row->id;
                $this->version_title = $row->title;
                $this->version_year = $row->year;
                $this->varsion_currency = $this->set_rows_currency($row->currency_rate,$row->currency_name);
            }
            else{
                redirect(site_url('version/no_active'));
            }
        }
    }
    
    private function set_rows_currency($rate=FALSE,$name=FALSE)
    {
        $rows = FALSE;
        
        if($rate && $name)
        {
            $rows = array();
            $_rate = explode(",", $rate);
            $_name = explode(",", $name);
            foreach ($_rate as $i => $r){
                $rows[$i]['rate'] = $r; 
                $rows[$i]['name'] = $_name[$i];
            }
        }
        return $rows;
    }*/
}