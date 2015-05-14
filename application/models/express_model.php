<?php

class Express_model extends CI_Model {

    function get_order_details() {
        $CI = &get_instance();
        //setting the second parameter to TRUE (Boolean) the function will return the database object.
        $this->eeDb = $CI->load->database('eeDb', TRUE);
        return $this->eeDb->query("SELECT * FROM order_items where is_transferred = 0")->result_array();
    }

}
