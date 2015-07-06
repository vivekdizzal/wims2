<?php

class laser_model extends CI_Model {

    function get_laser_status($priority,$laser_status,$date) {
        
//        $this->db->select('*');
//        $this->db->join(TBL_CUSTOMER . " tc",'tj.cust_id = tc.cust_id');
//        //$this->db->where('job_cad_status', $cad_status);
//        $this->db->where('job_laser_status',$laser_status);
//        $this->db->where('job_priority', $priority);
//        //$this->db->where('due_date',$date);
//        $query = $this->db->get(TBL_JOBS . " tj", 10, 20);
//        return $query->result_array();
        
         $this->db->select('to.ord_id,to.ad_dt,tc.cust_name,tc.contact_name,tc.contact_no,te.eng_email,to.order_code,tos.laser_status,to.ad_by');
        $this->db->join(TBL_ORDER . " to", 'tos.ord_id = to.ord_id');
        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
        $this->db->join(TBL_ENGINEER . " te", 'to.ad_by = te.eng_id');
        $this->db->join(TBL_JOBS . " toj", 'tos.ord_id = toj.ord_id');
        $this->db->where_in('laser_status', array(WORK_NOT_STARTED, WORK_STARTED));
        $this->db->where('tos.is_hold', WORK_NOT_IN_HOLD);
        $this->db->where('toj.job_priority', $priority);
//        $this->db->where('to.ord_dt', $date);
        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
        return $query->result_array();
    }
    
}
