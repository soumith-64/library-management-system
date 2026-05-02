<?php 
session_start();
if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
include 'inc/header.php';
include 'inc/connection.php';

$id = "";
$name = "";
$utype = "";
$book_id = "";
$booksname = "";
$fine = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"]; 
}

?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="inc/js/sweetalert2.all.min.js"></script>
<script type="text/javascript">
function redirectToDashboard() {
    window.location = "fine.php";
}
</script>

<!--dashboard area-->
<div class="dashboard-content">
    <div class="dashboard-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left">
                        <p><span>dashboard</span>User panel</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right text-right">
                        <a href="dashboard.php"><i class="fas fa-home"></i>home</a>
                        <span class="disabled">profile</span>
                    </div>
                </div>
            </div>
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-9">
                        <div class="details">
                        <?php
                            $res5 = mysqli_query($link, "SELECT * FROM finezone WHERE id='$id'");  
                            if ($row5 = mysqli_fetch_array($res5)) {
                                $name = $row5['name'];
                                $utype = $row5['utype'];
                                $book_id = $row5['book_id'];
                                $booksname = $row5['booksname'];
                                $fine = $row5['fine'];
                            } else {
                                echo "No data found for ID: " . $id;
                            }
                        ?>
                        <form method="post">
                            <div class="form-group details-control">
                                <label for="regno" class="text-right">Name:</label>
                                <input type="text" class="form-control custom" name="name" value="<?php echo $name; ?>" disabled/>
                            </div>
                            <div class="form-group details-control">
                                <label for="name" class="text-right">Utype:</label>
                                <input type="text" class="form-control custom" name="utype" value="<?php echo $utype; ?>" disabled />
                            </div>
                            <div class="form-group details-control">
                                <label for="sem" class="text-right">Book id:</label>
                                <input type="text" class="form-control custom" name="book_id" value="<?php echo $book_id; ?>" disabled/>
                            </div>
                            <div class="form-group details-control">
                                <label for="sem" class="text-right">Book Name:</label>
                                <input type="text" class="form-control custom" name="booksname" value="<?php echo $booksname; ?>" disabled/>
                            </div>
                            <div class="form-group details-control">
                                <label for="sem" class="text-right">Fine:</label>
                                <input type="text" class="form-control custom" name="fine" value="<?php echo $fine; ?>" />
                            </div>
                            <div class="text-right mt-20">
                                <button class="btn btn-info" name="update" id="update">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
               
                    <?php
                    if (isset($_POST["update"])) {
                        $fine = $_POST['fine'];
                        $updateQuery = "UPDATE finezone SET fine='$fine' WHERE id='$id'";

                        if (mysqli_query($link, $updateQuery)) {
                            ?>
                            <script type="text/javascript">
                            Swal.fire("Message Updated Successfully", "", "success").then(() => {
                                redirectToDashboard();
                            });
                            </script>
                            <?php
                        } else {
                            echo "Error updating record: " . mysqli_error($link);
                        }
                    }
                    ?>
                </div>    
            </div>
        </div>
    </div>                  
</div>
<?php 
include 'inc/footer.php';
?>
