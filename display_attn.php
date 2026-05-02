<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
 <style>
    h2{
        color: cadetblue;
    }
    body{
        text-shadow: 20px;
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

    .buttons-colvis{
        background-color: paleturquoise !important;
    }
    .buttons.colVisOption {
        color: white !important;
        background-color: paleturquoise !important;
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


    .buttons {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  background-color: rgb(20, 20, 20);
  border: none;
  font-weight: 600;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
  gap: 2px;
}

.svgIcon {
  width: 12px;
  transition-duration: 0.3s;
}

.svgIcon path {
  fill: white;
}

.buttons:hover {
  transition-duration: 0.3s;
  background-color: rgb(255, 69, 69);
  align-items: center;
  gap: 0;
}

.bin-top {
  transform-origin: bottom right;
}
.buttons:hover .bin-top {
  transition-duration: 0.5s;
  transform: rotate(160deg);
}

.edit-button {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: rgb(20, 20, 20);
  border: none;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
  cursor: pointer;
  transition-duration: 0.3s;
  overflow: hidden;
  position: relative;
  text-decoration: none !important;
}

.edit-svgIcon {
  width: 17px;
  transition-duration: 0.3s;
}

.edit-svgIcon path {
  fill: white;
}

.edit-button:hover {
  width: 90px;
  border-radius: 50px;
  transition-duration: 0.3s;
  background-color: rgb(255, 69, 69);
  align-items: center;
}

.edit-button:hover .edit-svgIcon {
  width: 20px;
  transition-duration: 0.3s;
  transform: translateY(60%);
  -webkit-transform: rotate(360deg);
  -moz-transform: rotate(360deg);
  -o-transform: rotate(360deg);
  -ms-transform: rotate(360deg);
  transform: rotate(360deg);
}

.edit-button::before {
  display: none;
  content: "Edit";
  color: white;
  transition-duration: 0.3s;
  font-size: 2px;
}

.edit-button:hover::before {
  display: block;
  padding-right: 10px;
  font-size: 13px;
  opacity: 1;
  transform: translateY(0px);
  transition-duration: 0.3s;
}

 </style>
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
							<span class="disabled">display books</span>
						</div>
					</div>
				</div>				
			</div>	
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dbooks">



                            <table id="myTable" class="table table-bordered border-primary">
                           <thead class="thead-light font-weight: bold;">
                                <tr >
                                     <th>Id</th>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Date</th>
                                    <th>In Time</th>
                                    <th>Out Time</th>
                                    <th>Delete</th>
                                </tr>
                           </thead>
                            
                            <tbody style="color:darkgreen; font-weight: bold;">
                             <?php
                                $res = mysqli_query($link, "select * from attendance_log");
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["id"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["rusername"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["class"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["date"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["time_in"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["time_out"];
                                    echo "</td>";
                                    echo "<td>";
                                    ?><a href="delete-attn.php?book_id=<?php echo $row["id"]; ?>" onclick="return checkdelete ()"><button class="buttons">
                                    <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      fill="none"
                                      viewBox="0 0 69 14"
                                      class="svgIcon bin-top"
                                    >
                                      <g clip-path="url(#clip0_35_24)">
                                        <path
                                          fill="black"
                                          d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"
                                        ></path>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_35_24">
                                          <rect fill="white" height="14" width="69"></rect>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                  
                                    <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      fill="none"
                                      viewBox="0 0 69 57"
                                      class="svgIcon bin-bottom"
                                    >
                                      <g clip-path="url(#clip0_35_22)">
                                        <path
                                          fill="black"
                                          d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"
                                        ></path>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_35_22">
                                          <rect fill="white" height="57" width="69"></rect>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                  </button></a><?php 
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
	<?php 
		include 'inc/footer.php';
	 ?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" /> 
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.7/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/sl-2.0.1/datatables.min.css" rel="stylesheet">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.7/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/sl-2.0.1/datatables.min.js"></script>
<div id="prbt">

<script>
$(document).ready(function () {
    // Initialize DataTable if not already initialized
    if (!$.fn.dataTable.isDataTable('#myTable')) {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: 'Copy',
                    className: 'buttons-copy'
                },
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'buttons-csv'
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'buttons-excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'buttons-pdf'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'buttons-print'
                },
                {
                    extend: 'colvis',
                    text: 'Column Visibility',
                    className: 'buttons-colvis'
                }
            ],
        });
    }
    
});
</script>
</div>