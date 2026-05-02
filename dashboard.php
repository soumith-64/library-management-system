<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    $page = 'home';
    include 'inc/header.php';
    include 'inc/connection.php';
	$current_time = date('h:i:s A');
 ?>
	
<style>
	#myVideo{
		width:400px;
		height:120px;
		margin-left: 950px;
		margin-top: 80px;
        background-color: whitesmoke;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
		
		}
        #unmuteButton {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 20px;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
		.time-text {
        font-size: 24px;
        margin-bottom: 10px;
		margin-top: 10px;
    }
    .time {
        font-size: 22px;

    }
	.ing{
		margin-top: 10px;
		height: 60px;
    margin-right: 40px;
	}
	.texts{
		margin-top: 10px;
	}
    .ics{
		transform: rotate(180deg);
    }
 .contner {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #2b2b2b;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
  }
  input[type="text"] {
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    transition: all 0.3s ease;
    color: white;
    background-color: #2b2b2b;
    width: 80%;
    outline: none;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
  }

  button {
    padding: 10px 20px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    transition: transform 0.2s, box-shadow 0.2s;
    background: linear-gradient(45deg, #1cb5e0, #000851);
    color: white;
    cursor: pointer;
    outline: none;
    position: relative;
    overflow: hidden;
  }

  button:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
  }

  .siri-animation {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 50px auto;
  }

  .circle {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
    transform: translate(-50%, -50%);
    animation: siri-pulse 2s infinite;
  }

  .circle:nth-child(2) {
    animation-delay: 0.4s;
  }

  .circle:nth-child(3) {
    animation-delay: 0.8s;
  }

  .circle:before,
  .circle:after {
    content: '';
    position: absolute;
    border-radius: 50%;
  }

  .circle:before {
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(100,0,255,0.5) 0%, rgba(0,0,0,0) 70%);
    animation: siri-inner-pulse 4s infinite;
  }

  .giffi{
    height: 130px;
    width: 130px;
    outline: none;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    border: none;
    border-radius: 40px;
    transition: all 0.3s ease;
  }

  .circle:after {
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(0,255,255,0.3) 0%, rgba(0,0,0,0) 80%);
    animation: siri-outer-pulse 6s infinite;
  }

  @keyframes siri-pulse {
    0% {
      transform: translate(-50%, -50%) scale(1);
      opacity: 1;
    }
    100% {
      transform: translate(-50%, -50%) scale(1.5);
      opacity: 0;
    }
  }

  @keyframes siri-inner-pulse {
    0% {
      transform: scale(0.5);
      opacity: 1;
    }
    100% {
      transform: scale(1);
      opacity: 0;
    }
  }

  @keyframes siri-outer-pulse {
    0% {
      transform: scale(0.3);
      opacity: 1;
    }
    100% {
      transform: scale(1.2);
      opacity: 0;
    }
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
							<span class="disabled">dashboard</span>
						</div>
					</div>
				</div>
				<div class="row counterup">
        <div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box">
							<div class="icon">
								<i class="fas fa-book"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="add-book.php">Manage Book</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fa fa-rocket"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "SELECT * from issue_book where status=0 ");
                                         $res2 = mysqli_query($link, "SELECT * from t_issuebook where status=0");
                                         $count2 = mysqli_num_rows($res2);
                                         $count = mysqli_num_rows($res);
                                         $result = $count + $count2;
                                        echo $result;
                                    ?>
                                    </span></h3>
								<h4><a href="issued-books.php">Issued books</a></h4>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4">
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from add_book");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
								<h4><a href="display-books.php">books</a></h4>
								
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4">
							<div class="icon">
								<i class="fas fa-dollar-sign"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                <?php
                                         $res = mysqli_query($link, "select fine from finezone");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
								<h4><a href="fine.php">fine</a></h4>
							</div>
						</div>
					</div>
          <div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from std_registration");
                                         $res2 = mysqli_query($link, "select * from t_registration");
                                         $count2 = mysqli_num_rows($res2);
                                         $count = mysqli_num_rows($res);
                                         $result = $count + $count2;
                                         echo $result;
                                    ?>
                                    </span></h3>
								<h4><a href="#">Members</a></h4>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box3">
							<div class="icon">
								<i class="fas fa-user"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="add-student.php">Manage User</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box">
							<div class="icon">
								<i class="fab fa-staylinked"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="status.php">Status</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fas fa-book"></i>
							</div>
							<div class="text">
								<h4 class="mt-10"><a href="requested-books.php">Requested Books</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4">
							<div class="icon">
								<img src="upload/greet.png" alt="" class="ing">
							</div>
							<div class="texts">
							<h4 id="greeting-container">
    <?php
    // Get the current hour
    $current_hour = date('H');

    // Define the greeting based on the time
    if ($current_hour >= 5 && $current_hour < 12) {
        $greeting = "Good morning";
    } elseif ($current_hour >= 12 && $current_hour < 18) {
        $greeting = "Good afternoon";
    } else {
        $greeting = "Good evening";
    }

    // Display the greeting
    echo $greeting;
    ?>
</h4>
<script>
// Function to update the greeting dynamically
function updateGreeting() {
    var currentHour = new Date().getHours();
    var greetingContainer = document.getElementById('greeting-container');
    var greeting;

    if (currentHour >= 5 && currentHour < 12) {
        greeting = "Good morning";
    } else if (currentHour >= 12 && currentHour < 18) {
        greeting = "Good afternoon";
    } else {
        greeting = "Good evening";
    }

    greetingContainer.textContent = greeting;
}

// Update the greeting initially and then set an interval to update it every minute
updateGreeting();
setInterval(updateGreeting, 60000); // Update every minute (60000 milliseconds)
</script>

							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box">
							<div class="icon">
								<i class="fas fa-clock"></i>
							</div>
							<div class="text">
							<div class="time-container" id="time-container">
    <h4 class="time-text">Current Time:</h4>
	<b><i>
    <h5 class="time" id="current-time">
        <!-- The current time will be displayed here -->
    </h5>
	</b></i>
</div>
<script>
// Function to update the time every second
function updateTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();
    var meridian = hours >= 12 ? 'PM' : 'AM';

    // Convert hours to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight (0 hours)

    // Add leading zeros to minutes and seconds if needed
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    var formattedTime = hours + ':' + minutes + ':' + seconds + ' ' + '-'+ meridian;
    document.getElementById('current-time').textContent = formattedTime;
}

