<?php
session_start();
date_default_timezone_set("Asia/Bahrain");
if(isset($_POST['checkDate'])){
    try{
        $dbname ='mysql:host=localhost;dbname=servicesystem;charset=utf8';
        $user = 'root';
        $pass = '';
    
        $db = new PDO($dbname, $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


        $dateo = $_POST['datoO'];
        $stmt_js = $db->prepare("SELECT * FROM booking WHERE service=:srv2 AND date_time=:d2");
        $stmt_js->bindParam(':srv2',$_POST['srv_id']);
        $stmt_js->bindParam(':d2',$dateo);
        $stmt_js->execute();
        $jso = $stmt_js->fetchAll(PDO::FETCH_ASSOC);
        if(count($jso) == 0 || count($jso) == 1){

            $stmt = $db->prepare("SELECT * FROM booking WHERE service=:srv");
            $stmt->bindParam(':srv',$_POST['srv_id']);
            $stmt->execute();
            if($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                $kk = count($row);
                $kl=0;
                foreach($row as $chk){
                    $kl++;
                    $x = date("Y-m-d",strtotime($chk['date_time']));
                    if($dateo == $x){
                        if($chk['available'] == 0){
                            if($kl == $kk){
                                echo "All";
                            }
                        } elseif ($chk['available'] == 1){
                            echo "Eve Available";
                            exit();
                        } elseif ($chk['available'] == 2){
                            echo "Day Available";
                            exit();
                        } else {
                            if($kl == $kk){
                                echo "Both times of service have been reserved for this day.";
                            }
                        }
                    } elseif ($dateo < date("Y-m-d")){
                        echo "Not Valid";
                        exit();
                    } else {
                        if($kl == $kk){
                            echo "Valid";
                        }
                    }
                }
            } else {
                if ($dateo < date("Y-m-d")){
                    echo "Not Valid";
                    exit();
                }
                echo "All";
                exit();
            }
        } elseif(count($jso) == 2) {
            echo "Both times of service have been reserved for this day.";
            exit();
        }
        $db=null;
    } catch (PDOException $ex) {
        echo "Error Occured!";
        die($ex->getMessage());
    }
}
?>