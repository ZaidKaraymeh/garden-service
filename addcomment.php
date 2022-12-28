<?php 
require('authorization.php');
$username = $_SESSION['activeuser'];
$aid=$_POST['aid'];
$rid=$_POST['rid'];
if(isset($_POST['b2'])){ //comment btn
        $comment=$_POST['comment'];
        
        try{
            require 'connection.php';
        
        $db->beginTransaction();//start transaction
        $r=$db->prepare("insert into comments  VALUES (NULL , :a, :u , :c , NULL ,:rid)");
        $r->bindParam(':a',$aid);
        $r->bindParam(':u',$username);
        $r->bindParam(':c',$comment);
        $r->bindParam(':rid',$rid);
        $r->execute();
        
        $db->commit();//end transaction
        $db=null;  
         }
         catch(PDOException $e){
            echo "error occured!";
            $db->rollBack();
            die($e->getMessage());
         }


}
header("location: viewreservations.php"); 

?>