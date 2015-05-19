<?php

class cad_model1 extends CI_Model {

    function get_cad_status($priority, $cad_status, $date) {
            $CI = &get_instance();
        //setting the second parameter to TRUE (Boolean) the function will return the database object.
        $this->wims1db = $CI->load->database('wims1db', TRUE);
        $this->wims1db->select('*');
        $this->wims1db->join(TBL_CUSTOMER . " tc", 'tj.cust_id = tc.cust_id');
        $this->wims1db->where('job_cad_status', $cad_status);
        $this->wims1db->where('job_priority', $priority);
        $this->wims1db->where('due_date',$date);
        $query = $this->wims1db->get(TBL_JOBS . " tj");
        return $query->result_array();
    }

    function cad_status($data) {
            $CI = &get_instance();
        //setting the second parameter to TRUE (Boolean) the function will return the database object.
        $this->wims1db = $CI->load->database('wims1db', TRUE);
        $this->wims1db->where('job_id', $data['job_id']);
        $this->wims1db->update('tbl_jobs', $data);
    }

    function update_job($data) {
    $CI = &get_instance();
        //setting the second parameter to TRUE (Boolean) the function will return the database object.
        $this->wims1db = $CI->load->database('wims1db', TRUE);
        unset($data['job_cad_status']);
        $this->wims1db->insert(TBL_JOBS_UPDATES, $data);
    }

}
