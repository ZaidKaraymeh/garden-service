<?php
//Include functions
include('includes/functions.php');

?>



<?php

/****************Getting  report menu to ajax *******************/

//Collecting id from Ajax url

$id = $_GET['cid'];
$totaloh = 0;
$avregoh = 0.0;

//require database class files
require('includes/config.php');
try{
    $dbname ='mysql:host=localhost;dbname=servicesystem;charset=utf8';
    $user = 'root';
    $pass = '';

    $connecto = new PDO($dbname, $user, $pass);
    $connecto->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt_user_book = $connecto->prepare("SELECT * FROM booking WHERE user=:us_ido");
    $stmt_total_book = $connecto->prepare("SELECT * FROM booking");
    $stmt_srv_price = $connecto->prepare("SELECT id,price FROM service WHERE id=:srvo_id");
    $stmt_user_book->bindParam(":us_ido",$id);
    $stmt_srv_price->bindParam(":srvo_id",$id);
    $stmt_total_book->execute();
    $row_total_book = $stmt_total_book->fetchAll(PDO::FETCH_ASSOC);
    foreach($row_total_book as $toto){
        $stmt_srv_price->bindParam(":srvo_id",$toto['service']);
        $stmt_srv_price->execute();
        $coco = $stmt_srv_price->fetchAll(PDO::FETCH_ASSOC)[0];
        $totaloh+=$coco['price'];
    }
    if(count($row_total_book)==0){
        $avregoh = 0.0;
    } else {
        $avregoh = ($totaloh)/(count($row_total_book));
        $avregoh = ceil($avregoh / 0.01) * 0.01;
    }
    $connecto =null;
} catch (PDOException $ex){
    echo "Error Occured!";
    die($ex->getMessage());
}

//instatiating our database objects
$db = new config;


$db->query('SELECT * FROM user WHERE id=:id');


$db->bindValue(':id', $id, PDO::PARAM_INT);


$row = $db->fetchSingle();
$db->execute();
$db->query("SELECT * FROM booking WHERE id=:id");
$db->bindvalue(":id", $id, PDO::PARAM_INT);
$rows = $db->fetchMultiple();
$db->execute();
$rowCount = 1;
foreach ($rows as $roww) {
    echo $rowCount++;

}
// $rowCount = $row2['spending'];



//Looping through our fetched array in row vairable. This can go anywhere in the HTML tags
if ($row) {

    $spending_amount = $row['spending'];

    $total_orders = $rowCount;

    $total_amt_spent = $spending_amount * $total_orders;


    $average_amt_spent = ($total_amt_spent) / ($total_orders);


    echo '<div class="col-lg-4 col-md-6" style="margin:30px 0;text-align:center">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-3x" style="color:orange"></i>
                                    </div>
                                    <div class="col-xs-9 text-right" style="color:orange;margin:10px 0;">
                                        <div class="huge">' ;if(count($row_total_book)==0){echo 0;}else{echo count($row_total_book);} echo '</div>
                                        <div>Total Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x" style="margin:10px 0"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6" style="margin:30px 0;text-align:center">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-3x" style="color:red;margin:10px 0;"></i>
                                    </div>
                                    <div class="col-xs-9 text-right" style="color:red;">
                                        <div class="huge">' . $totaloh . ' BD</div>
                                        <div>Total Amount Spent</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x" style="margin:10px 0"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          
                    <div class="col-lg-4 col-md-6" style="margin:30px 0;text-align:center">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-3x" style="color:green;margin:10px 0;"></i>
                                    </div>
                                    <div id="salary" class="col-xs-9 text-right" style="color:green;">
                                        <div class="huge">' . $avregoh . ' BD</div>
                                                Average Amount Spent
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x" style="margin:10px 0;"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>';
}






?>