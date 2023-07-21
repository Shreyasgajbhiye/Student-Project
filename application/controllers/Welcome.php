<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function student_form(){
		$this->load->view('student_form');
	}

	public function templates(){
		$this->load->view('templates');
	}

	public function transcript(){
		$this->load->view('welcome_message');
	}

	// public function openDocument() {
	// 	$docxFilePath = '..\..\assests\text.docx';
	
	// 	// Get the file extension
	// 	$extension = pathinfo($docxFilePath, PATHINFO_EXTENSION);
	
	// 	// Define the URL for viewing the document based on the file extension
	// 	$viewerUrl = '';
	// 	if ($extension === 'docx') {
	// 		$viewerUrl = 'https://view.officeapps.live.com/op/view.aspx?src=' . urlencode(base_url($docxFilePath));
	// 	} else if ($extension === 'pdf') {
	// 		$viewerUrl = 'https://docs.google.com/viewer?url=' . urlencode(base_url($docxFilePath));
	// 	}
	
	// 	// Redirect to the viewer URL
	// 	redirect($viewerUrl);
	// }
	

}
