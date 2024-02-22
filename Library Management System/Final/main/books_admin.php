<?php
 include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Books</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>    
<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        background: url('images/booktempblurb.jpg') center/cover fixed no-repeat;
        /* Set the background image and adjust properties */
        font-family: Arial, sans-serif;
        color: #333;
    }

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

    .transparent-box {
        background-color: rgba(255, 255, 255, 0.9); /* Black with opacity */
        padding: 30px;
        border-radius: 10px;
        margin: 50px auto;
        max-width: 1000px;
    }

    .transparent-box h2{
        font-size: 35px;
    }
    .table-responsive {
    overflow-x: auto;
    }

    .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;
    }

    .table th,
    .table td {
        padding: 10px 15px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .star-rating {
        display: inline-block;
        font-size: 20px;
        color: goldenrod; /* Change the color of stars */
    }

    /* Adjust the width of the review column */
    .review-column {
        width: 250px;
    }

    /* Prevent stars from appearing in the next line */
    .star-container {
        white-space: nowrap;
    }

    .department-dropdown {
        margin-bottom: 20px;
        
    }

    .review-column {
        width: 250px;
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
            <li><a href="index_loginadmin.php">HOME</a></li>
			<li><a href="index.php">LOGOUT</a></li>
	
			
		</ul>
	</nav>
	</header>
</div>    
<?php
 include "sidenav_admin.php";
?>  
<div class="transparent-box">
    <h2>List of Books</h2><br> 
    <div class="table-responsive"> 
        <?php
        $res = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`book_id` ASC;");
        echo "<table class='table table-bordered table-hover'> ";
        echo "<tr style ='background-color: white;'>";
        echo "<th>"; echo "Book ID"; echo "</th>";
        echo "<th>"; echo "Book Name"; echo "</th>";
        echo "<th>"; echo "Authors' Name"; echo "</th>";
        echo "<th>"; echo "Edition"; echo "</th>";
        echo "<th>"; echo "Status"; echo "</th>";
        echo "<th>"; echo "Quantity"; echo "</th>";
        echo "<th>"; echo "Department"; echo "</th>";
        echo "<th>&nbsp&nbsp&nbspRating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td>"; echo $row['book_id']; echo "</td>";
            echo "<td>"; echo $row['Name'] ; echo "</td>";
            echo "<td>"; echo $row['Authors_name']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "<td>"; echo $row['quantity']; echo "</td>";
            echo "<td>"; echo $row['department']; echo "</td>";

            $book_name = $row['Name'];
            $avg_query = "SELECT AVG(stars) AS avg_stars FROM `comments` WHERE book_name = '$book_name'";
            $avg_result = mysqli_query($db, $avg_query);
            $avg_row = mysqli_fetch_assoc($avg_result);
            $average_stars = round($avg_row['avg_stars'], 2);

            echo "<td>";
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $average_stars) {
                    echo "<span class='star-rating'>&#9733;</span>"; // Full star
                } else {
                    echo "<span class='star-rating'>&#9734;</span>"; // Empty star
                }
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>"
        ?>
    </div>
</div>
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
