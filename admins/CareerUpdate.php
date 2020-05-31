<?php

require_once "../database_connection(xamp)/database1.php";
require_once "../functions/Career1.php";
$firstname =$lastname= $email = $phone="";
if (isset($_POST['updatecareer'])) {
    $id = $_POST['id'];

    $dbconn = Database::getDB();
    $c = new Career($dbconn);

    $details = $c->updatecareer($id);

    $firstname = $details->firstname;
    $lastname = $details->lastname;
    $email = $details->email;
    $phone = $details->phone;

    var_dump($details);
}
if (isset($_POST['updatecareer3']))
{
    $id= $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone= $_POST['phone'];

    $dbconn = Database::getDB();

    $c = new Career($dbconn);

    $count = $c->updatecareer2($id,$firstname,$lastname,$email,$phone);

    if ($count) {
        header("Location:CareerAdmin.php");
    } else {
        echo "not able to update";
    }

}
?>
<html lang="en">

<head>
    <title>UPDATE CONTACT DETAILS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/resort2.css"/>
</head>

<body>
<header id="header">

    <nav id="header_nav">
        <img id="logo" src="../images/PROJECT_TASKLIST4/logo.png" id="logo" width="150" height="70" class="left" alt="Paradise restaurant logo" />
        <h3 class="hidden">Main Navigation</h3>
        <ul id="nav_list">
            <li><a href="index.php"><span class="h_home">HOME</span></a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="#">RESORT-DINING</a></li>
            <li><a href="events.php">EVENTS</a></li>
            <li><a href="rooms.php">ROOMS</a></li>
            <li><a href="#">TOURISM</a></li>
        </ul>
    </nav>
</header>
<div class="bg-image"></div>
<div class="bg-text">
    <div>
        <!--    Form to Update office -->
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>" />
            <div class="form-group">
                <label for="name"> FIRST NAME :</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $firstname; ?>" placeholder="Enter Name">
                <span style="color: red"></span>
            </div>
            <div class="form-group">
                <label for="name"> LAST NAME :</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $lastname; ?>" placeholder="Enter Name">
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

            <a href="CareerAdmin.php" id="btn_back" class="btn btn-success float-left">Back</a>
            <button type="submit" name="updatecareer3" class="btn btn-primary float-right" id="btn-submit">UPDATE</button>
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
