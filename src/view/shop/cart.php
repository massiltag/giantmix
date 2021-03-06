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

            .cart {
                border: none;
                background: none;
            }

            .cart .card-header {
                background: none;
            }

            .cart-btn {
                float: right;
                margin-left: 5px;
            }

        </style>

    </head>

    <body class="container"> <!--onload="multiplyNode(document.getElementsByClassName('col-md-12')[0], 3, true);" -->

        <h3>Panier de <?php echo $_SESSION["fname"] ?></h3>
        <div class="py-5">
            <div class="row hidden-md-up">
                <div class="col-md-12"> <!-- A R??PLIQUER -->
                    <?php

                    require_once "src/repository/CartRepository.php";
                    require_once "src/repository/ProductRepository.php";
                    $cartDB = new CartRepository();
                    $productDB = new ProductRepository();

                    $keys = $cartDB->hkeys('panier');

                    $prixTotal = 0;
                    foreach($keys as $key) {
                        $product = $productDB->findProductById($key);
                        $prixTotal += $product->getPrix() * $cartDB->getQty($key);

                        echo '<div class="card entry">
                        <img class="card-img-right" src="assets/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title product-name">'. $product->getNom() .'</h5>
                            <small class="text-muted quantity">'. $product->getPrix() . '??? ?? ' . $cartDB->hGet('panier', $key) .'</small>
                            <p class="card-text product-description"> Fabricant : ' . $product->getFabricant() . '. Cat??gorie = ' . $product->getCategorie() .'. ??tat : ' . $product->getEtat() .'.</p>
                            
                            
                            <a href="index.php?ctl=cart&action=increment&product='. $key .'" class="btn btn-success cart-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg>
                            </a>
                            
                            <a href="index.php?ctl=cart&action=decrement&product='. $key .'" class="btn btn-primary cart-btn"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-dash" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                                </svg>
                            </a>
                            
                            <a href="index.php?ctl=cart&action=delete&product='. $key .'" class="btn btn-del btn-primary cart-btn">
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


    <?php
        if($cartDB->exists("panier") == 1){
            echo '    <div class="card cart">
                        <h5 class="card-header">Valider vos achats</h5>
                        <div class="card-body">';
            echo '      <a href="index.php?ctl=order&action=save&total=' . $prixTotal . '" class="btn submit btn-outline-success">Passer la commmande</a>';
            echo '    </div>
                      <small class="text-muted quantity" style="top: 10px">' . $prixTotal . '</small>
                      </div>';
        }
        else {
            echo '<div class="card cart">
                    <h5 class="card-header">Vos achats</h5>
                    <div class="card-body">
                        <p>Votre panier est vide.</p>
                    </div>
                    <small class="text-muted quantity" style="top: 10px"></small>
                  </div>';
        }
    ?>

    </body>
</html>
