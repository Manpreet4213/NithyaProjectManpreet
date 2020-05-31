<?php
include 'headerAdmin.php';
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

if(isset($_POST['addFeedback'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	
	$name_pattern = "/^[a-zA-Z ]*$/";
	
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
			header("Location: feedbackAdmin.php");
		} else {
        echo "There is some problem in posting feedback";
		}
}
}
?>

<section id="main_section" style="background-color:whitesmoke; height:600px;">

<div class="h1 text-center" style="margin-top:30px; padding-top:10px;">Add Feedback</div>
<div>
    <form action="" method="post">	
		
	    <div class="form-group" style="padding:20px;">
		    <label for="first_name">FIRST NAME :</label>
		    <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $first_name; ?>" placeholder="eg: Nav"/>
			<span id="fName_error" style="color: red"><?= $fName_error; ?>

            </span>
		</div>
		<div class="form-group" style="padding:0 20px 20px 20px;">
		    <label for="last_name">LAST NAME :</label>
		    <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $last_name; ?>" placeholder="eg: Gill"/>
			<span id="lName_error" style="color: red"><?= $lName_error; ?>

            </span>
		</div>
		<div class="form-group" style="padding:0 20px 20px 20px;">
		    <label for="email">EMAIL :<span class="importantFields">*</span></label>
		    <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" placeholder="eg: abc@gmail.com"/>
			<span id="email_error" style="color: red"><?= $email_error; ?>

            </span>
		</div>
		<div class="form-group" style="padding:0 20px 20px 20px;">
		    <label for="comment">COMMENT HERE<span class="importantFields">*</span></label>
		    <textarea id="comment" class="form-control" name="comment" rows="2" cols="50" placeholder="eg: your overall service was very good."><?= $comment; ?></textarea>
			<span id="comment_error" style="color: red"><?= $comment_error; ?>

			</span>
		</div>		
		
        <a href="feedbackAdmin.php" class="btn btn-success float-left" id="btnBack" style="margin:0 20px 20px 20px;">Back</a>
        <button type="submit" name="addFeedback" class="btn btn-primary float-right" id="addFeedback" style="margin:0 20px 20px 20px;">Add Feedback</button>
    </form>
</div>
</section>

<?php
include 'footerAdmin.php';
?>
<!--reference taken from Nithya's class exercise -->