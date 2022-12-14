<?php
include('../includes/header.php');


//Include functions
include('includes/functions.php');



?>
<link rel="stylesheet" href="style.css">

<?php
/************** Register new Admin ******************/


//require database class files
require('includes/config.php');


//instatiating our database objects
$db = new config;


//Collect and clean values from the form // Collect image and move image to upload_image folder

if (isset($_POST['submit_login'])) {

  $raw_name = cleandata($_POST['name']);
  $raw_email = cleandata($_POST['username']);
  $raw_password = cleandata($_POST['password']);


  $c_name = sanitize($raw_name);
  $c_email = valemail($raw_email);
  $c_password = sanitize($raw_password);

  $hashed_Pass = hashpassword($c_password);



  //Collect Image
  $c_img = $_FILES['image']['name'];
  $c_img_tmp = $_FILES['image']['tmp_name'];

  //move image to permanent location
  move_uploaded_file($c_img_tmp, "uploaded_image/$c_img");


  $db->query("SELECT * FROM admin WHERE email = :email");

  $db->bindvalue(':email', $c_email, PDO::PARAM_STR);

  $row = $db->fetchSingle();


  if ($row) {

    echo '<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> User already Exist. Register or Try Again
            </div>';

  } else {

    $db->query("INSERT INTO admin(id, fullname, email, password, image) VALUES(NULL, :fullname, :email, :password, :image) ");

    $db->bindvalue(':fullname', $c_name, PDO::PARAM_STR);
    $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
    $db->bindvalue(':password', $hashed_Pass, PDO::PARAM_STR);
    $db->bindvalue(':image', $c_img, PDO::PARAM_STR);

    $run = $db->execute();

    if ($run) {

      echo '<div class="alert alert-success text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Admin registered successfully.  Please Login
                  </div>';

    } else {

      echo '<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> Admin user could not be registered. Please try again later
            </div>';
    }


  }



}



?>


<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <p class=""><a class="pull-right" href="admin.php"> Login</a></p><br>
  </div>
  <div class="col-md-4 col-md-offset-4">
    <form class="form-horizontal" role="form" method="post" action="register_admin.php" enctype="multipart/form-data">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name"></label>
        <div class="col-sm-10">
          <input type="name" name="name" class="form-control" id="name" placeholder="Enter Full Name" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email"></label>
        <div class="col-sm-10">
          <input type="email" name="username" class="form-control" id="email" placeholder="Enter Email" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd"></label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="image"></label>
        <div class="col-sm-10">
          <input type="file" name="image" id="image" placeholder="Choose a profile Image" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label><input type="checkbox" required> Accept Agreement</label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 text-center">
          <button type="submit" class="btn btn-primary pull-right" name="submit_login">Register</button>
          <button type="submit" name="sb" class="form-btn">Register</button>
          <p>Already have account? <a href="admin.php">Log in</a></p>
    </form>
  </div>
</div>
</div>
</form>

</div>
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
</body>

</html>