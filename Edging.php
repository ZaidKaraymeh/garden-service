<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta discription
    content="Bahrain Branch Contracting is a boutique landscaping company located in the Kingdom of Bahrain.
Established in 2016, we provide unique garden solutions, Land services, Landscape maintenance and water management programs to property mangers and owners enabling us to serve all of your outdoor needs.">
  <title>Bahrain Branch Contracting</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

  <!-- Stylesheet
    ================================================== -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
  <!-- Navigation
    ==========================================-->
  <div class="pos-f-t">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">BBC Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <!-- register and login should be in dropdown named profile -->
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <?php
            if (isset($_SESSION['activeUser'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php
            } else {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="Login.php">Log in</a>
            </li>
            <?php } ?>
            <?php
            if (isset($_SESSION['activeUser'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <?php
              echo $_SESSION['activeUser'];
                ?>
              </a>
            </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- service -->
      <div class="container-fluid" style="margin-top: 150px; margin-bottom: 150px;">
            <div class="mx-3 mt-5 d-md-flex ">
                  <div class="service-media col-5"> <img src="img/services/service-4.png" alt=" " class="rounded  d-block mx-5 w-75 h-100"></div>
                  <div class="service-desc col-7">
                        <h2>Edging, Trimming and Shifting</h2>
                        <!-- rating -->
                        <i class="fas fa-star star-light mr-1 main-star"> </i>
                        <i class="fas fa-star star-light mr-1 main-star"> </i>
                        <i class="fas fa-star star-light mr-1 main-star"> </i>
                        <i class="fas fa-star star-light mr-1 main-star"> </i>
                        <i class="fas fa-star star-light mr-1 main-star"> </i>
                        <p><span id=average_rating>0.0</span> <span id="total_review">(0)</span> Review </p>

                        <p>Service discription...<br/>
                              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolore nostrum reprehenderit tenetur animi nemo? Quis exercitationem minus veritatis tempore numquam quam sit libero, error suscipit iste deserunt cumque accusamus.
                        </p>
                        <p>With out expertise gardeners we'll provide you with all the care your garden needs wheater you're
                              planting new trees, lawn mowers etc.
                        </p>

                        <!-- view comments -->
                        <button class="btn btn-custom" name="book">Book now</button>
                  </div>
            </div>
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

</body>
