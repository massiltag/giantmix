<?php

require_once "src/repository/ProductRepository.php";
$productDB = new ProductRepository();

if (isset($_REQUEST["action"])) {
    switch ($_REQUEST["action"]) {
        case 'cart':
            include 'src/view/shop/cart.php';
            break;

        case 'search':
            include 'src/view/shop/shop.php';
            echo
                '<div class="py-5">
                    <div class="row hidden-md-up">';

            $nom = isset($_GET["nom"]) ? $_GET["nom"] : "";
            $fabricant = isset($_GET["fabricant"]) ? $_GET["fabricant"] : "";
            $prixmin = isset($_GET["prixmin"]) ? ($_GET["prixmin"] != "" ? (int) $_GET["prixmin"] : 0) : 0;
            $prixmax = isset($_GET["prixmax"]) ? ($_GET["prixmax"] != "" ? (int) $_GET["prixmax"] : 9999) : 9999;
            $categorie = isset($_GET["categorie"]) ? $_GET["categorie"] : "";
            $etat = isset($_GET["etat"]) ? $_GET["etat"] : "";

            if ($nom=="" && $fabricant=="" && $prixmin==0 && $prixmax>=9999 && $categorie=="" && $etat=="") {
                $array = $productDB->findAll();
            }
            else if (isset($_GET["type"]))
                $array = ($_GET["type"] == "keyword") ?
                    $productDB->findProductsByKeyword($_GET["keyword"]) :
                    $productDB->findProductsByMultipleCriterias($nom, $fabricant, $prixmin, $prixmax, $categorie, $etat);

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
                                    <a href="index.php?ctl=cart&action=add&product=' . $entry->getId() . '&nom=' . $nom . '&fabricant=' . $fabricant . '&prixmin=' . $prixmin . '&prixmax=' . $prixmax . '&categorie=' . $categorie . '&etat=' . $etat . '&reloadSearch=' . $entry->getNom() . '" class="btn btn-primary submit">Ajouter au panier</a>
                                </div>
                            </div>
                        </div>
                    ';
            }

            echo
                '   </div>
                </div>';
            unset($_GET);
            break;



    }

}