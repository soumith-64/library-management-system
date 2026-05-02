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
    <script type="text/javascript">
    function redirectToDashboard() {
        window.location = "display-books.php";
    }
</script>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="inc\js\sweetalert2.all.min.js"></script>
  
</head>
<?php

if (isset($_POST["submit"])) {
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
    $photo = "upload/avatar.jpg";
    $id;
    $stmt = $link->prepare("INSERT INTO add_book (book_id, call_no, ISBNNumber, books_name, books_author_name, Language, books_publication_name, books_publication_date, Edition, books_purchase_date, Bill_No, books_price, books_quantity, books_availability, Subject, Remark, location,photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

    $stmt->bind_param('iiissssiidiiiissss', $book_id, $call_no, $ISBNNumber, $books_name, $books_author_name, $Language, $books_publication_name, $books_publication_date, $Edition, $books_purchase_date, $Bill_No, $books_price, $books_quantity, $books_availability, $Subject, $Remark, $location,$photo);

    $stmt->execute();
    
    $stmt->close();
    
    ?>
    <script type="text/javascript">
        Swal.fire("Book Added Successfully", "", "success").then(() => {
            redirectToDashboard();
        });
    </script>
    <?php
}
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
							<span class="disabled">add book</span>
						</div>
					</div>
				</div>
                <div>  
                    <h2>Add Book</h2>
                    <br>
                </div>
				<div class="bste">
					<form action="" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered">
                        <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Acc No</label>
                                    <input type="text" class="form-control" name="book_id" placeholder="Acc.No" required="">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Call No</label>
                                    <input type="text" class="form-control" name="call_no" placeholder="Call Number" required="">
                                </td>
                                <td></td>
                                <td>
                                <label for="" style="font-weight: bold;">Recd.date</label>
                                    <input type="text" class="form-control" name="books_purchase_date" placeholder="Recd.date" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Title</label>
                                   <input type="text" class="form-control" name="books_name" placeholder="Title" required=""> 
                                </td>
                                 <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Author</label>
                                    <input type="text" class="form-control" name="books_author_name" placeholder="Author" required="">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Publication</label>
                                    <input type="text" class="form-control" name="books_publication_name" placeholder="Publication" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Year of Publication</label>
                                    <input type="text" class="form-control" name="books_publication_date" placeholder="Year of Publication" required="">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Edition</label>
                                    <input type="text" class="form-control" name="Edition" placeholder="Edition" required="">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">ISBN</label>
                                    <input type="text" class="form-control" name="ISBNNumber" placeholder="ISBN" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" style="font-weight: bold;">Language</label>
                                    <input type="text" class="form-control" name="Language" placeholder="Language" required="">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;;">Cost</label>
                                    <input type="text" class="form-control" name="books_price" placeholder="Cost" required="">
                                </td>
                                 <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Invoice No</label>
                                    <input type="text" class="form-control" name="Bill_No" placeholder="Invoice No " required="">
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label for="" style="font-weight: bold;">Copies</label>
                                    <input type="text" class="form-control" name="books_quantity" placeholder="Copies" required="">
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Availability</label>
                                    <input type="text" class="form-control" name="books_availability" placeholder="Availability" required="">
                                </td>
                                 <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Subject</label>
                                    <input type="text" class="form-control" name="Subject" placeholder="Subject" required="">
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <label for=" "style="font-weight: bold;">Location</label>
                                    <input type="text" class="form-control" name="location" placeholder="Location" required="" >
                                </td>
                                <td></td>
                                <td>
                                    <label for="" style="font-weight: bold;">Remark</label>
                                    <input type="text" class="form-control" name="Remark" placeholder="Remark" >
                                </td>
                            <td></td>
                            
                            <td>
                            <div class="submit mt-20">
                        	<input type="submit" name="submit" class="btn btn-info submit" value="Add Book">
                            </div>
                            </td>

                            </tr>
                        </table>

                	</form>
				</div>				
			</div>					
		</div>
	</div>
			
	<?php 
		include 'inc/footer.php';
	 ?>