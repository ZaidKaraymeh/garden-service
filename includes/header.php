<?php
//Open ob_start and session_start functions
ob_start();
session_start();
if (isset($_SESSION['user_is_logged_in']) || isset($_SESSION['activeUser'])) {


} else {

    header("Location: logout.php");
}

?>


<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BBC Store Admin Panel</title>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <!-- <script src="js/jquery.js"></script> -->
    <!-- <script src="js/scripts.js"></script> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>


    <!-- Custom CSS -->
    <!-- <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <!-- <link href="css/plugins/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <style>
        body{
            background-image: url(img/gallary/1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        body::before{
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color:rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(5px);
        }
        #llolololo li a{
            color: gray;
            transition: 0.3s;
        }
        #llolololo li:hover a{
            color: white;
        }
        #o22 a{
            color: lightblue;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }
        #o22:hover a{
            color: lightgreen;
        }
        #o33 a{
            color: lightblue;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }
        #o33:hover a{
            color: lightgreen;
        }
        th{
            background-color: rgba(0, 0, 0, 0.15)!important;
        }
        td{
            transition: 0.5s;
        }
    </style>
</head>
<body>
    <?php 
        if (isset($_SESSION['activeUser']) || isset($_SESSION['user_is_logged_in'])) {
            $fullname = $_SESSION['user_data']['fullName'];
            $image = $_SESSION['user_data']['image'];
        }
    ?>
    <div class="collapse" id="navbarToggleExternalContent" style="position: relative;">
        <div class="bg-dark p-4">
        <h5 class="text-white h4"> Menu</h5>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="llolololo">
                <li class="nav-item"><a href="my_account.php" class="nav-link" aria-current="page"><i class="fa fa-cog"></i> Account</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link" aria-current="page"><i class="fa fa-sign-out"></i> Sign-out</a></li>
            </ul>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="customers.php" style="display: block;text-align: center;">BBC Admin Control Panel</a>
                <div style="display: flex;gap: 10px;justify-content: space-between;align-items: center;">
                    <h5 class="text-white h6" style="margin: 0; padding:5px">
                        <a class="navbar-brand mx-2" href="#">
                            <img src="img/gallary/1.jpg" alt="Image" width="50" height="40" style="border-radius: 30%;border:1px solid white;">
                        </a>
                        Welcome, <?php echo $fullname ?>
                    </h5>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" style="position: relative;">
        <div class="container-fluid pt-5">