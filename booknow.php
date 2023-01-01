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
    <div class="container py-5">
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
            <div class="row">
                <div class="col-4">

                </div>
                <div class="col-8">
                    <h3 class="text-center mb-2">Reserve</h3>
                    <form action="" method="POST" >
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Works with selects</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-left-radius:8px;border-bottom-left-radius:8px;border-top-right-radius:0;border-bottom-right-radius:0;">Date</span>
                            <div class="form-floating">
                                <input type="date" class="form-control" id="floatingInputGroup1" placeholder="Date" style="border-top-left-radius:0px;border-bottom-left-radius:0px;">
                                <label for="floatingInputGroup1">Date</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" style="border-top-left-radius:8px;border-bottom-left-radius:8px;border-top-right-radius:0;border-bottom-right-radius:0;">Price</span>
                            <div class="form-floating">
                                <input type="text" disabled class="form-control" id="floatingInputGroup1" placeholder="Price" value="300" style="border-top-left-radius:0px;border-bottom-left-radius:0px;">
                                <label for="floatingInputGroup1">Price</label>
                            </div>
                            <span class="input-group-text" style="border-top-left-radius:0px;border-bottom-left-radius:0px;border-top-right-radius:8px;border-bottom-right-radius:8px;">BD</span>
                        </div>
                        <div class="row">
                            <div class="col-4 text-center">
                                <div>
                                    <img src="images/download-removebg-preview.png" class="img-fluid" alt="Pay-method">
                                </div>
                                <div class="my-2">
                                    <input type="radio" class="btn-check" name="pay" id="olo1" autocomplete="off" value="c-card">
                                    <label class="btn btn-outline-success" for="olo1">Credit Card</label>   
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div>
                                    <img src="images/BenefitPay-Youtube-Cover.jpg" class="img-fluid" alt="Pay-method">
                                </div>
                                <div class="my-2">
                                    <input type="radio" class="btn-check" name="pay" id="olo3" autocomplete="off" value="b-card" checked>
                                    <label class="btn btn-outline-success" for="olo3">Benefit</label>   
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <div>
                                    <img src="images/images-removebg-preview.png" class="img-fluid" alt="Pay-method">
                                </div>
                                <div class="my-2">
                                    <input type="radio" class="btn-check" name="pay" id="olo2" autocomplete="off" value="p-card">
                                    <label class="btn btn-outline-success" for="olo2">PayPal</label>   
                                </div>
                            </div>
                        </div>
                        <div class="row mx-1">
                            <button class="btn btn-outline-secondary">Book now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>