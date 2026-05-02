<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    $page = 'rbook';
    include 'inc/header.php';
    include 'inc/connection.php';
    mysqli_query($link,"update request_books set read1='yes'");
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
							<span class="disabled"> books review</span>
						</div>
					</div>
				</div>
				<div class="issued-content">
					<div class="row">
						<div class="col-md-12">
							<div class="rbook-info status">
							<table id="myTable" class="table table-bordered border-primary">
                                       <thead class="thead-light font-weight: bold;">
										<tr>
											<th>Book Id</th>
											<th>Book Name</th>
											<th>Author</th>								
											<th>Publication</th>
                                            <th>User Id</th>
											<th>Name</th>
											<th>User</th>	
                                            <th>review</th>									
										</tr>
									</thead>
									<tbody style="color:darkgreen; font-weight: bold;">
                                    <?php
                                        $res= mysqli_query($link, "select * from review ORDER BY id DESC");
                                        while ($row=mysqli_fetch_array($res)) {
                                           
                                            echo "<tr>";
                                            echo "<td>"; echo $row["book_id"]; echo "</td>";
                                            echo "<td>"; echo $row["books_name"]; echo "</td>";
                                            echo "<td>"; echo $row["books_author_name"]; echo "</td>";
                                            echo "<td>"; echo $row["books_publication_name"]; echo "</td>";
                                            echo "<td>"; echo $row["idn"]; echo "</td>";
                                            echo "<td>"; echo $row["name"]; echo "</td>";
                                            echo "<td>"; echo $row["utype"]; echo "</td>";
                                            echo "<td>"; echo $row["review"]; echo "</td>";
                                            echo "</tr>";
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