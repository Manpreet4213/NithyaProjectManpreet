<?php
//var_dump($_POST);
//echo "hello";
require_once "../database_connection(xamp)/database1.php";
require_once "../functions/Contact1.php";
$name = $email = $phone= $message = "";
if (isset($_POST['updatecontact'])) {
    var_dump($_POST);
    echo"hello";
    $c_id = $_POST['c_id'];

    $dbconn = Database::getDB();
    $c = new Contact($dbconn);

    $contacts = $c->updatecontact($c_id);

    $name = $contacts->name;
    $email = $contacts->email;
    $phone = $contacts->phone;
    $message = $contacts->message;
    var_dump($contacts);
}
if (isset($_POST['updatecontact3']))
{
    $c_id= $_POST['c_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone= $_POST['phone'];
    $message = $_POST['message'];

    $dbconn = Database::getDB();

    $c = new Contact($dbconn);

    $count = $c->updatecontact2($c_id, $name, $email, $phone, $message);

    if ($count) {
        header("Location:ContactAdmin.php");
    } else {
        echo "not able to update";
    }

}
?>
<html lang="en">

<head>
    <title>UPDATE CONTACT DETAILS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/Contact.css"/>
</head>

<body>
<header id="header">

    <nav id="header_nav">
        <img id="logo" src="../images/PROJECT_TASKLIST4/logo.png" id="logo" width="150" height="70" class="left" alt="Paradise restaurant logo" />
        <h3 class="hidden">Main Navigation</h3>
        <ul id="nav_list">
            <li><a href="home.php"><span class="h_home">HOME</span></a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">RESORT-DINING</a></li>
            <li><a href="events1.php">EVENTS</a></li>
            <li><a href="rooms1.php">ROOMS</a></li>
            <li><a href="#">TOURISM</a></li>
        </ul>
    </nav>
</header>
<div class="bg-image"></div>
<div class="bg-text">
<div>
    <!--    Form to Update office -->
    <form action="" method="post">
        <input type="hidden" name="c_id" value="<?= $c_id; ?>" />
        <div class="form-group">
            <label for="name">NAME :</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $name; ?>" placeholder="Enter Name">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="phone">PHONE :</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $phone; ?>" placeholder="Enter Phone">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="email">EMAIL:</label>
            <input type="text" name="email" value="<?= $email; ?>" class="form-control" id="email" placeholder="Enter Email">
            <span style="color: red"></span>
        </div>
        <div class="form-group">
            <label for="message">MESSAGE:</label>
            <input type="text" class="form-control" name="message" id="message" value="<?= $message; ?>" placeholder="Enter Message">
            <span style="color: red"></span>
        </div>
        <a href="ContactAdmin.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updatecontact3" class="btn btn-primary float-right" id="btn-submit">UPDATE CONTACT</button>
    </form>
</div>
</div>
<footer id="footer">
    <h3 id="location">2 ROBSON STREET TORONTO,ON M9X1B2</h3>
    <div class="foot">
        <nav>
            <ul id="foot_list">
                <li><a href="#">CARRERS</a></li>
                <li><a href="#">ACTIVITIES</a></li>
                <li><a href="#">BLOGS</a></li>
                <li><a href="#">FEEDBACK</a></li>
                <li><a href="#">HELP</a></li>
                <li><a href="#">CONTACT US</a></li>
            </ul>
        </nav>
    </div>
</footer>
</body>
</html>
