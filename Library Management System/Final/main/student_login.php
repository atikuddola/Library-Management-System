
<?php
// Include the database connection file
include "connection.php"; // Update with the correct path

// Initialize the session
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($db, "SELECT * FROM student WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        // Successfully logged in
        $_SESSION['username'] = $username;
        header("Location: index_loginstudent.php");
        exit();
    } else {
        // Invalid username or password
        $error_message = "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
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
        .log_img
        {
            height: 100vh;
            margin-top: 0px;
            background-image: url("images/loginblurbg.jpg");
            background-size: cover;
            background-position: center;
            position: relative;
      }

      .box1 {
          position: center;
          height: 400px;
          width: 350px;
          padding: 35px;;
          background-color: black;
          opacity: .8;
          color: white;
          text-align: center;
          border-radius: 15px;
      }
      .get-started-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #8b5c2d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
      }

    </style>
</head>
<body>

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
    <div class="log_img">
      <br>
      <div class="box1">
        
        <h1 class="login-title" style="font-size: 40px;">Your Student Credentials</h1>
        <br>
        <form name="login" action="" method="post">
          <div class="login">
            <input class="form-control" type="text" name="username" placeholder="Username" required="">
            <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
            <input class="btn btn-default" type="submit" name="submit" value="Sign In" style="color: white; background-color: #8b5c2d; font-weight:bold; width: 80px; height: 40px"><br>
            <br>
          </div>
          </form>
                <div id="error-message" style="color: red;">
                    <?php if(isset($error_message)) echo $error_message; ?>
                </div>
          <p class="login-links">
            <span class="new-user">New to Library? <a href="student_registration.php" class="get-started-button">Sign Up</a></span>
        </form>
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


</body>
</html>