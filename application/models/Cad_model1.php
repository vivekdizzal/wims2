<?php

class cad_model1 extends CI_Model {

    function get_cad_status($priority, $cad_status, $date) {
//            $CI = &get_instance();
//        //setting the second parameter to TRUE (Boolean) the function will return the database object.
//        $this->db = $CI->load->database('wims1db', TRUE);
        $this->db->select('to.ord_id,to.ad_dt,tc.cust_name,tc.contact_name,tc.contact_no,te.eng_email,to.order_code,tos.cad_status,to.ad_by');
        $this->db->join(TBL_ORDER . " to", 'tos.ord_id = to.ord_id');
        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
        $this->db->join(TBL_ENGINEER . " te", 'to.ad_by = te.eng_id');
        $this->db->join(TBL_JOBS . " toj", 'tos.ord_id = toj.ord_id');
        $this->db->where_in('cad_status', array(WORK_NOT_STARTED, WORK_STARTED));
        $this->db->where('tos.is_hold', WORK_NOT_IN_HOLD);
        $this->db->where('toj.job_priority', $priority);
        $this->db->where('to.ord_dt', $date);
        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
        return $query->result_array();
    }

    function cad_status($data) {
//            $CI = &get_instance();
//        //setting the second parameter to TRUE (Boolean) the function will return the database object.
//        $this->wims1db = $CI->load->database('wims1db', TRUE);
        $this->db->where('job_id', $data['job_id']);
        $this->db->update('tbl_jobs', $data);
    }

    function update_job($data) {
//    $CI = &get_instance();
//        //setting the second parameter to TRUE (Boolean) the function will return the database object.
//        $this->wims1db = $CI->load->database('wims1db', TRUE);
        unset($data['job_cad_status']);
        $this->db->insert(TBL_JOBS_UPDATES, $data);
    }

    function upload_archive($data) {
        $this->db->insert(TBL_ORDER_STATUS_FILES, $data);
    }

    function get_order_status($id) {
        $this->db->where('ord_id', $id);
        return $this->db->get(TBL_ORDER_STATUS)->row_array();
    }

    function change_cad_working($id) {
        $this->db->where('id', $id);
        $data['cad_status'] = 1;
        $this->db->update(TBL_ORDER_STATUS, $data);
    }

}
