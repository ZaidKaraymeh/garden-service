<?php
/************** Fetching data from database using id ******************/
require('includes/header.php');

//require database class files
require('includes/config.php');
require('includes/functions.php');

//instatiating our database objects
$db = new config;

//Create a query to select all user to display in the table

$db->query("SELECT * FROM user WHERE email=:email");

$email = $_SESSION['user_data']['email'];

$db->bindValue(':email', $email, PDO::PARAM_STR);

//Fetch all data and keep in a result set
$row = $db->fetchSingle();

?>
<div class="container" style="padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;">
<div class="well">
<div style="display: flex;justify-content:space-between;align-items:center;">
<?php $fullname = $_SESSION['user_data']['fullName'];

echo '<small class="pull-left" style="color:#337ab7;">' . $fullname . '  | Veiwing / Editing</small>';
?>
<div style="display: flex;gap:15px;">
  <?php if (isset($_SESSION['user_is_logged_in'])) {
  echo '<small style="display: block;text-align: right;" id="o66"><a href="customers.php"> View Customers</a> </small> 
  <small style="display: block;text-align: right;" id="o77"><a href="add_service.php"> Add Service</a> </small>';
}
?>
</div>
</div>
  <h2 class="text-center">My Account</h2>
  <hr>
  <br>
</div>
<div class="container">
  <div class="rows">

    <?php showmsg(); ?>

    <div class="col-md-12">

      <?php if ($row) { ?>
        <br>
        <form class="form-horizontal" role="form" method="post" action="">
          <div class="form-group">
            <label class="control-label col-sm-2" for="name" >Fullname:</label>
            <div class="col-sm-12">
              <input type="name" name="name" class="form-control" id="name" value="<?php echo $row['fullName'] ?>"
                required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email" >Email:</label>
            <div class="col-sm-12">
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>"
                required>
            </div>
          </div>
          <div class="form-group ">
            <label class="control-label col-sm-2" for="pwd" >Password:</label>
            <div class="col-sm-12">
              <fieldset disabled>
                <input type="password" name="password" class="form-control disabled" id="pwd"
                  value="<?php echo $row['password'] ?>" required>
              </fieldset>
            </div>
          </div>
          <br>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12" style="display: flex;justify-content:space-evenly;">
              <a class="btn btn-primary" href="edit_account.php?id=<?php echo $row['id'] ?>">Edit</a>
              <?php if (isset($_SESSION['user_is_logged_in'])) {
              echo '<button type="submit" class="btn btn-danger pull-right" name="delete_form">Delete</button>';
            } ?>
            </div>
          </div>
        </form>

      </div>
      <div class="col-md-12" style="text-align: center;">
        <div style="padding: 20px;">
          <div class="thumbnail">
            <a href="edit_account.php?id=<?php echo $row['id'] ?>">

              <?php $image = $row['image']; ?>

              <?php echo ' <img src="uploaded_image/' . $image . '"  style="width:300px;height:300px">'; ?>
            </a>
            <h4 class="text-center">
              <?php //echo fullname of admin  ?>
              </4>
          </div>
        </div>
      </div>

      <?php } ?>

  </div>

</div>

<?php

/************** Deleting data from database when delete button is clicked ******************/





//If the Yes Delete (confim delete) button is click from the closable div proceed to delete
if (isset($_SESSION['user_is_logged_in'])) {
  if (isset($_POST['delete_form'])) {

    $id = $_SESSION['user_data']['id'];

    keepmsg('<div class="alert alert-danger text-center">
                
                <strong>Confirm!</strong> Do you want to delete your account <br>
                <a href="#" class="btn btn-default" data-dismiss="alert" aria-label="close">No, Thanks</a><br>
                <form method="post" action="my_account.php">
                <input type="hidden" value="' . $id . '" name="id"><br>
                <input type="submit" name="delete_admin" value="Yes, Delete" class="btn btn-danger">
                </form>
              </div>');
  }
  if (isset($_POST['delete_admin'])) {

    $id = $_POST['id'];

    $db->query('DELETE FROM user WHERE id=:id');

    $db->bindValue(':id', $id, PDO::PARAM_INT);

    $run = $db->execute();

    if ($run) {

      redirect('logout.php');

    } else {

      keepmsg('<div class="alert alert-danger text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Sorry </strong>User with ID ' . $id . ' Could not be deleted 
                </div>');
    }
  }
}
?>

</div>
</div>
</div>

</div>