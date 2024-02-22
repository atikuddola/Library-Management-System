<?php
include "connection.php";
include "navbar_loginadmin.php";
include "sidenav_admin_black.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issued Books History</title>
    <style>
        /* Your CSS styles here */
        body, h2 {
            margin: 0;
            padding: 0;
        }

        /* Container for the entire content */
        .container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        .popup-content {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px;
            z-index: 1;
            height: 250px auto;
            width: 500px;
        }

        .popup-button {
            background-color: blue;
            color: white;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
        }
        .transparent-box {
        background-color: rgba(255, 255, 255, 1); /* Black with opacity */
        padding: 30px;
        border-radius: 10px;
        margin: 50px auto;
        max-width: 1000px;
    }
    </style>
</head>
<body>
    <div class="transparent-box">
        <h2>List of Students Issue History</h2>
        
        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Books Issued</th>
            </tr>
            
            <?php
            $query1 = mysqli_query($db, "SELECT DISTINCT `student_id` FROM `issued`;");
            
            while ($row1 = mysqli_fetch_assoc($query1)) {
                echo "<tr>";
                echo "<td>" . $row1['student_id'] . "</td>";
                
                $query2 = mysqli_query($db, "SELECT DISTINCT `first name`, `last name` FROM `student` WHERE ID = {$row1['student_id']};");
                $name = mysqli_fetch_assoc($query2);
                
                echo "<td>" . $name['first name'] . " " . $name['last name'] . "</td>";
                echo "<td>";
                
                $res = mysqli_query($db, "SELECT DISTINCT `book_id`, `name`, `issue_date`,`returned` FROM `issued` WHERE `student_id` = {$row1['student_id']} ORDER BY `issue_date` ASC;");
                
                echo '<button class="popup-button">History</button>';
                echo '<div class="popup-content">';
                echo "<table>";
                echo "<tr>";
                echo "<th>Book ID</th>";
                echo "<th>Book Name</th>";
                echo "<th>Issue Date</th>";
                echo "<th>Return State</th>";
                echo "</tr>";
                
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['book_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['issue_date'] . "</td>";
                    echo "<td>";
                    if ($row['returned'] == 0) {
                    echo "Not returned";
                    } else {
                    echo "Returned";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                echo '</div>';
                
                echo "</td>";
                echo "</tr>";
            }
            
            ?>
            
        </table>
    </div>

    <script>
        const popupButtons = document.querySelectorAll('.popup-button');

        popupButtons.forEach(button => {
            const popupContent = button.nextElementSibling;
            button.addEventListener('click', () => {
                if (popupContent.style.display === 'block') {
                    popupContent.style.display = 'none';
                } else {
                    popupContent.style.display = 'block';
                }
            });
        });
    </script>
</body>
</html>
