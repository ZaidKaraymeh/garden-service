<?php
//Include functions
include('includes/functions.php');

?>



<?php

/****************Getting  report menu to ajax *******************/

//Collecting id from Ajax url

$id = $_GET['cid'];


//require database class files
require('includes/config.php');
try {
    $dbname = 'mysql:host=localhost;dbname=servicesystem;charset=utf8';
    $user = 'root';
    $pass = '';

    $connecto = new PDO($dbname, $user, $pass);
    $connecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt_user_book = $connecto->prepare("SELECT * FROM booking WHERE user=:us_ido");
    $stmt_srv_details = $connecto->prepare("SELECT name,price FROM service WHERE id=:srvoh");
    $stmt_user_book->bindParam(':us_ido', $id);
    $stmt_user_book->execute();
    $row_user_book = $stmt_user_book->fetchAll(PDO::FETCH_ASSOC);

    $connecto = null;
} catch (PDOException $ex) {
    echo "Error Occured!";
    die($ex->getMessage());
}

//instatiating our database objects
$db = new config;


$db->query('SELECT * FROM user WHERE id=:id');


$db->bindValue(':id', $id, PDO::PARAM_INT);


$row = $db->fetchSingle();
$db->execute();

$db->query('SELECT * FROM booking WHERE id=:id');
$db->bindvalue(':id', $id, PDO::PARAM_INT);
$rows = $db->fetchSingle();
$db->execute();

//Display this result to ajax
if ($row) {

    echo '<div  class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr >
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center" colspan="3">Spend Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>' . $row['fullName'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td colspan="3">BHD ' . $row['spending'] . '</td>
                            </tr>
                            <tr>
                                <th class="text-center">Service Name</th>
                                <th class="text-center">Period</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Payment</th>
                                <th class="text-center">price</th>
                            </tr>';
    if (!count($row_user_book) == 0) {

        foreach ($row_user_book as $usoh) {
            $stmt_srv_details->bindParam(':srvoh', $usoh['service']);
            $stmt_srv_details->execute();
            $conoh = $stmt_srv_details->fetchAll(PDO::FETCH_ASSOC)[0];

            echo '
            <tr class="text-center">
                                    <td>' . $conoh['name'] . '</td>
                                    <td>' . $usoh['period'] . '</td>
                                    <td>' . $usoh['date_time'] . '</td>
                                    <td>' . $usoh['payment'] . '</td>
                                    <td>' . $conoh['price'] . '</td>
                                </tr>';
        }
    } else {
        echo '<tr class="text-center">
                                    <td>  -  </td>
                                    <td>  -  </td>
                                    <td>  -  </td>
                                    <td>  -  </td>
                                    <td>  -  </td>
                                </tr>';
        echo '<tr class="text-center">
                                <td style="color:red;" colspan="5">This user has not yet made any bookings.</td>
                            </tr>';
    }
    echo '</tbody>
                    </table>
                </div>';
}
?>