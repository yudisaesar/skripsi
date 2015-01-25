<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class login_mod extends CI_Model
{
    function __construct()
    {
            parent::__construct();
    }
    
    function login($username, $password)
    {
        $this->db->select(""
                . "user.*,"
                . "");
        $this->db->where('email', mysql_real_escape_string($username));
        $this->db->where('password', mysql_real_escape_string($password));

        $query = $this->db->get('user');

        return $var = ($query->num_rows() > 0) ? $query->row() : FALSE;
    }
}