<?php

require 'config.php';

session_start();

require 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature'],
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {

    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['email'];
    $price = $_SESSION['price'];
    $user_id = $_SESSION['id'];
    $event_id = $_SESSION['event_id'];


    $query2 = "SELECT * FROM events WHERE id = '$event_id'";
    $query_run2 = mysqli_query($connection,$query2);
    $row2 = mysqli_fetch_assoc($query_run2);

    $event_type = $row2['type'];


    date_default_timezone_set('Asia/Kolkata');
    $txn_time = date('d-m-Y H:i:s');

if($razorpay_order_id == ''){
    
}
else{
        $sql = "INSERT INTO `transactions` (`order_id`, `payment_id`,`user_id`,`event_id`,`event_type`,`amount`,`a_m`, `status`, `txn_time`) VALUES ('$razorpay_order_id','$razorpay_payment_id','$user_id','$event_id','$event_type','$price','automatic','success', '$txn_time')";

}

    if (mysqli_query($connection, $sql)) {
        $_SESSION['success'] = "Successfully Registered";
        $msg = "success";
        header("Location: ../transaction_status.php?status=$msg");
    }

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
} else {
    $_SESSION['status'] = "Failed to register Please try again";
    $msg = "fail";
    header("Location: ../transaction_status.php?status=$msg");
}

echo $html;