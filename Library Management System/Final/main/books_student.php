<?php
include "connection.php";
include "navbar_loginstudent.php";
include "sidenav_student.php";
session_start();
$username1 = $_SESSION['username'];
    
// Get all unique department values from the books table
$departments_query = "SELECT DISTINCT department FROM books";
$departments_result = mysqli_query($db, $departments_query);
$departments = mysqli_fetch_all($departments_result, MYSQLI_ASSOC);

// Get the selected department from the URL parameter
$selected_department = isset($_GET['department']) ? $_GET['department'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('images/booktempblurb.jpg') center/cover fixed no-repeat;
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
        }

        .transparent-box h2{
            font-size: 35px;
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

    </style>
</head>
<body>

<div class="transparent-box">
    <h2>List of Books</h2>

    <!-- Department Dropdown -->
    <div class="department-dropdown">
        <label for="department">Select Department: </label>
        <select id="department" name="department" onchange="changeDepartment(this.value)">
            <option value="">All Departments</option>
            <?php
            foreach ($departments as $department) {
                $dept = $department['department'];
                $selected = ($dept === $selected_department) ? 'selected' : '';
                echo "<option value='$dept' $selected>$dept</option>";
            }
            ?>
        </select>
    </div>

    <?php
    // Modify the SQL query based on the selected department
    $query = "SELECT * FROM `books`";
    if ($selected_department) {
        $query .= " WHERE department = '$selected_department'";
    }
    $query .= " ORDER BY `books`.`book_id` ASC;";

    $res = mysqli_query($db, $query);

    // Display books if any are found
    if (mysqli_num_rows($res) > 0) {
        echo "<table class='table table-bordered table-hover'> ";
        echo "<tr style ='background-color: white;'>";
        echo "<th>Book ID</th>";
        echo "<th>Book Name</th>";
        echo "<th>Authors' Name</th>";
        echo "<th>Edition</th>";
        echo "<th>Status</th>";
        echo "<th>Quantity</th>";
        echo "<th>Department</th>";
        echo "<th>&nbsp&nbsp&nbspRating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>"; // Add this column for reviews
        echo "<th>Want to Add?</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>{$row['book_id']}</td>";
            echo "<td>{$row['Name']}</td>";
            echo "<td>{$row['Authors_name']}</td>";
            echo "<td>{$row['edition']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>{$row['department']}</td>";

            // Display stars based on average rating
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

            echo "<td>";
            if ($row['status'] == "Available") {
                echo '<form method="post">';
                echo '<input type="hidden" name="book_id" value="' . $row['book_id'] . '">';
                echo '<input type="hidden" name="Name" value="' . $row['Name'] . '">';
                echo '<input type="submit" name="Add" class="btn btn-primary" value="Add">';
                echo "</form>";
            } else {
                echo "Not Available";
            }
            echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No books found for the selected department.</p>";
    }

    if (isset($_POST['Add'])) {
        $book_id = $_POST['book_id'];
        $book_name = $_POST['Name'];
        $request_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime('+15 days', strtotime($request_date)));
        
    
        $student_id_query = mysqli_query($db, "SELECT ID FROM student WHERE username = '$username1'");
        if ($student_id_query) {
            $student_id_row = mysqli_fetch_assoc($student_id_query);
            $student_id = $student_id_row['ID'];
        } else {
            echo "Error fetching student ID: " . mysqli_error($db);
        }
    
        
        $check = mysqli_query($db, "SELECT `student_id`, `book_id` FROM requested WHERE student_id =$student_id AND book_id=$book_id ");

      
        if (mysqli_num_rows($check) == 0 ) {
        
        $insert_query = mysqli_query($db, "INSERT INTO `requested`(`student_id`, `book_id`, `name`, `request_date`, `return date`, `approval`) VALUES ('$student_id', '$book_id', '$book_name', '$request_date', '$return_date',0)");
        
        if ($insert_query){

            
        
            echo '<script>alert("Book added to request list successfully.");</script>';
        } 
   }

        else {
            ?>
            <script type ="text/javascript">
            alert("Already requested")
            window.location="books_student.php"
          </script> <?php
        }
    
}

    ?>

</div>

<script>
    function changeDepartment(selectedDept) {
        window.location.href = `?department=${selectedDept}`;
    }
</script>

</body>
</html>
