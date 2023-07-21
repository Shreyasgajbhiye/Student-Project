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


$first_name = $response['first_name'];
$last_name = $response['last_name'];

$full_name = $response['full_name'];
$reg_id = $response['reg_id'];
$date_of_birth = date('Y-m-d', strtotime($response['date_of_birth']));            
$gender = $response['gender'];
$direct_admission = $response['direct_admission'];
$year_of_joining = $response['year_of_joining'];
$year_of_passing = $response['year_of_passing'];
$department = $response['department'];
$course = $response['course'];
$semesters_completed = $response['semesters_completed'];
//$contact_mobile = $response['contact_mobile'];
//$email = $response['email'];
$transcript_file = $response['transcript_file'];
$marksheets_file = $response['marksheets_file'];
$accepted_terms = $response['accepted_terms'];

$api = new Api ($keyId,$secretKey);

$razorpay_payment_id = $response['razorpay_payment_id'];
$razorpay_order_id = $response['order_id'];
//$razorpay_signature = $response['razorpay_signature'];
$payment = $api->payment->fetch($razorpay_payment_id)->capture(array('amount' => 50000));
 //echo 'pre'; print_r($payment); die;
if ($payment['status'] == 'captured'){

    $paymentLaser = 
    [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'payment_id' => $payment['id'],
        'amount' => $payment['amount']/100,
        'status' => $payment['status'],
        'bank_name' => $payment['bank'],
        'response_msg' => $payment['description'],
        'contact' => $payment['contact'],
        'email' => $payment['email'],
        //'signature_hash' => $razorpay_signature,
        'order_id' => $razorpay_order_id
    ];
    
    $this->load->database();
    if ($this->db->insert('payment', $paymentLaser)) {
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
            'contact_mobile' => $payment['contact'],
            'email' => $payment['email'],
            'transcript_file' => $transcript_file,
            'marksheets_file' => $marksheets_file,
            'accepted_terms' => $accepted_terms
        );

        $this->db->insert('students_detail', $data);
    } else {
        echo 'Database error: ' . $this->db->error();
    }
    redirect(base_url('addstudent/myaccount?payment_id=' . $razorpay_payment_id));
}

elseif ($payment['status'] == 'refunded') {
    $paymentLaser = 
    [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'payment_id' => $payment['id'],
        'amount' => $payment['amount']/100,
        'status' => 'refunded',
        'bank_name' => $payment['bank'],
        'response_msg' => $payment['description'],
        'contact' => $payment['contact'],
        'email' => $payment['email'],
        //'signature_hash' => $razorpay_signature,
        'order_id' => $razorpay_order_id
    ];

    $this->load->database();
    if ($this->db->insert('payment', $paymentLaser)) {
        
    } else {
        echo 'Database error: ' . $this->db->error();
    }
}
else {
    $paymentLaser = 
    [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'payment_id' => $payment['id'],
        'amount' => $payment['amount']/100,
        'status' => 'failed',
        'bank_name' => $payment['bank'],
        'response_msg' => $payment['description'],
        'contact' => $payment['contact'],
        'email' => $payment['email'],
        //'signature_hash' => $razorpay_signature,
        'order_id' => $razorpay_order_id
    ];

    $this->load->database();
    
    if ($this->db->insert('payment', $paymentLaser)) {
        echo 'Data inserted successfully.';
    } else {
        echo 'Database error: ' . $this->db->error();
    }
    redirect(base_url('addstudent/failed'));
}


    
?>