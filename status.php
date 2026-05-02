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
?>
<style>
    
    #ap{
        align-items: center;
        color: green;
    }
    #nap{
        align-items: center;
        color: sandybrown;
    }
    #del{
        align-items: center;
        color: red;
    }
</style>
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
                        <span class="disabled">user status</span>
                    </div>
                </div>
            </div>
            <div class="issued-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="rbook-info status">
                            <table id="myTable" class="table table-bordered border-primary">
                                <thead class="thead-light font-weight-bold">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>User Type</th>
                                        <th>Class/Dept</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Approve</th>
                                        <th>Block</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody style="color:darkgreen; font-weight: bold;">
                                    <?php
                                    $res= mysqli_query($link, "SELECT * from std_registration ORDER BY regno DESC");
                                    $res2= mysqli_query($link, "SELECT * from t_registration ORDER BY idno DESC");
                                    while ($row=mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["regno"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["utype"] . "</td>";
                                        echo "<td>" . $row["sem"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["status"] . "</td>";
                                        echo "<td>";
                                        ?>
                                                
                                                  <a href="approve.php?id=<?php echo $row["regno"]; ?>" >
                                                    <i class="fas fa-location-arrow" id="ap"></i>
                                                  </a> 
                                                   
                                        <?php
                                        echo "</td>";
                                        echo "<td>";
                                        ?>
                                         
                                                <a href="notapprove.php?id=<?php echo $row["regno"]; ?>">
                                                    <i class="fas fa-allergies" id="nap"></i>
                                                </a>
                                   
                                           <?php
                                        echo "</td>";
                                        echo "<td>";
                                        ?>
                       
                                                <a href="delete-std.php?id=<?php echo $row["regno"]; ?>"  onclick="return checkdelete ()">
                                                    <i class="fas fa-trash" id="del"></i>
                                                </a>
                         
                                           <?php
                                           echo "</td>";
                                        echo "</tr>";
                                    }
                                    while ($row=mysqli_fetch_array($res2)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["idno"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["utype"] . "</td>";
                                        echo "<td>" . $row["lecturer"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["status"] . "</td>";
                                        echo "<td>";
                                        ?>
                     
                                                  <a href="approve.php?id=<?php echo $row["idno"]; ?>">
                                                    <i class="fas fa-location-arrow" id="ap"></i>
                                                  </a>   
                      
                                        <?php
                                        echo "</td>";
                                        echo "<td>";
                                        ?>
                                 
                                                <a href="notapprove.php?id=<?php echo $row["idno"]; ?>">
                                                    <i class="fas fa-allergies" id="nap"></i>
                                                </a>
                             
                                           <?php
                                        echo "</td>";
                                        echo "<td>";
                                        ?>
                            
                                                <a href="delete-std.php?id=<?php echo $row["idno"]; ?>" onclick="return checkdelete ()">
                                                    <i class="fas fa-trash" id="del"  ></i>
                                                </a>
          
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
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
