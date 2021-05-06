<?php
       
      
    //connecting to database
    $servername="localhost";
    $username="root";
    $password="";
    $database="dkte";
    // creatin a connection
  $conn=mysqli_connect($servername,$username,$password,$database);
  //Die if connection wasn't successful
  if(!$conn)
  {
      die("Sorry,We failed to connect!".mysqli_connect_error());

      // goto the error page

      header("location:.php");

  }
  // start the session 
  session_start();

  $prn=$_SESSION["prn"];


     
      
  
    
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
 
<body>
<?php 
          $sql="SELECT * FROM `info` WHERE `prn`='$prn'";
          $result=mysqli_query($conn,$sql);
         
          $row = mysqli_fetch_assoc($result);
            
            echo "name: ".$row['firstname']."";
         
          ?>





        <?php 

            
        //     echo "<tr>
        //     <th scope='row'>". $sno . "</th>
        //     <td>". $row['title'] . "</td>
        //     <td>". $row['organization'] . "</td>
        //     <td>". $row['credentialid'] . "</td>
        //     <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
        //   </tr>";
         
          ?>
     
    
        
</body>
</html>