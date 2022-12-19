<?php
//Open ob_start and session_start functions
ob_start();
session_start();

?>

<?php

if (isset($_SESSION['user_is_logged_in'])) {


} else {

    header("Location: logout.php");
}

?>



<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BBC Admin Control Panel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>

<body style="padding-top: 30px;">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">

        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-light" href="customers.php" style="color: #f3f3f3">BBC
                    <strong>Admin Control Panel</strong></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href=""></a></li>
                </ul>

                <?php if (isset($_SESSION['user_is_logged_in'])) {

                    $fullname = $_SESSION['user_data']['fullName'];
                    $image = $_SESSION['user_data']['image'];

                }



                ?>


                <ul class="nav navbar-nav navbar-right">
                    <li class="navbar-text">Welcome,
                        <?php echo $fullname ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"></b>
                            <?php echo $image; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="my_admin.php"><i class="fa fa-cog"></i> Account</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                        </ul>
                    </li>

                </ul>



            </div>

        </div>

    </nav>

    <div class="container-fluid">