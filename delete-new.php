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
if (isset($_GET["book_name"])) {
    $book_name = $_GET["book_name"];
    // Use prepared statement to avoid SQL injection
    $stmt = $link->prepare("DELETE FROM newa WHERE book_name = ?");
    $stmt->bind_param('s', $book_name);
    $stmt->execute();
    $stmt->close();

    ?>
    <script type="text/javascript">
        window.location="add-new.php";
    </script>
    <?php
}
?>
