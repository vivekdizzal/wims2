<?php

class Customer_model extends CI_Model {

    function get_customer_details($id) {
        $this->db->select('*');
        $this->db->where('cust_id', $id);
        $query = $this->db->get(TBL_CUSTOMER);
        return $query->row_array();
    }

    function get_engineer_details($id) {
        $this->db->select('*');
        $this->db->where('eng_id', $id);
        $query = $this->db->get(TBL_ENGINEER);
        return $query->row_array();
    }

    function get_customer_name($cust_ref) {
        $this->db->select('cust_name');
        $this->db->where('cust_ref',$cust_ref);
        $query = $this->db->get(TBL_CUSTOMER);
        return $query->row_array();
    }
}
