<?php


// start the session 
session_start();
$prn = $_SESSION["prn"];

$insert = false;
$update = false;
$delete = false;
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


  <title>faculty search</title>

</head>
<style>
  body {
    background-image: url("/Student_progress-and-profile-manager/img/1.jpg");
    background-color: #cccccc;
    opacity: 1;
    height: 600px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 10.0;
    border-right: 1px solid white;
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
</style>

<body>
  
<!-- Add the navbar code -->
<?php
echo'
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" style="border: 1px solid white;">
    <!-- Brand/logo -->
    <a class="navbar-brand" target="_blank" href="https://www.dkte.ac.in/">
      <img src="/Student_progress-and-profile-manager/partials/2.png" alt="logo" style="width:60px; height:30px; margin-left:15px;">
    </a>
    
    <!-- Links -->
    <ul class="navbar-nav">';
     echo' <li class="nav-item">
          <a class="nav-link" href="mailto:kulkarniprasad7777@gmail.com.com">contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Student_progress-and-profile-manager/partials/aboutus.php">About Us</a>
      </li>';             
        
        echo '<li class="nav-item"  style="margin-left:1000px;"><a href="../../logout.php" class="btn btn-success">LogOut</a></li>';
      

      echo ' 
      </ul>
      
    </nav>';

?>


<!-- End of nav bar -->

  <div class="container my-4">

    <form action="addcertificate.html">
      <button type="submit" class="btn btn-primary">Add Certificates</button>
    </form>
  </div>

  <div class="container my-4">


    <table class="table" id="myTable" style="background-color: #cccccc;">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Student Name</th>
          <th scope="col">PRN</th>
          <th scope="col">CGPA</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody;>

        <?php
        $sql = "SELECT * FROM `info`";
        $sql2 = "SELECT * FROM `education`";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $row2 = mysqli_fetch_assoc($result2);
          $sno = $sno + 1;
          echo "<tr>
          <th scope='row'>" . $sno . "</th>
          <td>" . $row['firstname'] . "</td>
          <td>" . $row2['prn'] . "</td>
          <td>" . $row2['sem2'] . "</td>      
           <td> <a href='generatepdf.html' class='btn btn-info'  role='button'  >View profile</a>  </td>
         
   
        </tr>";
        }
        ?>
        </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit values");
        tr = e.target.parentNode.parentNode;
        snoEdit.value = e.target.id;
        title = tr.getElementsByTagName("td")[0].innerText;
        organization = tr.getElementsByTagName("td")[1].innerText;
        credentialid = tr.getElementsByTagName("td")[2].innerText;
        console.log(title, organization, credentialid);
        titleEdit.value = title;
        organizationEdit.value = organization;
        credentialidEdit.value = credentialid;

        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/Student_progress-and-profile-manager/linkedpages/certifications/certificates.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        } else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>