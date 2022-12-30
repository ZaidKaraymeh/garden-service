<?php
$ERRmsg = "";
if (isset($_POST['sb'])) {
      session_start();
      //Include functions
      include('includes/functions.php');
      try {
            $db = new PDO('mysql:host=localhost;dbname=serviceSystem;charset=utf8', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $email = $_POST['email'];
            $sql = "select * from user where email='$email'";
            $rs = $db->query($sql);
            $db = null;
      } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
      }
      if ($row = $rs->fetch()) {
            if (password_verify($_POST['ps'], $row[4])) {
                  $d_image = $row['image'];

                  $d_name = $row['fullName'];
                  
                  $s_image = "<img src='uploaded_image/$d_image' class='profile_image' />";
                  $_SESSION['activeUser'] = $email;
                  $_SESSION['user_data'] = array(


                        'fullName' => $row['fullName'],
                        'id' => $row['id'],
                        'email' => $row['email'],
                        'image' => $s_image,
                        'imgoh' => $d_image,
                        'phone_number' => $row['phone_number'],
                        'user_type' => $row['user_type']


                  );



                  header('Location: cart.php');


                  if ($row[6] == 'Adm') {
                        $_SESSION['user_is_logged_in'] = true;
                        header('location:customers.php');

                        keepmsg('<div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Welcome </strong>' . $d_name . ' You are logged in as Admin 
                  </div>');
                  }
            } else {
                  $ERRmsg = '<div class="alert alert-danger text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sorry!</strong> INCORRECT PASSWORD
                </div>';

            }
      } else {
            $ERRmsg = '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> INCORRECT EMAIL
          </div>';
      }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Log in Page</title>
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
      <?php require('includes/user_header.php'); ?>
      <!-- form section -->
      <div class="form-container">
            <form action=" " method="post">
                  <h2>Log in</h2>
                  <span style="color:red">
                        <?php echo $ERRmsg; ?>
                  </span> <br />
                  <input type="email" name="email" placeholder="Email"><br />
                  <input type="password" name="ps" placeholder="Password"><br />
                  <button type="submit" name="sb" class="form-btn">Log in</button>
                  <p>Don't have account? <a href="register.php">Register</a></p>

            </form>
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
      <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>