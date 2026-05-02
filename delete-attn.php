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
    if (isset($_GET["book_id"])) {
        $id = $_GET["book_id"];
        mysqli_query($link, "delete from attendance_log where id=$id");

        ?>
        <script type="text/javascript">
            window.location="display_attn.php";
        </script>
        <?php
    }



?>