<?php
 include "navbar_loginstudent.php";
 include "connection.php"
?>

<!DOCTYPE html>
<html>
<head>
  <title>Feedback</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    body
    {
        background-image: url("images/feedbackbg2blur.jpg");
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        padding: 0;
    }
    .wrapper
    {
        padding: 10px;
        margin: 20px auto; 
        width: 600px;
        background-color: black;
        opacity: .65;
        color: white;
    }
    .form-control
    {
        height: 70px;
        width: 100%;
    }
    .star-section {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }
    .star-label {
        margin-right: 10px;
    }
  </style>   
</head>
<body>
    <div class="wrapper">
        <h3>Help Us to Get Better</h3>
        <form action="" method="post">
            <input class="form-control" type="text" name="comment" placeholder="Your Suggestion"><br>
            <input class="form-control" type="text" name="book_name" placeholder="Enter the book name"><br>
            <div class="star-section">
                <label class="star-label">Give Stars:</label>
                <select class="form-control" name="stars">
                    <option value="1">1 star</option>
                    <option value="2">2 stars</option>
                    <option value="3">3 stars</option>
                    <option value="4">4 stars</option>
                    <option value="5">5 stars</option>
                </select>
            </div>
            <br>
            <input class="btn btn-default" type="submit" name="submit" value="Submit" style="width: 125px; height: 40px;">
        </form>    
    </div>

    <div>
        <?php
            if(isset($_POST["submit"]))
            {
                $bookName = $_POST["book_name"];
                $comment = $_POST["comment"];
                $stars = $_POST["stars"];

                // Assuming you have columns like 'book_name', 'comment', and 'stars' in your 'comments' table
                $sql = "INSERT INTO `comments` (`book_name`, `comment`, `stars`) VALUES ('$bookName', '$comment', '$stars');";
                mysqli_query($db, $sql);
            }
        ?>
    </div>
</body>
</html>
