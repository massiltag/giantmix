<?php

if (isset($_REQUEST["action"])) {
    require_once "src/repository/ClientRepository.php";
    $clientDB = new ClientRepository();


    switch ($_REQUEST["action"]) {
        case 'redirect':
            include 'src/view/user/signin.php';
            break;

        case 'register':
            $id = $clientDB->save(new Client(
                $_POST["fname"],
                $_POST["lname"],
                $_POST["mail"],
                $_POST["pwd"]
            ));

            if (str_starts_with($id, "ERR")) {
                $_REQUEST['error_detail'] = $id;
                include 'src/view/_static/messages/signin/failure.php';
            } else {
                include 'src/view/_static/messages/signin/success.php';
            }
            break;

        case 'login':
            $result = $clientDB->login($_POST["mail"], $_POST["pwd"]);
            if ($result->getMail() == "") {
                echo "<h3>Hmm...</h3><h6> Une erreur s'est produite : Identifiants incorrects. <a href='index.php'>Réessayez.</a> </h6>";
            } else {
                session_start();
                $_SESSION["fname"] = $result->getFname();
                $_SESSION["lname"] = $result->getLname();
                clearRequest();
                include "index.php";
                // echo "<h3>Bienvenue</h3><h6>Youpi vous êtes connectés, faut faire une session maintenant.</h6>";
            }
            break;

        case 'logoff':
            $_POST["disconnect"] = "true";
            clearRequest();
            include "index.php";
            break;
    }

}


function clearRequest() {
    unset($_REQUEST["ctl"]);
    unset($_REQUEST["action"]);
}