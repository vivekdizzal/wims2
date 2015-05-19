<?php

class order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    function get_order_status($priority, $date) {

        $this->db->select('*');
        $this->db->join(TBL_CUSTOMER . " tc", 'tj.cust_id = tc.cust_id');
        $this->db->join(TBL_ORDER . " to", 'tj.job_id = to.job_id');
   //     $this->db->join(TBL_ORDER_STATUS . " ts", 'tj.ord_id = ts.ord_id');
       // $this->db->join(TBL_ORDER_STATUS_UPDATE . " tu", 'tj.job_id = tu.job_id');
        $this->db->where('job_priority', $priority);
        $this->db->where('due_date', $date);
        $query = $this->db->get(TBL_JOBS . " tj");
        return $query->result_array();
    }

}
