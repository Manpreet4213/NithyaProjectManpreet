<?php
require_once 'Database.php';
require_once 'Room.php';
$id = $type = $building = $availability = "";
if(isset($_POST['updateRoom'])) {
    $id= $_POST['id'];

    $dbcon = Database::getDb();
    $room = new Room($dbcon);

    $rooms = $room->showRoom($id);



    $id = $rooms->id;
    $type =  $rooms->type;
    $building = $rooms->building;
    $availability = $rooms->availability;

}
if(isset($_POST['updateRoom2'])) {
    $type = $_POST['type'];
    $building = $_POST['building'];
    $availability = $_POST['availability'];
    $id = $_POST['eid'];


    $dbcon = Database::getDb();

    $room = new Room($dbcon);

    $count = $room->updateRoom($type, $building, $availability, $id);

    if($count){
        header("Location: rooms1.php");
    } else {
        echo "There is a problem in updating a room";
    }
}

?>
<html lang="en">

<head>
    <title>Update Room - Paradise resort</title>
    <meta name="description" content="Paradise resort">
    <meta name="keywords" content="Rooms booking">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Update  Event -->
    <form action="" method="post">
        <input type="hidden" name="eid" value="<?=  $id; ?>" />
        <div class="form-group">
            <label for="type">Type :</label>
            <input type="text" class="form-control" name="type" id="type" value="<?= $type; ?>"
                   placeholder="Enter type">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="building">Building :</label>
            <input type="text" class="form-control" id="building" name="building"
                   value="<?= $building; ?>" placeholder="Enter building">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="availability">Availability :</label>
            <input type="text" name="availability" value="<?= $availability; ?>" class="form-control"
                   id="availability" placeholder="Enter availability>
            <span style="color: red">

            </span>
        </div>

        <a href="rooms1.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updateRoom2"
                class="btn btn-primary float-right" id="btn-submit">
            Update Room
        </button>
    </form>
</div>


</body>
</html
