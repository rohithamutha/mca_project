<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL root password
$dbname = "freshblooms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $feedback = $conn->real_escape_string($_POST['feedback']);

    // SQL query to insert data into the 'feedback' table
    $sql = "INSERT INTO feedback (name, email, feedback, date ) VALUES ('$name', '$email', '$feedback', now())";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
