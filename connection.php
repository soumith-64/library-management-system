<?php 
$link = mysqli_connect("localhost", "u663364821_root", "Wwis@2025");

if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($link, "u663364821_project");
?>
