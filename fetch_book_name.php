<?php
// Include the database connection
include 'connection.php';

if (isset($_POST['fetch_books_name']) && isset($_POST['book_id'])) {
    $book_id =$_POST['book_id']; // Sanitize input
    if (!empty($book_id)) {
        $query = "SELECT books_name FROM add_book WHERE book_id = ?";
        if ($stmt = $link->prepare($query)) {
            $stmt->bind_param('s', $book_id);
            $stmt->execute();
            $stmt->bind_result($books_name);
            if ($stmt->fetch()) {
                echo htmlspecialchars($books_name, ENT_QUOTES, 'UTF-8'); // Sanitize output
            } else {
                echo "Book not found";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $link->error;
        }
    } else {
        echo "Invalid book ID";
    }
} else {
    echo "Required parameters not set";
}

$link->close();
?>
