<?php

class order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    function get_order_status($priority, $date, $orderby = '') {
       // $this->db->select('tos.id,to.ord_id,to.order_code,to.ship_by_date,tos.is_hold,tos.laser_status,tos.production_status,tos.shipment_status,to.ad_dt,tc.cust_name,tc.contact_name,tc.contact_no,to.order_code,tos.cad_status,toj.job_tooling,to.ad_by,toj.job_priority');
       $this->db->select("*");
        $this->db->join(TBL_ORDER . " to", 'tos.ord_id = to.ord_id');
        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
        $this->db->join(TBL_JOBS . " toj", 'tos.ord_id = toj.ord_id');
       // $this->db->join(TBL_CAD_CHECKLIST . " tcl", 'tos.id = tcl.order_status_id');
       // $this->db->join(TBL_CAD_FOIL_THICKNESS . " tfl", 'tcl.cad_checklist_id = tfl.cad_checklist_id');
        $this->db->where('toj.job_priority', $priority);
        $this->db->where('to.ship_by_date', $date);
        $this->db->where('tos.is_hold', 0);
        if (!empty($orderby)) {
            $orderby = explode(".", $orderby);
            $this->db->order_by("tos." . $orderby[0], $orderby[1]);
        }
        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
        return $query->result_array();
        //print_r($query->result_array());exit;
//        $this->db->select('*'); 
//        $this->db->join(TBL_ORDER . " to", 'to.ord_id = tos.ord_id');
//        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
//        //$this->db->join(TBL_JOBS . " tj", 'to.job_id = tj.job_id');
//       
//        //$this->db->join(TBL_ORDER_STATUS_UPDATE . " tosu", 'to.ord_id = tosu.ord_id', 10,20);
//        //$this->db->limit('1');
//       // $this->db->where('tj.job_priority', $priority);
//        $this->db->where('to.ship_by_date', $date);
//        if (!empty($orderby)){
//            $orderby = explode(".", $orderby);
//            $this->db->order_by("tos.".$orderby[0], $orderby[1]);
//        }
//        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
//        return $query->result_array();
    }

}
