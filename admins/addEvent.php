<?php
require_once 'Database.php';
require_once 'Event.php';
$nameerror = "";
$dateerror = "";
$personcounterror = "";
$decorationerror = "";
$fooderror = "";
$decorationname = "";
$name = "";
$date = "";
$personcount = "";
$food = "";
$decoration = "";

if(isset($_POST['addEvent'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $personcount = $_POST['personcount'];
    $food = $_POST['food'];
    $decoration = $_POST['decoration'];
    $name_pattern = "/^[a-zA-Z ]*$/";
    //for validation
    if (!preg_match($name_pattern, $name)) {
        $nameerror = "First Name should contain alphabets and spaces only";
    }else if(empty($name)) {
        $nameerror = "Please enter your name.";
    }

    if ($date == "") {
        $dateerror = "Please enter date";
    } else {
        $dateerror = "";
    }
    if (empty($food)) {
        $fooderror = "Please enter your food choice";
    }
    if (empty($personcount)) {
        $personcounterror = "Please enter personcount for the event.";
    }
    if (empty($decoration)) {
        $decorationerror = "Please enter your decoration choice";
    }
   //if everything is ok, then add the event to the database
    if ($name !== "" && $date !== "" && $personcount !== "" && $food !== "" && $decoration !== "") {

    $dbcon = Database::getDb();

    $s = new Event($dbcon);

    $count = $s->addEvent($name, $date, $personcount, $food, $decoration);


    if($count){
        header("Location: events1.php");
    } else {
        echo "problem adding an event";
    }
}}

?>



<html lang="en">

<head>
    <title>Add Event - Paradise resort</title>
    <meta name="description" content="Paradise resort">
    <meta name="keywords" content="Events booking">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>

<body>

<div>
    <!--    Form to Add  event -->
    <form action="" method="post">

        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" id="name" value=""
                   placeholder="Enter name">
            <span id="nameerror" style="color: red"><?= $nameerror; ?>

		</span>
        </div>
        <div class="form-group">
            <label for="date">Date :</label>
            <input type="text" class="form-control" id="date" name="date"
                   value="" placeholder="Enter date">
            <span id="dateerror" style="color: red"><?= $dateerror; ?>

		</span>
        </div>
        <div class="form-group">
            <label for="personcount">Personcount :</label>
            <input type="text" name="personcount" value="" class="form-control"
                   id="personcount" placeholder="Enter personcount">
            <span id="personcounterror" style="color: red"><?= $personcounterror; ?>

		</span>
        </div>
        <div class="form-group">
            <label for="food">Food :</label>
            <input type="text" class="form-control" id="food" name="food"
                   value="" placeholder="Enter food">
            <span id="fooderror" style="color: red"><?= $fooderror; ?>

		</span>
        </div>
        <div class="form-group">
            <label for="decoration">Decoration :</label>
            <input type="text" class="form-control" id="decoration" name="decoration"
                   value="" placeholder="Enter decoration">
            <span id="decorationerror" style="color: red"><?= $decorationerror; ?>

		</span>
        </div>
        <a href="events1.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addEvent"
                class="btn btn-primary float-right" id="btn-submit">
            Add Event
        </button>
    </form>
</div>


</body>
</html
