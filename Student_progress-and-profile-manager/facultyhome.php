<?php
session_start();

if(!isset($_SESSION['facultyloggedin']) || $_SESSION['facultyloggedin']!=true){
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
    

    

    <?php include 'partials/_footer.php';?>
</body>

</html>