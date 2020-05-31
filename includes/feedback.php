<?php

require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';

$fName_error = "";
$lName_error = "";
$email_error = "";
$comment_error = "";
$first_name = "";
$last_name = "";
$email = "";
$comment = "";

if(isset($_POST['submit'])){
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	//pattern to check first and last nae contain only alphabets
	$name_pattern = "/^[a-zA-Z ]*$/";
	
	//condition to check 
	if(!preg_match($name_pattern, $first_name)){
        $fName_error = "First Name should contain alphabets and spaces only";
    }
	if(!preg_match($name_pattern, $last_name)){
        $lName_error = "Last Name should contain alphabets and spaces only";
    }
	if($email == ""){
       $email_error =  "Please enter email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $email_error = "Please enter valid email format";
	} else {
       $email_error = "";
	}
	if(empty($comment)){
		$comment_error .= "Please enter a comment";
	}
	
	if($email !== "" && $comment !== ""){
		$dbcon = Database::getDb();

		$feedback = new Resort_Function($dbcon);

		$count = $feedback->addFeedback($first_name, $last_name, $email, $comment);
	
		if($count){
			header("Location: feedback.php");
		} else {
        echo "There is some problem in submiting a feedback";
		}
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Paradise Resort</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../styles/feedback.css">
	<script type="text/javascript" src="../javascript/feedback.js" ></script>
</head>

<body>
<header id="header">
	<nav id="header_nav">
        <img id="logo" src="../images/PROJECT_TASKLIST4/logo.png" id="logo" width="150" height="70" class="left" alt="Paradise restaurant logo" />
        <h3 class="hidden">Main Navigation</h3>
        <ul id="nav_list">
            <li><a href="../includes/index.php"><span class="h_home">HOME</span></a></li>
            <li><a href="../includes/events.php">EVENTS</a></li>
            <li><a href="../includes/rooms.php">ROOMS</a></li>
            <li><a href="ContactUs.php">CONTACT US</a></li>
        </ul>
    </nav>
</header>

<!--------------------- main --------------------------->
<section id="form_section">  
    <form action="#" method="post" id="feedback" name="feedback">
		<h2 id="_h2">Guest Feedback</h2> 	
		<p id="_p">At Paradise Resort we value everyone’s feedback, 
		whether their experience at our resort was beyond their ecpectations, 
		or if you feel there are some sections that we shoud improve. 
		Please fill this feedback form to help us know what we are serving better and 
		what we should improve so that in future guests can have good quality experince in our resort. 
		This form will take only your few precious minutes.
		</p><br/>
			
	    <div id="_div">
		<label for="first_name">FIRST NAME</label>
		<input type="text" id="first_name" name="first_name" value="<?= $first_name; ?>" placeholder="eg: Nav"/><br/>
		<span id="fName_error" style="color: red"><?= $fName_error; ?>

		</span>
		</div>
		<div id="_div">
		    <label for="last_name">LAST NAME</label>
		    <input type="text" id="last_name" name="last_name" value="<?= $last_name; ?>" placeholder="eg: Gill"/><br/>
			<span id="lName_error" style="color: red"><?= $lName_error; ?>

			</span>
		</div>
		<div id="_div">
		    <label for="email">EMAIL<span class="importantFields">*</span></label>
		    <input type="text" id="email" name="email" value="<?= $email; ?>" placeholder="eg: abc@gmail.com"/><br/>
			<span id="email_error" style="color: red"><?= $email_error; ?>

			</span>
		</div>
		<div id="_div">
		    <label for="comment">COMMENT HERE<span class="importantFields">*</span></label>
		    <textarea id="comment" class="form-control" name="comment"  placeholder="eg: your overall service was very good."><?= $comment; ?></textarea><br/>
			<span id="comment_error" style="color: red"><?= $comment_error; ?>

			</span>
		</div><br/>
	    <button type="submit" name="submit" id="submit"> Submit </button><br/>
	</form>
</section>	

<?php
include 'footer.php';
?>
