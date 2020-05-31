<?php
session_start();

if(!isset($_SESSION['password']) ){
    header('Location: login.php');
}
?>
<?php
require_once "../database_connection(xamp)/database1.php";
require_once "../functions/Contact1.php";
$dbconn= Database::getDB();
$c = new Contact($dbconn);

$contacts = $c->listContacts();
?>
<html lang="en">
<head>
    <title>CONTACT US</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/Contact.css"/>
</head>
<body>
<header id="header">

    <nav id="header_nav">
        <img id="logo" src="../images/PROJECT_TASKLIST4/logo.png" id="logo" width="150" height="70" class="left" alt="Paradise restaurant logo" />
        <h3 class="hidden">Main Navigation</h3>
        <ul id="nav_list">
            <li><a href="../admins/home.php"><span class="h_home">HOME</span></a></li>
            <li><a href="../admins/events1.php">EVENTS</a></li>
            <li><a href="../admins/rooms1.php">ROOMS</a></li>
            <li><a href="ContactAdmin.php">CONTACT US</a></li>
        </ul>
    </nav>
</header>
<div class="bg-image"></div>
<div class="bg-text">
<div>
    <p class="h1 text-center">CONTACTS</p>
    <div class="m-1">
        <!--    Displaying Data in Table-->
        <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PHONE NUMBER</th>
            <th scope="col">MESSAGE</th>
            <th scope="col">UPDATE</th>
            <th scope="col">DELETE</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $contact) { ?>
        <tr>
            <th scope="col"><?= $contact->c_id ?></th>
            <td scope="col"><?= $contact->name ?></td>
            <td scope="col"><?= $contact->email ?></td>
            <td scope="col"><?= $contact->phone ?></td>
            <td scope="col"><?= $contact->message ?></td>
            <td>
                <form action="ContactUpdate.php" method="post">
                    <input type="hidden" name="c_id" value="<?= $contact->c_id ?>"/>
                    <input type="submit" class="button btn btn-primary" name="updatecontact" value="Update"/>
                </form>
            </td>
            <td>
                <form action="ContactDelete.php" method="post">
                    <input type="hidden" name="c_id" value="<?= $contact->c_id ?>"/>
                    <input type="submit" class="button btn btn-danger" name="deleteContact" value="Delete"/>
                </form>
            </td>

        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</div>
</div>
    <footer id="footer">
        <h3 id="location">2 ROBSON STREET TORONTO,ON M9X1B2</h3>
        <div class="foot">
            <nav>
                <ul id="foot_list">
                    <li><a href="ContactAdmin.php">CARRERS</a></li>
                    <li><a href="activitiesAdmin.php">ACTIVITIES</a></li>
                    <li><a href="blogsAdmin.php">BLOGS</a></li>
                    <li><a href="feedbackAdmin.php">FEEDBACK</a></li>

                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>