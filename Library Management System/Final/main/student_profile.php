<?php
  include "navbar_loginstudent.php";
  include "connection.php";
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION['username'])) {
    header("Location: student_login.php");
    exit();
  }

  // Fetch logged-in user's information from the database
  $username = $_SESSION['username'];
  $query_user = "SELECT * FROM student WHERE username = '$username'";
  $result_user = mysqli_query($db, $query_user);

  if ($result_user) {
    $row_user = mysqli_fetch_assoc($result_user);
    $first_name = $row_user['first name'];
    $last_name = $row_user['last name'];
    $email = $row_user['email'];
    $phone = $row_user['phone'];
  }

  // Fetch books borrowed by the student
  $query_books = "SELECT DISTINCT * FROM issued WHERE student_id = {$row_user['ID']}";
  $result_books = mysqli_query($db, $query_books);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Profile</title>
  <!-- Add your stylesheet links and other head elements here -->
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2; /* Set your desired background color */
      margin: 0;
      padding: 0;
    }

    .profile-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
      color: #333333;
      margin-bottom: 10px;
    }

    p {
      color: #666666;
      margin-bottom: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #e0e0e0;
    }
  </style>
</head>
<body>
  <section>
    <div class="profile-container">
      <h1>Student Profile</h1>
      <p><strong>Name:</strong> <?php echo $first_name . ' ' . $last_name; ?></p>
      <p><strong>Username:</strong> <?php echo $username; ?></p>
      <p><strong>Email:</strong> <?php echo $email; ?></p>
      <p><strong>Phone:</strong> <?php echo $phone; ?></p>

      <h2>Books That You Have Read:</h2>
      <table>
        <tr>
          <th>Book Name</th>
          <th>Author</th>
          <th>Edition</th>
          <th>Issue Date</th>
          
        </tr>
        <?php
          while ($result_books && $row_books = mysqli_fetch_assoc($result_books)) {
            $book_id = $row_books['book_id'];
            $query_book_info = "SELECT * FROM books WHERE book_id = $book_id";
            $result_book_info = mysqli_query($db, $query_book_info);
            $row_book_info = mysqli_fetch_assoc($result_book_info);

            echo '<tr>';
            echo '<td>' . $row_book_info['Name'] . '</td>';
            echo '<td>' . $row_book_info['Authors_name'] . '</td>';
            echo '<td>' . $row_book_info['edition'] . '</td>';
            echo '<td>' . $row_books['issue_date'] . '</td>';
            
            
            
            echo '</tr>';
          }
        ?>
      </table>
    </div>
  </section>
</body>
</html>
