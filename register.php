<?php
$fnameERR = $lnameERR = $emailERR = $passERR = $cpsERR = $pnERR = $ERRmsg = "";
$fname = $lname = $email = $pass = $pn = "";
$vfname = $vlname = $vemail = $vpass = $vpn = "";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['sb'])) {
    //inputs validation 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //first name validation
        if (empty($_POST['fname'])) {
            $fnameERR = "This field is required";
        } else {
            $vfname = test_input($_POST['fname']);
        }
        if (!preg_match("/([A-Z]*[-,a-z. ']+[ ]*)+/", $vfname)) {
            $fnameERR = "Invalid name format, please enter a valid name";
        } else {
            $fname = $_POST['fname'];
        }

        //last name validation
        if (empty($_POST['lname'])) {
            $lnameERR = "This field is required";
        } else {
            $vlname = test_input($_POST['lname']);
        }
        if (!preg_match("/([A-Z]*[-,a-z. ']+[ ]*)+/", $vlname)) {
            $lnameERR = "Invalid name format, please enter a valid name";
        } else {
            $lname = $_POST['lname'];
        }
    }

    //email validation
    if (empty($_POST['email'])) {
        $emailERR = "This field is required";
    } else {
        $vemail = test_input($_POST['email']);
        if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $vemail)) {
            $emailERR = "Invalid email format, please enter a valid email";
        } else {
            $email = $_POST['email'];
        }
    }

    //password validation
    if (empty($_POST['ps'])) {
        $passERR = "This field is required";
    } else {
        $vpass = test_input($_POST['ps']);
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $vpass)) {
            $passERR = "Invalid password format, The password must contain minimum eight characters, at least one letter and one number";
        }
        if ($_POST['ps'] !== $_POST['cps']) {
            $cpsERR = "Passwords must match";
        } else {
            $pass = password_hash($_POST['ps'], PASSWORD_DEFAULT);
            // $pass= $_POST['ps'];
        }
    }

    //phone number validation
    if (empty($_POST['pn'])) {
        $pnERR = "This field is required";
    } else {
        $vpn = test_input($_POST['pn']);
        if (!preg_match("/(((\+?973))?(377|322|383|384|388|340|341|343|345|344|663|666|669)(\d){5})|(((\+?973))?(36|39|33)(\d){6})/", $vpn)) {
            $pnERR = "Invalid phone number format, please enter a valid number";
        } else {
            $pn = $_POST['pn'];
        }
    }

    if (trim($fname) == "" || trim($lname) == "" || trim($pass) == "" || trim($email) == "" || trim($pn) == "") {
        $ERRmsg = "Incorrect input(s)!";
    } else if ($_POST['ps'] !== $_POST['cps']) {
        $cpsERR = "Passwords must match";
    } else {
        try {
            include("connection.php");
            $query = "select * from user where email='$email'";
            $rs = $db->query($query);
            $result = $rs->rowCount();
            if (($result) > 0) {
                $ERRmsg = "Email already exists!";
            } else {
                $sql = "insert into user value( UUID(),'$fname','$lname','$email','$pass',$pn,'CTM',current_timestamp(), current_timestamp())";
                $success = $db->exec($sql);
                if ($success) {

                    redirect('index.php');

                    keepmsg('<div class="alert alert-success text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Success!</strong> Customer registered successfully.
                                </div>');
                } else {

                    keepmsg('<div class="alert alert-danger text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Sorry!</strong> Customer could not be registered.
                                </div>');
                }
                header('location:Login.php');
            }
            $db = null;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
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
        <form action=" " method="post">
            <h2>Register</h2>
            <span style="color:red">
                <?php echo $ERRmsg; ?>
            </span> <br />
            <input type="text" name="fname" placeholder="First name"><br />
            <span style="color:red">
                <?php echo $fnameERR; ?>
            </span> <br />
            <input type="text" name="lname" placeholder="Last name"><br />
            <span style="color:red">
                <?php echo $lnameERR; ?>
            </span> <br />
            <input type="email" name="email" placeholder="Email"><br />
            <span style="color:red">
                <?php echo $emailERR; ?>
            </span> <br />
            <input type="password" name="ps" placeholder="Password"><br />
            <span style="color:red">
                <?php echo $passERR; ?>
            </span> <br />
            <input type="password" name="cps" placeholder="Confirm Password"><br />
            <span style="color:red">
                <?php echo $cpsERR; ?>
            </span> <br />
            <input type="text" name="pn" placeholder="Phone Number"><br />
            <span style="color:red">
                <?php echo $pnERR; ?>
            </span> <br />
            <button type="submit" name="sb" class="form-btn">Register</button>
            <p>Already have account? <a href="Login.php">Log in</a></p>
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