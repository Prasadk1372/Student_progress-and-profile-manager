<?php


// start the session 
session_start();
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "dkte";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
  die("Sorry we failed to connect: " . mysqli_connect_error());
}

$prn = $_SESSION["prn"];
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  <title>Education</title>
</head>
<style>
  #cgpabtn:hover {
    background-color: rgb(182, 173, 173);
  }

  #myTable {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #myTable td,
  #myTable th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #myTable tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #myTable tr:hover {
    background-color: #ddd;
  }

  #myTable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #404040;
    color: white;
  }

  /* #body {
    background-attachment: fixed;
    background: darkseagreen;

  } */
  body {
    /* background-image: url("1.png"); */
    background-color: rgb(200, 200, 173);
    opacity: 1;
    height: 600px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 5.0;
    border-right: 1px solid white;
  }
</style>

<body>
  

  <div class="container my-4" style=" border: 3px solid black;">

    <h3 style="margin-left:35% ; color:solid black;">Educational Background</h3>

    <table class="table" id="myTable">
      <thead>
        <tr>

          <th scope="col">class</th>
          <th scope="col">board</th>
          <th scope="col">percentage</th>
          <th scope="col">seatNO</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `education` WHERE `prn`='$prn' ";
        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($result);
        if($rowcount>0){  
        $hsc = "HSC";
        $ssc = "SSC";
        $row = mysqli_fetch_assoc($result);

        echo "<tr>
            <td>" . $ssc . "</td>
            <td>" . $row['ssc'] . "</td>
            <td>" . $row['sscs'] . "</td>
            <td>" . $row['sscp'] . "</td>
               </tr>";

        echo "<tr>
          <td>" . $hsc . "</td>
          <td>" . $row['hsc'] . "</td>
          <td>" . $row['hscs'] . "</td>
          <td>" . $row['hscp'] . "</td>
       
        </tr>";
      }
        ?>




      </tbody>
    </table>

    <div style="height:50px; margin-left:20px margin-right:20px;">
      <!-- <button style="width:100%" type="button" class="btn btn-primary" id="cgpabtn"> <a class='text-dark' href='education1.php'>Edit</a></button> -->
      <button style="width:100%" type="button" class="btn btn-primary" id="cgpabtn" onclick="document.location='education1.php'">Edit </button>

    </div>
  </div>

  <!-- for semeseter marks table -->
  <div class="container my-4" style=" border: 3px solid black;">
    <h3 style="margin-left:30% ; color:solid black;">Current Accademic performance</h3>

    <table class="table" id="myTable">
      <thead>
        <tr>

          <th scope="col">SEMESTER</th>
          <th scope="col">C.G.P.A</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `education` WHERE `PRN`='18UCS004' ";
        $result = mysqli_query($conn, $sql);
      
        if(isset($row['sem1']))
        { echo "<tr>
            <td>   FIRST YEAR -I  SEMESTER</td>
            <td>" . $row['sem1'] . "</td>
          </tr>";
        }
        if(isset($row['sem2']))
        { echo "<tr>
            <td>   FIRST YEAR -II  SEMESTER</td>
            <td>" . $row['sem2'] . "</td>
          </tr>";
        }
        if(isset($row['sem3']))
        { echo "<tr>
            <td>   SECOND YEAR -I SEMESTER</td>
            <td>" . $row['sem3'] . "</td>
          </tr>";
        }
        if(isset($row['sem4']))
        { echo "<tr>
            <td>  SECOND YEAR -II SEMESTER</td>
            <td>" . $row['sem4'] . "</td>
          </tr>";
        }
        if(isset($row['sem5']))
        { echo "<tr>
            <td>  THIRD YEAR -I SEMESTER</td>
            <td>" . $row['sem5'] . "</td>
          </tr>";
        }
        if(isset($row['sem6']))
        { echo "<tr>
            <td> THIRD YEAR -II SEMESTER</td>
            <td>" . $row['sem6'] . "</td>
          </tr>";
        }
        if(isset($row['sem7']))
        { echo "<tr>
            <td>   FOURTH YEAR -I SEMESTER</td>
            <td>" . $row['sem7'] . "</td>
          </tr>";
        }
        if(isset($row['sem8']))
        { echo "<tr>
            <td>   FOURTH YEAR -II SEMESTER</td>
            <td>" . $row['sem8'] . "</td>
          </tr>";
        }
       

        //   <tr>
        //     <td>FIRST YEAR -II SEMESTER</td>
        //     <td>" . $row['sem2'] . "</td>
        //   </tr>
        //   <tr>
        //   <td>SECOND YEAR -I  SEMESTER</td>
        //   <td>" . $row['sem3'] . "</td>
        // </tr>
        // <tr>
        // <td>SECOND YEAR -II SEMESTER</td>
        // <td>" . $row['sem4'] . "</td>
        //     </tr>
        // <tr>
        // <td>THIRD YEAR -I SEMESTER</td>
        // <td>" . $row['sem5'] . "</td>
        // </tr>
        // <tr>
        // <td>THIRD YEAR -II SEMESTER</td>
        // <td>" . $row['sem6'] . "</td>
        // </tr>
        // <tr>
        // <td>FOURTH YEAR -I SEMESTER</td>
        // <td>" . $row['sem7'] . "</td>
        // </tr>
        // <tr>
        // <td>FOURTH YEAR -II SEMESTER</td>
        // <td>" . $row['sem8'] . "</td>
        // </tr>
        
        
        
        
        // ";
        ?>




      </tbody>
    </table>
    <div style="height:50px; margin-left:20px margin-right:20px;">

      <button style="width:100%" class="btn btn-primary" id="cgpabtn" onclick="document.location='education2.php'">Edit</button>

      <!-- <button style="width:100%" type="button" class="btn btn-primary" id="cgpabtn"> <a class='text-dark' href='education2.php'>Edit</a> </button> -->
    </div>
  </div>


  <hr>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


</body>

</html>