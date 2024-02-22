<?php
include "connection.php";
include "navbar_loginadmin.php";
include "sidenav_admin_black.php";

if (isset($_POST['submit'])) {
    $query = "INSERT INTO `books`(`book_id`, `Name`, `Authors_name`, `edition`, `status`, `quantity`, `department`) 
              VALUES ('$_POST[book_id]','$_POST[Name]','$_POST[Authors_name]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]')";

    if (mysqli_query($db, $query)) {
        echo '<script type="text/javascript">';
        echo 'alert("Successfully Added");';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Error Adding Book");';
        echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
#main {
  transition: margin-left .5s;
  padding: 16px;
}
.book
{
    width: 200px;
    height: 200px;
    margin: 0px auto;
}
.form-control
{
    height: 40px;
    width: 400px;
    margin: 0px auto;
}
</style>
</head>
<body>
<div id="main">
  
  <div class= "container">
  <h2 style="color:black; font-family:Lucida Console; text-align: center">
  Add New Books</h2>
  <form class="book" action="" method="post">
  <input type="text" name="book_id" class ="form-control" placeholder="Book ID" required=""><br>
  <input type="text" name ="Name" class="form-control" placeholder = "Book Name" required="">
  <input type="text" name="Authors_name" class ="form-control" placeholder="Authors" required=""><br>
  <input type="text" name="edition" class ="form-control" placeholder="Edition" required=""><br>
  <input type="text" name="status" class ="form-control" placeholder="Status" required=""><br>
  <input type="text" name="quantity" class ="form-control" placeholder="Quantity" required=""><br>
  <input type="text" name="department" class ="form-control" placeholder="Department" required=""><br>
  <button class="btn btn-default" type="submit" name="submit" style="text-align: center;">ADD</button>
</form>
  </div>
</div>
</body>
</html>
