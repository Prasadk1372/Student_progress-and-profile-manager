<?php  
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
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
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $organization= $_POST["organizationEdit"];
    $credentialid= $_POST["credentialidEdit"];


  // Sql query to be executed
  $sql="UPDATE `notes` SET `title` = '$title', `organization` = '$organization', `credentialid` = '$credentialid' WHERE `notes`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $title = $_POST["title"];
    $organization= $_POST["organization"];
    $credentialid= $_POST["credentialid"];

  // Sql query to be executed
  $sql = "INSERT INTO `notes` (`title`, `organization`, `credentialid`) VALUES ('$title ', '$organization', '$credentialid');";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  <title>faculty search</title>

</head>
<style>
  body{
    background-image: url("/project/img/1.jpg");
    background-color: #cccccc; 
    opacity:1;
    height: 600px; 
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
    opacity: 10.0;
    border-right: 1px solid white;
  }

  #myTable tr:nth-child(even){background-color: #f2f2f2;}

  #myTable tr:hover {background-color: #ddd;}

  #myTable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:  #404040;
    color: white;
  }
</style>

<body>
 

<?php require '../../partials/_nav.php' ?>
  
  

  
  <div class="container my-4">


    <table class="table" id="myTable" style="background-color: #cccccc;">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Student Name</th>
          <th scope="col">Year</th>
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
          while($row = mysqli_fetch_assoc($result)){
            $row2 = mysqli_fetch_assoc($result2);
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['firstname'] . "</td>
            <td>". $row2['hsc'] . "</td>
            <td>". $row2['sem8'] . "</td>
              <td> <button class='edit btn btn-sm btn-primary' ><a href='generatepdf.html'>Edit</a></button> </td>
     
          </tr>";
         } 
          ?>
      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode.parentNode;
        snoEdit.value = e.target.id;
        title = tr.getElementsByTagName("td")[0].innerText;
        organization = tr.getElementsByTagName("td")[1].innerText;
        credentialid = tr.getElementsByTagName("td")[2].innerText;
        console.log(title, organization,credentialid);
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
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `/project/linkedpages/certifications/certificates.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>

<?php include '../../partials/_footer.php';?>
</body>

</html>
