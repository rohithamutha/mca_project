<?php
// Database connection (replace with your actual connection details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freshblooms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['orderId'])) {
    $orderId = $data['orderId'];

    // Update the order status to 'canceled' or remove the order from the cart
    $sql = "UPDATE cart SET status='canceled' WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId); // 'i' for integer type
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Successfully canceled the order
        echo json_encode(["success" => true, "message" => "Order canceled successfully."]);
    } else {
        // Order not found or other issue
        echo json_encode(["success" => false, "message" => "Order not found or already canceled."]);
    }

    $stmt->close();
} else {
    // Invalid input
    echo json_encode(["success" => false, "message" => "Invalid order ID."]);
}

$conn->close();
?>
