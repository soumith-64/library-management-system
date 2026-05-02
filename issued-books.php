<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    $page = 'ibook';
    include 'inc/header.php';
    include 'inc/connection.php';

 ?>
  <style>
    h2{
        color: cadetblue;
    }

    .dataTables-wrapper{
        width:80% !important;
        margin: auto;
    }
    button{
        padding: 0.25rem 1rem !important;
        color: white !important;
        border: none !important;
        border-radius: 0.5rem !important;
        font-weight: 700 !important;
    }
    .buttons-copy{
        background:lightskyblue !important;
        color: white;
    }
    .buttons-csv{
        background:rgb(1,159,1) !important;
    }
    .buttons-pdf{
        background: rgb(180,59,59) !important;
    }
    .buttons-excel{
        background-color: blue !important;
    }
    .buttons-print{
        background-color: salmon !important;
    }
    thead{
        background-color: cadetblue;
        color: white;
    }
    .prbt{
        padding-left: 50px !important;
    }
    .inputs {
        float: right;
        margin-bottom: 1rem;
    }
 </style>
     <?php 
    date_default_timezone_set("Asia/Kolkata");
    $rttime= date("Y-m-d h:i:sa");
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
							<span class="disabled">issued books</span>
						</div>
					</div>
				</div>
				<div class="issued-content">
					<div class="row">
						<div class="col-md-12">
							<div class="rbook-info status">

        <table class="inputs">
        <tbody>
        <tr>
                    <td>
                    <label for=""><h6>Enter Return Date</h6></label>
                    </td>
                </tr>
            <tr>
            <td><h7>From:</h7></td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td><h7>To :</h7></td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>

                                  <table id="myTable" class="table table-bordered border-primary">
                                       <thead class="thead-light font-weight: bold;">
                                            <tr>
                                                <th>Book Id</th>
                                                <th>Books Name</th>
                                                <th>User Type</th>
                                                <th>User id</th>
                                                <th>Name</th>
                                                <th>Issue Date</th>
                                                <th>Due Date</th>
                                                <th>Return Date</th>
                                                <th>status</th>
                                                <th>Return Book</th>
                                            </tr>
                                       </thead>
                                        <tbody style="color:darkgreen; font-weight: bold;">
                                            <?php 
                                                $res= mysqli_query($link, "SELECT * from issue_book");
                                                $res2= mysqli_query($link, "SELECT * from t_issuebook");
                                                 while ($row=mysqli_fetch_array($res)) {
                                                    echo "<tr>";
                                                    echo "<td>"; echo $row["book_id"]; echo "</td>";
                                                    echo "<td>"; echo $row["books_name"]; echo "</td>";
                                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                                    echo "<td>"; echo $row["regno"]; echo "</td>";
                                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                                    echo "<td>"; echo $row["booksissuedate"]; echo "</td>";
                                                    echo "<td>"; echo $row["booksreturndate"]; echo "</td>";
                                                    echo "<td>"; echo $row["return_date"]; echo "</td>";
                                                    if ($row["status"] == "1") {
                                                        echo "<td>Returned</td>";
                                                    }  
                                                    else{
                                                        echo "<td> Not Returned</td>";
                                                    }
                                                    echo "<td>";
                                                   ?>
                                                        <ul>
                                                            <li><a style="color:green;" href="return.php?id=<?php echo $row["id"]; ?>" ><i class="fas fa-undo-alt"></i></a></li>
                                                            <li><a href="delete.php?id=<?php echo $row["id"]; ?>"  onclick="return checkdelete ()"><i class="fas fa-trash"></i></a></li>
                                                        </ul> 
                                                    <?php 
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                while ($row=mysqli_fetch_array($res2)) {
                                                    echo "<tr>";
                                                    echo "<td>"; echo $row["book_id"]; echo "</td>";
                                                    echo "<td>"; echo $row["books_name"]; echo "</td>";
                                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                                    echo "<td>"; echo $row["idno"]; echo "</td>";
                                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                                    echo "<td>"; echo $row["booksissuedate"]; echo "</td>";
                                                    echo "<td>"; echo $row["booksreturndate"]; echo "</td>";
                                                    echo "<td>"; echo $row["return_date"]; echo "</td>";
                                                    if ($row["status"] == "1") {
                                                        echo "<td>Returned</td>";
                                                    }  
                                                    else{
                                                        echo "<td> Not Returned</td>";
                                                    }                                               
                                                    echo "<td>";
                                                   ?>
                                                        <ul>
                                                        <li><a style="color:green;" href="return.php?id=<?php echo $row["id"]; ?>" ><i class="fas fa-undo-alt"></i></a></li>
                                                        <li><a href="delete.php?id=<?php echo $row["id"]; ?>"  onclick="return checkdelete ()"><i class="fas fa-trash"></i></a></li>
                                                        
                                                        </ul> 
                                                    <?php 
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                             ?>
                                        </tbody>
                                  </table>
                                  <script>
                             function checkdelete()
                            {
                               return confirm ('Are you sure you want to Delete this Record') ;
                            }
</script>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" /> 
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.7/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css" rel="stylesheet">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.7/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js"></script>

<script>
$(document).ready(function () {
    // Initialize DataTable if not already initialized
    if (!$.fn.dataTable.isDataTable('#myTable')) {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    }
    
    const minEl = document.querySelector('#min');
    const maxEl = document.querySelector('#max');

    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = parseInt(minEl.value, 10);
            var max = parseInt(maxEl.value, 10);
            var return_date = parseFloat(data[7]) || 0; // use data for the return_date column

            if (
                (isNaN(min) && isNaN(max)) ||
                (isNaN(min) && return_date <= max) ||
                (min <= return_date && isNaN(max)) ||
                (min <= return_date && return_date <= max)
            ) {
                return true;
            }
            return false;
        }
    );

    minEl.addEventListener('input', function () {
        $('#myTable').DataTable().draw();
    });
    maxEl.addEventListener('input', function () {
        $('#myTable').DataTable().draw();
    });
});
</script>

