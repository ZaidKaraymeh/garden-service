<?php
//Open ob_start and session_start functions
ob_start();
session_start();
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta discription
        content="Bahrain Branch Contracting is a boutique landscaping company located in the Kingdom of Bahrain.
Established in 2016, we provide unique garden solutions, Land services, Landscape maintenance and water management programs to property mangers and owners enabling us to serve all of your outdoor needs.">
    <title>Bahrain Branch Contracting</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

</head>

<body>
    <?php require('includes/user_header.php'); ?>
    <!--Container Main start-->
    <div class="container ">
        <div class="row">
            <div class="col-12 col-md-6 pic">
                <!--activite pic-->
                <div class="title "><?php echo $_SESSION['user_data']['fullName']; ?></div>
                <?php echo $_SESSION['user_data']['image']; ?>

            </div>
            <div class="col-12 col-md-6 info">
                <!--booking-->
                <div class="container">
                    <div class="panel panel-primary">

                        <div class="panel-body">
                            <div class="row">
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







                            <!--row1-->
                            <div class="row">
                                <!--col1-->
                                <div class="col-md-6  ">
                                    <form method="POST" action="reservation.php">
                                        <div class="form-group">
                                            <label class="control-label">DATE</label>
                                            <input type="date" class="form-control" name="date" id="date"
                                                max=2030-12-30>
                                        </div>
                                </div><!--col1-->
                                <!--col2-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">SERVICES</label><br>
                                        <select class="form-select" aria-label=".form-select-lg example"
                                            style="max-width:400px; padding-top:7px; padding-bottom:7px;" name="time">
                                            <option selected>select services</option>
                                            <?php
                                            $db->query("SELECT * FROM service");
                                            $result = $db->fetchMultiple();
                                            foreach ($result as $results) {


                                                ?>
                                                <option value="  <?php echo $result['name']; ?>">
                                                    <?php echo $result['price']; ?>
                                                </option>
                                                <?php } ?>



                                        </select>
                                    </div>
                                </div>
                            </div><!--col2-->
                            <!--row2-->
                            <div class="row">
                                <?php if (!$v) { //water activity ?>

                                    <!--col1-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">PERSONS</label>
                                            <input type="number" class="form-control" name="persons" id="persons" min=1
                                                max=5>
                                        </div>
                                    </div><!--col1-->
                                    <?php } else { ?> <input type='hidden' name='persons' value='1' />
                                    <?php } ?>
                                <!--col2-->
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label class="control-label">RATE</label>
                                        <div class='input-group date' id='rate'>
                                            <?php
                                            if ($t) {
                                                for ($i = 1; $i <= $avgrate; $i++) { ?>
                                                    <i class="fa-solid fa-star"></i>
                                                    <?php }
                                            } else
                                                echo "no rate yet"; ?>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div><!--col2-->
                                </div><!--row1-->
                                <!--row2-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label">PRICE</label><br>
                                            <label class="control-label">
                                                <?php echo $price; ?> BD PER HOUR
                                            </label>
                                        </div>
                                    </div><!--row2-->
                                </div>
                            </div>
                            <?php if (!$v) { ?>
                                <?php } ?>
                            <input type='hidden' name='aid' value='<?php echo $aid; ?>' />
                            <input type='hidden' name='price' value='<?php echo $price; ?>' />
                            <input type="submit" name="btn" class="btn btn-custom btn-lg btn-block" value="BOOK NOW">
                            </form>
                        </div>

                    </div>
                </div>


            </div><!--row1-->

            <?php
            # php code 
            
            //select usename -->> $uid=$row['uid']
//hidden submit value=aid
//insert date,time,no.persons,uid,aid
            $aid = $_REQUEST['aid'];
            try {
                require('connection.php');
                $rs = $db->query("SELECT * FROM activity  WHERE id = $aid ");
                $r = $db->query("SELECT * FROM comments  WHERE aid = $aid");
                while ($row = $rs->fetch()) {
                    $name = $row['name'];
                    $price = $row['price'];
                    $photo = $row['photo'];
                    $type = $row['type'];
                }
                $comment = array();
                if ($r->rowCount() > 0) {
                    while ($rr = $r->fetch()) {
                        $comment[] = $rr['comment'];
                        $rate[] = $rr['rate'];
                        $un[] = $rr['username'];
                    }
                }
                $v = false;
                if ($type == 'land') {
                    $v = true;
                }
                $db = null;
            } catch (PDOException $e) {
                echo "error occured!";
                die($e->getMessage());
            }

            //calc the avarage rate
            $sumrate = 0;
            $count = 0;


            if ($r->rowCount() > 0) {
                if (!is_null($rate)) {
                    foreach ($rate as $value) {
                        if (!is_null($value)) {
                            $sumavg += $value;
                            $count++;
                        }
                    }
                }
            }
            $t = true;
            if ($sumrate == 0 && $count == 0) {
                $t = false;
            }
            if ($t) {
                $avgrate = $sumavg / $count;
            }

            ?>
            <!--comments-->
            <?php if (!empty($comment)) { ?>
                <div class="row ">
                    <?php foreach ($comment as $k => $v) {
                    if (!is_null($v)) { ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $un[$k]; ?>
                                        </h5>
                                        <p class="card-text"><?php echo $v; ?></p>
                                        <p class="card-text"><small class="text-muted">
                                                <?php if (!is_null($rate[$k])) {
                                                echo 'rate ' . $rate[$k] . '/5';
                                            } ?>
                                            </small></p>
                                    </div>
                                </div>
                            </div><!--col1-->

                            <?php }
                }
                            } ?>

            </div><!--row2-->
        </div><!--container-->
</body>

</html>
<!--Container Main end-->

<!-- Footer Section -->
<div id="footer">
    <div class="container text-center">
        <div class="col-md-12 col-md-offset-2">
            <p>CopyRights <i class="far fa-copyright"></i>2022 Bahrain Branch Contracting <i
                    class="fas fa-trademark"></i>
            </p>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>

<?php ?>