<?php
//Open ob_start and session_start functions
ob_start();
// session_start(); already there is session in the header

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
  <?php require('includes/user_header.php'); ?>
  <!-- Header -->
  <header id="header">
    <div class="intro">
      <div class="overlay">
        <div class="container">
          <div class="row" style="justify-content: center;">
            <div class="col-md-8 col-md-offset-2 intro-text">
              <h1>spend summer outside</h1>
              <p>We design and construct the outdoor space you've always wanted <br> but never wanted to build.</p>
              <a href="booknow.php" class="btn btn-custom btn-lg">Learn More</a>
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
          <div class="service-media"><a href="serviceDetails.php?id=1"> <img src="img/services/service-1.jpg" alt=" ">
            </a></div>
          <div class="service-desc">
            <h3>Excavation</h3>
            <p> The cost to remove a palm tree does depend on a few factors. Size is one of them, but also the palm
              species and it's location on your proerty.</p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="service-media"><a href="serviceDetails.php?id=2"> <img src="img/services/service-2.jpg" alt=" ">
            </a></div>
          <div class="service-desc">
            <h3>Landscape Design</h3>
            <p>We provide various types of exotic flowers, fruit trees, palms and expert knowledge to help you decide
              what is best.</p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="service-media"><a href="serviceDetails.php?id=3"> <img src="img/services/service-3.jpg" alt=" ">
            </a>
          </div>
          <div class="service-desc">
            <h3>Installation of irrigation systems</h3>
            <p>A sprinkler system keep your grass, plants, and trees healthy–if properly set up and maintained, it can
              also help conserve water. Having a good system can also boost the resale value of your home or building.
            </p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="service-media"> <a href="serviceDetails.php?id=4"> <img src="img/services/service-4.png" alt=" ">
            </a></div>
          <div class="service-desc">
            <h3>Edging, Trimming and Shifting</h3>
            <p>With out expertise gardeners we'll provide you with all the care your garden needs wheater you're
              planting new trees, lawn mowers etc.</p>
          </div>
        </div>
        <div class="text-center">
          <a href="services.php" class="btn btn-custom">View All Services</a>
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
      style="border-radius:5px;background-color: lightgrey;display: grid;grid-template-columns: repeat(auto-fill,minmax(250px,1fr));grid-gap: 20px;text-align: center;padding: 30px;margin: 20px;">
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
      <div class="col-md-12 col-md-offset-2" style="width: 100%;">
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
              required="required" style="resize: none;"></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>
        <br>
        <br>
      </div>
      <div class="margo container">
        <div class="card" style="width: 18rem;">
          <img src="img/services/service-1.jpg" class="card-img-top" alt="No Image" style="height:382px">
          <div class="card-body" style="height:175px">
            <h5 class="card-title">Address</h5>
            <p>Al Nakheel Road Karanna,Road 5833</p>
            <p> PO.18509</p>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="img/services/service-2.jpg" class="card-img-top" alt="No image" style="height:382px">
          <div class="card-body" style="height:175px">
            <h5 class="card-title">Working Hours</h5>
            <p class="card-text">
            <p>Saturday-Thursday: 07:00 AM - 7:00 PM</p>
            <p>Friday: 07:00 AM - 8:00 PM</p>
            </p>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="img/services/service-3.jpg" class="card-img-top" alt="No Image" style="height:382px">
          <div class="card-body" style="height:175px">
            <h5 class="card-title">Contact Info</h5>
            <p class="card-text">
            <p> <i class="fas fa-phone"></i><a href="tel:+973 3927 0909"> Phone:+973 3927 0909</a></p>
            <p><i class="far fa-envelope"></i><a href="mailto:BBC.bh@outlook.com"> Email: BBC.bh@outlook.com</a></p>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center align-items-center my-5">
      <div class="Google-Maps" id="Google-Maps">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14315.993616002352!2d50.5112608!3d26.2292414!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa248b77cfc914933!2z2YXYtNiq2YQg2LrYtdmGINin2YTYqNit2LHZitmG!5e0!3m2!1sen!2sbh!4v1580040953374!5m2!1sen!2sbh"
          width="500" height="300" frameborder="0" style="border:1px solid green;" allowfullscreen="true"></iframe>
      </div>
    </div>
  </div>
  <!-- Footer Section -->
  <div id="footer">
    <div class="container text-center">
      <div class="col-md-12 col-md-offset-2">
        <p>CopyRights <i class="far fa-copyright"></i>2022 Bahrain Branch Contracting <i class="fas fa-trademark"></i>
        </p>
      </div>
    </div>
  </div>
  <!-- jqury cdn -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="contact_me.js"></script>
</body>

</html>