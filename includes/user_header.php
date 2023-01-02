<?php
//Open ob_start and session_start functions
ob_start();
session_start();
try{
    $dbname ='mysql:host=localhost;dbname=servicesystem;charset=utf8';
    $user = 'root';
    $pass = '';

    $connecto = new PDO($dbname, $user, $pass);
    $connecto->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt_search = $connecto->prepare("SELECT id,name FROM service");
    $stmt_search->execute();
    $row_search = $stmt_search->fetchAll(PDO::FETCH_ASSOC);
    $connecto =null;
} catch (PDOException $ex){
    echo "Error Occured!";
    die($ex->getMessage());
}
?>
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("search_cont");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li>
                                <a class="dropdown-item text-white" aria-current="page" href="services.php">Services</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="register.php">Register</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" aria-current="page" href="about.php">About US</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" style="cursor: pointer;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">Search <i class="fa fa-search"></i></a>
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
<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Search for Service  <i class="fa fa-search"></i></h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <input class="form-control mb-4" type="search" placeholder="Search" aria-label="Search" id="myInput" onkeyup="myFunction()">
        <ul class="navbar-nav justify-content-end flex-grow-1 p-2 pe-3" id="search_cont">
            <?php foreach($row_search as $srch){ ?>
            <li class="nav-item">
                <a class="nav-link mb-3" aria-current="page" style="border: 1px solid;padding: 10px 20px; background-color:#333;border-radius:8px;" href="serviceDetails.php?id=<?php echo $srch['id'] ?>"><?php echo $srch['name']; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>