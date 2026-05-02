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
                                  <table id="myTable" class="table table-striped table-dark text-center">
                                       <thead>
                                            <tr>
                                                <th>Book Id</th>
                                                <th>Books Name</th>
                                                <th>User Type</th>
                                                <th>User id</th>
                                                <th>Name</th>
                                                <th>Issue Date</th>
                                                <th>Return Date</th>
                                                <th>status</th>
                                                <th>Return Book</th>
                                            </tr>
                                       </thead>
                                        <tbody>
                                            <?php 
                                            if($row["status"] < "1"){
                                                $res= mysqli_query($link, "select * from issue_book");
                                                $res2= mysqli_query($link, "select * from t_issuebook");
                                                 while ($row=mysqli_fetch_array($res)) {
                                                    echo "<tr>";
                                                    echo "<td>"; echo $row["book_id"]; echo "</td>";
                                                    echo "<td>"; echo $row["books_name"]; echo "</td>";
                                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                                    echo "<td>"; echo $row["id"]; echo "</td>";
                                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                                    echo "<td>"; echo $row["booksissuedate"]; echo "</td>";
                                                    echo "<td>"; echo $row["booksreturndate"]; echo "</td>";
                                                    if ($row["status"] == "1") {
                                                        echo "<td>Returned</td>";
                                                    }  
                                                    else{
                                                        echo "<td> Not Returned</td>";
                                                    }
                                                    echo "<td>";
                                                   ?>
                                                        <ul>
                                                            <li><a style="color: #fff;" href="return.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-undo-alt"></i></a></li>
                                                            <li><a href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i></a></li>
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
                                                    if ($row["status"] == "1") {
                                                        echo "<td>Returned</td>";
                                                    }  
                                                    else{
                                                        echo "<td> Not Returned</td>";
                                                    }                                               
                                                    echo "<td>";
                                                   ?>
                                                        <ul>
                                                            <li><a href="return.php?id=<?php echo $row["idno"]; ?>"><i class="fas fa-undo-alt"></i></a></li>
                                                            <li><a href="delete.php?id=<?php echo $row["idno"]; ?>"><i class="fas fa-trash"></i></a></li>
                                                        </ul> 
                                                    <?php 
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                             ?>
                                        </tbody>
                                  </table>
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
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>