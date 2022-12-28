<?php
$fnameERR = $lnameERR = $emailERR = $passERR = $cpsERR = $pnERR = $ERRmsg = "";
$fname = $lname = $email = $pass = $pn = "";
$vfname = $vlname = $vemail = $vpass = $vpn = "";

function test_input($data)
{
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}
if (isset($_POST['sb'])) {
      //inputs validation 
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

            //first name validation
            if (empty($_POST['fname'])) {
                  $fnameERR = "This field is required";
            } else {
                  $vfname = test_input($_POST['fname']);
            }
            if (!preg_match("/([A-Z]*[-,a-z. ']+[ ]*)+/", $vfname)) {
                  $fnameERR = "Invalid name format, please enter a valid name";
            } else {
                  $fname = $_POST['fname'];
            }

            //last name validation
            if (empty($_POST['lname'])) {
                  $lnameERR = "This field is required";
            } else {
                  $vlname = test_input($_POST['lname']);
            }
            if (!preg_match("/([A-Z]*[-,a-z. ']+[ ]*)+/", $vlname)) {
                  $lnameERR = "Invalid name format, please enter a valid name";
            } else {
                  $lname = $_POST['lname'];
            }
      }

      //email validation
      if (empty($_POST['email'])) {
            $emailERR = "This field is required";
      } else {
            $vemail = test_input($_POST['email']);
            if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $vemail)) {
                  $emailERR = "Invalid email format, please enter a valid email";
            } else {
                  $email = $_POST['email'];
            }
      }

      //password validation
      if (empty($_POST['ps'])) {
            $passERR = "This field is required";
      } else {
            $vpass = test_input($_POST['ps']);
            if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $vpass)) {
                  $passERR = "Invalid password format, The password must contain minimum eight characters, at least one letter and one number";
            }
            if ($_POST['ps'] !== $_POST['cps']) {
                  $cpsERR = "Passwords must match";
            } else {
                  $pass = password_hash($_POST['ps'], PASSWORD_DEFAULT);
                  // $pass= $_POST['ps'];
            }
      }

      //phone number validation
      if (empty($_POST['pn'])) {
            $pnERR = "This field is required";
      } else {
            $vpn = test_input($_POST['pn']);
            if (!preg_match("/(((\+?973))?(377|322|383|384|388|340|341|343|345|344|663|666|669)(\d){5})|(((\+?973))?(36|39|33)(\d){6})/", $vpn)) {
                  $pnERR = "Invalid phone number format, please enter a valid number";
            } else {
                  $pn = $_POST['pn'];
            }
      }


      if (trim($fname) == "" || trim($lname) == "" || trim($pass) == "" || trim($email) == "" || trim($pn) == "") {
            $ERRmsg = "Incorrect input(s)!";
      } else if ($_POST['ps'] !== $_POST['cps']) {
            $cpsERR = "Passwords must match";
      } else {
            try {
                  $db = new PDO('mysql:host=localhost;dbname=serviceSystem;charset=utf8', 'root', '');
                  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $query = "select * from user where email='$email'";
                  $rs = $db->query($query);
                  $result = $rs->rowCount();
                  if (($result) > 0) {
                        $ERRmsg = "Email already exists!";
                  } else {
                        $sql = "insert into user value( null ,'$fname $lname', '' ,'$email','$pass',$pn,'CTM',current_timestamp(), current_timestamp(),0 )";
                        $success = $db->exec($sql);
                        if ($success) {

                              header('Location: Login.php');

                              keepmsg('<div class="alert alert-success text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Success!</strong> Customer registered successfully.
                                </div>');

                        } else {

                              keepmsg('<div class="alert alert-danger text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Sorry!</strong> Customer could not be registered.
                                </div>');
                        }
                  }
                  $db = null;
            } catch (PDOException $e) {
                  die("Error: " . $e->getMessage());
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
      <title>Sign up Page</title>
      <!-- Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

      <!-- Stylesheet
      ================================================== -->
      <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
      <?php require('includes/user_header.php'); ?>
      <!-- form section -->
      <div class="form-container">
            <form action=" " method="post">
                  <h2>Register</h2>
                  <span style="color:red">
                        <?php echo $ERRmsg; ?>
                  </span> <br />
                  <input type="text" name="fname" placeholder="First name"><br />
                  <span style="color:red">
                        <?php echo $fnameERR; ?>
                  </span> <br />
                  <input type="text" name="lname" placeholder="Last name"><br />
                  <span style="color:red">
                        <?php echo $lnameERR; ?>
                  </span> <br />
                  <input type="email" name="email" placeholder="Email"><br />
                  <span style="color:red">
                        <?php echo $emailERR; ?>
                  </span> <br />
                  <input type="password" name="ps" placeholder="Password"><br />
                  <span style="color:red">
                        <?php echo $passERR; ?>
                  </span> <br />
                  <input type="password" name="cps" placeholder="Confirm Password"><br />
                  <span style="color:red">
                        <?php echo $cpsERR; ?>
                  </span> <br />
                  <input type="text" name="pn" placeholder="Phone Number"><br />
                  <span style="color:red">
                        <?php echo $pnERR; ?>
                  </span> <br />


                  <button type="submit" name="sb" class="form-btn">Register</button>
                  <p>Already have account? <a href="Login.php">Log in</a></p>
            </form>
      </div>

      <!-- Footer Section -->
      <div id="footer">
            <div class="container text-center">
                  <div class="col-md-12 col-md-offset-2">
                        <p>CopyRights <i class="far fa-copyright"></i>2020 Bahrain Branch Contracting <i
                                    class="fas fa-trademark"></i>
                        </p>
                  </div>
            </div>
      </div>
      <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
      <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>