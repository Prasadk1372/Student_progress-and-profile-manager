<?php
// start the session 
session_start();
//connecting to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dkte";
// creatin a connection
$conn = mysqli_connect($servername, $username, $password, $database);
//Die if connection wasn't successful
if (!$conn) {
  die("Sorry,We failed to connect!" . mysqli_connect_error());

  // goto the error page

  header("location:.php");
}
$prn = $_SESSION["prn"];

// Edit flag to check whether user want to update record
$_SESSION["editflag"] = false;
$editflag=$_SESSION["editflag"];

$sql = "SELECT * FROM `info` WHERE `prn`='$prn'";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);



if ($rowcount == 1) {
  header("location:filledInfo.php");
}
 else {



  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $prn = $_POST['prn'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $mobile = $_POST['mobile'];




    if ($rowcount == 1) {

      echo "IN UPDATE BLOCK $firstname ";

      $sqlupdate = "UPDATE `info` SET `prn`='$prn',`firstname`='$firstname',`middlename`='$middlename',`lastname`='$lastname', `birthdate`='$birthdate',`email`='$email' ,`localaddress`='$address',`permanentaddress`='$address2',`state`='$state',`pin`='$pin',`mobileno`='$mobile' WHERE `info`.`prn`='$prn'";
      $result = mysqli_query($conn, $sqlupdate);
    } else {
      //insert new record it is not previously available these to database
      $sqlinsert = "INSERT INTO `info` (`firstname`, `middlename`, `lastname`, `prn`, `birthdate`, `email`, `localaddress`, `permanentaddress`, `country`, `state`, `pin`, `mobileno`) VALUES 
                ('$firstname', '$middlename', '$lastname', '$prn', '$birthdate', '$email', '$address', '$address2', '$country', '$state', '$pin', '$mobile')";

      $result = mysqli_query($conn, $sqlinsert);
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
  <title>Personal Info</title>
  <link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<style>
  body {
    background-image: url("13.png");
    background-color: #cccccc;
    opacity: 1;
    height: auto;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.9;

  }

  .container {
    margin-top: auto;
    width: 100%;
    padding: 20px 25px 25px 25px;
    background-color: rgba(17, 16, 16, 0);
    opacity: 0.9;
  }

  #submit:hover {
    background-color: rgb(21, 50, 212);
  }
</style>

<body>

  <div class="container">
    <form action="info.php" method="post">
      <div class="col-md-8 order-md-1">
        <h3 class="mb-3" style="color: rgb(241, 233, 233);  font-weight: bold;">Personal Information</h3>
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3" style="max-width: 33%;">
              <label for="firstname" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">First name</label>
              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3" style="max-width: 33%;">
              <label for="middlename" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">Middle name</label>
              <input type="text" class="form-control" name="middlename" id="middlename" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid middle name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3" style="max-width: 33%;">
              <label for="lastname" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">Last name</label>
              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="prn" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">PRN</label>
            <div class="input-group">

              <input type="text" class="form-control" name="prn" id="prn" placeholder="PRN" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your prn is required.
              </div>
            </div>
          </div>


          <div style="margin-top: 30px; max-width: 100%;">
            <div class="form-group" style="margin-top: 20px; max-width: 100%;">
              <i class="fas fa-calendar"></i>
              <label for="birthdate" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">BirthDate</label><br>
              <input id="birthdate" class="myInput" type="date" name="birthdate">
            </div>
          </div>

          <div class="mb-3">
            <label for="email" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">Email
              <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">Local Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address2" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;"> Permanent Address <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite">
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">Country</label>
              <select class="custom-select d-block w-100" name="country" id="country" required>
                <option value="">Choose...</option>
                <option>India</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">State</label>
              <select class="custom-select d-block w-100" name="state" id="state" required>
                <option value="">Choose...</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">Pin</label>
              <input type="text" class="form-control" name="pin" id="pin" placeholder="" required>
              <div class="invalid-feedback">
                pin code required.
              </div>
            </div>
          </div>

          <div class="row" style="width:100%;">
            <div class="col-md-12 mb-3">
              <label for="mobile" style="color: rgb(241, 233, 233); font-size: 1rem; font-weight: bold;">Mobile No.</label>
              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="1234567890" required>

              <div class="invalid-feedback">
                Mobile Number is required
              </div>
            </div>
            <div>
              <button style=" width:100%; height: 40px;" id="submit" type="submit" class="btn btn-success">SUBMIT</button>
            </div>
        </form>

      </div>





</body>

</html>