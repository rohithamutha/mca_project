<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <!-- Link to Google Fonts (optional for styling the font) -->
  <link href="https://fonts.googleapis.com/css2?family=Tapestry&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #FBE7D3;
    }

    .container {
      text-align: center;
      width: 100%;
      max-width: 400px;
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .text {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
      font-family: 'Tapestry', cursive;
    }

    .avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
      border: 3px solid #ddd;
    }

    .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .input-field {
      width: 80%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
    }

    .button {
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

    .button:hover {
      background-color: #45a049;
    }

    .signup-text {
      margin-top: 15px;
      font-size: 14px;
      color: #333 #4CAF50;
      
    }

    .signup-text a {
      color:;
      text-decoration: none;
    }

    .signup-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- First Row: Welcome to Login -->
    <div class="text">Welcome to Login</div>

    <!-- Second Row: Avatar Image -->
    <div class="avatar">
      <img src="images/login.jpg" alt="Avatar">
    </div>
    <form action="api/login.php" method="POST">
    <!-- Third Row: Email Input -->
    <input type="email" name="email" class="input-field" placeholder="Email" required>

    <!-- Fourth Row: Password Input -->
    <input type="password" name="password" class="input-field" placeholder="Password" required>
    <!-- Fifth Row: Login Button -->
    <button class="button" type="submit">Login</button>
  </form>
    <!-- Sixth Row: Sign-up Link -->
    <div class="signup-text">
      Don't have an account? <a href="signup.php">Create an account</a>
    </div>
  </div>
</body>
</html>