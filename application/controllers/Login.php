<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   

    public function index()
	{
		$this->load->view('login');
	}

    public function dashboard()
	{
        $this->load->model('admin');
        $data['inputs'] = $this->admin->get_students();
        //print_r($data['inputs']);
		$this->load->view('dashboard',$data);
	}

    public function failed()
	{
		$this->load->view('LoginFailed');
	}

    public function getCredentials(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('student_model');
            $status = $this->student_model->auth($email,$password);
            if($status){
                print_r($status);
                $this->load->library('session');
                $this->session->set_userdata('email', $status);
                return redirect(base_url('login/dashboard'));
            }
        else{
            //redirect(base_url('login/failed'));
            redirect(base_url('login/failed'));

        }
    }

    public function logout() {
        // Destroy the session and unset all session data
        $this->session->unset_userdata('email');
        
        // Redirect to the homepage or any other page after logout
        return redirect(base_url('welcome')); // Change 'base_url()' to the desired URL
    }
    

}
?>