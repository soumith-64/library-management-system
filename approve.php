<?php
    session_start();
    if (!isset($_SESSION["username"])) {
    ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
    <?php
    }

	include 'inc/connection.php';
	$id= $_GET["id"];
	mysqli_query($link, "UPDATE std_registration set status='yes' where regno=$id");
    mysqli_query($link, "UPDATE t_registration set status='yes' where idno=$id");
 ?>

 <script type="text/javascript">
 	window.location="status.php";
 </script>


<?php 
     $res = mysqli_query($link, "SELECT * from std_registration where regno=$id");
     $res2 = mysqli_query($link, "SELECT * from t_registration where idno=$id");
    while($row = mysqli_fetch_array($res)){
        $email      = $row['email']; 
    }
    while($row2 = mysqli_fetch_array($res2)){
        $email      = $row2['email'];
    }
    $to = "$email";
    $subject = "Account Conformation";
    $message = "Your account is approved. Now you can login your account";
    $headers = "From: parttimemail18@gmail.com";
    mail($to,$subject,$message,$headers);
?>

 