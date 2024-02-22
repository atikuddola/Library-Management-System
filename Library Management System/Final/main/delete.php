<?php
include "connection.php";
include "navbar_loginadmin.php";
include "sidenav_admin_black.php";
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
  Delete Book</div>
  <form class="book" action="" method="post">
  <input type="text" name="book_id" class ="form-control" placeholder="Enter Book ID" required=""><br>
  <button class="btn btn-default" type="submit" name="submit" style="text-align: center;">Delete</button>
</form>
  </div>
<?php
if(isset($_POST['submit']))
{ mysqli_query($db,"DELETE from books where book_id='$_POST[book_id]';");
}
?>



</body>

</html>