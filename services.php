<?php
//Open ob_start and session_start functions
ob_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=serviceSystem;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * from service";
    $rs = $db->query($sql);

    $db = null;
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/242f5b2610.js" crossorigin="anonymous"></script>

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <style>
        body {
            background-image: url(img/waloh.jpg);
            background-color: #3F4E4F;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            min-height: 100vh;
        }

        body::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(5px);
        }

        #alihassan {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(540px, 1fr));
            gap: 40px;
        }

        #aliabadi {
            box-shadow: 0 12px 20px 0 rgb(255 255 255 / 33%), 0 2px 4px 0 rgb(255 255 255 / 32%);
        }

        #aliabadi img {
            height: 230px !important;
        }

        #tohello {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            flex-wrap: wrap;
        }

        @media (max-width:767px) {
            #alihassan {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 40px;
            }

            #aliabadi img {
                height: 200px !important;
                width: 100%;
                border-bottom-left-radius: 0 !important;
                border-top-right-radius: var(--bs-border-radius) !important;
            }

            #hello {
                display: flex;
                width: 100%;
                justify-content: space-evenly;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <?php require('includes/user_header.php'); ?>
    <div style="min-height:60px;"></div>
    <?php if (isset($_SESSION['lognoh']) && !empty($_SESSION['lognoh'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Notice!</strong><br>
            <?php echo $_SESSION['lognoh']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['lognoh']);
        }
        ?>
    <div class="container">
        <div class="container-fluid my-3" id="alihassan">
            <?php
            foreach ($rs as $row) { ?>
                <div class="card mb-3" id="aliabadi">
                    <div class="row g-0" style="height: 100%;">
                        <div class="col-md-4">
                            <img src="img/services/<?php echo $row[3]; ?>" class="img-fluid rounded-end" alt="Service Image"
                                style="height: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body" id="tohello">
                                <h5 class="card-title">
                                    <?php echo $row[1]; ?>
                                </h5>
                                <p class="card-text" style="flex: 1;overflow-wrap: anywhere;"><?php echo $row[4]; ?></p>
                                <p class="card-text"><small class="text-muted">
                                        <?php echo $row[2]; ?> BD
                                    </small></p>
                                <div id="hello">
                                    <a href="serviceDetails.php?id=<?php echo $row[0]; ?>" class="btn btn-custom">Read
                                        More</a>
                                    <a href="booknow.php?id=<?php echo $row[0]; ?>" class="btn-custom2 btn">Book
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>