<?php
include "connection.php";
include "navbar_loginstudent.php";
include "sidenav_student.php";

session_start();
$username3 = $_SESSION['username'];
$student_id_query = mysqli_query($db, "SELECT ID FROM student WHERE username = '$username3'");
if ($student_id_query) {
    $student_id_row = mysqli_fetch_assoc($student_id_query);
    $student_id = $student_id_row['ID'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Requested Books</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('images/requestedbookbg.jpg') center/cover fixed no-repeat;
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

        .status-pending {
            padding: 5px;
            border-radius: 5px;
            position: relative;
            display: inline-block;
        }

        .status-pending:before {
            content: "Pending";
            background-color: gold;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }
    </style>
</head>
<body>

<div class="transparent-box">
    <h2>List of Requested Books</h2>

    <?php
    $res = mysqli_query($db, "SELECT `book_id`, `name`, `request_date`, `approval` FROM `requested` WHERE `approval` = 0 AND `student_id` = '$student_id' ORDER BY `request_date` ASC;");
   
    echo "<table>";
    echo "<tr>";
    echo "<th>Book ID</th>";
    echo "<th>Book Name</th>";
    echo "<th>Request Date</th>";
    echo "<th>Status</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>";
        echo "<td>" . $row['book_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['request_date'] . "</td>";
        echo "<td class='status-pending'>Pending</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

</div>

</body>
</html>
