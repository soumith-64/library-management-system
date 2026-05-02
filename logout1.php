<?php 
     session_start();
     
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="index.php";
            </script>
        <?php
    }
    $page = 'logout';
    include 'inc/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .button {
  cursor: pointer;
  position: relative;
  display: inline-block;
  transform-style: preserve-3d;
  transform: rotateX(-45deg) rotateY(25deg) rotateZ(0deg);
  background-color: transparent;
  border: none;
}

.lid {
  position: absolute;
  transform-style: preserve-3d;
  transition: all 1s ease-in-out;
  transform-origin: 0 80px -120px;
  height: 80px;
  width: 250px;
  background-color: rgba(0, 0, 0, 0);
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.lid:hover,
.button:hover .lid {
  transform: translate(-50%, -50%) rotateX(60deg);
}

.lid .side {
  display: inline-block;
  width: 250px;
  height: 250px;
  background-color: rgba(63, 112, 141, 0.308);
  position: absolute;
  top: 50%;
  left: 50%;
  border: solid 1px rgba(0, 132, 255, 0.226);
}
.front {
  transform: translate(-50%, -50%) translateZ(125px);
  height: 80px !important;
}
.top {
  transform: translate(-50%, -50%) rotateX(90deg) translateZ(40px);
  background-color: rgba(167, 47, 10, 0.438);
}
.left {
  transform: translate(-50%, -50%) rotateY(90deg) translateZ(125px);
  height: 80px !important;
}

.right {
  transform: translate(-50%, -50%) rotateY(-90deg) translateZ(125px);
  height: 80px !important;
}

.back {
  transform: translate(-50%, -50%) rotateY(180deg) translateZ(125px);
  background-color: rgba(250, 234, 18, 0.418);
  height: 80px !important;
}

.back::before {
  content: "";
  display: inline-block;
  position: absolute;
  width: 20px;
  height: 10px;
  background-color: black;
  bottom: 0;
  left: 10px;
}

.back::after {
  content: "";
  display: inline-block;
  position: absolute;
  width: 20px;
  height: 10px;
  background-color: black;
  bottom: 0;
  right: 10px;
}

.panels {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotateX(90deg) translateZ(-40px);
}

.panel-1 {
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  height: 250px;
  width: 250px;
  background-color: rgb(166, 255, 0);
  background: repeating-linear-gradient(
    45deg,
    rgb(247, 243, 33) 0% 2%,
    black 2% 4%
  );
  box-shadow: 0px 0px 0px 20px red;
}

.panel-2 {
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  height: 200px;
  width: 200px;
  background-color: rgb(0, 0, 0);
  background: linear-gradient(-135deg, rgb(43, 42, 42), black);
  border: solid 5px rgb(247, 243, 33);
}

.panel-1::after {
  content: "CLICK THE RED BUTTON TO LOGOUT";
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 290px;
  height: 25px;
  color: white;
  font-weight: bold;
  transform: translate(-50%, -50%) translateY(170px);
  font-size: medium;
  background-color: red;
}

.panel-1::before {
  content: "WARNING: LOGOUT";
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 290px;
  height: 25px;
  color: white;
  font-weight: bold;
  transform: translate(-50%, -50%) rotateZ(90deg) translateY(170px);
  font-size: larger;
  background-color: red;
}

.btn-trigger {
  position: absolute;
  top: 50%;
  right: 50%;
  transform: translate(-50%, -50%);
}

.btn-trigger-1 {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 100px;
  height: 100px;
  background-color: rgb(207, 195, 195);
  box-shadow: -0px 1px 0 rgb(54, 54, 54), -0px 2px 0 rgb(54, 54, 54),
    -1px 3px 0 rgb(54, 54, 54), -1px 4px 0 rgb(54, 54, 54),
    -2px 5px 0 rgb(54, 54, 54), -2px 6px 0 rgb(54, 54, 54),
    -3px 7px 0 rgb(54, 54, 54), -3px 8px 0 rgb(54, 54, 54),
    -4px 9px 0 rgb(54, 54, 54), -4px 10px 0 rgb(54, 54, 54),
    -5px 11px 0 rgb(54, 54, 54), -5px 12px 0 rgb(54, 54, 54),
    -6px 13px 0 rgb(54, 54, 54), -6px 14px 0 rgb(54, 54, 54),
    -7px 15px 0 rgb(54, 54, 54), -7px 16px 0 rgb(54, 54, 54),
    -8px 17px 0 rgb(54, 54, 54), -8px 18px 0 rgb(54, 54, 54),
    -9px 19px 0 rgb(54, 54, 54), -9px 20px 0 rgb(54, 54, 54),
    -10px 21px 0 rgb(54, 54, 54), -10px 22px 0 rgb(54, 54, 54),
    -11px 23px 0 rgb(54, 54, 54), -11px 24px 0 rgb(54, 54, 54),
    -12px 25px 0 rgb(54, 54, 54), -12px 26px 0 rgb(54, 54, 54);
  border-radius: 50%;
  transform: translate(-50%, -50%) translateZ(50px);
}

.btn-trigger-2 {
  position: absolute;
  width: 80px;
  height: 80px;
  background-color: rgb(241, 17, 17);
  box-shadow: -0px 1px 0 rgb(128, 5, 5), -0px 2px 0 rgb(128, 5, 5),
    -1px 3px 0 rgb(128, 5, 5), -1px 4px 0 rgb(128, 5, 5),
    -2px 5px 0 rgb(128, 5, 5), -2px 6px 0 rgb(128, 5, 5),
    -3px 7px 0 rgb(128, 5, 5), -3px 8px 0 rgb(128, 5, 5),
    -4px 9px 0 rgb(128, 5, 5), -4px 10px 0 rgb(128, 5, 5),
    -5px 11px 0 rgb(128, 5, 5), -5px 12px 0 rgb(128, 5, 5),
    -6px 13px 0 rgb(128, 5, 5), -6px 14px 0 rgb(128, 5, 5),
    -7px 15px 0 rgb(128, 5, 5), -7px 16px 0 rgb(128, 5, 5);
  border-radius: 50%;
  transition: all 0.3s;
  transform: translate(-40%, -70%) translateZ(100px);
}

.btn-trigger-2:active {
  transform: translate(-50%, -50%) translateZ(100px);
  box-shadow: none;
}

@keyframes rotate {
  100% {
    transform: rotateX(360deg);
  }
}
.alg {
 text-align: center;
 margin-top: 430px;
}
body{
   background-color: #ffbf00;
}
.voltage-button {
  position: relative;
  margin-top: 300px;
}

.voltage-button button {
  color: white;
  background: #0D1127;
  padding: 1rem 3rem 1rem 3rem;
  border-radius: 5rem;
  border: 5px solid #5978F3;
  font-size: 1.2rem;
  line-height: 1em;
  letter-spacing: 0.075em;
  transition: background 0.3s;
}

.voltage-button button:hover {
  cursor: pointer;
  background: #0F1C53;
}

.voltage-button button:hover + svg, .voltage-button button:hover + svg + .dots {
  opacity: 1;
}

.voltage-button svg {
  display: block;
  position: absolute;
  top: -0.75em;
  left: -0.25em;
  width: 209px;
  margin-left: 551px;
  height: calc(100% + 1.5em);
  pointer-events: none;
  opacity: 0;
  transition: opacity 0.4s;
  transition-delay: 0.1s;
}

.voltage-button svg path {
  stroke-dasharray: 100;
  filter: url("#glow");
}

.voltage-button svg path.line-1 {
  stroke: #f6de8d;
  stroke-dashoffset: 0;
  animation: spark-1 3s linear infinite;
}

.voltage-button svg path.line-2 {
  stroke: #6bfeff;
  stroke-dashoffset: 500;
  animation: spark-2 3s linear infinite;
}

.voltage-button .dots {
  opacity: 0;
  transition: opacity 0.3s;
  transition-delay: 0.4s;
}

.voltage-button .dots .dot {
  width: 1rem;
  height: 1rem;
  background: white;
  border-radius: 100%;
  position: absolute;
  opacity: 0;
}

.voltage-button .dots .dot-1 {
  top: 0;
  left: 20%;
  animation: fly-up 3s linear infinite;
}

.voltage-button .dots .dot-2 {
  top: 0;
  left: 55%;
  animation: fly-up 3s linear infinite;
  animation-delay: 0.5s;
}

.voltage-button .dots .dot-3 {
  top: 0;
  left: 80%;
  animation: fly-up 3s linear infinite;
  animation-delay: 1s;
}

.voltage-button .dots .dot-4 {
  bottom: 0;
  left: 30%;
  animation: fly-down 3s linear infinite;
  animation-delay: 2.5s;
}

.voltage-button .dots .dot-5 {
  bottom: 0;
  left: 65%;
  animation: fly-down 3s linear infinite;
  animation-delay: 1.5s;
}

@keyframes spark-1 {
  to {
    stroke-dashoffset: -1000;
  }
}

@keyframes spark-2 {
  to {
    stroke-dashoffset: -500;
  }
}

@keyframes fly-up {
  0% {
    opacity: 0;
    transform: translateY(0) scale(0.2);
  }

  5% {
    opacity: 1;
    transform: translateY(-1.5rem) scale(0.4);
  }

  10%, 100% {
    opacity: 0;
    transform: translateY(-3rem) scale(0.2);
  }
}

@keyframes fly-down {
  0% {
    opacity: 0;
    transform: translateY(0) scale(0.2);
  }

  5% {
    opacity: 1;
    transform: translateY(1.5rem) scale(0.4);
  }

  10%, 100% {
    opacity: 0;
    transform: translateY(3rem) scale(0.2);
  }
}

    </style>
</head>
<body>
<div class="container">
    <div class="alg">
    <a href="logout.php">
    <button class="button">
  <div class="lid">
    <span class="side top"></span>
    <span class="side front"></span>
    <span class="side back"> </span>
    <span class="side left"></span>
    <span class="side right"></span>
  </div>
  <div class="panels">
    <div class="panel-1">
      <div class="panel-2">
        <div class="btn-trigger">
          <span class="btn-trigger-1"></span>
          <span class="btn-trigger-2"></span>
        </div>
      </div>
    </div>
  </div>
</button>
</a>
<div class="voltage-button">
  <a href="dashboard.php">
  <button>Go Back</button>
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 234.6 61.3" preserveAspectRatio="none" xml:space="preserve">
 
    <filter id="glow">
      <feGaussianBlur class="blur" result="coloredBlur" stdDeviation="2"></feGaussianBlur>
      <feTurbulence type="fractalNoise" baseFrequency="0.075" numOctaves="0.3" result="turbulence"></feTurbulence>
  <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="30" xChannelSelector="R" yChannelSelector="G" result="displace"></feDisplacementMap>
      <feMerge>
        <feMergeNode in="coloredBlur"></feMergeNode>
        <feMergeNode in="coloredBlur"></feMergeNode>
        <feMergeNode in="coloredBlur"></feMergeNode>
        <feMergeNode in="displace"></feMergeNode>
        <feMergeNode in="SourceGraphic"></feMergeNode>
      </feMerge>
    </filter>
    <path class="voltage line-1" d="m216.3 51.2c-3.7 0-3.7-1.1-7.3-1.1-3.7 0-3.7 6.8-7.3 6.8-3.7 0-3.7-4.6-7.3-4.6-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-0.9-7.3-0.9-3.7 0-3.7-2.7-7.3-2.7-3.7 0-3.7 7.8-7.3 7.8-3.7 0-3.7-4.9-7.3-4.9-3.7 0-3.7-7.8-7.3-7.8-3.7 0-3.7-1.1-7.3-1.1-3.7 0-3.7 3.1-7.3 3.1-3.7 0-3.7 10.9-7.3 10.9-3.7 0-3.7-12.5-7.3-12.5-3.7 0-3.7 4.6-7.3 4.6-3.7 0-3.7 4.5-7.3 4.5-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-10-7.3-10-3.7 0-3.7-0.4-7.3-0.4-3.7 0-3.7 2.3-7.3 2.3-3.7 0-3.7 7.1-7.3 7.1-3.7 0-3.7-11.2-7.3-11.2-3.7 0-3.7 3.5-7.3 3.5-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-2.9-7.3-2.9-3.7 0-3.7 8.4-7.3 8.4-3.7 0-3.7-14.6-7.3-14.6-3.7 0-3.7 5.8-7.3 5.8-2.2 0-3.8-0.4-5.5-1.5-1.8-1.1-1.8-2.9-2.9-4.8-1-1.8 1.9-2.7 1.9-4.8 0-3.4-2.1-3.4-2.1-6.8s-9.9-3.4-9.9-6.8 8-3.4 8-6.8c0-2.2 2.1-2.4 3.1-4.2 1.1-1.8 0.2-3.9 2-5 1.8-1 3.1-7.9 5.3-7.9 3.7 0 3.7 0.9 7.3 0.9 3.7 0 3.7 6.7 7.3 6.7 3.7 0 3.7-1.8 7.3-1.8 3.7 0 3.7-0.6 7.3-0.6 3.7 0 3.7-7.8 7.3-7.8h7.3c3.7 0 3.7 4.7 7.3 4.7 3.7 0 3.7-1.1 7.3-1.1 3.7 0 3.7 11.6 7.3 11.6 3.7 0 3.7-2.6 7.3-2.6 3.7 0 3.7-12.9 7.3-12.9 3.7 0 3.7 10.9 7.3 10.9 3.7 0 3.7 1.3 7.3 1.3 3.7 0 3.7-8.7 7.3-8.7 3.7 0 3.7 11.5 7.3 11.5 3.7 0 3.7-1.4 7.3-1.4 3.7 0 3.7-2.6 7.3-2.6 3.7 0 3.7-5.8 7.3-5.8 3.7 0 3.7-1.3 7.3-1.3 3.7 0 3.7 6.6 7.3 6.6s3.7-9.3 7.3-9.3c3.7 0 3.7 0.2 7.3 0.2 3.7 0 3.7 8.5 7.3 8.5 3.7 0 3.7 0.2 7.3 0.2 3.7 0 3.7-1.5 7.3-1.5 3.7 0 3.7 1.6 7.3 1.6s3.7-5.1 7.3-5.1c2.2 0 0.6 9.6 2.4 10.7s4.1-2 5.1-0.1c1 1.8 10.3 2.2 10.3 4.3 0 3.4-10.7 3.4-10.7 6.8s1.2 3.4 1.2 6.8 1.9 3.4 1.9 6.8c0 2.2 7.2 7.7 6.2 9.5-1.1 1.8-12.3-6.5-14.1-5.5-1.7 0.9-0.1 6.2-2.2 6.2z" fill="transparent" stroke="#fff"></path>
    <path class="voltage line-2" d="m216.3 52.1c-3 0-3-0.5-6-0.5s-3 3-6 3-3-2-6-2-3 1.6-6 1.6-3-0.4-6-0.4-3-1.2-6-1.2-3 3.4-6 3.4-3-2.2-6-2.2-3-3.4-6-3.4-3-0.5-6-0.5-3 1.4-6 1.4-3 4.8-6 4.8-3-5.5-6-5.5-3 2-6 2-3 2-6 2-3 1.6-6 1.6-3-4.4-6-4.4-3-0.2-6-0.2-3 1-6 1-3 3.1-6 3.1-3-4.9-6-4.9-3 1.5-6 1.5-3 1.6-6 1.6-3-1.3-6-1.3-3 3.7-6 3.7-3-6.4-6-6.4-3 2.5-6 2.5h-6c-3 0-3-0.6-6-0.6s-3-1.4-6-1.4-3 0.9-6 0.9-3 4.3-6 4.3-3-3.5-6-3.5c-2.2 0-3.4-1.3-5.2-2.3-1.8-1.1-3.6-1.5-4.6-3.3s-4.4-3.5-4.4-5.7c0-3.4 0.4-3.4 0.4-6.8s2.9-3.4 2.9-6.8-0.8-3.4-0.8-6.8c0-2.2 0.3-4.2 1.3-5.9 1.1-1.8 0.8-6.2 2.6-7.3 1.8-1 5.5-2 7.7-2 3 0 3 2 6 2s3-0.5 6-0.5 3 5.1 6 5.1 3-1.1 6-1.1 3-5.6 6-5.6 3 4.8 6 4.8 3 0.6 6 0.6 3-3.8 6-3.8 3 5.1 6 5.1 3-0.6 6-0.6 3-1.2 6-1.2 3-2.6 6-2.6 3-0.6 6-0.6 3 2.9 6 2.9 3-4.1 6-4.1 3 0.1 6 0.1 3 3.7 6 3.7 3 0.1 6 0.1 3-0.6 6-0.6 3 0.7 6 0.7 3-2.2 6-2.2 3 4.4 6 4.4 3-1.7 6-1.7 3-4 6-4 3 4.7 6 4.7 3-0.5 6-0.5 3-0.8 6-0.8 3-3.8 6-3.8 3 6.3 6 6.3 3-4.8 6-4.8 3 1.9 6 1.9 3-1.9 6-1.9 3 1.3 6 1.3c2.2 0 5-0.5 6.7 0.5 1.8 1.1 2.4 4 3.5 5.8 1 1.8 0.3 3.7 0.3 5.9 0 3.4 3.4 3.4 3.4 6.8s-3.3 3.4-3.3 6.8 4 3.4 4 6.8c0 2.2-6 2.7-7 4.4-1.1 1.8 1.1 6.7-0.7 7.7-1.6 0.8-4.7-1.1-6.8-1.1z" fill="transparent" stroke="#fff"></path>
  </svg>
  <div class="dots">
    <div class="dot dot-1"></div>
    <div class="dot dot-2"></div>
    <div class="dot dot-3"></div>
    <div class="dot dot-4"></div>
    <div class="dot dot-5"></div>
  </div>
</div>
</a>
 </div>
 
 </div>
</body>
</html>