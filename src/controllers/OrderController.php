<?php

date_default_timezone_set('Europe/Paris');
require_once("src/model/Order.php");

if (isset($_REQUEST["action"])) {
    require_once "src/repository/OrderRepository.php";
    $orderDB = new OrderRepository();

    switch ($_REQUEST["action"]) {
        case 'confirm':
            $id = $orderDB->confirm(new Order(
                $_SESSION["fname"],
                $_SESSION["lname"],
                $_SESSION["mail"],
                date("Y-m-d H:i:s"),
                $redis->hgetall("panier")

            ));
            $redis->del("panier");
            include 'src/view/shop/bucket.php';
            break;

        case 'listOrders':
            $result = $orderDB->listOrders($_SESSION['mail'], $_SESSION['fname'], $_SESSION['lname']);

            foreach ($result as $entry) {
                print_r($entry.getFname());
            }
            include 'src/view/shop/orders.php';
            break;

    }
}
