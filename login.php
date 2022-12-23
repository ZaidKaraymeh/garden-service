<?php
$ERRmsg = "";
if (isset($_POST['sb'])) {
    session_start();
    //Include functions
    include('includes/functions.php');
    try {
        include('connection.php');
        $email = $_POST['email'];
        $sql = "select * from user where email='$email'";
        $rs = $db->query($sql);
        $db = null;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    if ($row = $rs->fetch()) {
        if (password_verify($_POST['ps'], $row[4])) {
            //$_SESSION['user'] = json_encode($row);
            $_SESSION['user'] = array(
                    'id' => $row['id'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'user_type' => $row['user_type'],
                    'email' => $row['email'],

                 );
            keepmsg('<div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Welcome </strong>' . $d_name . ' You are logged in as Admin 
                                      </div>');
            header('Location:index.php');
            //if ($row[6] == 'Adm') {


            //     $d_image = $row['image'];

            //     $d_name = $row['fullName'];

            //     $s_image = "<img src='uploaded_image/$d_image' class='profile_image' />";

            //     $_SESSION['user'] = array(


            //         'fullName' => $row['first_name'],
            //         'id' => $row['id'],
            //         'email' => $row['email'],
            //         'image' => $s_image

            //     );

            //     $_SESSION['user_is_logged_in'] = true;

            //     header('Location: my_admin.php');


            // } else {
            //     $_SESSION['user'] = json_encode($row);
            //     keepmsg('<div class="alert alert-success text-center">
            //                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            //                                 <strong>Welcome </strong>' . $d_name . ' You are logged in as Admin 
            //                           </div>');
            //     redirect('index.php');
            // }
        } else {
            $ERRmsg = '<div class="alert alert-danger text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sorry!</strong> INCORRECT PASSWORD
                </div>';
        }
    } else {
        $ERRmsg = '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> INCORRECT EMAIL
          </div>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta discription content="Bahrain Branch Contracting is a boutique landscaping company located in the Kingdom of Bahrain.
Established in 2016, we provide unique garden solutions, Land services, Landscape maintenance and water management programs to property mangers and owners enabling us to serve all of your outdoor needs.">
    <title>Bahrain Branch Contracting</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
    <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
    <!-- Navigation
      ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top on">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <p><a class="navbar-brand page-scroll" href="index.php">BBC Store</a>&nbsp;</p>
            </div>

            <!-- nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about" class="page-scroll">About US</a></li>
                    <li><a href="#services" class="page-scroll">Services</a></li>
                    <li><a href="#portfolio" class="page-scroll">Gallery</a></li>
                    <li><a href="#FAQ" class="page-scroll">FAQ</a></li>
                    <li><a href="#contact" class="page-scroll">Contact US</a></li>
                    <li><a href="register.php" class="page-scroll">Register</a></li>
                    <li><a href="login.php" class="page-scroll">Log in</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- form section -->
    <div class="form-container">
        <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
            }
        ?>
        <form action=" " method="post">
            <h2>Log in</h2>
            <span style="color:red">
                <?php echo $ERRmsg; ?>
            </span> <br />
            <input type="email" name="email" placeholder="Email"><br />
            <input type="password" name="ps" placeholder="Password"><br />
            <button type="submit" name="sb" class="form-btn">Log in</button>
            <p>Don't have account? <a href="register.php">Register</a></p>

        </form>
    </div>


    <!-- Footer Section -->
    <div id="footer">
        <div class="container text-center">
            <div class="col-md-8 col-md-offset-2">
                <p>CopyRights <i class="far fa-copyright"></i>2020 Bahrain Branch Contracting <i class="fas fa-trademark"></i>
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/GoogleMap.js"></script>
</body>

</html>