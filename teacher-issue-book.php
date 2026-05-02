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
    $rdate = date("d/m/Y", strtotime("+30 days"));
    date_default_timezone_set("Asia/Kolkata");
		$time= date("Y-m-d");
 ?>
 <style>
    .btn {
 width: 130px;
 height: 40px;
 font-size: 1.1em;
 cursor: pointer;
 background-color: #171717;
 color: #fff;
 border: none;
 border-radius: 5px;
 transition: all .4s;
}

.btn:hover {
 border-radius: 5px;
 transform: translateY(-10px);
 box-shadow: 0 7px 0 -2px #f85959,
  0 15px 0 -4px #39a2db,
  0 16px 10px -3px #39a2db;
}

.btn:active {
 transition: all 0.2s;
 transform: translateY(-5px);
 box-shadow: 0 2px 0 -2px #f85959,
  0 8px 0 -4px #39a2db,
  0 12px 10px -3px #39a2db;
}
button {
  font-family: inherit;
  font-size: 15px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
  cursor: pointer;
}

button span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

button svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

button:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

button:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

button:hover span {
  transform: translateX(5em);
}

button:active {
  transform: scale(0.95);
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
  }
}

 </style>
 <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="inc\js\sweetalert2.all.min.js"></script>
  <script type="text/javascript">
    function redirectToDashboard() {
        window.location = "issued-books.php";
    }
