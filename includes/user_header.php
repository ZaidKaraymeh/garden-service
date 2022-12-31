<?php
//Open ob_start and session_start functions
ob_start();
session_start();

?>
<!-- Navigation
    ==========================================-->
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
                            <li><a class="dropdown-item text-white" href="cart.php">Book Now</a></li>
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