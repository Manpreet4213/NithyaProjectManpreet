<?php
require_once 'Database.php';
require_once 'Event.php';
$id = $name = $date = $personcount = $food = $decoration = "";
if(isset($_POST['updateEvent'])) {
    $id= $_POST['id'];

    $dbcon = Database::getDb();
    $event = new Event($dbcon);

    $events = $event->showEvent($id);



    $id = $events->id;
    $name =  $events->name;
    $date = $events->date;
    $personcount = $events->personcount;
    $food = $events->food;
    $decoration = $events->decoration;

}
if(isset($_POST['updateEvent2'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $personcount = $_POST['personcount'];
    $food = $_POST['food'];
    $decoration = $_POST['decoration'];
    $id = $_POST['rid'];


    $dbcon = Database::getDb();

    $event = new Event($dbcon);

    $count = $event->updateEvent($name, $date, $personcount, $food, $decoration, $id);

    if($count){
        header("Location: events1.php");
    } else {
        echo "There is a problem in updating an event";
    }
}

?>

<html lang="en">

<head>
    <title>Update Event - Paradise resort</title>
    <meta name="description" content="Paradise resort">
    <meta name="keywords" content="Events booking">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Update  Event -->
    <form action="" method="post">
        <input type="hidden" name="rid" value="<?=  $id; ?>" />
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>"
                   placeholder="Enter name">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="text" class="form-control" id="date" name="date"
                   value="<?= $date; ?>" placeholder="Enter date">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="personcount">Personcount :</label>
            <input type="text" name="personcount" value="<?= $personcount; ?>" class="form-control"
                   id="program" placeholder="Enter personcount">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="date">Food :</label>
            <input type="text" class="form-control" id="food" name="food"
                   value="<?= $food; ?>" placeholder="Enter food type">
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="decoration">Decoration :</label>
            <input type="text" class="form-control" id="decoration" name="decoration"
                   value="<?= $decoration; ?>" placeholder="Enter decoration">
            <span style="color: red">

            </span>
        </div>
        <a href="events1.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updateEvent2"
                class="btn btn-primary float-right" id="btn-submit">
            Update Event
        </button>
    </form>
</div>


</body>
</html
