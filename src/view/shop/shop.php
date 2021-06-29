<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Boutique</title>

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
            .price {
                display: inline;
                margin: auto;
                right: 20px;
                position: absolute;
                font-weight: bolder;
            }

            .py-5 {
                padding: 1rem 0 1rem!important;
            }
        </style>

        <script>
            function multiplyNode(node, count, deep) {
                for (var i = 0, copy; i < count - 1; i++) {
                    copy = node.cloneNode(deep);
                    node.parentNode.insertBefore(copy, node);
                }
            }
        </script>
    </head>

    <body class="container" onload="multiplyNode(document.getElementsByClassName('col-md-4')[0], 7, true);">

        <ul class="nav nav-tabs">
            <li class="nav-item" onclick="setActive('elt1')">
                <a class="nav-link active" id="elt1" href="#">Fruits</a>
            </li>
            <li class="nav-item" onclick="setActive('elt2')">
                <a class="nav-link" id="elt2" href="#">Légumes</a>
            </li>
            <li class="nav-item" onclick="setActive('elt3')">
                <a class="nav-link" id="elt3" href="#">Céréales</a>
            </li>
<!--            <li class="nav-item"onclick="setActive('elt4')">-->
<!--                <a class="nav-link disabled" id="elt4" href="#" tabindex="-1" aria-disabled="true">Trucs pas bons</a>-->
<!--            </li>-->
        </ul>

        <div class="py-5">
            <div class="row hidden-md-up">
                <div class="col-md-4"> <!-- A RÉPLIQUER -->
                    <div class="card">
                        <img class="card-img-top" src="assets/logo.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title product-name">Produit</h5>
                            <small class="text-muted price">5 $</small>
                            <p class="card-text product-description">Petite description du produit, c'est très bon et pas du tout cher, achetez le. Merci bien.</p>
                            <a href="#" class="btn btn-primary submit">Ajouter au panier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
