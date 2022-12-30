<?php include('includes/header.php'); ?>

<?php

//Include functions
include('includes/functions.php');

?>
<link rel="stylesheet" href="css/style.css">
<?php

if (isset($_SESSION['user_is_logged_in'])) {


} else {

    header("Location: logout.php");
}

?>
<?php 
/************** Fetching data from database using id ******************/

    if(isset($_GET['cus_id'])){

        $user_id   =   $_GET['cus_id'];
     }

    //require database class files
    require('includes/config.php');

    //instatiating our database objects
    $db = new config;

    $db->query("SELECT * FROM user WHERE id =:id");

    $db->bindValue(':id', $user_id, PDO::PARAM_INT);

    $row = $db->fetchSingle();


?>


<div class="container" style="background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);background-color:#fff;">
<div class="well">
<div style="display: flex;justify-content:space-between;align-items:center;">
    <?php echo '<small class="pull-left" style="color:#337ab7;">' . $_SESSION['user_data']['fullName'] . ' | Editing Customer</small>';?>
    <div style="display: flex;gap:15px;">
      <small class="pull-right" id="o22"><a href="customers.php"> View Customers</a> </small>
      <small class="pull-right" id="o33"><a href="add_service.php"> Add Service</a> </small>
    </div>
</div>

  <h2 class="text-center">My Customers</h2>
  <hr>
  <br>
</div>



<div class="rows">
  <?php showmsg(); ?>
  <div class="col-md-12 col-md-offset-3">
    <?php  if($row) : ?>
    <br>
    <form class="form-horizontal" role="form" method="post" action="edit.php?cus_id=<?php echo $user_id ?>">
      <div class="form-group">
        <label class="control-label col-sm-4" for="name">Fullname:</label>
        <div class="col-sm-12">
          <input type="name" name="name" class="form-control" id="name" value="<?php echo $row['fullName'] ?>" required>
        </div>
      </div>
 
  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email:</label>
    <div class="col-sm-12">
      <input type="email" name="email" class="form-control" id="email" value="<?php echo $row['email'] ?>" required>
    </div>
  </div>
  <div class="form-group ">
    <label class="control-label col-sm-4" for="pwd">Password:</label><br>
    <div class="col-sm-12" style="margin-bottom: 20px;">
      <fieldset disabled>
        <input type="password" name="password" class="form-control disabled" id="pwd"
          placeholder="Cannot Change Password" value="<?php echo $row['password'] ?>" required>
      </fieldset>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-12" style="display: flex;justify-content: space-around;">
      <input type="submit" class="btn btn-primary" name="update_customer" value="Update">
      <button type="submit" class="btn btn-danger pull-right" name="delete_customer">Delete</button>
    </div>
  </div>
  </div>
  <?php endif ;  ?>

  </form>

</div>
</div>

<?php 
/************** Update data to database using id ******************/  
if(isset($_POST['update_customer'])){
    
    $raw_name           =   cleandata($_POST['name']);
    $raw_email          =   cleandata($_POST['email']);
  
    
    $c_name             =   sanitize($raw_name);
    $c_email            =   valemail($raw_email);
    
    
    $db->query('UPDATE user SET fullName=:fullName, email=:email, WHERE id=:id');
    
    $db->bindValue(':id',$user_id , PDO::PARAM_INT);
    $db->bindValue(':fullName',$c_name , PDO::PARAM_STR);
    $db->bindValue(':email',$c_email , PDO::PARAM_STR);    
    
    $run_update = $db->execute();
    
    if($run_update){
        
        redirect('customers.php');
        
        keepmsg('<div class="alert alert-success text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> Customer updated successfully.
                </div>');
        
        
    }else{
        
        header('Location: customers.php');
        
        keepmsg('<div class="alert alert-danger text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> Customer Could not be updated.
                </div>');
        
    }
    
}


/************** Delete data from database using id ******************/ 

if(isset($_POST['delete_customer'])){
    
   
    
    keepmsg('<div class="alert alert-danger text-center">
              
              <strong>Confirm!</strong> Do you want to delete your account <br>
              <a href="#" class="btn btn-default" data-dismiss="alert" aria-label="close">No, Thanks</a><br>
              <form method="post" action="edit.php">
              <input type="hidden" value="' . $user_id .'" name="id"><br>
              <input type="submit" name="delete_user" value="Yes, Delete" class="btn btn-danger">
              </form>
            </div>');
    
}        




//If the Yes Delete (confim delete) button is click from the closable div proceed to delete


   if(isset($_POST['delete_user'])){
       
    $user_id = $_POST['cus_id'];
           
    $db->query('DELETE FROM user WHERE id=:id');
       
    $db->bindValue(':id', $user_id, PDO::PARAM_INT);
       
    $run = $db->execute();
       
    if($run){
        
        redirect('customers.php');
        
        keepmsg('<div class="alert alert-success text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Sorry </strong>User successfully deleted. 
                </div>');
        
    }else{
        
         keepmsg('<div class="alert alert-danger text-center">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Sorry </strong>User with ID ' . $user_id . ' Could not be deleted 
                </div>');
    }
       
       
   }  
?>
</div>
</div>
</body>
</html>