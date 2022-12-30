<?php //include('includes/header.php'); cause problems ?>


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


//instatiating our database objects
$db = new config;


$db->query('SELECT * FROM user WHERE id=:id');


$db->bindValue(':id', $id, PDO::PARAM_INT);


$row = $db->fetchSingle();



//Display this result to ajax
if ($row) {

    echo '  <div  class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr >
                                <th class="text-center">Name</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr class="text-center">
                            <td>' . $row['fullName'] . '</td>
                            <td>BHD ' . $row['spending'] . '</td>
                            <td>' . $row['email'] . '</td>
                          </tr>

                        </tbody>
                    </table>
                </div>';
}



?>