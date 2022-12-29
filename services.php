<?php
//Open ob_start and session_start functions
ob_start();
session_start();

try{
      $db = new PDO('mysql:host=localhost;dbname=serviceSystem;charset=utf8', 'root', '');
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "select * from service";
      $rs = $db->query($sql);
    
    $db=null;
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

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
    <?php require('includes/user_header.php');?>
    
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            foreach($rs as $row){
      
            echo "<div class='col'> <div class='card h-100'>";
            echo " <img class='card-img-top' src='$row[3]' style='height: 350px; ' >";
            echo " <div class='card-body'> ";
            echo " <h5 class='card-title'>$row[1]</h5> ";
            echo " <p class='card-text'>$row[4]</p> ";
            echo " <p class='card-text'>Price: $row[2] BD</p> ";
            echo " <p class='card-text'><a href='serviceDetails.php?id=$row[0]'><button type='submit' class='btn btn-primary'>Read more</button></a> </p>";
            echo " <p class='card-text'> <button type='submit' name='$row[1]' class='btn btn-primary'>Book now</button> </p> ";

            echo "  </div> </div> </div> ";
            }
            ?> 
      </div>


</body>

</html>
<!--Container Main end-->

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
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>

<?php ?>