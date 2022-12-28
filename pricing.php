try{
require('connection.php');
$rs=$db->query("SELECT * FROM activity");
while($row=$rs->fetch()){
$aid[]=$row['id'];
$name[]=$row['name'];
$price[]=$row['price'];
$photo[]=$row['photo'];
$qoute[]=$row['qoute'];
$location[]=$row['location'];
}
$db=null;
}
catch(PDOException $e){
echo "error occured!";
die($e->getMessage());
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <script src="https://kit.fontawesome.com/85f37610f7.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="style.css">
  <title>Beachna</title>
  <style>
    .card {
      border: none;
      padding: 10px 50px;

    }

    .card::after {
      position: absolute;
      z-index: -1;
      opacity: 0;
      -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
      transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card:hover {
      transform: scale(1.02, 1.02);
      -webkit-transform: scale(1.02, 1.02);
      backface-visibility: hidden;
      will-change: transform;
      box-shadow: 0 1rem 3rem rgba(0, 0, 0, .75) !important;

      background-color: rgba(0, 0, 0, 0.1);
      color: white;
    }

    .card:hover::after {
      opacity: 1;
    }

    .card:hover .btn-outline-primary {
      color: white;
      background: #007bff;
    }

    .Image {
      border-radius: 10%;
      width: 150px;
      height: 150px;
    }

    /* @media(max-width:990px){
            .Image{
              width:300px;
              height:300px;
            }
          }*/


    /*@media(max-width:768px){
            .Image{
              width:300px;
              height:300px;
            }
          }*/
    @media(max-width:590px) {
      .Image {
        width: 150px;
        height: 150px;
      }

      .container {
        margin-left: 30px;
        padding-right: 50px;

      }
    }

    @media(max-width:400px) {
      .card-title {
        font-size: 20px;
      }

      .Image {
        width: 100px;
        height: 100px;
      }

      .price {
        font-size: 13px;
      }

      .btn {
        margin-left: -15px;
      }
    }

    /*  @media(max-width:320px){
            .Image{
              width:50px;
              height:50px;
            }
          }*/
    .btn {
      font-weight: bold;
    }

    .h {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      text-transform: uppercase;
      /*width:500px;
             margin-right:auto;
             margin-left:auto;*/
      /*background-color:rgba(0, 0, 0, 0.3);*/
      background-color: rgba(37, 125, 169, 0.28);
      border-radius: 10px 10px 10px 10px;
      font-family: Solway;

    }

    .h:hover {
      /*text-decoration: wavy underline white;*/

      color: white;
      /*  linear-gradient(90deg, #00C9FF 0%, #92FE9D 100%);">*/
    }

    .price {
      background-color: rgba(37, 125, 169, 0.28);
      border-radius: 10px 10px 10px 10px;
      font-size: 16px;

    }

    h5 {
      font-family: Solway;
      font-weight: bold;
      font-size: 24px;
      text-decoration: underline;
    }

    .B {
      text-align: left;
    }

    .Des {
      font-size: 14px;

    }

    .P {
      font-weight: bold;
      font-size: 20px;
    }

    /*.Sel{
            background-color:rgba(37, 125, 169, 0.28);
            border:2px solid black;
            color:black;
            font-weight: bold;
            font-size:18px;
          }*/
  </style>
</head>

<body>
  <div class="container mt-5" style="background: rgba(37, 125, 169, 0.28);">
    <div class="container p-5">
      <h1 class="h">Activities</h1>
      <div class="row">
        <?php foreach ($aid as $k => $v) { ?>
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card h-100 shadow-lg">
              <div class="card-body">
                <div class="text-center">
                  <h5 class="card-title"><?php echo $name[$k]; ?></h5>
                  <img class="Image" src="Images/<?php echo $photo[$k]; ?> " />
                  <br><br>
                  <div class="B">
                    <i class="fa-sharp fa-solid fa-location-dot Icon" style='color:darkblue;'> </i> <span class="Des"
                      style='color:darkblue;'>
                      <?php echo $location[$k]; ?>
                    </span>
                    <h6 class="Des"> <?php echo $qoute[$k]; ?> </h6>
                  </div>
                  <h6 class="price"> <span class="P">
                      <?php echo $price[$k]; ?>
                    </span>/Person</h6>
                </div>
                <div class="card-body text-center">
                  <form method='POST' action='activite.php'>
                    <input type='hidden' name='aid' value='<?php echo $aid[$k]; ?>' />
                    <input type="submit" name="btn" class="btn btn-outline-info btn-lg" value="Read More" />
                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>
      </div>
    </div>
  </div>

  <?php require('footer.php'); ?>
</body>

</html>