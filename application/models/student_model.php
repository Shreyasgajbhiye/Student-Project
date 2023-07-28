<?php
class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_student($data) {
        $this->db->insert('students_detail', $data);
        return $this->db->insert_id();
    }

    public function get_students() {
        $this->db->select('*');
        $this->db->from('students_detail');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_student_by_id($id) {
        $this->db->select('*');
        $this->db->from('students_detail');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function print_receipt($payment_id) {
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('payment_id', $payment_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function auth($email,$password){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('password', $password);
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row()->email : false;
    }

}
