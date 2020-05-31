<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Paradise Resort</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../styles/activities.css">
</head>
<body>
<header id="header">
	<nav id="header_nav">
        <img id="logo" src="../images/PROJECT_TASKLIST4/logo.png" id="logo" width="150" height="70" class="left" alt="Paradise restaurant logo" />
        <h3 class="hidden">Main Navigation</h3>
        <ul id="nav_list">
            <li><a href="index.php"><span class="h_home">HOME</span></a></li>
            <li><a href="../includes/events.php">EVENTS</a></li>
            <li><a href="../includes/rooms.php">ROOMS</a></li>
            <li><a href="ContactUs.php">CONTACT US</a></li>
        </ul>
    </nav>
</header>

<!--------------------- main --------------------------->
<section id="main_section">
	<h1 id=_h1>Resort Activities</h1>
	<div class="main_div">
		<h2 id="_h2">Swimming Event for guests</h2>
		<div id="imagge">
			<img src="../images/swimming.jpg" class="leftSide" alt="Activity in resort" />
		</div>
		<div id="info">	
			<p class="desc">Our resort is the only one who organize the swimming competition for 
			their guests on the last day of every month. Guests can register 
			and enjoy this event and they also get a chance to win expensive gifts. 
			</p>
			<div id="_date"><b>Date:</b> 2020-04-08</div>
			<div id="_time"><b>Time:</b> 11:00:00</div>
			<div id="_location"><b>Location:</b> Ground floor, Swimming pool</div>
			<p class="desc">For more information, please contact our management team 
			at <b><u>123 321 5623</u></b></p>
			<a href="activityRegister.php" id="register">Register Here</a> 
		</div>
	</div>
	<div class="main_div">
		<h2 id="_h2">Swimming Competition for guests</h2>
		<div id="imagge">
			<img src="../images/swimming.jpg" class="leftSide" alt="Activity in resort" />
		</div>
		<div id="info">	
			<p class="desc">Our resort is the only one who organize the swimming competition for 
			their guests on the last day of every month. Guests can register 
			and enjoy this event and they also get a chance to win expensive gifts. 
			</p>
			<div id="_date"><b>Date:</b> 2020-03-30</div>
			<div id="_time"><b>Time:</b> 10:00:00</div>
			<div id="_location"><b>Location:</b> Ground floor, Swimming pool</div>
			<p class="desc">For more information, please contact our management team 
			at <b><u>123 321 5623</u></b></p>
			<a href="activityRegister.php" id="register">Register Here</a> 
		</div>
	</div>
</section>	
<?php
include 'footer.php';
?>