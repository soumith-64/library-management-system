<?php
session_start();
include 'inc/connection.php';
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
    <link rel="stylesheet" href="inc/panda1.css" />
    <style>
        .bcl{
            align-items: center;
            width:200px;
            margin-top: 10px;
        }
        .btns {
            text-align: center;
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

        @import url("https://fonts.googleapis.com/css2?family=Port+Lligat+Slab&display=swap");

        svg {
            font-family: "Port Lligat Slab", sans-serif;
            width: 100%;
            height: 100%;
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
                fill: rgba(255, 255, 255, 0); stroke: rgba(0, 0, 0, 1);
                stroke-dashoffset: 25%; stroke-dasharray: 0 50%; stroke-width: 2;
            }
            70% { fill: rgba(255, 255, 255, 0); stroke: rgba(0, 0, 0, 1); }
            80% { fill: rgba(255, 255, 255, 0); stroke: rgba(0, 0, 0, 1); stroke-width: 3; }
            100% {
                fill: rgba(255, 255, 255, 1); stroke: rgba(0, 0, 0, 0);
                stroke-dashoffset: -25%; stroke-dasharray: 50% 0; stroke-width: 0;
            }
        }

        .wrapper {
            margin-bottom: 60px;
            background-color: #5dfcfa;
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
            .aa {
                width: 100%;
                margin-bottom: 10px;
            }
            svg text {
                font-size: 50px;
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
            .aa {
                width: 80%;
                margin-bottom: 10px;
            }
            svg text {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post">
        <a href="stdlog.php" class="aa">Student Login</a>
        <a href="trclog.php" class="aa">Teacher Login</a>

    </form>
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
            USER PORTAL
        </text>
    </svg>
</div>
<!-- Script -->
<script src="inc/pandajs.js"></script>
</body>
</html>
