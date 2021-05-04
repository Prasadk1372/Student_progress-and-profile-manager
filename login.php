<?php

session_start();

if (isset($_SESSION['loggedin'])) {
  header("location: home.php");
}
if (isset($_SESSION['facultyloggedin'])) {
  header("location: facultyhome.php");
}

$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/_dbconnect.php';

  //student login
  $prn = $_POST["id"];
  $password = $_POST["password"];


  $existsql = "SELECT * FROM `login` WHERE prn='$prn'";
  $result = mysqli_query($conn, $existsql);
  $numrows = mysqli_num_rows($result);
  if ($numrows > 0) {
    $sql1 = "Select * from login where prn='$prn' AND password='$password'";
    $result1 = mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($result1);
    if ($num1 == 1) {
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['prn'] = $prn;
      header("location: home.php");
    } else {
      $showError =true;
    }
  } else {
    //faculty login 
    include 'partials/_dbconnect.php';

    $id = $_POST["id"];
    $password = $_POST["password"];

    echo "IN FACULTY LOGIN PAGE";

    $sql2 = "Select * from facultylogin where id='$id' AND password='$password'";
    $result2 = mysqli_query($conn, $sql2);
    $num2 = mysqli_num_rows($result2);
    if ($num2 == 1) { 
      $login = true;
      session_start();
      $_SESSION['facultyloggedin'] = true;
      $_SESSION['id'] = $id;

      header("location:linkedpages/facultypages/facultypage.php");
    } else {
      $showError = true;
    }
  }
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

<style>
  body {
    background-image: url("img/1.jpg");
    background-color: #cccccc;
    opacity: 1;
    height: 600px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.9;
  }

  .container {
    margin-top: 100px;
    width: 30%;
    border: 3px solid white;
    border-radius: 5px;
    padding: 20px 25px 10px 25px;
    background-color: rgba(17, 16, 16, 0);
    opacity: 0.9;
  }

  #login {
    margin-top: 2px;
    margin-bottom: 20px;
    width: 30%;
    /* border: 1px solid white; */
    border-radius: 2px;
    padding: 2px 2px 2px 2px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: bolder;
    color: rgb(240, 233, 233);
  }


  #submit:hover {
    background-color: rgb(182, 173, 173);
  }
</style>

<body>
  <?php require 'partials/_nav.php' ?>
  <?php
  if ($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
  }
  if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Invalid Crediantials     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
  }
  ?>



  <div class="container">
    <form action="login.php" method="post">
      <div class="form-group">

        <div>
          <h3 id="login">LogIn</h3>
        </div>

        <input type="text" class="form-control" id="prn" placeholder="Enter User_Id" name="id">
      </div>
      <div class="form-group">

        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>

      <button style="margin-bottom: 10px; width:100%" id="submit" type="submit" class="btn btn-success">LOG IN</button>
    </form>
  </div>

  <?php include 'partials/_footer.php'; ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>