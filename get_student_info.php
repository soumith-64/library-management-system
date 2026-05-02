<?php
include 'inc/connection.php'; // Include your database connection file

if (isset($_POST['rusername'])) {
    $rusername = mysqli_real_escape_string($link, $_POST['rusername']); // Sanitize input

    $output = ''; // Initialize output variable

    $res = mysqli_query($link, "SELECT * FROM std_registration WHERE regno='$rusername'");
    while ($row = mysqli_fetch_array($res)) {
        $name = $row['name'];
        $DOB = $row['DOB'];
        $sem = $row['sem'];
        $dept = $row['dept'];

        $output .= "<tr>";
        $output .= "<td>{$name}</td>";
        $output .= "<td>{$DOB}</td>";
        $output .= "<td>{$sem}</td>";
        $output .= "<td>{$dept}</td>";   
        $output .= "</tr>";
    }

    $res1 = mysqli_query($link, "SELECT * FROM t_registration WHERE idno='$rusername'");
    while ($row = mysqli_fetch_array($res1)) {
        $name = $row['name'];
        $DOB = $row['DOB'];
        $lecturer = $row['lecturer'];
        $dept = $row['dept'];

        $output .= "<tr>";
        $output .= "<td>{$name}</td>";
        $output .= "<td>{$DOB}</td>";
        $output .= "<td>{$lecturer}</td>";  
        $output .= "<td>{$dept}</td>";   
        $output .= "</tr>";
    }

    echo $output; // Send the formatted HTML back to the AJAX request
}
?>
