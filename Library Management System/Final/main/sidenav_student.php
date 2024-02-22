<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 160%;
  margin-top: 56px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* Style for the "open" span */
.open-icon {
  font-size: 30px;
  cursor: pointer;
  color: white; /* Set the color to white */
}

@media screen and (max-height: 300px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover
{
  color:white;
  width: 200px;
  height: 50px;
  background-color: #00544c ;
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav" >
  
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="student_profile.php">Profile</a></div>
  <div class="h"><a href="books_student.php">Books</a></div>
  <div class="h"><a href="requested_student.php">Requsted Books</a></div>
  <div class="h"><a href="issued_books_student.php">Books Issued</a>
</div></div>

<div id="main">
  <span class="open-icon" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("mySidenav").style.opacity = "30"
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</div> 
</body>
</html>