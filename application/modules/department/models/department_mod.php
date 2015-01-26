<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class department_mod extends CI_Model {
   
    function __construct()
    {
        parent::__construct();
    }
    
    function get_department($rows=false,$limit=false,$skip=0,$take=10)
    {
        $this->db->select(""
                . "department.*,"
                . "");
        
        if($limit) {
            $this->db->limit($take,$skip);
        }
        
        $i = $this->db->get('department');

        if($rows){
            return $i->num_rows();
        }else{
            return $var = ($i->num_rows() > 0) ? $i->result_array() : FALSE;
        }
    }
    
	
    function add($data=null)
    {
        $return = 0;
        if($data != null){
            $this->db->insert('department',$data);

            $return = $this->db->insert_id();
        }

        return $return;
    }

    function update($data,$id=0)
    {
        $this->db->where('id', mysql_real_escape_string($id));
        $this->db->update('department', $data);
    }
    
    function get_byuid($alat_id = 0)
    {

        $this->db->select(""
                . "department.*,"
                . "");
        $this->db->where('department.id', mysql_real_escape_string($alat_id));
        $i = $this->db->get('department', 1, 0);

        return $var = ($i->num_rows() > 0) ? $i->row() : FALSE;
    }
    
}