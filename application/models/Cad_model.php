<?php

class cad_model extends CI_Model {

    function get_cad_status($priority, $cad_status, $date) {
         
        $this->db->select('*');
        $this->db->join(TBL_CUSTOMER . " tc", 'tj.cust_id = tc.cust_id');
        $this->db->where('job_cad_status', $cad_status);
        $this->db->where('job_priority', $priority);
        $this->db->where('due_date',$date);
        $query = $this->db->get(TBL_JOBS . " tj");
        return $query->result_array();
    }

    function cad_status($data) {
          
        $this->db->where('job_id', $data['job_id']);
        $this->db->update('tbl_jobs', $data);
    }

    function update_job($data) {
  
        unset($data['job_cad_status']);
        $this->db->insert(TBL_JOBS_UPDATES, $data);
    }

}