// Update the time initially and then set an interval to update it every second
updateTime();
setInterval(updateTime, 1000); // Update every second (1000 milliseconds)
</script>


							</div>
							
						</div>

					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fa-solid fa-calendar-days"></i>
							</div>
							<div class="texts">
                            <h4 id="current-date">
    <?php
        // Get the current date in day-month-year format
        $current_date = date('d-m-Y');
        echo "Current Date: $current_date";
    ?>
    </h4>
    <script>
        // Function to update the current date dynamically
        function updateDate() {
            var currentDateElement = document.getElementById('current-date');
            var now = new Date();
            var day = String(now.getDate()).padStart(2, '0');
            var month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            var year = now.getFullYear();
            var currentDate = day + '-' + month + '-' + year; // Format date as day-month-year
            currentDateElement.textContent = 'Current Date: ' + currentDate;
        }

        // Update the date initially and then set an interval to update it every minute
        updateDate();
        setInterval(updateDate, 60000); // Update every minute (60000 milliseconds)
    </script>
							</div>
						</div>
					</div>
          <div class="col-md-3 col-sm-3 col-xs-12 control">
  <div class="contner">
    <h4 style="color:white;">WIS AI</h4>
    <div id="igb" class="gif-button" onclick="startRecognition()">
      <img src="upload/img2.gif" class="giffi" alt="Siri Animation">
    </div>
    <input type="text" id="textInput" placeholder="Type to search query here">
    <button id="textButton" onclick="processTextInput()">Search</button>
    <p id="resultText"></p>
  </div>
</div>

