<?php


if (isset($_REQUEST["action"])) {
    switch ($_REQUEST["action"]) {
        case 'bucket':
            include 'src/view/shop/bucket.php';
            break;
    }

}
