<?php

require_once "src/repository/ProductRepository.php";
$productDB = new ProductRepository();

if (isset($_REQUEST["action"])) {
    switch ($_REQUEST["action"]) {
        case 'bucket':
            include 'src/view/shop/bucket.php';
            break;

        case 'search':
            include 'src/view/shop/shop.php';
            echo
                '<div class="py-5">
                    <div class="row hidden-md-up">';

            $nom = isset($_GET["nom"]) ? $_GET["nom"] : "";
            $fabricant = isset($_GET["fabricant"]) ? $_GET["fabricant"] : "";
            $prix = isset($_GET["prix"]) ? $_GET["prix"] : "";
            $categorie = isset($_GET["categorie"]) ? $_GET["categorie"] : "";
            $etat = isset($_GET["etat"]) ? $_GET["etat"] : "";


            $array = ($_GET["type"] == "keyword") ?
                $productDB->findProductsByKeyword($_GET["keyword"]) :
                $productDB->findProductsByMultipleCriterias($nom, $fabricant, $prix, $categorie, $etat);

            foreach ($array as $entry) {
                echo '
                        <div class="col-md-4"> <!-- A RÉPLIQUER -->
                            <div class="card">
                                <img class="card-img-top" src="assets/logo.png" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title product-name">' . $entry->getNom() . '</h5>
                                    <small class="text-muted price">' . $entry->getPrix() . ' €</small>
                                    <p class="card-text product-description">
                                        <ul>
                                            <li>Catégorie : '. $entry->getCategorie() . '</li>
                                            <li>Fabricant : '. $entry->getFabricant() . '</li>
                                            <li>État : '. $entry->getEtat() . '</li>' .
                                    '   </ul>
                                     </p>
                                    <a href="#" class="btn btn-primary submit">Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    ';
            }

            echo
                '   </div>
                </div>';
            break;
    }

}