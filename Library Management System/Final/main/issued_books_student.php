<?php
include "connection.php";
include "navbar_loginstudent.php";
include "sidenav_student.php";

session_start();
$username2 = $_SESSION['username'];
$student_id_query = mysqli_query($db, "SELECT ID FROM student WHERE username = '$username2'");
if ($student_id_query) {
    $student_id_row = mysqli_fetch_assoc($student_id_query);
    $student_id = $student_id_row['ID'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issued Books</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('images/issuedbookbg.jpg') center/cover fixed no-repeat;
            font-family: Arial, sans-serif;
            color: #333;
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

        .green-button {
            height: 35px ;
            width:  67px;
            background-color: green;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

        .red-button {
            height: 15px ;
            width:  30px;
            background-color: red;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }


    </style>
</head>
<body>

<div class="transparent-box">
    <h2>List of Issued Books</h2>

    <?php
    $res = mysqli_query($db, "SELECT DISTINCT `book_id`, `name`, `issue_date`, `return date`, `returned` FROM `issued` WHERE `student_id` = '$student_id' ORDER BY `issue_date` ASC;");
   
    echo "<table>";
    echo "<tr>";
    echo "<th>Book ID</th>";
    echo "<th>Book Name</th>";
    echo "<th>Issue Date</th>";
    echo "<th>Days Left to Return</th>";
    echo "<th>Action</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($res)) {
        if ($row['returned']==0){
        echo "<tr>";
        echo "<td>" . $row['book_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['issue_date'] . "</td>";
        // Calculate and display days left
        $returnDate = strtotime($row['return date']);
        $currentDate = time();
        $daysLeft = floor(($returnDate - $currentDate) / (60 * 60 * 24));

        if ($daysLeft < 0) {
            echo "<td>Action Needed</td>";
        } else {
            $percentageRemaining = ($daysLeft / 15) * 100;

            if ($percentageRemaining > 21.42) {
                echo "<td><span style='background-color: green; color: white; padding: 5px; border-radius: 5px;'>$daysLeft days</span></td>";
            } else {
                echo "<td><span style='background-color: red; color: white; padding: 5px; border-radius: 5px;'>$daysLeft days</span></td>";
            }
        }
        echo "<td><button class='more-button " . ($daysLeft > 0 ? "green-button" : "red-button") . "' onclick='location.href=\"action.php\"'>More</button>";
        echo '<form method="post">';
                echo '<input type="hidden" name="book_id" value="' . $row['book_id'] . '">';
                echo '<input type="hidden" name="name" value="' . $row['name'] . '">';
                echo '<input type="submit" name="Return" class="btn btn-primary" value="Return">';
                echo "</form>"; echo "</td>";
        
        echo "</tr>";
        

    }

}
if (isset($_POST['Return'])) {
    $bookId = $_POST['book_id'];

    $update_query = "UPDATE `issued` SET `returned` = 1 WHERE `book_id` = '$bookId' AND `student_id` = '$student_id'";
    $update_query1 = "UPDATE `books` SET `quantity` = `quantity` + 1 WHERE `book_id` = '$bookId'";
    $update_query2 = "UPDATE `requested` SET `approval` = 0 WHERE `book_id` = '$bookId' AND `student_id` = '$student_id'";

    mysqli_query($db, $update_query);
    mysqli_query($db, $update_query1);
    mysqli_query($db, $update_query2);
    if (mysqli_query($db, $update_query)) {
        echo '<script>alert("Books is returned");</script>';
    }
    ?>
    <script>
    window.location = "issued_books_student.php";
    </script>
    <?php
}
    echo "</table>";
    
  
    
     ?>
</div>

</body>
</html>
