<?php

date_default_timezone_set('Europe/Paris');
require_once("src/model/Order.php");

require_once "src/repository/OrderRepository.php";
require_once "src/repository/CartRepository.php";
require_once "src/repository/ProductRepository.php";
$orderDB = new OrderRepository();
$cartDB = new CartRepository();
$productDB = new ProductRepository();

if (isset($_REQUEST["action"])) {

    switch ($_REQUEST["action"]) {
        case 'save':
            $id = $orderDB->save(new Order(
                $_SESSION["fname"],
                $_SESSION["lname"],
                $_SESSION["mail"],
                date("Y-m-d H:i:s"),
                $cartDB->hgetall("panier"),
                $_GET['total']
            ));
            $cartDB->del("panier");
            unset($_GET['total']);
            include 'src/view/shop/cart.php';
            break;

        case 'list':
            include 'src/view/shop/orders.php';

            $result = $orderDB->listOrders($_SESSION['mail']);

            echo '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Contenu</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>';

            $i = 0;
            foreach ($result as $entry) {
                $i++;
                $content = "<ul>";

                foreach ($entry->getItemList() as $key=>$value) {
                    $content = $content . "<li>" . $productDB->findProductById($key)->getNom() . ' x' . $value . ", PU = " . $productDB->findProductById($key)->getPrix() . " €</li>";
                }

                $content = $content . "</ul>";

                echo '<tr>
                        <th scope="row">' . $i . '</th>
                        <td>' . $entry->getDate() .'</td>
                        <td>' . $content .'</td>
                        <td>' . $entry->getTotal() .' €</td>
                      </tr>';
            }

            echo '    </tbody>
                  </table>';
            break;

    }
}
