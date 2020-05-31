<?php
require_once '../database_connection(xamp)/database1.php';
require_once '../functions/Contact1.php';
if (isset($_POST['addContact'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $dbconn= Database::getDB();

    $c = new Contact($dbconn);

    $count = $c->addContact($name, $email,$phone,$message);

    if ($count) {
        header("Location: ../admins/ContactAdmin.php");
    } else {
        echo "not able to add contact";
    }
}
$nameerr=$emailerr=$phoneerr=$messageerr="";
$name=$phone=$email=$message="";
$pattern="/[1-9]{9,10}/";
if(isset($_POST['addContact'])){
    $name=$_POST['name'];
    if ($name==""){
        $nameerr="Please enter your name";
    }
}
if(isset($_POST['addContact'])){
    $message=$_POST['message'];
    if ($message==""){
        $messageerr="Please enter your message";
    }
}

if (isset($_POST['addContact'])) {
    $email = $_POST['email'];
    if ($email == "") {
        $emailerr = "Please enter your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = " Please enter a valid email";
    } else {
        $emailerr = "your email is valid";
    }
}

if (isset($_POST['addContact'])){
    $phone=$_POST['phone'];
    if($phone==""){
        $phoneerr="Please enter your phone number";

    }else if (!preg_match($pattern,$phone)){
        $phoneerr="please enter valid phone number ";
    }else{
        $phoneerr="your phone number is valid";
    }
}
?>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Contact Us</title>
  <script type="text/javascript" src="../javascript/ContactUs.js"></script>
  <link rel="stylesheet" type="text/css" href="../styles/ContactUs.css"/>
</head>
<body>
<header id="header">

    <nav id="header_nav">
        <img id="logo" src="../images/PROJECT_TASKLIST4/logo.png" id="logo" width="150" height="70" class="left" alt="Paradise restaurant logo" />
        <h3 class="hidden">Main Navigation</h3>
        <ul id="nav_list">
            <li><a href="index.php"><span class="h_home">HOME</span></a></li>
            <li><a href="events.php">EVENTS</a></li>
            <li><a href="rooms.php">ROOMS</a></li>
            <li><a href="ContactUs.php">CONTACT US</a></li>
        </ul>
    </nav>
</header>
  <div class="bg-image"></div>
<div class="bg-text">
<h1> CONTACT US </h1>

<div id="page">
<div id="side">
<h2>HOW MAY WE HELP YOU?</h2>
<p> We  want to provide a very comfortable stay for you at this resort and we are happy to help you any time with all sort
  of queries uhave for this resort .Please free to ask any query you want . You can contact us throught contact nuimber given below or email us your query .
  And we also you can fill a form given below , we will try to help you as soon as possible. Have a graet vist and Enjoy your holidays at our resort.</p>


  <form  id="form" action="" method="post">
      <div>
      <label> NAME:</label>
      <input type="text" name="name" id="name" value="">
          <span style="color:red;"><?php echo $nameerr;?></span>
      </div>
      <div>
          <label>PHONE NUMBER:</label>
          <input type="text" name="phone" id="phone" value="">
          <span style="color:red;"><?php echo $phoneerr;?></span>
      </div>
      <div>
          <label>EMAIL:</label>
          <input type="text" name="email" id="email" value="">
          <span style="color:red;"><?php echo $emailerr;?></span>
      </div>
      <div>
          <label>MESSAGE:</label>
          <input type="text" name="message" id="message" value="">
          <span style="color:red;"><?php echo $messageerr;?></span>
      </div>
      <input type="submit" name="addContact" value="SEND NOW">
  </form>
  </div>
<div id="main">
  <div id="map"></div>
  <!-- load the google maps api-->
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfOma_sgTmnTHmb2OBvGV-VFS97zt75O4&callback=intializeMap">
 </script>

<div id="list">
  <ul>
     <li>
       <span>Address:</span>
       <span>350 5th Avenue</span>
     </li>
     <li>
       <span>City:</span>
       <span>NEW YORK</span>
     </li>
     <li>
       <span>Email:</span>
       <span>support@paradise.com</span>
     </li>
     <li>
       <span>Phone:</span>
       <span>0133456576</span>
     </li>
  </ul>
</div>
</div>
</div>
</div>
<footer id="footer">
    <h3 id="location">2 ROBSON STREET TORONTO,ON M9X1B2</h3>
    <div class="foot">
        <nav>
            <ul id="foot_list">
                <li><a href="ResortCareer.php">CARRERS</a></li>
                <li><a href="activities.php">ACTIVITIES</a></li>
                <li><a href="blogs.php">BLOGS</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
                <li><a href="HelpCentre.php">HELP</a></li>
            </ul>
        </nav>
    </div>
</footer>
</body>
</html>
