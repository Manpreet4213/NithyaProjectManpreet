<?php
require_once "../database_connection(xamp)/database1.php";
require_once "../functions/Career1.php";
if (isset($_POST['addCareer'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    $dbconn= Database::getDB();

    $r = new Career ($dbconn);

    $count = $r->addCareer($firstname,$lastname ,$email,$phone);

    if ($count) {
        header("Location: ../admins/CareerAdmin.php");
    } else {
        echo "not able to add";
    }
}
$dbconn= Database::getDB();
$c = new Career ($dbconn);

$details= $c->listjobs();

$firstnameerr=$emailerr=$phoneerr=$lastnameerr="";
$firstname=$lastname=$phone=$email="";
$pattern="/[1-9]{9,10}/";
if(isset($_POST['addCareer'])){
    $firstname=$_POST['firstname'];
    if ($firstname==""){
        $firstnameerr="Please enter your first name";
    }
}
if(isset($_POST['addCareer'])){
    $lastname=$_POST['lastname'];
    if ($lastname==""){
        $lastnameerr="Please enter your last name";
    }
}

if (isset($_POST['addCareer'])) {
    $email = $_POST['email'];
    if ($email == "") {
        $emailerr = "Please enter your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailerr = " Please enter a valid email";
    } else {
        $emailerr = "your email is valid";
    }
}

if (isset($_POST['addCareer'])){
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

<!DOCTYPE html>
<html lang="en">
	<head>
		<title> RESORT CAREER</title>
	<script  type="text/javascript" src="../javascript/jquery.min.js"></script>
	<script type="text/javascript" src="../javascript/ResortCareer.js"></script>
  <link rel="stylesheet" href="../styles/ResortCareer.css">
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
			<div id="page">
      <h1 id="headTitle">RESORT CAREERS</h1>
  		<span>At this place , we strive to bring together caring, warm, and intelligent people who love to serve and are among the best in their field.
  			This plcae offers a different kind of work atmosphere, a place where everybody pulls together around a common goal. In fact, helping one another is at the heart of our organization, so want you to join
  		our team so we can move in direction of achieving our goals....</span>
		</div>
		<div class="bg-text1">
			<div id="mainContain"><!--MAIN CONTENT CONTAINER-->
	    <h2>JOIN OUR TEAM</h2>
                <?php foreach ($details as $d) { ?>
			<div class="panelContainer">
				<h2 >JOB: <?= $d->name ?></h2>
				<p class="contentBox"><?= $d->description ?></p>
			</div>
                <?php }?>
			</div><!--END mainContain-->

    </div>
	</div>
	<h3> YOU CAN SIGN UP HERE NOW FOR FURTHER COMMUNICATION AND UPDATES FROM US:</h3>
	<form  id="form" action="" method="post">
			<div>
			<label>FIRST NAME:</label>
			<input type="text" name="firstname" id="firstname" value="">
                <span style="color:red;"><?php echo $firstnameerr;?></span>
			</div>
			<div>
					<label>LAST NAME:</label>
					<input type="text" name="lastname" id="lastname" value="">
                <span style="color:red;"><?php echo $lastnameerr;?></span>
			</div>
			<div>
					<label>PHONE:</label>
					<input type="text" name="phone" id="phone" value="">
                <span style="color:red;"><?php echo $phoneerr;?></span>
			</div>
            <div>
                    <label>EMAIL:</label>
                    <input type="text" name="email" id="email" value="">
                <span style="color:red;"><?php echo $emailerr;?></span>
            </div>

			<input type="submit" name="addCareer" value="SIGN UP">

	</form>
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
