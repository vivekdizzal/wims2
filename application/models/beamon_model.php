<?php

class Beamon_model extends CI_Model {

    function get_order_details() {
        $CI = &get_instance();
        //setting the second parameter to TRUE (Boolean) the function will return the database object.
        $this->beamonDb = $CI->load->database('beamonDb', TRUE);
        return $this->beamonDb->query("SELECT * FROM tbl_order WHERE ord_id=5")->row_array();
    }

}
