<?php
class Admin extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_students() {
        $this->db->select('*');
        $this->db->from('students_detail');
        $query = $this->db->get();
        return $query->result_array();
    }
}
