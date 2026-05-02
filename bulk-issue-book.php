<?php 
session_start();

if (!isset($_SESSION["username"])) {
    echo '<script type="text/javascript">window.location="index.php";</script>';
    exit();
}

include 'inc/header.php';
include 'inc/connection.php'; // Include the correct connection file

$rdate = date("d/m/Y", strtotime("+30 days"));
date_default_timezone_set("Asia/Kolkata");
$time = date("Y-m-d");
?>

<style>
    /* Your existing styles */
    .btn {
        width: 130px;
        height: 40px;
        font-size: 1.1em;
        cursor: pointer;
        background-color: #171717;
        color: #fff;
        border: none;
        border-radius: 5px;
        transition: all .4s;
    }

    .btn:hover {
        border-radius: 5px;
        transform: translateY(-10px);
        box-shadow: 0 7px 0 -2px #f85959,
                    0 15px 0 -4px #39a2db,
                    0 16px 10px -3px #39a2db;
    }

    .btn:active {
        transition: all 0.2s;
        transform: translateY(-5px);
        box-shadow: 0 2px 0 -2px #f85959,
                    0 8px 0 -4px #39a2db,
                    0 12px 10px -3px #39a2db;
    }

    button {
        font-family: inherit;
        font-size: 15px;
        background: royalblue;
        color: white;
        padding: 0.7em 1em;
        padding-left: 0.9em;
        display: flex;
        align-items: center;
        border: none;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.2s;
        cursor: pointer;
    }

    button span {
        display: block;
        margin-left: 0.3em;
        transition: all 0.3s ease-in-out;
    }

    button svg {
        display: block;
        transform-origin: center center;
        transition: transform 0.3s ease-in-out;
    }

    button:hover .svg-wrapper {
        animation: fly-1 0.6s ease-in-out infinite alternate;
    }

    button:hover svg {
        transform: translateX(1.2em) rotate(45deg) scale(1.1);
    }

    button:hover span {
        transform: translateX(5em);
    }

    button:active {
        transform: scale(0.95);
    }

    @keyframes fly-1 {
        from {
            transform: translateY(0.1em);
        }

        to {
            transform: translateY(-0.1em);
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('.book_id').on('blur', function() {
            var book_id = $(this).val();
            var inputField = $(this);
            if (book_id != '') {
                $.ajax({
                    url: 'fetch-book-name.php',
                    method: 'POST',
                    data: { fetch_books_name: true, book_id: book_id },
                    success: function(data) {
                        inputField.closest('tr').find('.books_name').val(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        inputField.closest('tr').find('.books_name').val('Error fetching book name');
                    }
                });
            }
        });
    });
</script>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'inc/connection.php'; // Ensure the correct connection file is included

    if (isset($_POST['fetch_books_name']) && isset($_POST['book_id'])) {
        $book_id = $_POST['book_id'];
        
        $stmt = $link->prepare("SELECT books_name FROM add_book WHERE book_id = ?");
        if ($stmt) {
            $stmt->bind_param("s", $book_id);
            $stmt->execute();
            $stmt->bind_result($books_name);
            if ($stmt->fetch()) {
                echo $books_name;
            } else {
                echo "Book not found";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $link->error;
        }
        exit();
    }
}
?>

<!--dashboard area-->
<div class="dashboard-content">
    <div class="dashboard-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left">
                        <p><span>dashboard</span>Control panel</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right text-right">
                        <a href="dashboard.php"><i class="fas fa-home"></i>home</a>
                        <span class="disabled">teacher issue book</span>
                    </div>
                </div>
            </div>
            <div class="issueBook">
                <div class="row">
                    <div class="col-md-6">
                        <div class="issue-wrapper">
                            <form action="" class="form-control" method="post">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <h4>Enter Details</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="">
                                            <input type="text" name="idno" class="form-control" placeholder="Teacher ID">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="number" name="num_books" class="form-control" placeholder="Number of books to issue" min="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" class="btn btn-info" value="Select" name="submit1">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php 
                            if (isset($_POST["submit1"])) {
                                $idno = $_POST['idno'];
                                $num_books = (int)$_POST['num_books'];

                                // Retrieve teacher details
                                $stmt = $link->prepare("SELECT * FROM t_registration WHERE idno = ?");
                                $stmt->bind_param("s", $idno);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($row = $result->fetch_assoc()) {
                                    $name = $row['name'];
                                    $lecturer = $row['lecturer'];
                                    $phone = $row['phone'];
                                    $dept = $row['dept'];
                                    $eligibility = $row['eligibility'];
                                } else {
                                    echo "Teacher not found with ID: $idno";
                                    exit;
                                }
                                $stmt->close();
                                ?>
                                <div class="selected-books">
                                    <h4>Teacher Details
                                    </h4>
                                    <p>Name: <?php echo $name; ?></p>
                                    <p>Lecturer: <?php echo $lecturer; ?></p>
                                    <p>Phone: <?php echo $phone; ?></p>
                                    <p>Department: <?php echo $dept; ?></p>
                                    <p>Eligibility: <?php echo $eligibility; ?></p>
                                    <form method="post" action="">
                                        <table class="table">
                                            <tr>
                                                <th>Book ID</th>
                                                <th>Book Name</th>
                                            </tr>
                                            <?php 
                                            for ($i = 0; $i < $num_books; $i++) { ?>
                                            <tr>
                                                <td>
                                                    <input type="text" name="book_id[]" class="form-control book_id" placeholder="Book ID">
                                                </td>
                                                <td>
                                                    <input type="text" name="books_name[]" class="form-control books_name" readonly>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="submit" class="btn btn-info" value="Issue Books" name="submit2">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                                <?php 
                            }
                            ?>
                            <?php 
                            if (isset($_POST["submit2"])) {
                                $idno = $_POST['idno'];
                                $book_ids = $_POST['book_id'];
                                $issue_date = $time;
                                $return_date = $rdate;

                                foreach ($book_ids as $book_id) {
                                    $stmt = $link->prepare("INSERT INTO issued_books (teacher_id, book_id, issue_date, return_date) VALUES (?, ?, ?, ?)");
                                    $stmt->bind_param("ssss", $idno, $book_id, $issue_date, $return_date);
                                    $stmt->execute();
                                    $stmt->close();
                                }

                                echo '<script type="text/javascript">
                                    Swal.fire({
                                        icon: "success",
                                        title: "Success",
                                        text: "Books have been issued successfully!"
                                    });
                                    </script>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
