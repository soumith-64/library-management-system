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
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		mysqli_query($link, "DELETE from std_registration where regno=$id");
        mysqli_query($link, "DELETE from t_registration where idno=$id");
		?>
		<script type="text/javascript">
			window.location="status.php";
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			window.location="status.php";
		</script>
		<?php
	}


 ?>