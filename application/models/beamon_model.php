<?php

class Beamon_model extends CI_Model {

    function connect_db() {
        $dsn = 'dbdriver://root:@localhost/beamon9_boots2';

        return $this->load->database($dsn);
    }

    function get_order_details(){
        $beamonDb = $this->connect_db();
        $beamonDb->row_array("SELECT * FROM tbl_order WHERE ord_id=5");
    }
    
}
