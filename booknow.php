<?php
//Open ob_start and session_start functions
ob_start();
$service_id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
try{
    $dbname ='mysql:host=localhost;dbname=servicesystem;charset=utf8';
    $user = 'root';
    $pass = '';

    $db = new PDO($dbname, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare("SELECT * FROM service WHERE id=:id");
    $stmt->bindParam(":id",$service_id);
    $stmt->execute();
    if(!$row = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]){
        header("Location: services.php?id=$service_id");
        die();
    }
} catch (PDOException $ex){
    echo "Error Occured!";
    die($ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta discription content="Bahrain Branch Contracting is a boutique landscaping company located in the Kingdom of Bahrain.Established in 2016, we provide unique garden solutions, Land services, Landscape maintenance and water management programs to property mangers and owners enabling us to serve all of your outdoor needs.">
    <title>Bahrain Branch Contracting</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- jqury cdn -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>
<body>
    <div style="min-height: 60px;"></div>
    <?php require('includes/user_header.php'); ?>
    <div class="container py-5">
        <div class="container-fluid my-3 mx-2">
            <div class="row">
                <div class="col-4">
                    <img src="./img/services/<?php echo $row['picture']; ?>" class="img-thumbnail" alt="Service picture" style="width: 408px;height:541px">
                </div>
                <div class="col-8">
                    <h2><?php echo $row['name']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                </div>
            </div>
            <div class="row my-3 mx-2">
                <div class="col-12">
                    <details>
                        <summary>Information</summary>
                        <ul>
                            <li>
                                <p>price per person.</p>
                            </li>
                            <li>
                                <p>minimum 1 hour.</p>
                            </li>
                            <li>
                                <p>Life jacket will be provided for.</p>
                            </li>
                        </ul>
                    </details>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <?php if(isset($_SESSION['bok_nw_er'])&&!empty($_SESSION['bok_nw_er'])){?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Notice!</strong><br><?php echo $_SESSION['bok_nw_er']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php  
                        unset($_SESSION['bok_nw_er']);
                    }
                    ?>
                </div>
                <div class="col-8">
                    <h3 class="text-center mb-2">Reserve</h3>
                    <form action="./PHP/booking_process.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_data']['id']; ?>">
                        <input type="hidden" name="service_id" value="<?php echo $row['id']; ?>" id="srv_id">
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-left-radius:8px;border-bottom-left-radius:8px;border-top-right-radius:0;border-bottom-right-radius:0;">Date</span>
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGroup1" placeholder="Date" style="border-top-left-radius:0px;border-bottom-left-radius:0px;" name="dateo" onchange="check_dateo()">
                                <label for="floatingInputGroup1">Date</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Select Period" name="period">
                            </select>
                            <label for="floatingSelect">Period</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-left-radius:8px;border-bottom-left-radius:8px;border-top-right-radius:0;border-bottom-right-radius:0;">Price</span>
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" id="floatingInputGroup2" placeholder="Price" value="<?php echo $row['price']; ?>" style="border-top-left-radius:0px;border-bottom-left-radius:0px;" name="price">
                                <label for="floatingInputGroup2">Price</label>
                            </div>
                            <span class="input-group-text" style="border-top-left-radius:0px;border-bottom-left-radius:0px;border-top-right-radius:8px;border-bottom-right-radius:8px;">BD</span>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-4 text-center" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                <div>
                                    <img src="img/download-removebg-preview.png" class="img-fluid" alt="Pay-method" style="width: 225px;height:225px">
                                </div>
                                <div class="my-2">
                                    <input type="radio" class="btn-check" name="pay" id="olo1" autocomplete="off" value="creditcard">
                                    <label class="btn btn-outline-success" for="olo1">Credit Card</label>   
                                </div>
                            </div>
                            <div class="col-4 text-center" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                <div>
                                    <img src="img/BenefitPay-Youtube-Cover.jpg" class="img-fluid" alt="Pay-method" style="width: 225px;height:225px">
                                </div>
                                <div class="my-2">
                                    <input type="radio" class="btn-check" name="pay" id="olo3" autocomplete="off" value="benefit" checked>
                                    <label class="btn btn-outline-success" for="olo3">Benefit</label>   
                                </div>
                            </div>
                            <div class="col-4 text-center" style="display: flex;flex-direction: column;justify-content: center;align-items: center;">
                                <div>
                                    <img src="img/images-removebg-preview.png" class="img-fluid" alt="Pay-method" style="width: 225px;height:225px">
                                </div>
                                <div class="my-2">
                                    <input type="radio" class="btn-check" name="pay" id="olo2" autocomplete="off" value="paypal">
                                    <label class="btn btn-outline-success" for="olo2">PayPal</label>   
                                </div>
                            </div>
                        </div>
                        <div class="row mx-1 my-3">
                            <button type="submit" class="btn btn-outline-secondary" name="btanoh" id="reserve_btn">Book now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/check_date.js"></script>
</body>
</html>