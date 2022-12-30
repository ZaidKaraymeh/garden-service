<?php include('includes/header.php'); ?>


<?php

//Include functions
include('includes/functions.php');


?>
<div class="container"
  style="background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;">
  <link rel="stylesheet" href="css/style.css">

  <div class="row">
    <div class="col-md-12 col-md-offset-4">
    </div>
    <div class="col-md-12 col-md-offset-4">
      <form class="form-horizontal" role="form" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>"
        enctype="multipart/form-data">

        <?php

        /************** Fetching data from database using id ******************/
        if (isset($_GET['cus_id'])) {

          $user_id = $_GET['cus_id'];
        }

        //require database class files
        require('includes/config.php');

        //instatiating our database objects
        $db = new config;

        $db->query("SELECT * FROM user WHERE id =:id");

        $db->bindValue(':id', $user_id, PDO::PARAM_INT);

        $row = $db->fetchSingle();
        ?>

        <?php if ($row): ?>

          <div class="form-group">
            <label class="control-label col-sm-4" for="name"></label>
            <div class="col-sm-12" style="margin: 5px 0 20px;">
              <input type="name" name="name" class="form-control" id="name" value="<?php echo $row['fullName'] ?>"
                required style="background-color: #eee;">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-4" for="email"></label>
            <div class="col-sm-12" style="margin: 5px 0 20px;">
              <input type="email" name="username" class="form-control" id="email" value="<?php echo $row['email'] ?>"
                required style="background-color: #eee;">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="pwd"></label>
            <div class="col-sm-12" style="margin: 5px 0 20px;">
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Confirm Password" value=""
                required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="image"></label>
            <div class="col-sm-12">
              <input type="file" name="image" id="image" placeholder="Choose Image">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12 text-center">
              <button type="submit" class="btn btn-primary pull-right" name="submit_update">Update</button>
              <a class="pull-left btn btn-danger" href="my_account.php">Cancel</a>
            </div>
          </div>

          <?php endif; ?>
      </form>

      <?php
      //Collect and clean values from the form // Collect image and move image to upload_image folder
      
      if (isset($_POST['submit_update'])) {

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

        if ($c_img == "") {
          $c_img = "user_default.jpg";
        }

        $db->query("UPDATE user SET fullname=:fullName, email=:email, password=:password, image=:image WHERE id=:id");
        $db->bindvalue(':id', $user_id, PDO::PARAM_STR);
        $db->bindvalue(':fullName', $c_name, PDO::PARAM_STR);
        $db->bindvalue(':email', $c_email, PDO::PARAM_STR);
        $db->bindvalue(':password', $hashed_Pass, PDO::PARAM_STR);
        $db->bindvalue(':image', $c_img, PDO::PARAM_STR);

        $run = $db->execute();

        if ($run) {

          redirect('my_account.php');

          keepmsg('<div class="alert alert-success text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> Update successfully
                  </div>');

        } else {

          redirect('my_account.php');

          keepmsg('<div class="alert alert-danger text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sorry!</strong> Update not successfull
            </div>');
        }


      }
      ?>
    </div>
  </div>
</div>

</div>
</div>