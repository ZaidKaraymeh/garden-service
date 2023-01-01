<?php 
session_start();

if(isset($_POST['btanoh'])){
    if(trim($_POST['dateo'])==""){
        $_SESSION['bok_nw_er'] = "Please Choose Date";
        header("Location: ../booknow.php?id={$_POST['service_id']}");
        die();
    } else {
        $user_id = filter_var($_POST['user_id'],FILTER_SANITIZE_NUMBER_INT);
        $service_id = filter_var($_POST['service_id'],FILTER_SANITIZE_NUMBER_INT);
        $dateo = $_POST['dateo'];
        $period = $_POST['period'];
        $pay = $_POST['pay'];
        try{
            $dbname ='mysql:host=localhost;dbname=servicesystem;charset=utf8';
            $user = 'root';
            $pass = '';
        
            $db = new PDO($dbname, $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            $stmt = $db->prepare("INSERT INTO booking (user,service,date_time,period,payment) VALUES (:us_id,:srv_id,:dt,:per,:pay)");
            $stmt->bindParam("us_id",$user_id);
            $stmt->bindParam("srv_id",$service_id);
            $stmt->bindParam("dt",$dateo);
            $stmt->bindParam("per",$period);
            $stmt->bindParam("pay",$pay);
            $stmt->execute();
            $lastId = $db->lastInsertId();
            if($rowaffected = $stmt->rowCount() >0 ){
                $stmt_2 = $db->prepare("SELECT * FROM booking WHERE id=$lastId");
                $stmt_3 = $db->prepare("SELECT * FROM user WHERE id=$user_id");
                $stmt_4 = $db->prepare("SELECT * FROM service WHERE id=$service_id");
                $stmt_2->execute();
                if($row_2 = $stmt_2->fetchAll(PDO::FETCH_ASSOC)[0]){
                    $stmt_3->execute();
                    if($row_3 = $stmt_3->fetchAll(PDO::FETCH_ASSOC)[0]){
                        $stmt_4->execute();
                        if($row_4 = $stmt_4->fetchAll(PDO::FETCH_ASSOC)[0]){
                            $_SESSION['from_booking'] = array(
                                'invc_booking' => $row_2['id'],
                                'date_booking' => $row_2['date_time'],
                                'period_booking' => $row_2['period'],
                                'pay_booking' => $row_2['payment'],
                                'created_booking' => $row_2['created_at'],
                                'user_booking' => $row_3['id'],
                                'user_name_booking' => $row_3['fullName'],
                                'user_email_booking' => $row_3['email'],
                                'user_phone_booking' => $row_3['phone_number'],
                                'service_booking' => $row_4['id'],
                                'service_name_booking' => $row_4['name'],
                                'service_price_booking' => $row_4['price'],
                                'service_pic_booking' => $row_4['picture'],
                            );
                            // $_SESSION['date_booking'] = $row_2['date_time'];
                            // $_SESSION['period_booking'] = $row_2['period'];
                            // $_SESSION['pay_booking'] = $row_2['payment'];
                            // $_SESSION['created_booking'] = $row_2['created_at'];
                            // $_SESSION['user_booking'] = $row_3['id'];
                            // $_SESSION['user_name_booking'] = $row_3['fullName'];
                            // $_SESSION['user_email_booking'] = $row_3['email'];
                            // $_SESSION['user_phone_booking'] = $row_3['phone_number'];
                            // $_SESSION['service_booking'] = $row_4['id'];
                            // $_SESSION['service_name_booking'] = $row_4['name'];
                            // $_SESSION['service_price_booking'] = $row_4['price'];
                            // $_SESSION['service_pic_booking'] = $row_4['picture'];
                            header("Location: ../Invoice.php");
                            die();
                        } else {
                            $_SESSION['bok_nw_er'] = "Somthing Went Wrong3333!";
                            header("Location: ../booknow.php?id={$_POST['service_id']}");
                            die();
                        }
                    } else {
                        $_SESSION['bok_nw_er'] = "Somthing Went Wrong2222!";
                        header("Location: ../booknow.php?id={$_POST['service_id']}");
                        die();
                    }
                } else {
                    $_SESSION['bok_nw_er'] = "Somthing Went Wrong1111!";
                    header("Location: ../booknow.php?id={$_POST['service_id']}");
                    die();
                }
            } else {
                $_SESSION['bok_nw_er'] = "Somthing Went Wrong!";
                header("Location: ../booknow.php?id={$_POST['service_id']}");
                die();
            }
        } catch (PDOException $ex){
            echo "Error Occured!";
            die($ex->getMessage());
        }
    }
}

?>