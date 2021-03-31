<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Project11</title>
    <link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
</head>
<body>
      <div class="container my-3">
          <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Wel-Come to DKTE.</h4>
              <p>Wel-Come to DKTE. You are logged in , now you can explore.</p>
              <hr>
              <p class="mb-0">Whenever you need to, logout using<a href="/project/logout.php"> this link.</a></p>
          </div>
      </div>

    <div class="d-flex flex-column p-3 text-white bg-dark" style="width: 230px;height: 1000px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">Menu</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="linkedpages/info.php" class="nav-link text-white">
              Personal Info
            </a>
          </li>
          <li>
            <a href="linkedpages/education.php" class="nav-link text-white">
              Education
            </a>
          </li>
          <li>
            <a href="linkedpages/certification.php" class="nav-link text-white">
            Certifications & Internships
            </a>
          </li>
          <li>
            <a href="linkedpages/academics.php" class="nav-link text-white">
              Academic Performance
            </a>
          </li>
          <li>
            <a href="/project/logout.php" class="nav-link text-white">
             
              LogOut
            </a>
          </li>
        </ul>
        <hr>
      </div>

	   
</body>
</html>