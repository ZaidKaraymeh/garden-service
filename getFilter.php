<?php
if (isset($_GET['price'])) {
  $p=$_GET['price'];
}
if (isset($_GET['type'])) {
  $p=$_GET['type'];
}

try{
    require('connection.php');


    if($p == 'low'){
      $rs=$db->query("SELECT * FROM activity  WHERE price <= 5 ");
    }
    elseif ($p == 'avg') {
      $rs=$db->query("SELECT * FROM activity  WHERE price > 5 AND price < 20 ");
    }
    elseif ($p == 'high') {
      $rs=$db->query("SELECT * FROM activity  WHERE price >= 20 ");
    }
    elseif ($p == 'water' || $p == 'land') {
      $rs=$db->query("SELECT * FROM activity  WHERE type = '$p' ");
    }



    while($row=$rs->fetch()){
     $aid[]=$row['id'];
     $name[]=$row['name'];
     $price[]=$row['price'];
     $photo[]=$row['photo'];
     $qoute[]=$row['qoute'];
     $location[]=$row['location'];
    }







    $db=null;
}
 catch(PDOException $e){
    echo "error occured!";
    die($e->getMessage());
 }
 require('filter.php');
?>
