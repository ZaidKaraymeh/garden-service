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

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

  <!-- Stylesheet
    ================================================== -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
  <!-- Navigation
    ==========================================-->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">BBC STORE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
        aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.html">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Book Now</a>
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
  <!-- Header -->
  <header id="header">
    <div class="intro">
      <div class="overlay">
        <div class="container">
          <div class="row" style="justify-content: center;">
            <div class="col-md-8 col-md-offset-2 intro-text">
              <h1>spend summer outside</h1>
              <p>We design and construct the outdoor space you've always wanted <br> but never wanted to build.</p>
              <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Services Section -->
  <div id="services">
    <div class="container">
      <div class="col-md-12 col-md-offset-1 section-title text-center">
        <h2>What do we do?</h2>
        <hr>
        <p>We construct walkways, remove weeds, select the right types of plants, and ensure that your lawns are watered
          regularly.

        </p>
      </div>
      <div class="row">
        <div class="col-md-3 text-center">
          <div class="service-media"> <img src="img/services/service-1.jpg" alt=" "> </div>
          <div class="service-desc">
            <h3>Excavation</h3>
            <p> The cost to remove a palm tree does depend on a few factors. Size is one of them, but also the palm
              species and it's location on your proerty.</p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="service-media"> <img src="img/services/service-2.jpg" alt=" "> </div>
          <div class="service-desc">
            <h3>Landscape Design</h3>
            <p>We provide various types of exotic flowers, fruit trees, palms and expert knowledge to help you decide
              what is best.</p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="service-media"> <img src="img/services/service-3.jpg" alt=" "> </div>
          <div class="service-desc">
            <h3>Installation of irrigation systems</h3>
            <p>A sprinkler system keep your grass, plants, and trees healthy–if properly set up and maintained, it can
              also help conserve water. Having a good system can also boost the resale value of your home or building.
            </p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="service-media"> <img src="img/services/service-4.png" alt=" "> </div>
          <div class="service-desc">
            <h3>Edging, Trimming and Shifting</h3>
            <p>With out expertise gardeners we'll provide you with all the care your garden needs wheater you're
              planting new trees, lawn mowers etc.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Gallery Section -->
  <div id="portfolio">
    <div class="container">
      <div class="section-title text-center center">
        <h2 style="margin-top: 80px;"> Gallery</h2>
        <hr>
      </div>
    </div>
    <div class="imgs-contoh"
      style="display: grid;grid-template-columns: repeat(3, 1fr);grid-gap: 5px;text-align: center;padding: 30px;margin: 20px;">
      <?php
      $numberOfCards = 19; // this is the number of images you want to show
      for ($i = 1; $i <= $numberOfCards; $i++) {
        echo "<div>";
        echo "  <img style='height: 300px;width: 350px;' src='img/gallary/$i.jpg'>";
        echo "</div>";
      }
      ?>
    </div>
  </div>
  <!-- Contact Section -->

  <div id="contact" class="text-center">
    <h2>Contact Us</h2>
    <hr>
    <p>Where can you find us?</p>

    <div class="container cards">
      <div class="">
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Address</h5>
            <p>Al Nakheel Road Karanna,Road 5833</p>
            <p> PO.18509</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Working Hours</h5>
            <p class="card-text">
            <p>Saturday-Thursday: 07:00 AM - 7:00 PM</p>
            <p>Friday: 07:00 AM - 8:00 PM</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Contact Info
            </h5>
            <p class="card-text">
            <p> <i class="fas fa-phone"></i><a href="tel:+973 3927 0909"> Phone:+973 3927 0909</a></p>
            <p><i class="far fa-envelope"></i><a href="mailto:BBC.bh@outlook.com"> Email: BBC.bh@outlook.com</a></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>


      <div class="col-md-8 col-md-offset-2">
        <h3>Leave us a message</h3>
        <form action="POST" data-netlify="true" name="sentMessage" id="contactForm" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="name" class="form-control" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message"
              required="required"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>
        <br>
        <br>
      </div>
    </div>
  </div>
  <!-- Footer Section -->
  <div id="footer">
    <div class="container text-center">
      <div class="col-md-8 col-md-offset-2">
        <p>CopyRights <i class="far fa-copyright"></i>2022 Bahrain Branch Contracting <i class="fas fa-trademark"></i>
        </p>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>