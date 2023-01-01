<?php 
session_start();
ob_start();
if(isset($_SESSION['from_booking'])&&!empty($_SESSION['from_booking'])){
?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"crossorigin="anonymous"></script>
		<title>BBC Store - Invoice</title>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}
			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}
			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}
			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}
			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}
			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}
			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}
			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}
			.invoice-box table tr.item.last td {
				border-bottom: none;
			}
			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}
			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}
				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}
			.invoice-box.rtl table {
				text-align: right;
			}
			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>
	<body>
<!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer -->
    <div class="pos-f-t">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">BBC Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about.php">About US</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="services.php">Services</a>
                    </li> -->
                    <!-- register and login should be in dropdown named profile -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Book Now</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-white" href="booknow.php">Book Now</a></li>
                            <li><a class="dropdown-item text-white" aria-current="page" href="services.php">Services</a></li>
                            <li><a class="dropdown-item text-white" href="register.php">Register</a></li>
                            <li><a class="dropdown-item text-white" aria-current="page" href="about.php">About US</a></li>
                        </ul>
                    </li>
                    <?php
                    if (isset($_SESSION['activeUser'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <?php #hello
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Login.php">Log in</a>
                        </li>
                        <?php } ?>
                    <?php
                    if (isset($_SESSION['activeUser'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="my_account.php">
                                <?php
                                echo $_SESSION['user_data']['fullName'];

                                ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer -->
		<div style="height: 60px;"></div>
        <div class="invoice-box my-5" id="invoh">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="./img/services/<?php echo $_SESSION['from_booking']['service_pic_booking']; ?>" style="width: 100%; max-width: 300px; height:400px;" />
								</td>
								<td>
									Invoice #: 000<?php echo $_SESSION['from_booking']['invc_booking']; ?><br />
                                    <?php 
                                        $date_booking =date("l jS \of F Y ",strtotime($_SESSION['from_booking']['date_booking']. ' + 1 days'));
                                        $created_date_booking =date("l jS \of F Y ",strtotime($_SESSION['from_booking']['created_booking']));
                                        $prico = $_SESSION['from_booking']['service_price_booking'];
                                        $vat = 0.10;
                                        $vat_prico = $prico * $vat ;
                                    ?>
									Created: <?php echo $created_date_booking; ?><br />
									Due: <?php echo $date_booking; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    <?php echo $_SESSION['from_booking']['service_name_booking']; ?><br />
									<?php echo ucfirst($_SESSION['from_booking']['period_booking']); ?><br />
									<?php echo date("l jS \of F Y ",strtotime($_SESSION['from_booking']['date_booking'])) ?>
								</td>
								<td>
                                    <?php echo ucwords($_SESSION['from_booking']['user_name_booking']); ?><br />
									+973 <?php echo $_SESSION['from_booking']['user_phone_booking']; ?><br />
									<?php echo $_SESSION['from_booking']['user_email_booking']; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading">
					<td>Payment Method</td>
					<td>Check #</td>
				</tr>
				<tr class="details">
					<td><?php echo ucfirst($_SESSION['from_booking']['pay_booking']); ?></td>
					<td><?php echo $_SESSION['from_booking']['invc_booking']; ?></td>
				</tr>
				<tr class="heading">
					<td>Service</td>
					<td>Price</td>
				</tr>
				<tr class="item">
					<td><?php echo $_SESSION['from_booking']['service_name_booking']; ?></td>
					<td><?php echo $_SESSION['from_booking']['service_price_booking']; ?> BD</td>
				</tr>
				<tr class="item">
					<td>VAT</td>
					<td><?php echo $vat_prico; ?></td>
				</tr>
				<tr class="total">
					<td></td>
					<td>Total: <?php echo $prico + $vat_prico; ?> BD</td>
				</tr>
			</table>
		</div>
        <div class="container">
            <div class="row">
                <button onclick="window.print()" class="btn btn-outline-secondary my-5 mx-4">Print Invoice</button>
            </div>         
        </div>
	</body>
</html>
<?php 
unset($_SESSION['from_booking']);
} else {
    ?>
    <!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"crossorigin="anonymous"></script>
		<title>BBC Store - Invoice</title>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}
			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}
			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}
			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}
			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}
			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}
			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}
			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}
			.invoice-box table tr.item.last td {
				border-bottom: none;
			}
			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}
			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}
				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}
			.invoice-box.rtl table {
				text-align: right;
			}
			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>
	<body>
<!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer -->
    <div class="pos-f-t">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">BBC Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="about.php">About US</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="services.php">Services</a>
                    </li> -->
                    <!-- register and login should be in dropdown named profile -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Book Now</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-white" href="booknow.php">Book Now</a></li>
                            <li><a class="dropdown-item text-white" aria-current="page" href="services.php">Services</a></li>
                            <li><a class="dropdown-item text-white" href="register.php">Register</a></li>
                            <li><a class="dropdown-item text-white" aria-current="page" href="about.php">About US</a></li>
                        </ul>
                    </li>
                    <?php
                    if (isset($_SESSION['activeUser'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <?php #hello
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Login.php">Log in</a>
                        </li>
                        <?php } ?>
                    <?php
                    if (isset($_SESSION['activeUser'])) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="my_account.php">
                                <?php
                                echo $_SESSION['user_data']['fullName'];

                                ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer --><!-- heeeeeeeeeeeeeeeeeeeeeeeeeeadeeeeeeeeeeeeeeeeer -->
		<div style="height: 60px;"></div>
        <div class="invoice-box my-5" id="invoh">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="./img/services/service-3.jpg" style="width: 100%; max-width: 300px; height:400px;" />
								</td>
								<td>
									Invoice #: 123<br />
									Created: January 1, 2023<br />
									Due: February 1, 2023
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Service Name<br />
									Period<br />
									Date
								</td>
								<td>
									Ali Abadi<br />
									+973 34191571<br />
									ali@ali.com
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="heading">
					<td>Payment Method</td>
					<td>Check #</td>
				</tr>
				<tr class="details">
					<td>Benefit</td>
					<td>XXXX XXXX...</td>
				</tr>
				<tr class="heading">
					<td>Cost</td>
					<td>Price</td>
				</tr>
				<tr class="item">
					<td>Service Name</td>
					<td>300 BD</td>
				</tr>
				<tr class="item">
					<td>VAT</td>
					<td>30</td>
				</tr>
				<tr class="total">
					<td></td>
					<td>Total: 330 BD</td>
				</tr>
			</table>
		</div>
        <div class="container">
            <div class="row">
                <button onclick="window.print()" class="btn btn-outline-secondary my-5 mx-4">Print this page</button>
            </div>         
        </div>
	</body>
</html>
<?php }?>