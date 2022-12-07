<?php
$numberOfCards = 10; // this is the number of images you want to show
for ($i=0; $i <= $numberOfCards ; $i++) { 
    $card = $cards[$i];
    echo "<img src='img/gallery/$i.jpg'> <br>";
    }


?>