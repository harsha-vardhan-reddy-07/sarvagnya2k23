<style>
.razorpay-payment-button {
    padding: 4px;
    background-color: #5A9E6F;
    color: #fff;
    border: 0;
}

.card {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#535665" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<!-- Icons and Font-Family Google API CDN -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<style>
body {
    font-family: "Ubuntu", "Lato" !important;
}
</style>
<?php
require 'config.php';
require 'razorpay-php/Razorpay.php';
session_start();


// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//


$price = $_POST['amount'];
$user_id = $_POST['user_id'];
$event_id = $_POST['event_id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$_SESSION['price'] = $_POST['amount'];
$_SESSION['event_id'] = $_POST['event_id'];

$query = "SELECT * FROM events where id='$event_id'";
$query_run = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($query_run);
$event_title = $row['title'];


$orderData = [
    'receipt' => 3456,
    'amount' => $price * 100, // 2000 rupees in paise
    'currency' => 'INR',
    'payment_capture' => 1, // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key" => $keyId,
    "amount" => $amount,
    "name" => "Sarvagnya",
    "description" => $event_title,
    "image" => "https://sarvagnya2k22.in/assets/images/logo2.png",
    "prefill" => [
        "name" => $name,
        "email" => $email,
    ],
    // "notes" => [
    //     "address" => "Hello World",
    //     "merchant_order_id" => "12312321",
    // ],
    "theme" => [
        "color" => "#F37254",
    ],
    "order_id" => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
    $data['display_currency'] = $displayCurrency;
    $data['display_amount'] = $displayAmount;
}

$json = json_encode($data);

?>

<div class="container col-md-6 col-sm-12 col-xs-12 mt-4 pt-4">
    <div class="card">
        <div class="card-body">
            <h3 class="title text-center">Checkout Details </h3>
            <hr>
            <p><b>Name : </b> <?php echo $name; ?></p>
            <p><b>Email : </b> <?php echo $email; ?></p>
            <p><b>Event : </b> <?php echo $event_title; ?></p>
            <p><b>Amount : </b> <?php echo $price; ?> /-</p>
        </div>
    </div>

    <form action="verify.php" method="POST" class="mx-auto text-center mt-3">
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>"
            data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>"
            data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>"
            data-prefill.email="<?php echo $data['prefill']['email'] ?>" data-order_id="<?php echo $data['order_id'] ?>"
            <?php if ($displayCurrency !== 'INR') {?> data-display_amount="<?php echo $data['display_amount'] ?>"
            <?php }?> <?php if ($displayCurrency !== 'INR') {?>
            data-display_currency="<?php echo $data['display_currency'] ?>" <?php }?>>
        </script>
        <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                <a href="https://localhost/sarva/events.php" class="btn btn-secondary">Back To Events</a>
        <input type="hidden" name="shopping_order_id" value="3456">
        <input type="submit" value="Checkout" class="btn btn-success">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- <script>
$(window).on('load', function() {
    jQuery('.razorpay-payment-button').click();
});


</script> -->
<script>
$(".razorpay-payment-button").hide();
</script>