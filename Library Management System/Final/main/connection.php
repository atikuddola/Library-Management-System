<?php

    $db=mysqli_connect("localhost","root","","library management"); /* server name, username,password,database name */

if (!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>