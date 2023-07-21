<?php
function insertPayment($Arr) {
    $this->load->database();
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->insert('payment',$Arr);
    return true;
}

// function to upload file and return filename
function upload_file($field_name, $folder)
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

?>