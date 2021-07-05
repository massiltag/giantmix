<?php

require_once "src/repository/CartRepository.php";
$cartDB = new CartRepository();

if (isset($_REQUEST["action"])) {
    switch ($_REQUEST["action"]) {
        case 'add':
            $produit = $_REQUEST["product"];
            echo "Votre produit : ". $produit . " a été ajouté dans votre panier";

            $cartDB->addProduct($produit);

            include 'src/view/shop/shop.php';
            break;

        case 'increment':
            $produit = $_REQUEST["product"];
            $cartDB->increment($produit);
            include 'src/view/shop/cart.php';
            break;


        case 'decrement':
            $produit = $_REQUEST["product"];
            $cartDB->decrement($produit);
            include 'src/view/shop/cart.php';
            break;


        case 'delete':
            $produit = $_REQUEST["product"];
            $cartDB->delete($produit);
            include 'src/view/shop/cart.php';
            break;

    }
}



?>