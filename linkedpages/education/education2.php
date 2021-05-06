
<?php

session_start();
$prn = $_SESSION["prn"];
  
$servername="localhost";
$username="root";
$password="";
$database="dkte";

//creatin a connection
$conn=mysqli_connect($servername,$username,$password,$database);

//Die if connection wasn't successful

if(!$conn)
{
    die("Sorry,We failed to connect!".mysqli_connect_error());
}



$sqli = "SELECT * FROM `education` WHERE `prn`='$prn' ";
$resulti = mysqli_query($conn, $sqli);
$rowi = mysqli_fetch_assoc($resulti);

if(isset($rowi))
{

  $sem1=$rowi['sem1'];
$sem2=$rowi['sem2'];
$sem3=$rowi['sem3'];
$sem4=$rowi['sem4'];
$sem5=$rowi['sem5'];
$sem6=$rowi['sem6'];
$sem7=$rowi['sem7'];
$sem8=$rowi['sem8'];

}



if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
   
}
  if(isset($_POST['btnSubmit']))
  {
    $prn=$_SESSION['prn'];

    $sem1=$_POST['sem1'];
    $sem2=$_POST['sem2'];
    $sem3=$_POST['sem3'];
    $sem4=$_POST['sem4'];
    $sem5=$_POST['sem5'];
    $sem6=$_POST['sem6'];
    $sem7=$_POST['sem7'];
    $sem8=$_POST['sem8'];









  

    //submit these to database
  

    $sql="UPDATE `education` SET `sem1`='$sem1',`sem2`='$sem2',`sem3`='$sem3',`sem4`='$sem4',`sem5`='$sem5',`sem6`='$sem6',`sem7`='$sem7',`sem8`='$sem8' WHERE `PRN`='$prn'";
    $result=mysqli_query($conn,$sql);
    header("location:education.php");
   
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
    <link href="/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Current Accademic</title>

</head>

<style>
    body{
    background-image: url("11.jpg");
    background-color: #cccccc; 
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
    opacity: 0.9;
    
  }

    .container{
    margin:50px auto; 
    width:70%;
    justify-content: center;
    border: 3px solid black;
    border-radius: 5px;
    padding: 20px 25px 10px 25px;
    background-color: rgba(17, 16, 16, 0);
    opacity: 0.9;
  }

  #submit:hover{
    background-color: rgb(21, 50, 212);
  }

</style>


<body>


<div class="container">
    <h1 style="text-align: center;">Education Information</h1>
    <div>
     
    <form action="education2.php" method="post">
        <h3>B.Tech</h3>
        <h5>Sem I
         <label for="CGPA">CGPA:</label>
          <input type="text" id="CGPA" name="sem1" value=  <?php     echo " $sem1 ";          ?>>
        </h5>
          <br>
          <h5>Sem II 
         <label for="CGPA">CGPA:</label>
          <input type="text" id="CGPA" name="sem2" value= <?php     echo " $sem2 ";          ?>>
        </h5>
          <br>
          <h5>sem III 
         <label for="CGPA">CGPA:</label>
          <input type="text" id="CGPA" name="sem3" value= <?php     echo " $sem3 ";          ?>>
        </h5>  
        <br>
          <h5>sem IV 
         <label for="CGPA">CGPA:</label>
          <input type="text" id="CGPA" name="sem4" value= <?php     echo " $sem4 ";          ?>>
        </h5>
          <br>
          <h5>sem V
             <label for="CGPA">CGPA:</label>
            <input type="text" id="CGPA" name="sem5" value= <?php     echo " $sem5 ";          ?>>
        </h5>
            <br>
            <h5>sem VI
         
            <label for="CGPA">CGPA:</label>
            <input type="text" id="CGPA" name="sem6" value= <?php     echo " $sem6 ";          ?>>
          </h5>
            <br>
            <h5>sem VII
          
              <label for="CGPA">CGPA:</label>
              <input type="text" id="CGPA" name="sem7" value= <?php     echo " $sem7 ";          ?>>
            </h5>
              <br>
              <h5>sem VIII
              <label for="CGPA">CGPA:</label>
              <input type="text" id="CGPA" name="sem8" value= <?php     echo " $sem8 ";          ?>>
            </h5>
              <br>
    <button style="margin-bottom: 10px;" id="submit" type="submit" name ="btnSubmit" class="btn btn-primary">SUBMIT</button>
    </form>
    </div>
</div>

<!-- 
<p>Click the "Submit" button and the form-data will be sent to a page on the 
server called "action_page.php".</p> -->

</body>
</html>