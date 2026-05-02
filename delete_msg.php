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
        mysqli_query($link, "DELETE from message where id=$id");

        ?>
        <script type="text/javascript">
            window.location="sent_message.php";
        </script>
        <?php
    }



?>