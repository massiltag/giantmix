<?php


if (isset($_REQUEST["action"])) {
    switch ($_REQUEST["action"]) {
        case 'redirect':
            include 'src/view/shop.php';
            break;
    }

}
