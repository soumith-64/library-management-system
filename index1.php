<?php
session_start();
include 'inc/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="canonical" href="https://www.wwislib.com/" />

    	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width,initial-scale=1" name="viewport">
	<meta name="keywords" content="WWIS School Management System">
	<meta name="description" content="WWIS School Management System">
	<meta name="author" content="Soumith.J.V">
    <title>Library Management System</title>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
      <link rel="icon" type="image/x-icon" href="upload/favicon.ico">
    <link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="inc/css/pro1.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="inc/panda.css" />
    <style>
        .bcl{
            align-items: center;
            width:200px;
            margin-top: 10px;
        }
        .btns {
            font-size: 0.95em;
            padding: 0.8em 0;
            border-radius: 2em;
            border: none;
            outline: none;
            background-color: #f4c531;
            color: #2e0d30;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.15em;
            margin-top: 0.8em;
        }
        .aa {
            text-align: center;
            font-size: 0.95em;
            margin-right: 10px;
            padding: 0.005em 0;
            text-align: center;
            border-radius: 2em;
            width: 18.5em;
            border: none;
            outline: none;
            background-color: #61FC00;
            color: #2e0d30;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.05em;
            margin-top: 1px;
        }
        .aaa {
            text-align: center !important;
            position: relative;
            padding-top: 110px;
            text-shadow: #61FC00;
            text-decoration: dashed;
        }

        @import url("https://fonts.googleapis.com/css2?family=Hanken+Grotesk&display=swap");

        svg {
            font-family: "Hanken Grotesk", sans-serif;
            width: 100%; height:100%;
                margin-top: 480px;
        }
        svg text {
            animation: stroke 8s infinite alternate;
            stroke-width: 2;
            stroke: #000000;
            font-size: 50px;
        }
        @keyframes stroke {
            0% {
                fill: rgba(204,54,28,0); stroke: rgba(0,0,0,1);
                stroke-dashoffset: 25%; stroke-dasharray: 0 50%; stroke-width: 2;
            }
            70% {fill: rgba(204,54,28,0); stroke: rgba(0,0,0,1); }
            80% {fill: rgba(204,54,28,0); stroke: rgba(0,0,0,1); stroke-width: 3; }
            100% {
                fill: rgba(204,54,28,1); stroke: rgba(0,0,0,0);
                stroke-dashoffset: -25%; stroke-dasharray: 50% 0; stroke-width: 0;
            }
        }

        .wrapper {
            margin-bottom: 60px;
            background-color: #e3f425;
        }

        /* Responsive styles */
        @media (max-width: 767px) {
            .container {
                padding: 15px;
            }
            form {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            form label, form input {
                width: 100%;
                margin-bottom: 10px;
            }
            .btns, .aa {
                width: 100%;
            }
            svg text {
                font-size: 25px;
            }

        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .container {
                padding: 30px;
            }
            form {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            form label, form input {
                width: 80%;
                margin-bottom: 10px;
            }
            .btns, .aa {
                width: 80%;
            }
            svg text {
                font-size: 40px;
            }
        }

    </style>
</head>
<body>

<div class="container">
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Username" required=""/>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required=""/>
        <input class="btns" type="submit" name="login" value="Login">
        <a href="slclog.php" class="aa">User Login</a>
    </form>

<?php
        if (isset($_POST["login"])) {
            $count=0;
            $res= mysqli_query($link, "SELECT * from lib_registration where username='$_POST[username]' && password= '$_POST[password]'");
            $count = mysqli_num_rows($res);
            if ($count==0) {
                ?>
                <div class="alert alert-warning">
                    <strong style="color:#333">Invalid!</strong> <span style="color: red;font-weight: bold; ">Username Or Password.</span>
                </div>
                <?php
            } else {
                $_SESSION["username"] = $_POST["username"];
                ?>
                <script type="text/javascript">
                    window.location="dashboard.php";
                </script>
                <?php
            }
        }
      ?>
    <div class="ear-l"></div>
    <div class="ear-r"></div>
    <div class="panda-face">
        <div class="blush-l"></div>
        <div class="blush-r"></div>
        <div class="eye-l">
            <div class="eyeball-l"></div>
        </div>
        <div class="eye-r">
            <div class="eyeball-r"></div>
        </div>
        <div class="nose"></div>
        <div class="mouth"></div>
    </div>
    <div class="hand-l"></div>
    <div class="hand-r"></div>
    <div class="paw-l"></div>
    <div class="paw-r"></div>
</div>
<div class="wrapper">
    <center>
<img src="upload/9db8c642-a36f-4be6-b09c-2e2f842e18a3.png" alt="" class="bcl">
</center>
<svg>
        <text x="52%" y="90%" dy=".35em" text-anchor="middle">
            ADMIN PORTAL
            
        </text>
    </svg>
</div>
<!-- Script -->
<script src="inc/pandajs.js"></script>
<div id="cookieConsent" style="display: none; position: fixed; bottom: 0; width: 100%; background-color: #333; color: white; padding: 15px; text-align: center; z-index: 1000;">
    This website uses cookies to ensure you get the best experience on our website. 
    <a href="/cookie-policy" style="color: #4CAF50;">Learn more</a>
    <button id="acceptCookies" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; cursor: pointer; margin-left: 20px;">
        Accept
    </button>
</div>

</body>
<script>
    window.onload = function() {
    // Check if the user has already accepted cookies
    if (!getCookie("cookiesAccepted")) {
        document.getElementById("cookieConsent").style.display = "block";
    }

    document.getElementById("acceptCookies").onclick = function() {
        setCookie("cookiesAccepted", "true", 365);
        document.getElementById("cookieConsent").style.display = "none";
    };
};

// Function to set a cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Function to get a cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

</script>
</html>
	<?php 
		include 'inc/footer.php';
	 ?>
