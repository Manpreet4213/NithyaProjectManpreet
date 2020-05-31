<?php
session_start();

if(!isset($_SESSION['password']) ){
    header('Location: login.php');
}
?>

<?php
include 'header4.php';
?>
<?php
require_once 'Database.php';
require_once 'Event.php';

$dbcon = Database::getDb();
$s = new Event($dbcon);

$events = $s->listEvents();



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
            <p class="h1 text-center">Paradise resort</p>
            <p class="h1 text-center">List of all the events for which the resort is booked!!</p>
            <div class="m-1">
                <!--    Displaying Data in Table-->
                <table class="table table-bordered tbl">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">date</th>
                        <th scope="col">personcount</th>
                        <th scope="col">food</th>
                        <th scope="col">decoration</th>
                        <th scope="col">update</th>
                        <th scope="col">delete</th>
                    </tr>
                    </thead>
                    <?php foreach ($events as $event) { ?>
                        <tr>
                            <th><?= $event['id'] ?></th>
                            <td><?= $event['name'] ?></td>
                            <td><?= $event['date'] ?></td>
                            <td><?= $event['personcount'] ?></td>
                            <td><?= $event['food'] ?></td>
                            <td><?= $event['decoration'] ?></td>
                            <td>
                                <form action="updateEvent.php" method="post">
                                    <input type="hidden" name="id" value="<?= $event['id'] ?>"/>
                                    <input type="submit" class="button btn btn-primary" name="updateEvent" value="Update"/>
                                </form>
                            </td>
                            <td>
                                <form action="deleteEvent.php" method="post">
                                    <input type="hidden" name="id" value="<?= $event['id'] ?>"/>
                                    <input type="submit" class="button btn btn-danger" name="deleteEvent" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <a href="addEvent.php" id="btn_addEvent" class="btn btn-success btn-lg float-right">Add Event</a>



            </div>
    </main>
    <section id="contact">
        <img class="c_img" src="../images/PROJECT_TASKLIST4/1958364874dbd3456967a9ba6c753945.jpg" height="100" alt="images of logo of facebook,twiteer and instagram">
    </section>

<?php
include 'footerAdmin.php';
?>