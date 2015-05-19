<?php

class laser_model extends CI_Model {

    function get_laser_status($priority,$cad_status,$laser_status,$date) {
        
        $this->db->select('*');
        $this->db->join(TBL_CUSTOMER . " tc",'tj.cust_id = tc.cust_id');
        //$this->db->where('job_cad_status', $cad_status);
        $this->db->where('job_laser_status',$laser_status);
        $this->db->where('job_priority', $priority);
        //$this->db->where('due_date',$date);
        $query = $this->db->get(TBL_JOBS . " tj", 10, 20);
        return $query->result_array();
    }
    
}
