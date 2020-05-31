<?php
include 'header1.php';
?>
<?php
require_once '../admins/Database.php';
require_once '../admins/Event.php';
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

    if ($name !== "" && $date !== "" && $personcount !== "" && $food !== "" && $decoration !== "") {

        $dbcon = Database::getDb();

        $s = new Event($dbcon);

        $count = $s->addEvent($name, $date, $personcount, $food, $decoration);


        if ($count) {
            header("Location: events.php");
        } else {
            echo "problem adding an event";
        }
    }
}

?>

    <!--------------------- main --------------------------->
    <main id="main_content">
        <img id ="room" src="../images/PROJECT_TASKLIST4/home.jpg" alt="image for restaurant home page" />
        <img id="home" src="../images/PROJECT_TASKLIST4/sandals-grenada-pool.jpg" alt="image of reataurant background " />
        <div id="qoute">
            <img id="pattern" src="../images/PROJECT_TASKLIST4/background.png" width="1410" alt="image of a pattern"/>
            <!--<p class="p1">You'll feel great at the moment you walk through our doors.</p><p class="p2"> Rediscover that classic resort experience-the friendly service with us.</p>
-->
        </div>
        <div >


            <!-------------YOUR PART------------------>
            <h1>Come and book our resort for an event and experience our best services.</h1>
            <p>By answering this questions, you can book our resort for an event and even you can get a chance to win a gift.</p>
            <form action="" method="post" name="form_ship">

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
                <button type="submit" name="addEvent"
                        class="btn btn-primary float-right" id="btn-submit">
                    Book Event
                </button>

        </div>
    </main>
    <section id="contact">
        <img class="c_img" src="../images/PROJECT_TASKLIST4/1958364874dbd3456967a9ba6c753945.jpg" height="100" alt="images of logo of facebook,twiteer and instagram">
    </section>
<?php
include 'footer.php';
?>

