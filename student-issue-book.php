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
   .buttons {
  font-size: 12px;
  letter-spacing: 2px;
  text-transform: uppercase;
  display: inline-block;
  text-align: center;
  font-weight: bold;
  padding: 0.7em 2em;
  border: 3px solid #FF0072;
  border-radius: 2px;
  position: relative;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.1);
  color: #FF0072;
  text-decoration: none;
  transition: 0.3s ease all;
  z-index: 1;
  background:white;
}

.buttons:before {
  transition: 0.5s all ease;
  position: absolute;
  top: 0;
  left: 50%;
  right: 50%;
  bottom: 0;
  opacity: 0;
  content: '';
  background-color: #FF0072;
  z-index: -1;
}

.buttons:hover, .buttons:focus {
  color: white;
}

.buttons:hover:before, .buttons:focus:before {
  transition: 0.5s all ease;
  left: 0;
  right: 0;
  opacity: 1;
}

.buttons:active {
  transform: scale(0.9);
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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
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
							<span class="disabled">student issue book</span>
						</div>
					</div>
				</div>
				<div class="issueBook">
					<div class="row">
						<div class="col-md-6">
							<div class="issue-wrapper">
								<form action="" class="form-control" method="post" name="reg">
									 <table class="table">
                                     <tr>
                                            <td>
                                                <h4>Enter Details</h4>
                                            </td>
                                        </tr>
										<tr>
											<td class="">
                        <label for="">Student Id</label>
												<input type="text" name="reg" id="" class="form-control" placeholder="Student id" ></input>
											</td>
										</tr>
                    <tr>
                      <td>
                        <label for="">Acc No</label>
                        <input type="text" name="book_id" class="form-control" placeholder="Book ISBN">
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
                
                <input type="text" name="bar" class="form-control" placeholder="bar code read/Book Id" >
                </div>
            
            </form>
											</td>
                                        </tr>   
                                        <tr>
											<td>
                                                <button class="buttons" type="submit" value="select" name="submit1">Select</button>
                                                
											</td>
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
                                    $stmt = $link->prepare("SELECT * FROM std_registration WHERE regno = ?");
                                    $stmt->bind_param("s", $_POST['reg']);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while($row5 = $result->fetch_assoc()){
                                        $name = $row5['name'];                    
                                        $sem = $row5['sem'];
                                        $dept = $row5['dept'];
                                        $utype = $row5['utype'];
                                        $regno = $row5['regno'];
                                        $phone = $row5['phone'];
                                        $email = $row5['email'];
                                        $eligibility = $row5['eligibility'];
                                        $_SESSION["utype"] = $utype;
                                        $_SESSION["regno"] = $regno;
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
                                                <h4>student Details</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Name:</label>
                                               <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for="">Student id:</label>
                                               <input type="text" class="form-control" name="regno" value="<?php echo $regno; ?>"  disabled> 
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
                                               <input type="text" class="form-control" name="sem" value="<?php echo $sem; ?>"> 
                                               <input type="hidden" name="title" value="Book Issued Successfully">
                                               <input type="hidden" name="vw" value="n">
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
                                            <label for="">Email:</label>
                                               <input type="text" class="form-control" name="email" id="email"  value="<?php echo $email; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                          <td>
                                          <input type="hidden" name="subject" id="subject" value="Book Issue Confirmation">
                                          <input type="hidden" name="message" value="Hi, {$_POST['name']}. The book '{$_SESSION['books_name']}' has been successfully issued to you on '{$_POST['booksissuedate']}' and the book should be returned within '{$_POST['booksreturndate']}'.">
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
                                                <input type="text" name="book_id" class="form-control" value="<?php echo $book_id; ?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <label for=""> Book Name:</label>
                                            <input type="hidden" name="status" value="0">
                                            <input type="hidden" name="return_date" value=" ">
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
                                               <input type="text" class="form-control" name="books_availability"  value="<?php echo $books_availability; ?>" disabled> 
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
                                        <label for=""><b>Book Alredy Issued To The Student :</b></label>
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
    $res = mysqli_query($link, "SELECT * FROM issue_book WHERE regno='{$_POST['reg']}'");
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
                                               <button type="submit" name="submit2" value="Issue Book" onclick="sendMail()">
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
</button>

                                            </td>
                                        </tr>
                                    </table>
 

                                  <?php
                                }
                            ?>


<?php
if (isset($_POST["submit2"])) {
    // Fetch book availability
    $stmt = $link->prepare("SELECT books_availability FROM add_book WHERE books_name = ?");
    $stmt->bind_param("s", $_POST['books_name']);
    $stmt->execute();
    $stmt->bind_result($qty);
    $stmt->fetch();
    $stmt->close();

    // Fetch student eligibility
    $stmt = $link->prepare("SELECT eligibility FROM std_registration WHERE regno = ?");
    $stmt->bind_param("s", $_SESSION['regno']);
    $stmt->execute();
    $stmt->bind_result($elgbt);
    $stmt->fetch();
    $stmt->close();

    if ($qty == 0 || $elgbt == 0) {
        echo '<div class="alert alert-danger col-lg-6 col-lg-push-3"><strong>Book Cannot be issued: Book availability or Student Eligibility is Zero</strong></div>';
    } else {
        // Insert into issue_book table
        $stmt = $link->prepare("INSERT INTO issue_book (utype, regno, name, sem, dept, book_id, books_name, ISBNNumber, books_author_name, books_publication_name, books_price, booksissuedate, booksreturndate, return_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssss", $_SESSION['utype'], $_SESSION['regno'], $_POST['name'], $_POST['sem'], $_POST['dept'], $_SESSION['book_id'], $_SESSION['books_name'], $_SESSION['ISBNNumber'], $_POST['books_author_name'], $_POST['books_publication_name'], $_POST['books_price'], $_POST['booksissuedate'], $_POST['booksreturndate'], $_POST['return_date'], $_POST['status']);
        $stmt->execute();
        $stmt->close();
        // Insert into fine table
        $fine = isset($_POST['fine']) ? $_POST['fine'] : 0; // Set $fine to $_POST['fine'] if set, otherwise set it to 0

        $stmt = $link->prepare("INSERT INTO finezone (idn, name, utype, book_id, booksname, fine) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issisi", $_SESSION['regno'], $_POST['name'], $_SESSION['utype'], $_SESSION['book_id'], $_SESSION['books_name'], $fine);
        $stmt->execute();
        $stmt->close();
        // Handle success/error accordingly
        
        // Insert message
        $vw="n";
        $uname="admin";
        $message = "Hi, " . $_POST['name'] . ". The book '" . $_SESSION['books_name'] . "' has been successfully issued to you on '" . $_POST['booksissuedate'] . "' and the book should be returned within '" . $_POST['booksreturndate'] . "'.";
        $title= "Book Issued Successfully";
        $stmt = $link->prepare("INSERT INTO message (susername, rusername, title, msg, read1, time) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $uname, $_SESSION['regno'], $title, $message,$vw , $time);
        $stmt->execute();
        $stmt->close();

        // Update book availability
        $stmt = $link->prepare("UPDATE add_book SET books_availability = books_availability - 1 WHERE books_name = ?");
        $stmt->bind_param("s", $_POST['books_name']);
        $stmt->execute();
        $stmt->close();

        // Update student eligibility
        $stmt = $link->prepare("UPDATE std_registration SET eligibility = eligibility - 1 WHERE regno = ?");
        $stmt->bind_param("s", $_SESSION['regno']);
        $stmt->execute();
        $stmt->close();

        echo '<script type="text/javascript">Swal.fire("Book Issued Successfully and message sent successfully", "", "success").then(() => { window.location = "issued-books.php"; });</script>';
    }
}
?>

	<?php 
		include 'inc/footer.php';
	 ?>