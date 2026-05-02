<?php
// Check if a session is already started before calling session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit(); // Exit if not logged in
}

include 'inc/connection.php'; // Include your database connection file

// Set the default timezone to Indian Standard Time
date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['rusername'])) {
    $rusername = mysqli_real_escape_string($link, $_POST['rusername']); // Sanitize input

    $output = ''; // Initialize output variable

    // Retrieve student details based on rusername
    $res = mysqli_query($link, "SELECT * FROM std_registration WHERE regno='$rusername'");
    while ($row = mysqli_fetch_array($res)) {
        $name = $row['name'];
        $class = isset($row['sem']) ? $row['sem'] : 'N/A'; // Check if class key exists

        $output .= "<tr>";
        $output .= "<td>{$name}</td>";
        $output .= "<td>{$class}</td>";
        $output .= "</tr>";
    }

    $res1 = mysqli_query($link, "SELECT * FROM t_registration WHERE idno='$rusername'");
    while ($row = mysqli_fetch_array($res1)) {
        $name = $row['name'];
        $class = isset($row['dept']) ? $row['dept'] : 'N/A'; // Check if dept key exists

        $output .= "<tr>";
        $output .= "<td>{$name}</td>"; 
        $output .= "<td>{$class}</td>";   
        $output .= "</tr>";
    }

    if (!empty($output)) {
        // Insert or update attendance_log table
        $date = date('d-m-Y');
        $current_time = date('H:i:s');

        // Check if there's an open entry for today with time_out NULL
        $query = "SELECT * FROM attendance_log WHERE rusername='$rusername' AND date='$date' AND time_out IS NULL";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
            // Update existing record with time_out
            $query = "UPDATE attendance_log SET time_out='$current_time' WHERE rusername='$rusername' AND date='$date' AND time_out IS NULL";
            mysqli_query($link, $query);

            $message = "Thank you"; // Existing record updated
        } else {
            // Insert new record with time_in
            $query = "INSERT INTO attendance_log (rusername, name, class, date, time_in) VALUES ('$rusername', '$name', '$class', '$date', '$current_time')";
            mysqli_query($link, $query);

            $message = "Welcome"; // New record inserted
        }

        echo $output; // Send the formatted HTML back to the AJAX request

        // Output the message to be spoken by the browser
        echo "<script>
                var speech = new SpeechSynthesisUtterance('$message');
                speechSynthesis.speak(speech);
              </script>";
    } else {
           echo "";
    }
}
?>
