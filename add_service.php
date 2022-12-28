<?php
//admin session
session_start();
//admin session
if (!isset($_SESSION["admin"])) {
   //go to log in page.
   header("location: login.php");
}

require("includes/config.php");

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$error = false;

if (isset($_POST['save'])) {

   $name = test_input($_POST['activitename']);
   $price = test_input($_POST['activiteprice']);
   $location = $_POST['place'];
   $quote = test_input($_POST['quote']);
   $limit = test_input($_POST['limit']);
   $type = $_POST['type'];
   //$desc = $_POST['desc'];

   $p1 = '/^[a-z-A-Z]+$/i';
   $p2 = '/^[0-9]+$/';
   // if(!preg_match($p1,$name)){
   //    echo "<center style='color:red;'>please enter letters only</center>";
   //    $error = true;
   // }else if (!preg_match($p2,$price)){
   //    echo "<center style='color:red;'>Invalid price</center>";
   //    $error = true;
   // }

   if (!$name || !$price || !$type || !$limit || !$location || !$quote || !$_FILES['file']) {
      $error = true;
      echo "please enter all required fields";
   }

   if (!$error) {

      $target_path = "images/";
      $target_path = $target_path . basename($_FILES['file']['name']);
      if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
         $activity_photo = basename($_FILES['file']['name']);
      }


      $res = $db->query("INSERT 
      INTO activity 
      VALUES (null,'$name','$activity_photo','$price','$quote','$type','$limit','$location')");

      if ($res->rowCount() > 0) {
         echo "<center style='color:green'>Activity added successfully</center>";
      }
   }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>activites</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <style>
      body {
         height: 1100px;
      }

      .l {

         width: 100%;
         height: 1100px;
         background-color: #f5e4ce75;
         border: 3px solid white;
      }

      .r {

         border: 3px solid white;
         border-left: none;
         padding-bottom: 200px;
         width: 60%;
         height: 900px;
         background-color: #f5e4ce75;
      }

      .title {
         text-align: center;
         font-family: arial;
         font-style: bold;
         font-size: 40px;
         letter-spacing: 5px;
         text-shadow: 5px 5px 15px grey;
      }

      h4 {
         font-family: arial;
         font-style: bold;
         letter-spacing: 5px;
         text-shadow: 5px 5px 15px grey;
         padding-top: 20px;
      }


      .form-control: focus {
         color: #000;
      }
   </style>

</head>

<body>
   <div class='container '>
      <div class="row ">

         <div class="col-12 col-md-12 l">
            <div class="title ">ADD NEW ACTIVITE</div>
            <form method='POST' enctype='multipart/form-data'>
               <h4>Activite name:</h4>
               <input type=text class="form-control" name='activitename' placeholder="enter activite name.." />

               <h4>Activite price per hour:</h4>
               <div class="input-group mb-3">
                  <div class="input-group-prepend">
                     <span class="input-group-text">BD</span>
                  </div>
                  <input type="text" class="form-control" name="activiteprice"
                     aria-label="Amount (to the nearest dollar)">
                  <div class="input-group-append">
                     <span class="input-group-text">.000</span>
                  </div>
               </div>
               <h4>Activity Quote:</h4>
               <input class="form-control" name="quote" type="text" id=""><br>



               <h4>Activity Limit:</h4>
               <input class="form-control" name="limit" type="number" id=""><br>



               <h4>Activite picture:</h4>
               <input class="form-control" type="file" name="file" id="formFile"><br>
               <!-- <input type='submit' class="btn btn-info" name='upload' value='upload'/> -->



               <h4>Activity Type</h4>
               <select id="" name="type" class="form-select" aria-label="Default select example">
                  <option value="water">Water</option>
                  <option value="land">Land</option>
               </select><br>

               <h4>Activity Place</h4>
               <select id="place" name="place" class="form-select" aria-label="Default select example">
                  <option value="Bahrain Amwaj Beach">Bahrain Amwaj Beach</option>
                  <option value="Bahrain Ritz Carlton Beach">Bahrain Ritz Carlton Beach</option>
                  <option value="Bahrain Coral Bay Beach">Bahrain Coral Bay Beach</option>
                  <option value="Novotel Bahrain Al Dana Resort Beach">Novotel Bahrain Al Dana Resort Beach</option>
                  <option value="Bahrain Hawar Islands Beach">Bahrain Hawar Islands Beach</option>
                  <option value="Bahrain Jarada Island Beach">Bahrain Jarada Island Beach</option>
                  <option value="Sofitel Bahrain Zallaq Thalassa Beach Sea & Spa">Sofitel Bahrain Zallaq Thalassa Beach
                     Sea & Spa</option>
               </select><br>
               <!--
          <h4>Activite Description: </h4>
          <input type=text class="form-control" name='activitename' placeholder="Enter activity description..."/>
-->
               <br>
               <input type="submit" class="btn btn-info btn-lg btn-block" name='save' value='save' />

            </form>

         </div><!--col1-->


      </div><!--row1-->

   </div><!--container-->
</body>

</html>

<?php require('footer.php'); ?>