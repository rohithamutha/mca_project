<?php

session_start();
include('api/config.php');
// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Retrieve logged-in user's ID from the session
$user_id = $_SESSION['id'];



// Fetch user details from the userdetails table
$sql = "SELECT name, phone_no, email FROM userdeatils WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the user data
    $user = $result->fetch_assoc();
} else {
    echo "User details not found.";
    exit();
}

$stmt->close();
$conn->close();
?>


<?php 
include 'header.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>

  <!-- Link to Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Tapestry&display=swap" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    .body-pro {
      font-family: Arial, sans-serif;
      margin: 10;
      padding: 10;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      /* background-color: #FBE7D3; */
    }

    .container-pro {
      text-align: left; /* Aligns text to the left for labels and values */
      width: 100%;
      max-width: 400px;
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header-pro {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
      font-family: 'Tapestry', cursive;
      text-align: center;
    }

    .avatar-pro {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
      border: 3px solid #ddd;
    }

    .avatar-pro img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .row-pro {
      display: flex;
      margin-bottom: 10px;
      align-items: center; /* Aligns text and detail vertically */
    }

    .info-pro {
      width: 35%; /* Ensures consistent width for labels */
      font-size: 16px;
      color: #555;
    }

    .detail-pro {
      width: 65%; /* Ensures consistent alignment for values */
      font-size: 16px;
      color: #555;
    }

    .button-pro {
      display: block;
      margin: 20px auto 0; /* Centers the button below */
      width: 30%;
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .button-pro:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body class="body-pro">
  <div class="container container-pro">
    <!-- First Row: Profile Header -->
    <div class="header-pro">Profile</div>

    <!-- Second Row: Avatar Image -->
    <div class="avatar-pro">
      <img src="images/profile.png" alt="Avatar">
    </div>

    <!-- Profile Details -->
    <div class="row row-pro">
      <div class="info-pro">Name:</div>
      <div class="detail-pro"><?= htmlspecialchars($user['name']) ?></div>
    </div>
    <div class="row row-pro">
      <div class="info-pro">Phone:</div>
      <div class="detail-pro"><?= htmlspecialchars($user['phone_no']) ?></div>
    </div>
    <div class="row row-pro">
      <div class="info-pro">Email:</div>
      <div class="detail-pro"><?= htmlspecialchars($user['email']) ?></div>
    </div>
   
   
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Logout Button -->
<button class="button-pro" onclick="redirectToDashboard()">Logout</button>

<script>
  function redirectToDashboard() {
    // Replace 'dashboard.php' with the actual path to your dashboard page
    window.location.href = 'login.php';
  }
</script>

  <script src="js/main.js"></script>
</body>
</html>

   