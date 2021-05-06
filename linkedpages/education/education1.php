
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
        $ssci=$rowi['ssc'];
        $sscpi= $rowi['sscp'];
        $sscsi=$rowi['sscs'];

        $hsci=$rowi['hsc'];
        $hscpi=$rowi['hscp'];
        $hscsi=$rowi['hscs'];
      }



if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: .php");
   
}


if(isset($_POST['btnSubmit']))
  {
    

    $ssc=$_POST['ssc'];
    $sscp= $_POST['percentage1'];
    $sscs=$_POST['seat1'];
  
    $hsc=$_POST['hsc'];
    $hscp=$_POST['percentage2'];
    $hscs=$_POST['seat2'];


                  $sql = "SELECT * FROM `education` WHERE `prn`='$prn' ";
                  $result = mysqli_query($conn, $sql);
                  $rowcount = mysqli_num_rows($result);
                  if($rowcount==0)
                  {
                      // INSERT NEW RECORD USE INSERT QUERY

                      $sql = "INSERT INTO `education`( `prn`, `ssc`, `sscp`, `sscs`, `hsc`, `hscp`, `hscs`) VALUES ('$prn','$ssc','$sscp','$sscs','$hsc','$hscp','$hscs') ";
                      



                  }
                  else{
                    
                      
                        $sql="UPDATE `education` SET `ssc`='$ssc',`sscp`='$sscp',`sscs`='$sscs',`hsc`='$hsc',`hscp`='$hscp',`hscs`='$hscs' WHERE `PRN`='$prn'";
                  }
                  



  


    

    


    $result=mysqli_query($conn,$sql);

     header("location:education.php");

    if($result){
      echo "Success";
    }
    
 }


?>


<!doctype html>
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
    <title>Education Background</title>

</head>

<style>
    body{
    background-image: url("../images/13.png");
    height:600px; 
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
    /* opacity: 0.3; */
    
  }

    .container{
    margin:50px auto; 
    width:70%;
    height: 50%;
    justify-content: center;
    border: 3px solid black;
    border-radius: 5px;
    padding: 20px 25px 10px 25px;
   background-color: white;
   opacity:0.9;
  }

  #submit:hover{
    background-color: rgb(21, 50, 212);
  }

</style>


<body>
<br>

<div class="container">
    <h1 style="text-align: center;">Education Information</h1>
    <div>
        <h3>SSC</h3>
    <form action="education1.php" method="post">
      <label for="Board">Board:</label>
      <select  id="Bord" name="ssc">

        <option value="Maharastra">State Board Of Maharashtra</option>
        <option value="CBSE">CBSE</option>
        <option value="KSB">Karnataka State Board</option>
        <option value="OTHER">other state board</option>
      </select>
        <label for="Percentage">Percentage:</label>
        <input type="text" id="Percentage" name="percentage1"  value=    <?php  if(isset($sscpi)){echo " $sscpi ";}          ?> >


        <label for="seat">seat no.:</label>
        <input type="text" id="seat" name="seat1" value=    <?php      if(isset($sscsi)){echo "$sscsi";}             ?>   >
        
        
        <br>
      
        <h3>HSC</h3>
          <label for="Bord">Board:</label>
      <select id="Bord" name="hsc" >
        <option value="Maharastra">State Board Of Maharashtra</option>
        <option value="CBSE">CBSE</option>
        <option value="KSB">Karnataka State Board</option>
        <option value="OTHER">other state board</option>    
      </select>
     
        <label for="Percentage">Percentage:</label>
        <input type="text" id="Percentage" name="percentage2"  value=    <?php  if(isset($hscpi)){echo " $hscpi ";}            ?>>
     
        <label for="seat">seat no.:</label>
        <input type="text" id="seat" name="seat2"  value=    <?php    if(isset($hscsi)){echo " $hscsi ";}         ?>><br>
    <button style="margin-bottom: 10px;" id="submit" type="submit" name ="btnSubmit" class="btn btn-primary">SUBMIT</button>
  </form>
   
</div>



</body>
</html> 