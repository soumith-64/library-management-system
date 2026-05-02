<?php
$host = "localhost";
$user = "u663364821_root";
$pass = "Wwis@2025";
$db   = "u663364821_project";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
echo "✅ Connected successfully!";
?>
