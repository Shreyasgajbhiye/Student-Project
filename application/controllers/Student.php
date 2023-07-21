<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
    }

    public function index()
    {
        $this->load->view('student_form');
    }

    public function save3(){
        echo "hello";
    }
    public function save()
    {
        
        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('reg_id', 'Registration ID', 'trim|required');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('direct_admission', 'Direct Admission', 'trim|required');
        $this->form_validation->set_rules('year_of_joining', 'Year of Joining', 'trim|required');
        $this->form_validation->set_rules('year_of_passing', 'Year of Passing', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        $this->form_validation->set_rules('semesters_completed', 'Semesters Completed', 'trim|required');
        $this->form_validation->set_rules('contact_mobile', 'Contact Mobile', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('accepted_terms', 'Accepted Terms', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo $errors;
            // validation failed, show form again with error messages
            $data['first_name_error'] = form_error('first_name');
            $data['last_name_error'] = form_error('last_name');
            $data['full_name_error'] = form_error('full_name');
            $data['reg_id_error'] = form_error('reg_id');
            $data['date_of_birth_error'] = form_error('date_of_birth');
            $data['gender_error'] = form_error('gender');
            $data['direct_admission_error'] = form_error('direct_admission');
            $data['year_of_joining_error'] = form_error('year_of_joining');
            $data['year_of_passing_error'] = form_error('year_of_passing');
            $data['department_error'] = form_error('department');
            $data['course_error'] = form_error('course');
            $data['semesters_completed_error'] = form_error('semesters_completed');
            $data['contact_mobile_error'] = form_error('contact_mobile');
            $data['email_error'] = form_error('email');
            $data['transcript_file_error'] = form_error('transcript_file');
            $data['marksheets_file_error'] = form_error('marksheets_file');
            $data['accepted_terms_error'] = form_error('accepted_terms');
        
            $this->session->set_flashdata('error', 'Please fill all the required fields and accept the terms.');
            
            // print_r($data);
            
            $this->load->view('student_form', $data);
        
        } else {
            // validation succeeded, process data and insert into database

            // get form data
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $full_name = $this->input->post('full_name');
            $reg_id = $this->input->post('reg_id');
            $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
            $gender = $this->input->post('gender');
            $direct_admission = $this->input->post('direct_admission');
            $year_of_joining = $this->input->post('year_of_joining');
            $year_of_passing = $this->input->post('year_of_passing');
            $department = $this->input->post('department');
            $course = $this->input->post('course');
            $semesters_completed = $this->input->post('semesters_completed');
            $contact_mobile = $this->input->post('contact_mobile');
            $email = $this->input->post('email');
            $transcript_file = $this->upload_file('transcript_file', 'transcripts');
            $marksheets_file = $this->upload_file('marksheets_file', 'marksheets');
            $accepted_terms = $this->input->post('accepted_terms');

            // insert data into database
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'full_name' => $full_name,
                'reg_id' => $reg_id,
                'date_of_birth' => $date_of_birth,
                'gender' => $gender,
                'direct_admission' => $direct_admission,
                'year_of_joining' => $year_of_joining,
                'year_of_passing' => $year_of_passing,
                'department' => $department,
                'course' => $course,
                'semesters_completed' => $semesters_completed,
                'contact_mobile' => $contact_mobile,
                'email' => $email,
                'transcript_file' => $transcript_file,
                'marksheets_file' => $marksheets_file,
                'accepted_terms' => $accepted_terms
            );

            $this->db->insert('students_detail', $data);

            // show success message
            redirect('/addstudent');
        }
    }

    // function to upload file and return filename
    private function upload_file($field_name, $folder)
    {
        
        print_r('./uploads/' . $folder."  ".$field_name);
        $config['upload_path'] = 'uploads/'.$folder;
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field_name)) {
            // file upload failed
            $error = array('error' => $this->upload->display_errors());
            return NULL;
        } else {
            // file upload succeeded
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }

    public function pay(){

        //setting validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('reg_id', 'Registration ID', 'trim|required');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('direct_admission', 'Direct Admission', 'trim|required');
        $this->form_validation->set_rules('year_of_joining', 'Year of Joining', 'trim|required');
        $this->form_validation->set_rules('year_of_passing', 'Year of Passing', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        $this->form_validation->set_rules('semesters_completed', 'Semesters Completed', 'trim|required');
        $this->form_validation->set_rules('contact_mobile', 'Contact Mobile', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('accepted_terms', 'Accepted Terms', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo $errors;
            // validation failed, show form again with error messages
            $data['first_name_error'] = form_error('first_name');
            $data['last_name_error'] = form_error('last_name');
            $data['full_name_error'] = form_error('full_name');
            $data['reg_id_error'] = form_error('reg_id');
            $data['date_of_birth_error'] = form_error('date_of_birth');
            $data['gender_error'] = form_error('gender');
            $data['direct_admission_error'] = form_error('direct_admission');
            $data['year_of_joining_error'] = form_error('year_of_joining');
            $data['year_of_passing_error'] = form_error('year_of_passing');
            $data['department_error'] = form_error('department');
            $data['course_error'] = form_error('course');
            $data['semesters_completed_error'] = form_error('semesters_completed');
            $data['contact_mobile_error'] = form_error('contact_mobile');
            $data['email_error'] = form_error('email');
            $data['transcript_file_error'] = form_error('transcript_file');
            $data['marksheets_file_error'] = form_error('marksheets_file');
            $data['accepted_terms_error'] = form_error('accepted_terms');
        
            $this->session->set_flashdata('error', 'Please fill all the required fields and accept the terms.');
            
            // print_r($data);
            
            $this->load->view('student_form', $data);
        
        } 

        else{
        $data['inputs'] = $this->input->post();
        $data['razorpay_key'] = [
            'keyId'=>'rzp_test_u8kxqciC3B89gr',
            'secretKey'=>'jr0W9EaguBtRM0zuzSGBP4a9'
        ];
        $data['files'] = [
            'transcript_file' => $this->upload_file('transcript_file', 'transcripts'),
            'marksheets_file' => $this->upload_file('marksheets_file', 'marksheets'),
        ];
        
        $this->load->view('razorpay/Razorpay',$data);
    }
    }

    public function success(){
        try{
        $data['response'] = $this->input->post();
        $data['razorpay_key'] = [
            'keyId'=>'rzp_test_u8kxqciC3B89gr',
            'secretKey'=>'jr0W9EaguBtRM0zuzSGBP4a9'
        ];

        $this->load->view('razorpay/Razorpay_fetch_payment',$data);
    }
    catch(Exception $e){
        echo "Message: ".$e->getMessage();
    }
    }

    public function myaccount() {
        // Get the payment_id from the URL parameter
        $payment_id = $this->input->get('payment_id');
        $data['payment_id'] = $payment_id;

        // Fetch the payment details using the print_receipt function
        $data['receipt'] = $this->student_model->print_receipt($payment_id);

        //print_r($data['receipt']);
        $data['status'] = [
            'success' => 'success',
            'fail' => 'failed',
        ];

        $this->load->view('success',$data);
        
    }
    
    public function failed(){
        $data['status'] = [
            'failed' => 'failed',
        ];
        $this->load->view('failed',$data);
    }

    public function generate_pdf(){
        try{
            $this->load->library('pdf');
            $data['receipt'] = $this->input->post();
           // print_r($data['receipt']);
            $html = $this->load->view('failed', $data, true);
            $this->pdf->createPDF($html, 'mypdf', false);
        }
        catch(Exception $e){
            echo "Message: ".$e->getMessage();
        }
        // $this->load->library('pdf');
        // $html = $this->load->view('success', $data, true);
        // $this->pdf->createPDF($html, 'mypdf', false);
    }

}
?>

       