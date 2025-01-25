<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fresh Blooms</title>

  <!-- Link to Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Tapestry&display=swap" rel="stylesheet">

<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 90vh;
      background-color: #FBE7D3;
    }

    .container {
      text-align: center;
    }

    .text {
      font-size: 54px;
      
      margin-bottom: 20px;
      color: #333;
      font-family: 'Tapestry', cursive;
    }

    .avatar {
      width: 200px;
      height: 200px;
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

    .button {
      background-color: #F5F5F5;
      color: black;
      padding: 10px 30px;
      border: none;
      border-radius: 20px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 40px;
      font-family: 'Lora';
    }

    .button:hover {
      background-color: #F26B0F;
      color: white;
    }
</style>
</head>
<body>
  <div class="container">
    <!-- First Row -->
    <div class="text">Fresh Blooms</div>

    <!-- Second Row -->
    <div class="avatar">
      <img src="images/i1.png" alt="Avatar">
    </div>

    <!-- Third Row -->
    <div>
      <a href="about.php">
      <button class="button">Let's Start</button>
      </a>
    </div>
  </div>
</body>
</html>


