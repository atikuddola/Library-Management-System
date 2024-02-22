<?php
 include "connection.php";
?>



<!DOCTYPE html>
<html>
<head>

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

  <style type="text/css">
    .wrapper
    {
        width: 100%;
        background-color: white;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: black;
    }

    .logo img {
        vertical-align: middle;
        width: 110px; /* Adjust the width of the photo */
        height: 48px; /* Adjust the height of the photo */
        margin-right: 20px; /* Add some spacing between the photo and text */
        border-radius: 5px;
    }


    nav {
        float: right;
        word-spacing: 30px;
        padding: 20px;
    }
    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 30px; /* Add a small gap between the links */
    }
    nav li {
        line-height: 20px;
    }

    nav li:first-child {
        margin-left: 0;
    }

    nav li:last-child {
        margin-right: 15px; /* Remove margin for the last list item */
    }

    nav li a {
        font-family: 'Open Sans', sans-serif;
        font-weight: 215;
        font-size: 17px;
        color: white; /* Set the text color to white */
        text-decoration: none;
    }
    section .sec_img {
      height: 100vh;
      margin-top: 0px;
      background-image: url("images/loginblurbg.jpg");
      background-size: cover;
      background-position: center;
      position: relative;
      backdrop-filter: blur(50px); /* Apply blur effect to the entire section */
    }
    
      .middle-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        padding: 70px 0px;
    }

    .middle-content h3 {
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
        font-size: 90px;
        text-align: center;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        padding-bottom: 15px;
    }

    .middle-content a {
      text-align: center;
    }


    .get-started-button {
        display: inline-block;
        padding: 25px 35px;
        background-color: brown;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .get-started-button:hover {
        background-color: #8b5c2d; /* Darker brown color on hover */
    }
  </style>   
</head>
<body>
<div class="wrapper">
	<header>
    <div class="logo">
        <img src="images/libra.png" alt="Logo">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php">CONTACT</a></li>
            <li><a href="index.php">ABOUT</a></li>
            
            

        </ul>
    </nav>
	</header>
  
  <section>
    <div class="sec_img">
      <div class="middle-content">
            <h3 class="login-title">Identify Yourself</h1>

            <a href="admin_login.php" class="get-started-button">Admin</a>
            <a href="student_login.php" class="get-started-button">Student</a>
          </div>
        </div>
      </section>
      <footer>
          <div class="footer-buttons">
              <a href="https://www.facebook.com/your-page-link" target="_blank">
                  <i class="fab fa-facebook fa-3x"></i> <!-- Facebook icon -->
              </a>
              <a href="https://www.instagram.com/your-page-link" target="_blank">
                  <i class="fab fa-instagram fa-3x"></i> <!-- Instagram icon -->
              </a>
              <a href="https://www.linkedin.com/your-page-link" target="_blank">
                  <i class="fab fa-linkedin fa-3x"></i> <!-- LinkedIn icon -->
              </a>
              <a href="https://www.twitter.com/your-page-link" target="_blank">
                  <i class="fab fa-twitter fa-3x"></i> <!-- Twitter icon -->
              </a>
          </div>
        </footer>

</body>
</html>