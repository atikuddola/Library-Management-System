<?php
include "connection.php";
include "navbar_loginstudent.php";
include "sidenav_student.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST['book_id'];
    $daysToExtend = $_POST['days_to_extend'];
    
    // Retrieve student ID based on the username
    $username5 = $_SESSION['username'];
    $student_id_query = mysqli_query($db, "SELECT ID FROM student WHERE username = '$username5'");
    
    if ($student_id_query) {
        $student_id_row = mysqli_fetch_assoc($student_id_query);
        $student_id = $student_id_row['ID'];
        
        // Calculate the new return date
        $query = "SELECT `return date` FROM issued WHERE `student_id` = '$student_id' AND `book_id` = '$bookId'";
        $result = mysqli_query($db, $query);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $existingReturnDate = $row['return date'];
            
            // Convert existing return date to a DateTime object
            $existingReturnDateTime = new DateTime($existingReturnDate);
            
            // Calculate the new return date by adding the days to extend
            $newReturnDateTime = $existingReturnDateTime->modify("+$daysToExtend days");
            
            // Format the new return date back to 'Y-m-d'
            $newReturnDate = $newReturnDateTime->format('Y-m-d');
            
            // Update the return date in the database
            $updateQuery = "UPDATE issued SET `return date` = '$newReturnDate' WHERE `student_id` = '$student_id' AND `book_id` = '$bookId'";
            mysqli_query($db, $updateQuery);
            if (mysqli_query($db, $updateQuery)) {
                echo '<script>alert("Time Extended successfully.");</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Extend Return Date</title>
</head>
<body>

<div class="transparent-box">
    <h2>Extend Return Date</h2>

    <form method="post">
        <label for="book_id">Book ID:</label>
        <input type="text" id="book_id" name="book_id" required><br><br>
        
        <label for="days_to_extend">Days to Extend (Max 7 days):</label>
        <input type="number" id="days_to_extend" name="days_to_extend" required min="1" max="7"><br><br>

        
        <input type="submit" value="Extend Return Date">
    </form>
</div>

</body>
</html>
