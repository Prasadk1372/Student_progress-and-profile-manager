<?php
//connecting to database
$servername="localhost";
$username="root";
$password="";
$database="student";

//creatin a connection
$conn=mysqli_connect($servername,$username,$password,$database);

//Die if connection wasn't successful

if(!$conn)
{
    die("Sorry,We failed to connect!".mysqli_connect_error());
}
// else{
//     echo "success!";
// }


?>