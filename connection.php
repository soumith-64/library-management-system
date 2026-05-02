<?php 
$link = mysqli_connect("localhost", "root", "pass");

if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($link, "root");
?>
