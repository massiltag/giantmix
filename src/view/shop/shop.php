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

            .form-row .col-md-3 {
                margin-top: 10px;
            }

            .card-header {
                background-color: rgb(116, 112, 239);
                color: whitesmoke;
            }
        </style>

    </head>

    <body class="container">

        <?php echo "<h3>Bienvenue, " . $_SESSION["fname"] . "</h3>"; ?>
        <p class="text-muted">Lancez une recherche.</p>

        <div class="card">
            <h5 class="card-header">Recherche multi-critères</h5>
            <div class="card-body">
                <form action="index.php" method="get">

                    <input type="hidden" name="ctl" value="shop">
                    <input type="hidden" name="action" value="search">
                    <input type="hidden" name="type" value="multi">

                    <div class="form-row">
                        <div class="col">
                            <label for="fname">Nom</label>
                            <input type="text" id="fname" name="nom" class="form-control" placeholder="Nom de la console">
                        </div>
                        <div class="col">
                            <label for="ffabricant">Fabricant</label>
                            <input type="text" id="ffabricant" name="fabricant" class="form-control" placeholder="Nom du fabricant">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="fprixmin">P. min.</label>
                            <input type="number" id="fprixmin" name="prixmin" class="form-control" placeholder="Prix minimum">
                        </div>
                        <div class="col-md-3">
                            <label for="fprixmax">P. max.</label>
                            <input type="number" id="fprixmax" name="prixmax" class="form-control" placeholder="Prix maximum">
                        </div>
                        <div class="col-md-3">
                            <label for="fcat">Catégorie</label>
                            <select id="fcat" name="categorie" class="form-control">
                                <option selected></option>
                                <option>Moderne</option>
                                <option>Rétro</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="fetat">État</label>
                            <select id="fetat" name="etat" class="form-control">
                                <option selected></option>
                                <option>Neuf</option>
                                <option>Reconditionné</option>
                            </select>
                        </div>
                    </div>

                    <button style="margin-top: 20px" type="submit" class="btn submit btn-outline-success">Rechercher</button>
                </form>
            </div>
            <small class="text-muted price" style="top: 17px">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </small>
        </div>

        <?php
            if (isset($_GET["keyword"]))
                echo '<p>Voici le résultat de votre recherche pour le mot clé "' . $_GET["keyword"] . '".</p>';
        ?>

    </body>

</html>
