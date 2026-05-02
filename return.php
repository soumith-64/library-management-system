<?php 
	include 'inc/connection.php';

	if (isset($_GET["id"])) {
		$id = $_GET["id"];

	$a  = date("d/m/Y");
	$st="1";
	date_default_timezone_set("Asia/Kolkata");
	$time= date("Y-m-d");
    $res3 = mysqli_query($link, "SELECT * FROM issue_book WHERE id = $id");
    while($row3=mysqli_fetch_array($res3)){
		$regno = $row3["regno"];
		$name = $row3["name"];
		$utype = $row3["utype"];
		$book_id = $row3["book_id"];
        $books_name = $row3["books_name"];
        $booksreturndate = $row3["booksreturndate"];
	}

        

    $res4 = mysqli_query($link, "SELECT * FROM t_issuebook WHERE id = $id");
    while($row4=mysqli_fetch_array($res4)){
		$idno = $row4["idno"];
		$name = $row4["name"];
		$utype = $row4["utype"];
		$book_id = $row4["book_id"];
        $books_name = $row4["books_name"];
        $booksreturndate = $row4["booksreturndate"];
	}
  
	$res = mysqli_query($link, "UPDATE t_issuebook set return_date='$a' where id=$id");
	$res = mysqli_query($link, "UPDATE t_issuebook set status='$st' where id=$id");
	$res2 = mysqli_query($link, "UPDATE issue_book set return_date='$a' where id=$id");
	$res2 = mysqli_query($link, "UPDATE issue_book set status='$st' where id=$id");

	$books_name="";
    $idno="";
	$regno="";
    $name="";

	$res = mysqli_query($link, "SELECT * FROM t_issuebook where id=$id");
    $res2 = mysqli_query($link, "SELECT * FROM issue_book where id=$id");
	while($row=mysqli_fetch_array($res)){
		$books_name = $row["books_name"];
		$idno = $row["idno"];
		$name= $row["name"];
		$reg=$row["idno"];
	}
    while($row=mysqli_fetch_array($res2)){
		$books_name = $row["books_name"];
		$regno = $row["regno"];
		$name= $row["name"];
		$reg=$row["regno"];

	}
	 mysqli_query($link, "UPDATE add_book set books_availability=books_availability+1 where books_name='$books_name'");
	 mysqli_query($link, "UPDATE std_registration set eligibility = eligibility+1 where regno='$regno'");
	 mysqli_query($link, "UPDATE t_registration set eligibility = eligibility+1 where idno='$idno'");

	 $vw = "n";
	 $uname = "admin";
	 $message = "Hi, " . $name . ". The book '" . $books_name . "' has been successfully returned on '" . $a . "' ";
	 $title = "Book Submited Successfully";
 
	 // Use mysqli_real_escape_string to escape strings
	 $uname = mysqli_real_escape_string($link, $uname);
	 $regno = mysqli_real_escape_string($link, $regno);
	 $title = mysqli_real_escape_string($link, $title);
	 $message = mysqli_real_escape_string($link, $message);
	 $vw = mysqli_real_escape_string($link, $vw);
	 $time = mysqli_real_escape_string($link, $time);
	 
	 mysqli_query($link, "INSERT INTO message (susername, rusername, title, msg, read1, time) VALUES ('$uname', '$reg', '$title', '$message', '$vw', '$time')");
 
	 echo '<html><head>
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
	 </head><body>
	 <script>
		 Swal.fire("Book Returned Successfully", "", "success").then(() => { window.location = "issued-books.php"; });
	 </script>
	 </body></html>';

}

 ?>