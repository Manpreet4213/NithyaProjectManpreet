<?php
//for deleting a room
require_once 'Database2.php';
require_once 'Room.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $dbcon = Database::getDb();
    $s = new Room($dbcon);

    $count = $s->deleteRoom($id);


    if ($count) {
        header("Location: rooms1.php");
    } else {
        echo "problem deleting a room.";
    }
}