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
        $book_id = $_GET["book_id"];
        mysqli_query($link, "delete from add_book where book_id=$book_id");

        ?>
        <script type="text/javascript">
            window.location="display-books.php";
        </script>
        <?php
    }



?>