<?php
//for deleting an event
require_once 'Database.php';
require_once 'Event.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $dbcon = Database::getDb();
    $s = new Event($dbcon);

    $count = $s->deleteEvent($id);


    if ($count) {
        header("Location: events1.php");
    } else {
        echo "problem deleting an event";
    }
}