</script>
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
							<span class="disabled">teacher issue book</span>
						</div>
					</div>
				</div>
				<div class="issueBook">
					<div class="row">
						<div class="col-md-6">
							<div class="issue-wrapper">
								<form action="" class="form-control" method="post" name="idn">
									<table class="table">
                                    <tr>
                                            <td>
                                                <h4>Enter Details</h4>
                                            </td>
                                        </tr>
										<tr>
										<tr>
											<td class="">
												<input type="text" name="idno" id="" class="form-control" placeholder="Teacher id">
											</td>
										</tr>
                                        <tr>
                      <td>
                        <input type="text" name="book_id" class="form-control" placeholder="Book Id">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <b>OR</b>
                      </td>
                    </tr>
                                        <tr>
											<td class="">
                        <form class="form-control" name="pos" action="" method="post">
            
            <div class="form-group">
                
                <input type="text" name="bar" class="form-control" placeholder="bar code read/Book ISBN" >
                </div>
            
            </form>
											</td>
                                        </tr>     
                                        <tr>
											<td>
												<input type="submit" class="btn btn-info" value="select" name="submit1">											</td>
										</tr>
                                        <tr>
                                            <td>
                                                <h3>---------------------------------------------</h3>
                                            </td>
                                        </tr>
									</table>
                                    <?php 
                                    $book_id = '';
                                    $books_name = '';
                                    $ISBNNumber = '';
                                    $books_author_name = '';
                                    $books_publication_name = '';
                                    $books_price = '';
                                    $books_availability = '';
                                    if (isset($_POST["submit1"])) {
                                    
                                    $stmt = $link->prepare("SELECT * FROM t_registration WHERE idno = ?");
                                    $stmt->bind_param("s", $_POST['idno']);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while($row5 = $result->fetch_assoc()){
                                      $name      = $row5['name'];
                                      $lecturer      = $row5['lecturer'];
                                      $utype     = $row5['utype'];
                                      $idno     = $row5['idno'];
                                      $phone = $row5['phone'];
                                      $dept = $row5['dept'];
                                      $eligibility= $row5['eligibility'];
                                      $_SESSION["utype"]     = $utype;
                                      $_SESSION["idno"]     = $idno;
                                    }
                                    $stmt->close();
                                    
                                   
                                    $book_id_input = isset($_POST['book_id']) ? $_POST['book_id'] : '';
                                    $bar = isset($_POST['bar']) ? $_POST['bar'] : '';
                                
                                    // Ensure $stmt is initialized properly
                                    $stmt = null;
                                
                                    if (!empty($bar)) {
                                        $stmt = $link->prepare("SELECT * FROM add_book WHERE ISBNNumber = ?");
                                        $stmt->bind_param("s", $bar);
                                    } else if (!empty($book_id_input)) {
                                        $stmt = $link->prepare("SELECT * FROM add_book WHERE book_id = ?");
                                        $stmt->bind_param("s", $book_id_input);
                                    } else {
                                        echo "No book ID or barcode provided.";
                                    }
                                
                                    if ($stmt) {
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        if ($row3 = $result->fetch_assoc()) {
                                            $books_name = $row3['books_name'];                    
                                            $book_id = $row3['book_id'];
                                            $ISBNNumber = $row3['ISBNNumber'];
                                            $books_author_name = $row3['books_author_name'];
                                            $books_publication_name = $row3['books_publication_name'];
                                            $books_price = $row3['books_price'];
                                            $books_availability = $row3['books_availability'];
                                            $_SESSION["ISBNNumber"] = $ISBNNumber;
                                            $_SESSION["book_id"] = $book_id;
                                            $_SESSION["books_name"] = $books_name;
                                        } else {
                                          echo "No book found with the provided information.";
                                        }
                                        $stmt->close();
                                    }
                                    ?>
									<table class="table table-bordered">
                                        <tr>
                                         <td>
                                          <h4>Teacher Details</h4>
                                         </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Name:</label>
                                               <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Teacher id:</label>
                                               <input type="text" class="form-control" name="idno" value="<?php echo $idno; ?>"  disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Eligibility:</label>
                                               <input type="text" class="form-control" name="eligibility" value="<?php echo $eligibility; ?>"  disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Class:</label>
                                               <input type="text" class="form-control" name="lecturer" value="<?php echo $lecturer; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Phone:</label>
                                               <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>"> 
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                            <label for="">Department:</label>
                                               <input type="text" class="form-control" name="dept"  value="<?php echo $dept; ?>"> 
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                            <h3>---------------------------------------------</h3>
                                                <h4>Book Details</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Book_Id</label>
                                                <input type="text" name="book_id" class="form-control" placeholder="Book id"  value="<?php echo $book_id; ?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for=""> Book Name:</label>
                                               <input type="text" class="form-control" name="books_name"  value="<?php echo $books_name; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">ISBN Number :</label>
                                               <input type="text" class="form-control" name="ISBNNumber"  value="<?php echo $ISBNNumber; ?> " disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Author Name:</label>
                                               <input type="text" class="form-control" name="books_author_name"  value="<?php echo $books_author_name; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Publisher Name:</label>
                                            <input type="hidden" name="status" value="0">
                                            <input type="hidden" name="return_date" value="0">
                                            <input type="text" class="form-control" name="books_publication_name"  value="<?php echo $books_publication_name; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Book Price:</label>
                                               <input type="text" class="form-control" name="books_price"  value="<?php echo $books_price; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Book Availability:</label>
                                               <input type="text" class="form-control" name="books_availability"  value="<?php echo $books_availability; ?>" > 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h3>---------------------------------------------</h3>
                                                <h4>Issue & Return</h4>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                            <label for="">Issue Date:</label>
                                               <input type="text" class="form-control" name="booksissuedate"  value="<?php echo date("d/m/Y"); ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Return Date:</label>
                                               <input type="text" class="form-control" name="booksreturndate"  value="<?php echo $rdate; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <h3>---------------------------------------------</h3>
                                                <h4>Issued Book</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                          <td>
                                        <label for=""><b>Book Issued To The Student :</b></label>
                                        <table id="myTable" class="table table-bordered border-primary">
    <thead class="thead-light font-weight-bold">
        <tr>
            <th>Book Id</th>
            <th>Books Name</th>
            <th>Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody style="color:darkgreen; font-weight: bold;">
    <?php
    $res = mysqli_query($link, "SELECT * FROM t_issuebook WHERE idno='{$_POST['idno']}'");
    while ($row = mysqli_fetch_array($res)) {
        $bookid = $row['book_id'];
        $booksname = $row['books_name'];
        $names = $row['name'];
        $statuss = $row['status'];

        echo "<tr>";
        echo "<td>{$bookid}</td>";
        echo "<td>{$booksname}</td>";
        echo "<td>{$names}</td>";
        if ($row["status"] == "1") {
          echo "<td>Returned</td>";
      }  
      else{
          echo "<td> Not Returned</td>";
      }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</td>
</tr>
                                        <tr>
                                            <td>
                                            <h3>---------------------------------------------</h3>
                                               <h4> Submit Details</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <button type="submit" name="submit2" value="Issue Book">
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="20"
        height="20"
      >
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path
          fill="currentColor"
          d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
        ></path>
      </svg>
    </div>
  </div>
  <span>Submit</span>
</button>                                            </td>
                                        </tr>
                                    </table>
                                  <?php
                                }
                            ?>
                                </form>
                                    <?php
                                if (isset($_POST["submit2"])) {
                                    $stmt = $link->prepare("SELECT books_availability FROM add_book WHERE books_name = ?");
                                    $stmt->bind_param("s", $_POST['books_name']);
                                    $stmt->execute();
                                    $stmt->bind_result($qty);
                                    $stmt->fetch();
                                    $stmt->close();

                                    $stmt = $link->prepare("SELECT eligibility FROM t_registration WHERE idno = ?");
                                    $stmt->bind_param("s", $_SESSION['idno']);
                                    $stmt->execute();
                                    $stmt->bind_result($elgbt);
                                    $stmt->fetch();
                                    $stmt->close();

                                    if ($qty == 0 || $elgbt == 0) {
                                        echo '<div class="alert alert-danger col-lg-6 col-lg-push-3"><strong>Book Cannot be issued: Book availability or Student Eligibility is Zero</strong></div>';
                                    } else {
                                        $stmt = $link->prepare("INSERT INTO t_issuebook (utype, idno, name, dept, book_id, books_name, ISBNNumber, books_author_name, books_publication_name, books_price, booksissuedate, booksreturndate, return_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                        $stmt->bind_param("ssssssssssssss", $_SESSION['utype'], $_SESSION['idno'], $_POST['name'], $_POST['dept'], $_SESSION['book_id'], $_SESSION['books_name'], $_SESSION['ISBNNumber'], $_POST['books_author_name'], $_POST['books_publication_name'], $_POST['books_price'], $_POST['booksissuedate'], $_POST['booksreturndate'], $_POST['return_date'], $_POST['status']);
                                        $stmt->execute();
                                        $stmt->close();

                                        // Insert message
                                       $vw="n";
                                       $uname="admin";
                                       $message = "Hi, " . $_POST['name'] . ". The book '" . $_SESSION['books_name'] . "' has been successfully issued to you on '" . $_POST['booksissuedate'] . "' and the book should be returned within '" . $_POST['booksreturndate'] . "'.";
                                       $title= "Book Issued Successfully";
                                       $stmt = $link->prepare("INSERT INTO message (susername, rusername, title, msg, read1, time) VALUES (?, ?, ?, ?, ?, ?)");
                                       $stmt->bind_param("ssssss", $uname, $_SESSION['idno'], $title, $message,$vw , $time);
                                       $stmt->execute();
                                       $stmt->close();
                                        
                                        $stmt = $link->prepare("UPDATE add_book SET books_availability = books_availability - 1 WHERE books_name = ?");
                                        $stmt->bind_param("s", $_POST['books_name']);
                                        $stmt->execute();
                                        $stmt->close();

                                        $stmt = $link->prepare("UPDATE t_registration SET eligibility = eligibility - 1 WHERE idno = ?");
                                        $stmt->bind_param("s", $_SESSION['idno']);
                                        $stmt->execute();
                                        $stmt->close();

                                        echo '<script type="text/javascript">Swal.fire("Book Issued Successfully, Message sent", "", "success").then(() => { window.location = "issued-books.php"; });</script>';
                                    }
                                }
                                ?>
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