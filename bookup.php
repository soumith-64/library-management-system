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

<?php

if (isset($_GET["book_id"])) {
    $book_id = $_GET["book_id"];
     $res = mysqli_query($link, "select * from add_book where book_id='$book_id'");
         while($row = mysqli_fetch_array($res)){
            
            $call_no = $row['call_no'];
            $ISBNNumber = $row['ISBNNumber'];
            $Bill_No = $row['Bill_No'];
            $books_name = $row['books_name'];
            $books_author_name = $row['books_author_name'];
            $Language = $row['Language'];
            $books_publication_name = $row['books_publication_name'];
            $books_publication_date = $row['books_publication_date'];
            $Edition = $row['Edition'];
            $books_purchase_date = $row['books_purchase_date'];
            $books_price = $row['books_price'];
            $books_quantity = $row['books_quantity'];
            $books_availability = $row['books_availability'];
            $Subject = $row['Subject'];
            $Remark = $row['Remark'];
            $location = $row['location'];
             $_SESSION["ISBNNumber"]     = $ISBNNumber;
             $_SESSION["book_id"]     = $book_id;
             $_SESSION["books_name"] = $books_name;
         }
        }
?>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="inc\js\sweetalert2.all.min.js"></script>
  
</head>
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
							<span class="disabled">Update book</span>
						</div>
					</div>
				</div>
                <div>
                    <h2>Update Book</h2>
                    <br>
                </div>
				<div class="bste">
					<form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered">
                        <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Acc No</label>
                                    <input type="text" class="form-control" name="book_id" placeholder="Acc.No" " value="<?php echo $book_id; ?>">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Call No</label>
                                    <input type="text" class="form-control" name="call_no" placeholder="Call Number" value="<?php echo $call_no; ?>">
                                </td>
                                <td></td>
                                <td>
                                <label for="" style="font-weight: bold;">Recd.date</label>
                                    <input type="text" class="form-control" name="books_purchase_date" placeholder="Recd.date" value="<?php echo $books_publication_date; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Title</label>
                                   <input type="text" class="form-control" name="books_name" placeholder="Title" value="<?php echo $books_name; ?>"> 
                                </td>
                                 <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Author</label>
                                    <input type="text" class="form-control" name="books_author_name" placeholder="Author" value="<?php echo $books_author_name; ?>">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Publication</label>
                                    <input type="text" class="form-control" name="books_publication_name" placeholder="Publication" value="<?php echo $books_publication_name; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Year of Publication</label>
                                    <input type="text" class="form-control" name="books_publication_date" placeholder="Year of Publication" value="<?php echo $books_publication_date; ?>">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Edition</label>
                                    <input type="text" class="form-control" name="Edition" placeholder="Edition" value="<?php echo $Edition; ?>">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">ISBN</label>
                                    <input type="text" class="form-control" name="ISBNNumber" placeholder="ISBN" value="<?php echo $ISBNNumber; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Language</label>
                                    <input type="text" class="form-control" name="Language" placeholder="Language" value="<?php echo $Language; ?>">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;;">Cost</label>
                                    <input type="text" class="form-control" name="books_price" placeholder="Cost" value="<?php echo $books_price; ?>">
                                </td>
                                 <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Invoice No</label>
                                    <input type="text" class="form-control" name="Bill_No" placeholder="Invoice No " value="<?php echo $Bill_No; ?>">
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label for="" style="font-weight: bold;">Copies</label>
                                    <input type="text" class="form-control" name="books_quantity" placeholder="Copies" value="<?php echo $books_quantity; ?>">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Availability</label>
                                    <input type="text" class="form-control" name="books_availability" placeholder="Availability" value="<?php echo $books_availability; ?>">
                                </td>
                                 <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Subject</label>
                                    <input type="text" class="form-control" name="Subject" placeholder="Subject" value="<?php echo $Subject; ?>">
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label for=" "style="font-weight: bold;">Location</label>
                                    <input type="text" class="form-control" name="location" placeholder="Location" value="<?php echo $location; ?>" >
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Remark</label>
                                    <input type="text" class="form-control" name="Remark" placeholder="Remark" value="<?php echo $Remark; ?>" >
                                </td>
                            <td></td>
                            <td>
                            <?php
                                  if (isset($_GET["book_id"])) {
                                    $stmt = $link->prepare("SELECT photo FROM add_book WHERE book_id = ?");
                                    $stmt->bind_param("s", $book_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                
                                    while ($row = $result->fetch_assoc()) {
                                        $photo = htmlspecialchars($row['photo']); // sanitize output
                                        echo '<img src="' . $photo . '" height="100" width="100" alt="something wrong">';
                                    }
                                
                                    $stmt->close();
                                } else {
                                    echo "Student not found in session.";
                                }
                                ?>
                                <input type="file" name="image" class="form-control">
                            </td>
                            <tr>
                            <td>
                            <div class="submit mt-20">
                        	<input type="submit" name="submit" class="btn btn-info submit" value="Update Book">
                            </div>
                            </td>
                            </tr>
                            </tr>
                        </table>

                	</form>
				</div>	
                <?php
                                    $ISBNNumber = '';
                                    if (isset($_POST['submit'])) {
                                        $book_id = $_POST['book_id'];
                                        $call_no = $_POST['call_no'];
                                        $ISBNNumber = $_POST['ISBNNumber'];
                                        $Bill_No = $_POST['Bill_No'];
                                        $books_name = $_POST['books_name'];
                                        $books_author_name = $_POST['books_author_name'];
                                        $Language = $_POST['Language'];
                                        $books_publication_name = $_POST['books_publication_name'];
                                        $books_publication_date = $_POST['books_publication_date'];
                                        $Edition = $_POST['Edition'];
                                        $books_purchase_date = $_POST['books_purchase_date'];
                                        $books_price = $_POST['books_price'];
                                        $books_quantity = $_POST['books_quantity'];
                                        $books_availability = $_POST['books_availability'];
                                        $Subject = $_POST['Subject'];
                                        $Remark = $_POST['Remark'];
                                        $location = $_POST['location'];
                                    
                                        $query = "UPDATE add_book SET book_id='$book_id', call_no='$call_no', ISBNNumber='$ISBNNumber', books_name='$books_name', Bill_No='$Bill_No', books_author_name='$books_author_name', Language='$Language', books_publication_name='$books_publication_name', books_publication_date='$books_publication_date', Edition='$Edition', books_purchase_date='$books_purchase_date', books_price='$books_price', books_quantity='$books_quantity', books_availability='$books_availability', Subject='$Subject', Remark='$Remark', location='$location' WHERE book_id='$book_id' ";
                                        $image_name = $_FILES['image']['name'];
                                        $temp = explode(".", $image_name);
                                        $newfilename = round(microtime(true)) . '.' . end($temp);
                                        $imagepath = "upload/" . $newfilename;
                                        move_uploaded_file($_FILES["image"]["tmp_name"], $imagepath);
                                        mysqli_query($link, "UPDATE add_book SET photo='".$imagepath."' WHERE book_id='$book_id'");
                                        // Execute the update query
                                        $result = mysqli_query($link, $query);
                                    
                                        if ($result) {
                                            ?>
                                            <script type="text/javascript">
                                              Swal.fire("Data Updated", "", "success").then((result) => {
                                            if (result.isConfirmed) {
                                            window.location.href = "display-books.php"; // Change this to the desired page URL
                                            }
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
			
	<?php 
		include 'inc/footer.php';
	 ?>