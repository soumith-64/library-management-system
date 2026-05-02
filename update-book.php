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
        $call_no = $_POST['call_no'];
        $ISBNNumber = $_POST['ISBNNumber'];
        $Bill_No = $_POST['Bill_No'];
        $books_name = $_POST['books_name'];
        $books_author_name = $_POST['books_author_name'];
        $Language = $_POST['Language'];
        $books_publication_name = $_POST['books_publication_name'];
        $books_publication_date = $_POST['books_publication_date'];
        $Edition = $_POST['Edition'];
        $books_purchase_date = $_POST['books_purchase_date'];
        $books_price = $_POST['books_price'];
        $books_quantity = $_POST['books_quantity'];
        $books_availability = $_POST['books_availability'];
        $Subject = $_POST['Subject'];
        $Remark = $_POST['Remark'];
        $location = $_POST['location'];
    
        $query = "UPDATE add_book SET book_id='$book_id', call_no='$call_no', ISBNNumber='$ISBNNumber', books_name='$books_name', Bill_No='$Bill_No', books_author_name='$books_author_name', Language='$Language', books_publication_name='$books_publication_name', books_publication_date='$books_publication_date', Edition='$Edition', books_purchase_date='$books_purchase_date', books_price='$books_price', books_quantity='$books_quantity', books_availability='$books_availability', Subject='$Subject', Remark='$Remark', location='$location' WHERE book_id='$book_id' ";
    
        // Execute the update query
        $result = mysqli_query($link, $query);
    
        if ($result) {
            ?>
            <script type="text/javascript">
              Swal.fire("Saved!", "", "success").then((result) => {
            if (result.isConfirmed) {
            window.location.href = "display-books.php"; // Change this to the desired page URL
            }
             });
            </script>
            <?php
        } else {
            echo "Error updating record: " . mysqli_error($link);
        }
    }
        ?>
        <script type="text/javascript">
            window.location="display-books.php";
        </script>
        <?php



?>