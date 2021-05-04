<?php


echo'


<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" style="border: 1px solid white;">
    <!-- Brand/logo -->
    <a class="navbar-brand" target="_blank" href="https://www.dkte.ac.in/">
      <img src="/Student_progress-and-profile-manager/partials/2.png" alt="logo" style="width:60px; height:30px; margin-left:15px;">
    </a>
    
    <!-- Links -->
    <ul class="navbar-nav">';
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true){
          echo' <li class="nav-item">
          <a class="nav-link" href="/Student_progress-and-profile-manager/home.php">Home</a>
        </li>';
        }
        if(isset($_SESSION["facultyloggedin"]) && $_SESSION["facultyloggedin"]==true){
          echo' <li class="nav-item">
          <a class="nav-link" href="/Student_progress-and-profile-manager/facultyhome.php">Home</a>
        </li>';
        }
     echo' <li class="nav-item">
          <a class="nav-link" href="mailto:kulkarniprasad7777@gmail.com.com">contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Student_progress-and-profile-manager/partials/aboutus.php">About Us</a>
      </li>';             

     

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<li class="nav-item" style="margin-left:1000px;"><a href="logout.php" class="btn btn-success">LogOut</a></li>';
      }
      if(isset($_SESSION['facultyloggedin']) && $_SESSION['facultyloggedin']==true){
        echo '<li class="nav-item"  style="margin-left:1000px;"><a href="logout.php" class="btn btn-success">LogOut</a></li>';
      }    

      echo ' 
      </ul>
      
    </nav>';

?>