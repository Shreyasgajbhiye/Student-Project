<!-- success.php view -->
<!DOCTYPE html>
<html>
<head>
    <title>Success Page</title>
    <!-- Other head elements -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <?php
     if (!empty($receipt)) {
        // Since print_receipt function returns an array, we'll assume that
        // there is only one item in the receipt array (order_id is unique).

        // print_r($receipt);
        // $payment_id = $receipt['payment_id'];
        // $first_name = $receipt['first_name'];
        // $last_name = $receipt['last_name'];
        // $order_id = $receipt['order_id'];
        // $payment_id = $receipt['payment_id'];
        // $amount = $receipt['amount'];
        // $status = $receipt['status'];
        // $contact = $receipt['contact'];
        // $email = $receipt['email'];
        // $date = $receipt['date'];


        echo "<h3>Payment Successful</h3>";
        echo "<p>Payment ID: " . $receipt['payment_id'] . "</p>";
        echo "<p>Name: " . $receipt['name'] . "</p>";
        echo "<p>Order ID: " . $receipt['order_id'] . "</p>";
        echo "<p>Amount Paid: " . $receipt['amount'] . "</p>";
        echo "<p>Email: " . $receipt['email'] . "</p>";
        echo "<p>Status: " . $receipt['status'] . "</p>";
        
        // You can display other receipt details here as needed


        //echo '<button id="printButton">Print Receipt</button>';

    } else {
        echo "<p>No receipt found.</p>";
    }
    ?>

</body>
</html>
