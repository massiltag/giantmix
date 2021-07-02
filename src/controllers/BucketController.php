<?php

if (isset($_REQUEST["action"])) {
    switch ($_REQUEST["action"]) {
        case 'add':
            $produit = $_REQUEST["product"];
            echo "Votre produit : ". $produit . " a été ajouté dans votre panier";

            //rechercher dans le panier si y a déjà le produit
            if($redis->hexists('panier', $produit) == 1){
                $redis->hincrby("panier", $produit, 1);
            }
            else {
                $redis->hgetall('panier');
                $redis->hset('panier', $produit, 1);
            }
            $redis->expire('panier', 300);

            include 'src/view/shop/shop.php';
            break;

        case 'increment':
            $produit = $_REQUEST["product"];
            if($redis->hexists('panier', $produit) == 1){
                $redis->hincrby("panier", $produit, 1);
            } else {
                echo "Le produit a expiré.";
            }
            include 'src/view/shop/bucket.php';
            break;


        case 'decrement':
            $produit = $_REQUEST["product"];
            if($redis->hexists('panier', $produit) == 1){
                if($redis->hget("panier", $produit) == 1) {
                    $redis->hdel("panier", $produit);
                }
                else {
                    $redis->hincrby("panier", $produit, -1);
                }
            } else {
                echo "Le produit a expiré.";
            }
            include 'src/view/shop/bucket.php';
            break;


        case 'delete':
            $produit = $_REQUEST["product"];
            if($redis->hexists('panier', $produit) == 1){
                $redis->hdel("panier", $produit);
            } else {
                echo "Le produit a expiré.";
            }
            include 'src/view/shop/bucket.php';
            break;

    }
}



?>