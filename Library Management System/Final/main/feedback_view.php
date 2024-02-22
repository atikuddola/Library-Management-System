<?php
include "connection.php";
include "navbar_loginadmin.php";

// Fetch comments from the database
$res = mysqli_query($db,"SELECT * FROM `comments` ORDER BY `comment` ASC;");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('images/feedbackbg2blur.jpg') center/cover fixed no-repeat;
            /* Set the background image and adjust properties */
            font-family: Arial, sans-serif;
            color: #333;
        }

        .transparent-box {
            background-color: rgba(255, 255, 255, 0.9); /* Black with opacity */
            padding: 20px;
            border-radius: 10px;
            margin: 50px auto;
            max-width: 1000px;
            border-radius: 5px;
            height: 240px auto;
            width: 400px;
        }
        .transparent-box h2{
            font-size: 35px;
        }
    </style>
</head>
<body>

<div class="transparent-box">
    <h2>List of Comments</h2>

    <?php
    // Loop through each comment and display them
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<div>";
        echo "<p>" . $row['comment'] . "</p>";
        echo "</div>";
        echo "<hr>";
    }

    
    ?>

</div>
</body>
</html>
