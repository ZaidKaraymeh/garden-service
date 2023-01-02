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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>

    <?php require('includes/user_header.php'); ?>
    <!-- About Section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="about-text">
                        <h2>Welcome to Bahrain Branch Contracting</h2>
                        <hr>
                        <p>Bahrain Branch Contracting is a boutique landscaping company located in the Kingdom of
                            Bahrain.
                            Established in 2016, we provide unique garden solutions, Land services, Landscape
                            maintenance and water
                            management programs to property mangers and owners enabling us to serve all of your outdoor
                            needs.</p>
                        <p>BBC promises greater value by providing our services at competitive rates and guranteeing
                            your
                            statisfaction with our leadership, services and accountability.<br>
                            We invite you to experience for yourself a partnership that so many of our customrs have
                            came to trust.
                        </p>
                        <a href="#services" class="btn btn-custom btn-lg">View All Services</a>

                        <i class="fab fa-instagram fa-5x"></i> <a href="https://www.instagram.com/bbn.bh/?hl=en"
                            class="btn btn-custom2 btn-lg">Instagram Page</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="about-media"> <img src="img/About1.png" alt=" "> </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
            </div>
        </div>
    </div>
    <!-- Services Section -->
    <div id="services">
        <div class="container">
            <div class="col-md-12 col-md-offset-1 section-title text-center">
                <h2>What do we do?</h2>
                <hr>
                <p>We construct walkways, remove weeds, select the right types of plants, and ensure that your lawns are
                    watered
                    regularly.

                </p>
            </div>
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="service-media"><a href="serviceDetails.php?id=1"> <img src="img/services/service-1.jpg"
                                alt=" "> </a></div>
                    <div class="service-desc">
                        <h3>Excavation</h3>
                        <p> The cost to remove a palm tree does depend on a few factors. Size is one of them, but also
                            the palm
                            species and it's location on your proerty.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="service-media"><a href="serviceDetails.php?id=2"> <img src="img/services/service-2.jpg"
                                alt=" "> </a></div>
                    <div class="service-desc">
                        <h3>Landscape Design</h3>
                        <p>We provide various types of exotic flowers, fruit trees, palms and expert knowledge to help
                            you decide
                            what is best.</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="service-media"><a href="serviceDetails.php?id=3"> <img src="img/services/service-3.jpg"
                                alt=" "> </a>
                    </div>
                    <div class="service-desc">
                        <h3>Installation of irrigation systems</h3>
                        <p>A sprinkler system keep your grass, plants, and trees healthy–if properly set up and
                            maintained, it can
                            also help conserve water. Having a good system can also boost the resale value of your home
                            or building.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="service-media"> <a href="serviceDetails.php?id=4"> <img src="img/services/service-4.png"
                                alt=" "> </a></div>
                    <div class="service-desc">
                        <h3>Edging, Trimming and Shifting</h3>
                        <p>With out expertise gardeners we'll provide you with all the care your garden needs wheater
                            you're
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
    <!-- Footer Section -->
    <div id="footer">
        <div class="container text-center">
            <div class="col-md-12 col-md-offset-2">
                <p>CopyRights <i class="far fa-copyright"></i>2022 Bahrain Branch Contracting <i
                        class="fas fa-trademark"></i>
                </p>
            </div>
        </div>
    </div>
    <!-- jqury cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="contact_me.js"></script>
</body>

</html>