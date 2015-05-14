<?php

class Customer_model extends CI_Model {

    function get_customer_details($id) {
        $this->db->select('*');
        $this->db->where('cust_id', $id);
        $query = $this->db->get(TBL_CUSTOMER);
        return $query->row_array();
    }

}
