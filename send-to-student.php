<?php 
session_start();
if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
    <?php
    exit(); // Exit after redirect
}
include 'inc/header.php';
include 'inc/connection.php';
?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function() {
    $('#rusername').on('input', function() { // Listen for input changes
        var rusername = $(this).val();
        if (rusername) {
            $.ajax({
                url: 'get_student_info.php',
                type: 'POST',
                data: { rusername: rusername },
                success: function(response) {
                    if (response) {
                        $('#studentTable').show(); // Show the table
                        $('#studentTable tbody').html(response);
                    } else {
                        $('#studentTable').hide(); // Hide the table if no response
                    }
                }
            });
        } else {
            $('#studentTable').hide(); // Hide the table if input is empty
        }
    });
});
</script>
<!--dashboard area-->
<div class="dashboard-content">
    <div class="dashboard-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left">
                        <p><span>dashboard</span> Control panel</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right text-right">
                        <a href="dashboard.php"><i class="fas fa-home"></i> home</a>
                        <span class="disabled">send Message to student</span>
                    </div>
                </div>
            </div>
            <div class="sendMessage">
                <form action="" method="post" name="form1" class="col-lg-6" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                <input type="text" name="rusername" id="rusername" class="form-control" placeholder="Student ID">
                            </td>
                        </tr>
                        <tr id="studentTable" style="display: none;"> <!-- Initially hidden -->
                            <td>
                                <table class="table table-bordered border-primary">
                                    <thead class="thead-light font-weight-bold">
                                        <tr>
                                            <th>Name</th>
                                            <th>DOB</th>
                                            <th>Class</th>
                                            <th>Department</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: darkgreen; font-weight: bold;">
                                        <!-- AJAX response will be injected here -->
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="Title" name="title">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="msg" class="form-control" placeholder="Message here...."></textarea>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="submit" value="Send Message" class="btn btn-info">
                </form>
                <?php
                date_default_timezone_set("Asia/Kolkata");
                $time = date("Y-m-d h:i:sa");
                if (isset($_POST["submit"])) {
                    $title = $_POST["title"];
                    $msg = $_POST["msg"]; 
                    if ($title == "" || $msg == "") {
                        echo "<span style='color: red;'><b>Error !</b> Field mustn't be empty</span>";
                    } else {
                        $sql = mysqli_query($link, "INSERT INTO message VALUES('', '$_SESSION[username]', '$_POST[rusername]', '$_POST[title]', '$_POST[msg]', 'n', '$time')");
                        if ($sql) {
                            echo '<script type="text/javascript">Swal.fire("Message Sent Successfully", "", "success").then(() => { window.location = "sent_message.php"; });</script>';
                        } else {
                            echo "<span style='color: red; margin-bottom: 10px;'><b>Warning !</b> Message can't be sent</span>";	
                            echo '<script type="text/javascript">Swal.fire("Message Not Sent", "", "error");</script>'; 
                        }
                    }    
                }
                ?>
            </div>
        </div>                    
    </div>
</div>
<?php 
include 'inc/footer.php';
?>
