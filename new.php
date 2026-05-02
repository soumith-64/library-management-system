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

if (isset($_GET["book_name"])) {
    $book_name = $_GET["book_name"]; 
}
?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="inc/js/sweetalert2.all.min.js"></script>
<script type="text/javascript">
function redirectToDashboard() {
    window.location = "add-new.php";
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
                        <span class="disabled">Edit</span>
                    </div>
                </div>
            </div>
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-9">
                        <div class="details">
                        <?php
                        if ($book_name) { 
                            $res5 = mysqli_query($link, "SELECT * FROM newa WHERE book_name='$book_name'");
                            if ($row5 = mysqli_fetch_array($res5)) {
                                $book_name = $row5['book_name'];
                            }
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">
                        <div class="photo">
                        <?php
                        if ($book_name) {
                            $res = mysqli_query($link, "SELECT * FROM newa WHERE book_name='$book_name'");
                            while ($row = mysqli_fetch_array($res)){
                                ?><img src="<?php echo $row["photo"]; ?>" height="" width="" alt="Profile Photo"><?php
                            }
                        }
                        ?>
                        </div>
                        <br>
                        <div class="uploadPhoto">
                                <input type="file" name="image" class="form-control">
                        </div>
                        <br>
                            <div class="form-group details-control">
                                <label for="regno" class="text-right">Book Name:</label>
                                <input type="text" class="form-control custom" name="susername" value="<?php echo htmlspecialchars($book_name); ?>" />
                                <div class="text-right mt-20">
                                <button class="btn btn-info" name="submit" id="submit">Update</button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST["submit"])) {
                        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                            $image_name = $_FILES['image']['name'];
                            $temp = explode(".", $image_name);
                            $newfilename = round(microtime(true)) . '.' . end($temp);
                            $imagepath = "upload/" . $newfilename;
                            move_uploaded_file($_FILES["image"]["tmp_name"], $imagepath);
                        } else {
                            $imagepath = ''; // Handle the case where no file is uploaded
                        }

                        // Prepare the statement
                        $stmt = $link->prepare("UPDATE newa SET book_name=?, photo=? WHERE book_name=?");
                        $stmt->bind_param("sss", $book_name, $imagepath, $book_name);

                        if ($stmt->execute()) {
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

                        $stmt->close();
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
