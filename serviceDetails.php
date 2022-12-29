<?php

//Open ob_start and session_start functions
ob_start();
session_start();

include('includes/functions.php');
$totalRates=0;
$avgRate=0;
$sumRate=0;
$count=0;


      try {
            $db = new PDO('mysql:host=localhost;dbname=serviceSystem;charset=utf8', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $id= $_GET['id'];
            $sql = "select * from service where id= $id ";
            $sql2= "select * from review where service_id= $id ";
            $rs = $db->query($sql);
            $rr = $db->query($sql2);

            if ($row = $rs->fetch()) {
                  $img= $row['picture'];
                  $service_name= $row['name'];
                  $description= $row['description'];
                  $price= $row['price'];
                  
            }

            foreach($rr as $row){
                  $sumRate+= $row['rating'];
                  $count++;
            }

            $rowCount= $rr->rowCount();
            if ($rowCount > 0) {
                  $totalRates= $rowCount;
            }

            $db = null;
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }

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
  <!-- service -->
  <div class="container-fluid" style="margin-top: 150px;">
    <div class="mx-3 mt-5 d-md-flex ">
      <div class="service-media col-5"> <img src="<?php echo $img; ?>" alt=" "
          class="rounded  d-block mx-5 w-75 h-75 "></div>
      <div class="service-desc col-7">
        <h2><?php echo $service_name; ?></h2>
        <!-- rating -->
        <?php 

      //calc avg
      $t=true;
      if($sumRate==0 && $count==0){
            $t=false;
      } else {
            $avgRate= $sumRate/$count;
      }

      //rating
      if ($count > 0) {
            for($i=0; $i < round($avgRate) ; $i++) { 
                  echo  ' <i class="fa fa-star checked mr-1 main-star"> </i> ';
            }
            echo "<p><span id='average_rating'>$avgRate</span> <span id='total_review'>($totalRates)</span> Review(s) </p>"; 
      } else {
            echo "No rates yet. <br/><br/>";
      }
      // description
      echo "Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, vero iure! Sunt, odio error culpa, tempora, eligendi eius voluptas facere vero doloremque recusandae necessitatibus at sit blanditiis! Expedita, dolorum facere.
      <br/>$description <br/>";
      ?>

      <a href="cart.php"><button class="btn btn-custom">Book now</button></a>
      </div>
    </div>
  </div>
  <!-- Footer Section -->
  <!-- Footer Section -->
  <div id="footer">
    <div class="container text-center">
      <div class="col-md-12 col-md-offset-2">
        <p>CopyRights <i class="far fa-copyright"></i>2022 Bahrain Branch Contracting <i class="fas fa-trademark"></i>
        </p>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>