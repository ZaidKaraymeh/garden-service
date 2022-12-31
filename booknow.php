<?php
//Open ob_start and session_start functions
ob_start();
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
</head>
<body>
    <div style="min-height: 60px;"></div>
    <?php require('includes/user_header.php'); ?>
    <div class="container">
        <div class="container-fluid my-3 mx-2">
            <div class="row">
                <div class="col-4">
                    <img src="./img/services/service-1.jpg" class="img-thumbnail" alt="Service picture">
                </div>
                <div class="col-8">
                    <h2>Service Name</h2>
                    <p>
                        description descriptiondescription descriptiondescription descriptiondescription descriptiondescription
                        descriptiondescription descriptiondescription descriptiondescription descriptiondescription description
                        description descriptiondescription descriptiondescription descriptiondescription descriptiondescription
                        descriptiondescription descriptiondescription descriptiondescription descriptiondescription description
                    </p>
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
        </div>
    </div>
</body>
</html>