<?php
 include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books Requested by Students</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<style>
        body {
            margin: 0;
            padding: 0;
            background: url('images/requested_bookbg.jpg') center/cover fixed no-repeat;
            font-family: Arial, sans-serif;
            color: #333;
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
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            margin: 50px auto;
            max-width: 1000px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px black;
        }

        th, td {
            padding: 10px;
            text-align: left;
            color: black;
        }
        .btn-approve {
            padding: 10px 10px; /* Adjust padding as needed */
            background-color: #3498db; /* Change to your desired background color */
            border: none;
            border-radius: 8px; /* Adjust border-radius for rounded corners */
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-approve:hover {
            background-color: #2980b9; /* Change to your desired hover color */
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
                    <li><a href="books_admin.php">BOOKS</a></li>
                    <li><a href="index.php">LOGOUT</a></li>
                    <li><a href="feedback_view.php">FEEDBACK</a></li> 
                </ul>
            </nav>
        </header>
    </div>    
    <?php
    include "sidenav_admin.php";
    ?>  
    <div class="transparent-box">    
        <h2>List of Books Requested by Students</h2> 
        <div class="table-responsive"> 
        <?php
        $res = mysqli_query($db,"SELECT `student_id`,`book_id`, `name`, `request_date` ,`approval` FROM `requested` ORDER BY `requested`.`request_date` ASC;");

        echo "<table class='table table-bordered table-hover'> ";
        echo "<tr style ='background-color: white;'>";
        echo "<th>"; echo "Student ID"; echo "</th>";
        echo "<th>"; echo "Book ID"; echo "</th>";
        echo "<th>"; echo "Book Name"; echo "</th>";
        echo "<th>"; echo "Request Date"; echo "</th>";
        echo "<th>"; echo "Approval"; echo "</th>";

        echo "</tr>";
        
        while($row = mysqli_fetch_assoc($res)) {
            if ($row['approval']==0){
            echo "<tr>";
            echo "<td>"; echo $row['student_id']; echo "</td>";
            echo "<td>"; echo $row['book_id']; echo "</td>";
            echo "<td>"; echo $row['name'] ; echo "</td>";
            echo "<td>"; echo $row['request_date']; echo "</td>";
            
            echo "<td>";
            echo '<form method="post">';
            echo '<input type="hidden" name="student_id" value="' . $row['student_id'] . '">';
            echo '<input type="hidden" name="book_id" value="' . $row['book_id'] . '">';
            echo '<input type="hidden" name="name" value="' . $row['name'] . '">';
            echo '<input type="submit" name="approve" class="btn-approve" value="Approve">';
            echo "</form>";
            echo "</td>";
            echo "</tr>";

            }
        }
        if (isset($_POST['approve'])) {
        
            $book_id = $_POST['book_id'];
            $student_id = $_POST['student_id'];
            $book_name = $_POST['name'];
            $issue_date = date('Y-m-d');
            $return_date = date('Y-m-d', strtotime('+15 days', strtotime($issue_date)));

            $insert_query = "INSERT INTO `issued`(`student_id`, `book_id`, `name`, `issue_date`, `return date`,`returned`) VALUES ('$student_id', '$book_id', '$book_name', '$issue_date', '$return_date',0)";
            mysqli_query($db, $insert_query);
            $insert_query1 = "INSERT INTO `history`(`student id`, `book id`, `book name`, `issue date`, `return date`) VALUES ('$student_id', '$book_id', '$book_name', '$issue_date', '$return_date')";
            mysqli_query($db, $insert_query1);

            $update_query = "UPDATE `requested` SET `approval` = 1 WHERE `student_id` = $student_id AND `book_id` = $book_id";

            $update_query2 = "UPDATE `books` SET `quantity` = `quantity` - 1 WHERE `book_id` = $book_id";
            $delete_query = "DELETE FROM requested where student_id = $student_id AND book_id = $book_id ";
            
            mysqli_query($db, $update_query);
            mysqli_query($db, $update_query2);
            mysqli_query($db, $delete_query);
        
            // Handle the query execution and errors
            $res1 = mysqli_query($db, "SELECT `quantity` FROM `books` WHERE `book_id` = $book_id");
            if ($res1) {
                $res1_row = mysqli_fetch_assoc($res1);
                $quantity = $res1_row['quantity'];
        
                if ($quantity <= 0) {
                    $update_query3 = "UPDATE `books` SET `status` = 'Not Available' WHERE `book_id` = $book_id";
                    mysqli_query($db, $update_query3);
                }
            } else {
                // Handle the query error
                echo "Error fetching quantity: " . mysqli_error($db);
            }
            if (mysqli_query($db, $insert_query)) {
                echo '<script>alert("Book is approved");</script>';
            }
            ?>
            <script>
            window.location = "requested_admin.php";
            </script>
            <?php
        
    }

        echo "</table>";

        ?>
        </div>
    </div>
    
</body>
</html>