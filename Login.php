<?php
$ERRmsg = "";
if (isset($_POST['sb'])) {
      session_start();
      try {
            require('connection.php');
            $email = $_POST['email'];
            $sql = "select * from user where email='$email'";
            $rs = $db->query($sql);
            $db = null;
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
      if ($row = $rs->fetch()) {
            if (password_verify($_POST['ps'], $row[4])) {
                  $_SESSION['activeUser'] = $email;
                  header('location:index.html');
            } else {
                  $ERRmsg = "Incorrect email or password";
            }

      } else {
            $ERRmsg = "You have entered incorrect email";
      }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Log in Page</title>
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

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
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container-fluid">
                  <a class="navbar-brand" href="index.html">BBC STORE</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarsExample05">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                              <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="contactus.html">Contact Us</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="cart.html">Cart</a>
                              </li>

                              <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                          aria-expanded="false">Services</a>
                                    <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Landscaping</a></li>
                                          <li><a class="dropdown-item" href="#">Trimming edging</a></li>
                                          <li><a class="dropdown-item" href="#">3 here</a></li>
                                          <li><a class="dropdown-item" href="#">3 here</a></li>

                                    </ul>
                              </li>

                              <!-- register and login should be in dropdown named profile -->
                              <li class="nav-item">
                                    <a class="nav-link" href="register.php">Register</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="Login.php">Log in</a>
                              </li>

                        </ul>
                        <form role="search">
                              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                  </div>
            </div>
      </nav>

      <!-- form section -->
      <div class="form-container">
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
                        <p>CopyRights <i class="far fa-copyright"></i>2020 Bahrain Branch Contracting <i
                                    class="fas fa-trademark"></i>
                        </p>
                  </div>
            </div>
      </div>
      <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>