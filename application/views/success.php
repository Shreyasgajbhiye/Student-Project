<!-- success.php view -->
<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
    <!-- Other head elements -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <h1>Success Page</h1>
    <?php
     if (!empty($receipt)) {
        // Since print_receipt function returns an array, we'll assume that
        // there is only one item in the receipt array (order_id is unique).
        $payment_id = $receipt[0]['payment_id'];
        $first_name = $receipt[0]['first_name'];
        $last_name = $receipt[0]['last_name'];
        $order_id = $receipt[0]['order_id'];
        $payment_id = $receipt[0]['payment_id'];
        $amount = $receipt[0]['amount'];
        $status = $receipt[0]['status'];
        $contact = $receipt[0]['contact'];
        $email = $receipt[0]['email'];
        $date = $receipt[0]['date'];


        echo "<h3>Payment Successful </h3>";
        $nbsp;
        echo "<h3>Payment id: $payment_id</h3>";
        echo "<h3>Name : $first_name  $last_name</h3>";
        echo "<h3>Order id: $order_id</h3>";
        echo "<h3>Amount paid: $amount</h3>";
        echo "<h3>Status: $status</h3>";
        echo "<h3>Email: $email</h3>";
        echo "<h3>Date: $date</h3>";
        
        // You can display other receipt details here as needed


        //echo '<button id="printButton">Print Receipt</button>';

    } else {
        echo "<p>No receipt found.</p>";
    }
    ?>
<form  action="<?php echo base_url(); ?>student/generate_pdf" method="POST">
<button id="printButton">Print Receipt</button>

<input type="hidden"  value="<?php echo $payment_id; ?>" custom="Hidden Element" name="payment_id">
<input type="hidden"  value="<?php echo $first_name." ".$last_name; ?>" custom="Hidden Element" name="name">
    <input type="hidden"  value="<?php echo $order_id; ?>" custom="Hidden Element" name="order_id">
    <input type="hidden"  value="<?php echo $amount; ?>" custom="Hidden Element" name="amount">
    <input type="hidden"  value="<?php echo $email; ?>" custom="Hidden Element" name="email">
    <input type="hidden"  value="<?php echo $status; ?>" custom="Hidden Element" name="status">
    <input type="hidden"  value="<?php echo $date; ?>" custom="Hidden Element" name="status">
</form>
</body>
</html>
