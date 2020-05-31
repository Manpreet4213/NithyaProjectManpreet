<?php
include 'header2.php';
?>
<?php
require_once '../admins/Database2.php';
require_once '../admins/Room.php';
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

    if (empty($type)) {
        $typeerror = "Please enter your type for room";
    }
    if (empty($buildinh)) {
        $buildingerror = "Please enter building type for room.";
    }
    if (empty($availability)) {
        $availabilityerror = "Please enter your availability choice";
    }
    if ($type !== "" && $building !== "" && $availability !== "") {
        $dbcon = Database::getDb();

        $s = new Room($dbcon);

        $count = $s->addRoom($type, $building, $availability);

        if ($count) {
            header("Location: rooms.php");
        } else {
            echo "problem adding a room";
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
            <h1>Get luxurious rooms in our resort and spend a great time with your family, lovables and partners!!</h1>
            <p>By answering this questions, you can book our resort for an event and even you can get a chance to win a gift.</p>
            <form action="" method="post" name="form_ship">


                <div class="form-group">
                    <label for="type">Room Type(According to your needs) :</label>
                    <input type="text" name="type" value="" class="form-control"
                           id="type" placeholder="Enter type">
                    <span id="typeerror" style="color: red"><?= $typeerror; ?>

		</span>
                </div>
                <div class="form-group">
                    <label for="building">Room Building(You can give your preference) :</label>
                    <input type="text" class="form-control" id="building" name="building"
                           value="" placeholder=" Enter building">
                    <span id="buildingerror" style="color: red"><?= $buildingerror; ?>

		</span></div>
                <div class="form-group">
                    <label for="availability">Availability :</label>
                    <input type="text" class="form-control" name="availability" id="availability" value=""
                           placeholder="Enter availability">
                    <span id="availabilityerror" style="color: red"><?= $availabilityerror; ?>

		</span>
                </div>
        <div>

        <button type="submit" name="addRoom"
                class="btn btn-primary float-right" id="btn-submit">
            Book Room
        </button>
        </div>
        </form>
        </div>
    </main>
    <section id="contact">
        <img class="c_img" src="../images/PROJECT_TASKLIST4/1958364874dbd3456967a9ba6c753945.jpg" height="100" alt="images of logo of facebook,twiteer and instagram">
    </section>

<?php
include 'footer.php';
?>