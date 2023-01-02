<?php

//Open ob_start and session_start functions
ob_start();
include('includes/functions.php');
$totalRates = 0;
$avgRate = 0;
$sumRate = 0;
$count = 0;


try {

  $db = new PDO('mysql:host=localhost;dbname=serviceSystem;charset=utf8', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $id = $_GET['id'];
  $sql = "select * from service where id= $id ";
  $sql2 = "select * from review where service= $id ";
  


  $rs = $db->query($sql);
  $rr = $db->query($sql2);

  if ($row = $rs->fetch()) {
    $img = $row['picture'];
    $service_name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
  }

  foreach ($rr as $row) {
    $sumRate += $row['rating'];
    $count++;
  }

  $rowCount = $rr->rowCount();
  if ($rowCount > 0) {
    $totalRates = $rowCount;
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
  <meta discription content="Bahrain Branch Contracting is a boutique landscaping company located in the Kingdom of Bahrain.
Established in 2016, we provide unique garden solutions, Land services, Landscape maintenance and water management programs to property mangers and owners enabling us to serve all of your outdoor needs.">
  <title>Bahrain Branch Contracting</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

  <!-- Stylesheet
    ================================================== -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
  <?php 
    require('includes/user_header.php');
      $db = new PDO('mysql:host=localhost;dbname=serviceSystem;charset=utf8', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    if (isset($_POST['rating']) && isset($_POST['message'])) {
      $user_id = $_SESSION['user_data']['id'];
      $rating = $_POST['rating'];
      $comment = $_POST['message'];
      $service_id = $_GET['id'];

      $query = "INSERT INTO `comment` (`id`, `user`, `service`, `comment`, `created_at`, `updated_at`) VALUES (NULL, '$user_id', '$service_id', '$comment', current_timestamp(), current_timestamp());";      
      $r = $db->exec($query);

      $user_id = $_SESSION['user_data']['id'];
      $service_id = $_GET['id'];
      $booking_count_sql = "select * from booking where service= $id and user= $user_id ";
      $rating_count_sql = "select * from review where service= $id and user = $user_id";
      $response = $db->query($booking_count_sql);
      $response1 = $db->query($rating_count_sql);
      $booking_row_count = $response->rowCount();
      $rating_row_count = $response1->rowCount();

      if ($booking_row_count > $rating_row_count) {
        $query = "INSERT INTO `review` (`id`, `user`, `service`, `rating`, `created_at`, `updated_at`) VALUES (NULL, '$user_id', '$service_id', '$rating', current_timestamp(), current_timestamp());";
        $r = $db->exec($query);
      }

    }
  
  ?>
  <!-- service -->
  <div class="container-fluid" style="margin-top: 150px;">
    <div class="mx-3 mt-5 d-md-flex ">
      <div class="service-media col-5">
        <img src="img/services/<?php echo $img; ?>" alt="Srv Image" class="rounded d-block mx-5 w-75 h-75" style="border: 3px solid #333;max-height:300px; ">
      </div>
      <div class="service-desc col-7">
        <h2>
          <?php echo $service_name; ?>
        </h2>
        <!-- rating -->
        <?php

        //calc avg
        $t = true;
        if ($sumRate == 0 && $count == 0) {
          $t = false;
        } else {
          $avgRate = $sumRate / $count;
        }

        //rating
        if ($count > 0) {
          for ($i = 0; $i < round($avgRate); $i++) {
            echo ' <i class="fa fa-star checked mr-1 main-star"> </i> ';
          }
          echo "<p><span id='average_rating'>$avgRate</span> <span id='total_review'>($totalRates)</span> Review(s) </p>";
        } else {
          echo "<p>No rates yet.</p> <br/><br/>";
        }
        // description
        echo "<p>$description</p>";
        ?>
        <a href="booknow.php?id=<?php echo $id;?>" class="d-block my-5" style="width: 100%;text-decoration:none;">
          <div class="row">
            <button class="btn btn-outline-secondary">Book now</button>
          </div>
        </a>
 
        <div class="row my-5">
          
          
          <p>
            <a class="btn btn-outline-success" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Add Comment
                  </a>
                  </p>
              
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
              <?php
                  $user_id = $_SESSION['user_data']['id'];
                  $service_id = $_GET['id'];
                  $booking_count_sql = "select * from booking where service= $id and user= $user_id ";
                  $rating_count_sql = "select * from review where service= $id and user = $user_id";
                  $response = $db->query($booking_count_sql);
                  $response1 = $db->query($rating_count_sql);
                  $booking_row_count = $response->rowCount();
                  $rating_row_count = $response1->rowCount();

                  
                  if ($booking_row_count > $rating_row_count) {
                    
              ?>
              <div id="stars" class="my-3">
                <i onclick="rating(this)" id="1" class="fa fa-star checked mr-1 main-star"> </i>
                <i onclick="rating(this)" id="2" class="fa fa-star checked mr-1 main-star"> </i>
                <i onclick="rating(this)" id="3" class="fa fa-star checked mr-1 main-star"> </i>
                <i onclick="rating(this)" id="4" class="fa fa-star checked mr-1 main-star"> </i>
                <i onclick="rating(this)" id="5" class="fa fa-star checked mr-1 main-star"> </i>
              </div>
              <?php
            }
            ?>
              <form method="POST">

                <div class="mb-3">
                  <label for="message" class="form-label">Comment</label>
                  <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                  <input id="rating_value" name="rating" hidden value="1" type="text">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
   

    const data = [{
      comment: "This is a comment",
      rating: 1,
      service_id: <?php echo $_GET['id'] ?>,
      user_id: <?php echo $_SESSION['user_data']['id']; ?>
    }]

    const rating = (star) => {
      var post = {
        comment: "This is a comment",
        rating: star.id,
        service_id: <?php echo $_GET['id'] ?>,
        user_id: <?php echo $_SESSION['user_data']['id']; ?>
      }
      data.pop(0)
      data.push(
        post
      )
      var id = star.id;
      console.log(data[0])

      document.getElementById('rating_value').value = id;
      for (var i = 1; i <= id; i++) {
        document.getElementById(i).style.color = "orange";
      }
      for (var i = 5; i > id; i--) {
        document.getElementById(i).style.color = "black";
      }
      return;
    }

    const submitReview = async () => {


      var comment = document.getElementById('message').value;
      var post = data[0];
      post.comment = comment;
      console.log(typeof JSON.stringify(post), JSON.stringify(post))
      const response = await fetch('http://localhost/garden/ajax_rating.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(post)
      }).then((response) => {
        return response.json();
      }).then((data) => {
        console.log(data);
        window.location.href = "http://localhost/garden/ajax_rating.php";
      }).catch((err) => {
        console.log(err);
      })
    }
  </script>
</body>

</html>