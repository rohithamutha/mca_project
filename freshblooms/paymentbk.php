<?php
include('api/config.php');
header('Content-Type: application/json');

// Capture POST data
$razorpay_payment_id = $_POST['razorpay_payment_id'];
$total_amount = $_POST['total_amount'];
$user_id = $_POST['user_id'];
$product_details = $_POST['product_details'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
// $created_at = date('Y-m-d H:i:s'); 

// Validate payment ID (indicates successful payment)
if (!empty($razorpay_payment_id)) {
    $payment_status = "Success";

    // Update cart status to 'Delivering' for the given user ID
    $update_cart_sql = "UPDATE cart SET status = 'Delivering' WHERE user_id = '$user_id' AND status ='added' ";
    if ($conn->query($update_cart_sql) === TRUE) {

        // Insert data into the `finalpayment` table
        $sql = "INSERT INTO finalpayment 
                    (user_id, firstname, lastname, address, city, country, pincode, mobile, email, product_details, total_amount, payment_status, payment_id) 
                VALUES 
                    ('$user_id', '$firstname', '$lastname', '$address', '$city', '$country', '$pincode', '$mobile', '$email', '$product_details', '$total_amount', '$payment_status', '$razorpay_payment_id')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Payment recorded successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database insertion failed: ' . $conn->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update cart status: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Payment ID missing.']);
}

$conn->close();
?>
