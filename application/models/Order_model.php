<?php

class order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    function get_order_status($priority, $date, $orderby = '') {

        $this->db->select('*'); 
        $this->db->join(TBL_ORDER . " to", 'to.ord_id = tos.ord_id');
        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
        $this->db->join(TBL_JOBS . " tj", 'to.job_id = tj.job_id');
       
        //$this->db->join(TBL_ORDER_STATUS_UPDATE . " tosu", 'to.ord_id = tosu.ord_id', 10,20);
        //$this->db->limit('1');
        $this->db->where('tj.job_priority', $priority);
        $this->db->where('tj.due_date', $date);
        if (!empty($orderby)){
            $orderby = explode(".", $orderby);
            $this->db->order_by("tos.".$orderby[0], $orderby[1]);
        }
        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
        return $query->result_array();
    }

}
