<?php

if (isset($_POST['deleteCareer'])) {
    require_once '../database_connection(xamp)/database1.php';
    require_once '../functions/Career1.php';
    $id = $_POST['id'];
    $dbconn = Database::getDB();

    $c = new Career($dbconn);

    $count = $c->deleteCareer($id);
    if ($count) {
        header("Location: CareerAdmin.php");
    } else {
        echo "not able to delete";
    }

}