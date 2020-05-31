<?php
require_once 'Database2.php';
require_once 'Room.php';
$typeerror = "";
$buildingerror = "";
$availabilityerror = "";

$type = "";
$building = "";
$availability = "";

if(isset($_POST['addRoom'])) {
    $type = $_POST['type'];
    $building = $_POST['building'];
    $availability = $_POST['availability'];
    //for validation
    if (empty($type)) {
        $typeerror = "Please enter your type for room";
    }
    if (empty($buildinh)) {
        $buildingerror = "Please enter building type for room.";
    }
    if (empty($availability)) {
        $availabilityerror = "Please enter your availability choice";
    }
    //if everything is ok, then do this.
    if ($type !== "" && $building !== "" && $availability !== "") {

    $dbcon = Database::getDb();

    $s = new Room($dbcon);

    $count = $s->addRoom($type, $building, $availability);


    if($count){
        header("Location: rooms1.php");
    } else {
        echo "problem adding a room";
    }
}}

?>



<html lang="en">

<head>
    <title>Add Room - Paradise resort</title>
    <meta name="description" content="Paradise resort">
    <meta name="keywords" content="Room booking">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Add  room -->
    <form action="" method="post">

        <div class="form-group">
            <label for="type">Type :</label>
            <input type="text" class="form-control" name="type" id="type" value=""
                   placeholder="Enter type">
            <span id="typeerror" style="color: red"><?= $typeerror; ?>

		</span>
        </div>
        <div class="form-group">
            <label for="building">Building :</label>
            <input type="text" class="form-control" id="building" name="building"
                   value="" placeholder="Enter building">
            <span id="buidingerror" style="color: red"><?= $buildingerror; ?>

		</span>
        </div>
        <div class="form-group">
            <label for="availability">Availability :</label>
            <input type="text" name="availability" value="" class="form-control"
                   id="availability" placeholder="Enter availability">
            <span id="availabilityerror" style="color: red"><?= $availabilityerror; ?>

		</span>
        </div>
        <a href="rooms1.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addRoom"
                class="btn btn-primary float-right" id="btn-submit">
            Add Room
        </button>
    </form>
</div>


</body>
</html

