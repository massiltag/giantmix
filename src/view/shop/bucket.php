<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panier</title>

        <!-- jQuery -->
        <script src="lib/jquery.min.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Our files -->
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>

        <style>

            .product-name {
                display: inline;
            }

            .product-description {
                margin-top: 10px;
            }

            .quantity {
                display: inline;
                margin: auto;
                right: 20px;
                position: absolute;
                font-weight: bolder;
            }

            .py-5 {
                padding: 1rem 0 1rem!important;
            }

            .entry {
                display: flex;
                flex-direction: row;
            }

            .entry div {
                flex: 80;
            }

            .entry img {
                flex: 20;
                width: auto;
                max-width: 100px;
                max-height: 100px;
                display: block;
                margin: auto auto auto 10px;
            }

            .card .btn-del {
                background-color: red;
                border: 1px solid red;
            }

            .bucket {
                border: none;
                background: none;
            }

            .bucket .card-header {
                background: none;
            }

        </style>

    </head>

    <body class="container" <!--onload="multiplyNode(document.getElementsByClassName('col-md-12')[0], 3, true);" -->

        <h3>Panier de <?php echo $_SESSION["fname"] ?></h3>
        <div class="py-5">
            <div class="row hidden-md-up">
                <div class="col-md-12"> <!-- A RÉPLIQUER -->
                    <?php

                    $keys = $redis->hkeys('panier');
                    foreach($keys as $key) {
                        echo '<div class="card entry">
                        <img class="card-img-right" src="assets/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title product-name">'. $key .'</h5>
                            <small class="text-muted quantity">'. $redis->hGet('panier', $key) .'</small>
                            <p class="card-text product-description">Petite description du produit, c\'est très bon et pas du tout cher, achetez le. Merci bien.</p>
                            <a href="index.php?ctl=bucket&action=decrement&product='. $key .'" class="btn btn-primary submit">-</a>
                            <a href="index.php?ctl=bucket&action=increment&product='. $key .'" class="btn btn-success submit">+</a>
                            <a href="index.php?ctl=bucket&action=delete&product='. $key .'" class="btn btn-del btn-primary submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </div>
                    </div>';
                    }
                    ?>

                </div>
            </div>
        </div>


        <div class="card bucket">
            <h5 class="card-header">Total de vos achats</h5>
            <div class="card-body">
                <?php
                if($redis->exists("panier") == 1){
                    echo '<a href="index.php?ctl=order&action=confirm" class="btn submit btn-outline-success">Passer la commmande</a>';
                }
                else {
                    echo 'Votre panier est vide.';
                }
                ?>
            </div>
            <small class="text-muted quantity" style="top: 10px">0 €</small>
        </div>

    </body>
</html>
