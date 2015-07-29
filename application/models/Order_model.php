<?php

class order_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    function get_order_status($date, $priority = '' , $orderby = '') {
        // $this->db->select('tos.id,to.ord_id,to.order_code,to.ship_by_date,tos.is_hold,tos.laser_status,tos.production_status,tos.shipment_status,to.ad_dt,tc.cust_name,tc.contact_name,tc.contact_no,to.order_code,tos.cad_status,toj.job_tooling,to.ad_by,toj.job_priority');
        $this->db->select("*");
        $this->db->join(TBL_ORDER . " to", 'tos.ord_id = to.ord_id');
        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
        $this->db->join(TBL_JOBS . " toj", 'tos.ord_id = toj.ord_id');
        // $this->db->join(TBL_CAD_CHECKLIST . " tcl", 'tos.id = tcl.order_status_id');
        // $this->db->join(TBL_CAD_FOIL_THICKNESS . " tfl", 'tcl.cad_checklist_id = tfl.cad_checklist_id');
        $this->db->where('toj.job_priority', $priority);
       // $this->db->where('to.ship_by_date', $date);
        $this->db->where('tos.is_hold', 0);
        if (!empty($orderby)) {
            $orderby = explode(".", $orderby);
            $this->db->order_by("tos." . $orderby[0], $orderby[1]);
        }
        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
        return $query->result_array();
    }

    function get_order_details($ord_id) {
        $this->db->select('order_code,cust_ref,dt_bot_assembly,dt_top_assembly,dt_bot_fab,dt_top_fab');
        $this->db->where('ord_id', $ord_id);
        return $this->db->get(TBL_ORDER)->row_array();
    }

    function get_order_on_hold($priority, $date = '') {
        $this->db->select('to.ord_id,to.ad_dt,tc.cust_name,tc.contact_name,tc.contact_no,te.eng_email,to.order_code,tos.is_hold,to.ad_by');
        $this->db->join(TBL_ORDER . " to", 'tos.ord_id = to.ord_id');
        $this->db->join(TBL_CUSTOMER . " tc", 'to.cust_id = tc.cust_id');
        $this->db->join(TBL_ENGINEER . " te", 'to.ad_by = te.eng_id');
        $this->db->join(TBL_JOBS . " toj", 'tos.ord_id = toj.ord_id');
//        $this->db->where_in('laser_status', array(WORK_NOT_STARTED, WORK_STARTED));
        $this->db->where('tos.is_hold', WORK_IN_HOLD);
        $this->db->where('toj.job_priority', $priority);
//        $this->db->where('to.ord_dt', $date);
        $query = $this->db->get(TBL_ORDER_STATUS . " tos");
        return $query->result_array();
    }

    function update_hold_status($data) {
        $this->db->where('ord_id', $data['ord_id']);
        $this->db->update(TBL_ORDER_STATUS, $data);
        unset($data['ord_id']);
        unset($data['is_hold']);
        $data['update_status'] = UNHOLD;
        $data['update_by'] = $this->session->userdata('user_id');
        $data['update_time'] = date("Y-m-d H:i:s");
         $data['update_remarks'] = "UNHOLD";
        $this->db->insert(TBL_ORDER_STATUS_UPDATE, $data);
    }
    
    function get_order_details_form($id) {
        
        return $this->db->query("SELECT * FROM tbl_order WHERE ord_id=". $id)->result();
    }

}