<script>
  // Check if the browser supports the Web Speech API
  window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  const synth = window.speechSynthesis;
  if (!window.SpeechRecognition) {
    alert("Sorry, your browser doesn't support the Web Speech API. Try using Google Chrome.");
  } else {
    const recognition = new SpeechRecognition();
    recognition.lang = 'en-US';
    recognition.interimResults = false;

    recognition.onstart = function() {
      document.getElementById('startButton').disabled = true;
    };

    recognition.onend = function() {
      document.getElementById('startButton').disabled = false;
    };

    recognition.onresult = function(event) {
      const transcript = event.results[0][0].transcript;
      document.getElementById('resultText').innerText = `You said: ${transcript}`;
      processCommand(transcript);
    };

    function startRecognition() {
      recognition.start();
    }

    function processCommand(command) {
      command = command.toLowerCase();

      if (command.includes('search for')) {
        const query = command.split('search for ')[1];
        if (query) {
          const searchUrl = `https://www.google.com/search?q=${encodeURIComponent(query)}`;
          window.open(searchUrl, '_blank');
        } else {
          speak('Sorry, I did not catch the search query.');
        }
      } else if (command.includes('find location')) {
        const location = command.split('find location ')[1];
        if (location) {
          const mapsUrl = `https://www.google.com/maps/search/${encodeURIComponent(location)}`;
          window.open(mapsUrl, '_blank');
        } else {
          speak('Sorry, I did not catch the location.');
        }
      } else if (command.includes('show image of')) {
        const query = command.split('show image of ')[1];
        if (query) {
          const imageUrl = `https://www.google.com/search?tbm=isch&q=${encodeURIComponent(query)}`;
          window.open(imageUrl, '_blank');
        } else {
          speak('Sorry, I did not catch the image query.');
        }
      } else if (command.includes('download image of')) {
        const query = command.split('download image of ')[1];
        if (query) {
          const imagesUrl = `https://www.google.com/search?tbm=isch&q=${encodeURIComponent(query)}`;
          window.open(imagesUrl, '_blank');
        } else {
          speak('Sorry, I did not catch the image query.');
        }
      } else if (command.includes('watch video of')) {
        const query = command.split('watch video of ')[1];
        if (query) {
          const videosUrl = `https://www.youtube.com/results?search_query=${encodeURIComponent(query)}`;
          window.open(videosUrl, '_blank');
        } else {
          speak('Sorry, I did not catch the video query.');
        }
      } else if (command.includes('hello')) {
        speak('Hello! How can I assist you today?');
      } else if (command.includes('time')) {
        speak(`The current time is ${new Date().toLocaleTimeString()}`);
      } else {
        speak('Sorry, I did not understand that command.');
      }
    }

    function speak(text) {
      const utterance = new SpeechSynthesisUtterance(text);
      synth.speak(utterance);
    }

    function processTextInput() {
      const query = document.getElementById('textInput').value;
      if (query) {
        const searchUrl = `https://www.google.com/search?q=${encodeURIComponent(query)}`;
        window.open(searchUrl, '_blank');
      } else {
        alert('Please enter a search query.');
      }
    }
  }
</script>



<?php
    // Fetch book names, images, and URLs from the database
    $sql = "SELECT book_name, photo, book_Urls FROM newa"; // Adjust the table and column names as per your database
    $result = mysqli_query($link, $sql);

    // Initialize arrays to store book names, images, and URLs
    $bookNames = [];
    $bookPhotos = [];
    $bookUrls = [];

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch each book name, photo, and URL
        while ($row = mysqli_fetch_assoc($result)) {
            $bookNames[] = $row["book_name"];
            $bookPhotos[] = $row["photo"];
            $bookUrls[] = $row["book_Urls"]; // Assuming there is a 'url' column in your table
        }
    } else {
        echo "0 results";
    }

    mysqli_close($link); // Close the database connection
?>

<script src="https://kit.fontawesome.com/5d621324dd.js" crossorigin="anonymous"></script>
<footer>
    <marquee     width="800px" direction="right" height="131px">
        <?php
        // Display book names, images, and links in marquee
        foreach ($bookNames as $index => $bookName) {
            if (isset($bookPhotos[$index]) && isset($bookUrls[$index])) {
                $photo = htmlspecialchars($bookPhotos[$index]); // Sanitize output
                $url = htmlspecialchars($bookUrls[$index]); // Sanitize output
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '<a href="' . $url . '">';
                echo '<img src="' . $photo . '" height="130" width="100" alt="Book Image">';
                echo '</a>';
            }
        }
        ?>
    </marquee>
</footer>

	<?php 
		include 'inc/footer.php';
	 ?>