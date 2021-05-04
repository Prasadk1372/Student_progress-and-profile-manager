<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <style>
    body {
        background-image: url("img/1.jpg");
        background-color: #ccc;
        opacity: 1;
        height: 600px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 5.0;
        border-right: 1px solid white;
    }
    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
        margin-top: 61px;
    }

    .sidenav a {
        padding: 6px 16px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .main {
        margin-left: 190px;
        /* Same as the width of the sidenav */
        font-size: 28px;
        /* Increased text to enable scrolling */
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
            
        }

        .sidenav a {
            font-size: 18px;
           
        }
    }
    </style>
</head>

<body>
    <div>
        <?php require 'partials/_nav.php' ?>
    </div>
    <div class="sidenav">
        <div class="text-center" style="padding-top: 60px;">
            <h3 class="nav-link text-success" style="padding:1px 1px 1px 15px; margin-right:20px;">Menu</h3>
            <a href="linkedpages/info/info.php" class="nav-link text-white"><h5>Personal Info</h5></a>
            <a href="linkedpages/education/education.php" class="nav-link text-white"><h5>Education</h5></a>
            <a href="linkedpages/certifications/certificates.php" class="nav-link text-white"><h5>Certifications</h5></a>
            <a href="linkedpages/certifications/internship.php" class="nav-link text-white"><h5>Experiences & Internships</h5></a>
             <!-- <a href="linkedpages/academics.php" class="nav-link text-white"><h5>Academic Performance</h5></a> -->
        </div>
    </div>

    <div class="main">
        <section>
            <div style="border: 1px solid white;" id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/2.jpg" class="d-block w-100"alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/3.jpg" class="d-block w-100"alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/4.jpg" class="d-block w-100"alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>

    <?php include 'partials/_footer.php';?>
</body>

</html>