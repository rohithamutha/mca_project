<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your MySQL password
$dbname = "freshblooms"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $flowerDesignName = htmlspecialchars(trim($_POST['Flower&Design_name']));
    // $seasonalFlower = htmlspecialchars(trim($_POST['Seasonal_Flower']));
    $description = htmlspecialchars(trim($_POST['Description']));
    $name = htmlspecialchars(trim($_POST['Name']));
    $address = htmlspecialchars(trim($_POST['Address']));
    $mobileNo = htmlspecialchars(trim($_POST['Mobile_no']));

    // Validate required fields
    if (empty($flowerDesignName) || empty($description) || empty($name) || empty($address) || empty($mobileNo)) {
        echo "Please fill in all required fields.";
    } else {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO order_request (flower_design_name, description, name, address, mobile_no) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $flowerDesignName, $description, $name, $address, $mobileNo);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Sumitted');window.location.href='request.php';</script>";
        } else {
            echo "<script>alert('Error: Could not submit order.');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>