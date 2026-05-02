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

// Set the default timezone to Indian Standard Time
date_default_timezone_set('Asia/Kolkata');

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
                url: 'attendance_handler.php',
                type: 'POST',
                data: { rusername: rusername },
                success: function(response) {
                    if (response) {
                        $('#studentTable').show(); // Show the table
                        $('#studentTable tbody').html(response);

                        var responseArray = $('<tbody>' + response + '</tbody>'); // Convert response string to jQuery object
                        var name = responseArray.find('tr td:first-child').text();
                        var classVal = responseArray.find('tr td:nth-child(2)').text();

                        $('input[name="name"]').val(name);
                        $('input[name="class"]').val(classVal);

                        // Voice notification
                        var message = (rusername) ? "Welcome" : "Thank you";
                        var speech = new SpeechSynthesisUtterance(message);
                        speechSynthesis.speak(speech);

                        // Automatic form submission
                        $('#form1').submit();

                        // Reload the page immediately after submission
                        location.reload();
                    } else {
                        $('#studentTable').hide(); // Hide the table if no response
                    }
                }
            });
        } else {
            $('#studentTable').hide(); // Hide the table if input is empty
        }
    });

    // Disable all input fields except rusername
    $('input:not(#rusername)').prop('disabled', true);

    // Focus on rusername field after scanning
    $('#rusername').focus();
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
                <form action="" method="post" name="form1" id="form1" class="col-lg-6" enctype="multipart/form-data">
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
                                            <th>Class</th>
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
                                <input type="text" class="form-control" placeholder="Name" name="name" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="class" name="class" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="Date" name="date" value="<?php echo date('Y-m-d'); ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="time in" name="time_in" value="" disabled>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="submit" value="Send Message" class="btn btn-info" style="display: none;">
                </form>
            </div>
        </div>                    
    </div>
</div>
<?php 
include 'inc/footer.php';
?>
