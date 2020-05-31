<?php

if (isset($_POST['deleteContact'])) {
    require_once '../database_connection(xamp)/database1.php';
    require_once '../functions/Contact1.php';
    $c_id = $_POST['c_id'];
    $dbconn = Database::getDB();

    $c = new Contact($dbconn);

    $count = $c->deleteContact($c_id);
    if ($count) {
        header("Location: ContactAdmin.php");
    } else {
        echo "not able to delete";
    }

}