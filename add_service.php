<?php
//admin session
session_start();
//admin session
if (!isset($_SESSION['user_is_logged_in'])) {
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
   $desc = $_POST['desc'];
   $rating = test_input($_POST['rating']);
   //$desc = $_POST['desc'];

   $p1 = '/^[a-z-A-Z]+$/i';
   $p2 = '/^[0-9]+$/';

   if (!$name || !$price || !$photo || !$desc || !$_FILES['file']) {
      $error = true;
      echo "please enter all required fields";
   }

   if (!$error) {

      $target_path = "images/";
      $target_path = $target_path . basename($_FILES['file']['name']);
      if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
         $photo = basename($_FILES['file']['name']);
      }


      $res = $db->query("INSERT 
      INTO service 
      VALUES (null,'$name','$price','$photo','$desc','$rating')");

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
   <title>services</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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