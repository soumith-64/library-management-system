<?php
session_start();
include 'inc/connection.php';

// Check for the cookie on page load
if (isset($_COOKIE['session_token'])) {
    $session_token = $_COOKIE['session_token'];
    session_id($session_token);
    session_start();

    if (isset($_SESSION["teacher"])) {
        ?>
        <script type="text/javascript">
            window.location="user/teacher/dashboard.php";
        </script>
        <?php
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management System</title>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="inc/css/pro1.css">
      <link rel="icon" type="image/x-icon" href="../upload/favicon.ico">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <!-- Stylesheet -->
    <link rel="stylesheet" href="inc/panda2.css" />
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
        font-weight: 500;
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

        @import url("https://fonts.googleapis.com/css2?family=Port+Lligat+Slab&display=swap");

        svg {
            font-family: "Port Lligat Slab", sans-serif;
            width: 100%;
            height: 100%;
                margin-top: 480px;
        }

        svg text {
            animation: stroke 9s infinite alternate;
            stroke-width: 2;
            stroke: #000000;
            font-size: 50px;
        }

        @keyframes stroke {
            0% {
                fill: rgba(147, 255, 227, 0);
                stroke: rgba(0, 0, 0, 1);
                stroke-dashoffset: 25%;
                stroke-dasharray: 0 50%;
                stroke-width: 2;
            }

            70% {
                fill: rgba(147, 255, 227, 0);
                stroke: rgba(0, 0, 0, 1);
            }

            80% {
                fill: rgba(147, 255, 227, 0);
                stroke: rgba(0, 0, 0, 1);
                stroke-width: 3;
            }

            100% {
                fill: rgba(147, 255, 227, 1);
                stroke: rgba(0, 0, 0, 0);
                stroke-dashoffset: -25%;
                stroke-dasharray: 50% 0;
                stroke-width: 0;
            }
        }

        .wrapper {
            margin-bottom: 60px;
            background-color: #33ff9c;
        }

        /* Media Queries */
        @media (max-width: 767px) {
            .container {
                padding: 10px;
            }

            .aa {
                width: 100%;
                margin-bottom: 10px;
            }

            svg text {
                font-size: 25px;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .container {
                padding: 20px;
            }

            .aa {
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
        <label for="">Username:</label>
        <input type="text" name="username" id="username" placeholder="Username" required=""/>
        <label for="">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password" required=""/>
        <input class="btns" type="submit" name="login" value="Login">
        <a href="index.php" class="aa">User Login</a>
    </form>
    <?php
    if (isset($_POST["login"])) {
        $count = 0;
        $res = mysqli_query($link, "SELECT * from t_registration where name='$_POST[username]' && password= '$_POST[password]'");
        $count = mysqli_num_rows($res);
        if ($count == 0) {
            ?>
            <div class="alert alert-warning">
                <strong style="color:#333">Invalid!</strong> <span style="color: red;font-weight: bold; ">Username Or Password.</span>
            </div>
            <?php
        } else {
            $_SESSION["teacher"] = $_POST["username"];
            setcookie('session_token', session_id(), time() + (86400 * 365 * 10), "/"); // Cookie expires in 10 years
            ?>
            <script type="text/javascript">
                window.location="user/teacher/dashboard.php";
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
        <text x="52%" y="50%" dy=".35em" text-anchor="middle">
            TEACHER LOGIN
        </text>
    </svg>
</div>

<!-- Script -->
<script src="inc/pandajs.js"></script>
</body>
</html>
