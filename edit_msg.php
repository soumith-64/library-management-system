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
    window.location = "sent_message.php";
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
                        if ($id) { 
                            $res5 = mysqli_query($link, "SELECT * FROM message WHERE id='$id'");
                            if ($row5 = mysqli_fetch_array($res5)) {
                                $susername = $row5['susername'];
                                $rusername = $row5['rusername'];
                                $title = $row5['title'];
                                $msg = $row5['msg'];
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="form-group details-control">
                                <label for="regno" class="text-right">From:</label>
                                <input type="text" class="form-control custom" name="susername" value="<?php echo htmlspecialchars($susername); ?>" disabled/>
                            </div>
                            <div class="form-group details-control">
                                <label for="name" class="text-right">To:</label>
                                <input type="text" class="form-control custom" value="<?php echo htmlspecialchars($rusername); ?>" disabled />
                            </div>
                            <div class="form-group details-control">
                                <label for="sem" class="text-right">Title:</label>
                                <input type="text" class="form-control custom" name="title" value="<?php echo htmlspecialchars($title); ?>" />
                            </div>
                            <div class="form-group details-control">
                                <label for="sem" class="text-right">Message:</label>
                                <input type="text" class="form-control custom" name="msg" value="<?php echo htmlspecialchars($msg); ?>" />
                            </div>
                            <div class="text-right mt-20">
                                <button class="btn btn-info" name="update" id="update">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST["update"])) {
                        $stmt = $link->prepare("UPDATE message SET title=?, msg=? WHERE id=?");
                        $stmt->bind_param("ssi", $_POST['title'], $_POST['msg'], $id);

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
