<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class role extends CI_Model {
   
    var $user = 1;
    var $administrator = 9;
    
    function __construct()
    {
        parent::__construct();
    }
    
    function get_role($key=FALSE)
    {
        $data = array();
        $data[$this->user] = "User";
        $data[$this->administrator] = "Administrator";
        
        if($key)
            return (isset($data[$key])) ? $data[$key] : "";
        else
            return $data;
    }
}