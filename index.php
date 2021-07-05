<?php
    if (session_status() !== PHP_SESSION_ACTIVE)
        session_start();

    if (isset($_POST["disconnect"]) || !isset($_SESSION["fname"])) {
        unset($_POST["disconnect"]);
        session_destroy();
    }

?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery -->
        <script src="lib/jquery.min.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Our files -->
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
    </head>

    <body class="container">

        <?php
            include 'src/view/_static/navbar.php'
        ?>


        <div class="content">
            <?php
                if(isset($_REQUEST["ctl"])){
                    switch ($_REQUEST["ctl"]) {
                        case 'client':
                            include 'src/controllers/ClientController.php';
                            break;
                        case 'shop':
                            include 'src/controllers/ShopController.php';
                            break;
                        case 'bucket':
                            include 'src/controllers/BucketController.php';
                            break;
                        case 'order':
                            include 'src/controllers/OrderController.php';
                            break;
                    }
                } else {
                    if (session_status() === PHP_SESSION_ACTIVE) {
                        include 'src/view/shop/shop.php';
                    } else {
                        include 'src/view/user/login.php';
                    }
                }
            ?>
        </div>

        <?php
        include 'src/view/_static/footer.php'
        ?>

    </body>
</html>
