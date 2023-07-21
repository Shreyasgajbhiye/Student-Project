<?php

// Include Requests only if not already defined
if (!defined('REQUESTS_SILENCE_PSR0_DEPRECATIONS'))
{
    define('REQUESTS_SILENCE_PSR0_DEPRECATIONS', true);
}

if (class_exists('WpOrg\Requests\Autoload') === false)
{
    require_once __DIR__.'/libs/Requests-2.0.4/src/Autoload.php';
}

try
{
    WpOrg\Requests\Autoload::register();

    if (version_compare(Requests::VERSION, '1.6.0') === -1)
    {
        throw new Exception('Requests class found but did not match');
    }
}
catch (\Exception $e)
{
    throw new Exception('Requests class found but did not match');
}

spl_autoload_register(function ($class)
{
    // project-specific namespace prefix
    $prefix = 'Razorpay\Api';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0)
    {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    //
    // replace the namespace prefix with the base directory,
    // replace namespace separators with directory separators
    // in the relative class name, append with .php
    //
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file))
    {
        require $file;
    }
});

use Razorpay\Api\Api;

$keyId = $razorpay_key['keyId'];
$secretKey = $razorpay_key['secretKey'];
$api = new Api($keyId,$secretKey);

$order = $api->order->create(array(
    'receipt' => rand(1000,9999) . 'ORD',
    'amount' => 500 * 100,
    'payment_capture' => 1,
    'currency' => 'INR',
));

$order_id = 'ORD_' . rand(100000, 999999);



$first_name = $inputs['first_name'];
$last_name = $inputs['last_name'];
$logo = base_url() . 'public/myinboxhub_logo.png';
$email = $inputs['email'];
$mobile = $inputs['contact_mobile'];

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
$transcript_file = $files['transcript_file'];
$marksheets_file = $files['marksheets_file'];
$accepted_terms = $this->input->post('accepted_terms');


//$transcript_file
// $field_name_transcript = 'transcript_file';
// $folder_transcript  = 'transcripts';
// $upload_path = './uploads/' . $folder_transcript;
// $allowed_types = 'pdf';
// $encrypt_name = TRUE;
// $config['upload_path'] = $upload_path;
// $config['allowed_types'] = $allowed_types;
// $config['encrypt_name'] = $encrypt_name;
// $this->load->library('upload', $config);
// if (!$this->upload->do_upload($field_name_transcript)) {
//     // File upload failed
//     $error = $this->upload->display_errors();
//     $transcript_file = NULL;
// } else {
//     // File upload succeeded
//     $transcript_file = $this->upload->data('file_name');
// }


//$marksheets_file;
// $field_name_marksheet = 'marksheets_file';
// $folder_marksheets  = 'marksheets';
// $upload_path = './uploads/' . $folder_marksheets;
// $allowed_types = 'pdf';
// $encrypt_name = TRUE;
// $config['upload_path'] = $upload_path;
// $config['allowed_types'] = $allowed_types;
// $config['encrypt_name'] = $encrypt_name;
// $this->load->library('upload', $config);
// if (!$this->upload->do_upload($field_name_marksheet)) {
//     // File upload failed
//     $error = $this->upload->display_errors();
//     $marksheets_file = NULL;
// } else {
//     // File upload succeeded
//     $marksheets_file = $this->upload->data('file_name');
// }

?>

<meta name="viewport" content="width=device-width">
<style>
    .razorpay-payment-button{
        position: absolute;
        height: 0;
        width: 0;
        display: none;
    }
</style>
<form action="<?php echo base_url(); ?>student/success/" method="POST">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $keyId?>"
        data-amount="<?php echo $order->amount ?>"
        data-currency="INR"
        data-order-id="<?php echo $order->id ?>"
        data-buttontext="Pay with RazorPay"
        data-name="Register"
        data-description="Student registration"
        data-image="<?php echo $logo?>"
        data-prefill.name="<?php echo $first_name ?>"
        data-prefill.email="<?php echo $email ?>"
        data-prefill.contact="<?php echo $mobile ?>"
        data-theme.color="#f0a43c"
    ></script>
    <input type="hidden" custom="Hidden Element" name="hidden">
    <input type="hidden" name="first_name" value="<?php echo $first_name; ?>" custom="Hidden Element" >
    <input type="hidden" name="last_name" value="<?php echo $last_name; ?>" custom="Hidden Element" >
    <input type="hidden"  value="<?php echo $order_id; ?>" custom="Hidden Element" name="order_id">

    <input type="hidden"  value="<?php echo $full_name; ?>" custom="Hidden Element" name="full_name">
    <input type="hidden"  value="<?php echo $reg_id; ?>" custom="Hidden Element" name="reg_id">
    <input type="hidden"  value="<?php echo $date_of_birth; ?>" custom="Hidden Element" name="date_of_birth">
    <input type="hidden"  value="<?php echo $gender; ?>" custom="Hidden Element" name="gender">
    <input type="hidden"  value="<?php echo $direct_admission; ?>" custom="Hidden Element" name="direct_admission">
    <input type="hidden"  value="<?php echo $year_of_joining; ?>" custom="Hidden Element" name="year_of_joining">
    <input type="hidden"  value="<?php echo $year_of_passing; ?>" custom="Hidden Element" name="year_of_passing">
    <input type="hidden"  value="<?php echo $department; ?>" custom="Hidden Element" name="department">
    <input type="hidden"  value="<?php echo $course; ?>" custom="Hidden Element" name="course">
    <input type="hidden"  value="<?php echo $semesters_completed; ?>" custom="Hidden Element" name="semesters_completed">
    <input type="hidden"  value="<?php echo $transcript_file; ?>" custom="Hidden Element" name="transcript_file">
    <input type="hidden"  value="<?php echo $marksheets_file; ?>" custom="Hidden Element" name="marksheets_file">
    <input type="hidden"  value="<?php echo $accepted_terms; ?>" custom="Hidden Element" name="accepted_terms">
</form>
<script>document.querySelector('.razorpay-payment-button').click();</script>
