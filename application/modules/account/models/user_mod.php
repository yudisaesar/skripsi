<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_mod extends CI_Model {
   
    function __construct()
    {
        parent::__construct();
    }
    
    function get_users($rows=false,$limit=false,$skip=0,$take=10)
    {
        $this->db->select(""
                . "user.*,"
                . "");
        
        
        if($limit) {
            $this->db->limit($take,$skip);
        }
        
        $i = $this->db->get('user');

        if($rows){
            return $i->num_rows();
        }else{
            return $var = ($i->num_rows() > 0) ? $i->result_array() : FALSE;
        }
    }
    
    function get_byemail($email)
    {
        $this->db->select("*");
        $this->db->where("email",$email);
        $i = $this->db->get('user');

        return $var = ($i->num_rows() > 0) ? $i->row() : FALSE;
    }
	
    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('user',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }

    function update($data,$id=0)
    {
        $this->db->where('id', mysql_real_escape_string($id));
        $this->db->update('user', $data);
    }
    
    function get_byuid($user_id = 0)
    {

        $this->db->select(""
                . "user.*,"
                . "");
        $this->db->where('user.id', mysql_real_escape_string($user_id));
        $i = $this->db->get('user', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : FALSE;
    }
    
    function get_user_bysession()
    {
        $this->db->select(""
                . "user.*,"
                . "");

        $this->db->where('user.id', mysql_real_escape_string(user_id()));
        
        $i = $this->db->get('user', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : FALSE;
    }
}