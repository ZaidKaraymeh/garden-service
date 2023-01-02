<?php 
/************** Fetching all data from database ******************/
require('includes/header.php');



if (isset($_SESSION['user_is_logged_in'])) {


} else {

    header("Location: logout.php");
}
//require database class files
require('includes/config.php');
require('includes/functions.php');

//instatiating our database objects
$db = new config;


$db->query('SELECT * FROM user where user_type = "CTM"');

$results = $db->fetchMultiple();

?>
 <style>
            .btn-custom {
              text-transform: uppercase;
              color: #fff;
              background-color: #8BD71C;
              padding: 14px 20px;
              letter-spacing: 1px;
              margin: 0;
              font-size: 17px;
              font-weight: 400;
              border-radius: 6px;
              margin-top: 20px;
              transition: all 0.3s;
            }

            .btn-custom2 {
              text-transform: uppercase;
              color: #fff;
              background-color: #BF0129;
              padding: 14px 20px;
              letter-spacing: 1px;
              margin: 0;
              font-size: 17px;
              font-weight: 400;
              border-radius: 6px;
              margin-top: 20px;
              transition: all 0.3s;
            }
          </style>
<div class="container" style="background-color: aliceblue;padding: 30px;border-radius: 10px;box-shadow: 0 12px 20px 0 rgb(255 255 255 / 43%), 0 2px 4px 0 rgb(255 255 255 / 42%);background-color:#fff;">

  <?php showmsg(); ?>
  <div class="jumbotron">

    <div style="display: flex;justify-content:space-between;align-items:center;">
    <?php echo $_SESSION['user_data']['fullName'] ?> | Admin
    <div style="display: flex;gap:15px;">
  <?php if (isset($_SESSION['user_is_logged_in'])) {
  echo ' <small style="display: block;text-align: right;" id="o22"><a href="customers.php"> View Customers</a> </small>';
  echo ' <small style="display: block;text-align: right;" id="o33"><a href="add_service.php"> Add Service</a> </small>';
}
?>
</div>
</div>
    <h2 class="text-center">Customers</h2>
    <hr>
    <br>
    <table class="table table-bordered table-hover text-center">
      <thead>
        <tr>
          <th class="text-center">User ID</th>
          <th class="text-center">Full Name</th>
          <th class="text-center">Spending</th>
          <th class="text-center">Email</th>
          <th class="text-center">Report</th>
          <th class="text-center"></th>
        </tr>
      </thead>
      <tbody>
        <?php  foreach($results as $result) : ?>
        <tr>
          <td>
            <?php echo $result['id'] ?>
          </td>
          <td>
            <?php echo $result['fullName'] ?>
          </td>
          <td>
            <?php echo $result['spending'] ?>
          </td>
          <td>
            <?php echo $result['email'] ?>
          </td>
          <td><a href="reports.php?cus_id=<?php echo $result['id'] ?>" class='btn btn-custom'>View Report</a></td>
          <td><a href="edit.php?cus_id=<?php echo $result['id'] ?>" class='btn btn-custom2'>Edit</a></td>

        </tr>

        <?php endforeach ; ?>
      </tbody>
    </table>
  </div>
</div>

</div>
</div>
</body>
</html>