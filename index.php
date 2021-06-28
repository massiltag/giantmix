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
            include 'src/view/static/navbar.php'
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
                    }
                } else include 'src/view/user/login.php'
            ?>
        </div>

        <?php
            include 'src/view/static/footer.php'
        ?>

    </body>
</html>
