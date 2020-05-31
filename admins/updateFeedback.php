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

$name_pattern = "/^[a-zA-Z ]*$/";

if(isset($_POST['updateFeedback'])){
    $feedback_id= $_POST['feedback_id'];

    $dbcon = Database::getDb();
	$feedback = new Resort_Function($dbcon);
	
	$feedbacks = $feedback->showFeedback($feedback_id);

    $first_name =  $feedbacks->first_name;
    $last_name = $feedbacks->last_name;
	$email = $feedbacks->email;
	$comment = $feedbacks->comment;   
}
if(isset($_POST['updateFeedback2'])) {
    $feedback_id = $_POST['feedback_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	
	/*---------------validation--------------*/
	
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
	
	/*-----------save data in database--------*/
	if(filter_var($email, FILTER_VALIDATE_EMAIL) && $comment !== ""){

	$dbcon = Database::getDb();

    $feedback = new Resort_Function($dbcon);
  
	$count = $feedback->updateFeedback($feedback_id, $first_name, $last_name, $email, $comment);
  
    if($count){
        header("Location: feedbackAdmin.php");
    } else {
        echo "There is a problem in updating feedback";
    }
}
}
?>
<section id="main_section" style="background-color:whitesmoke; height:600px;">

<div class="h1 text-center" style="margin-top:30px; padding-top:10px;">Update Feedback</div>
<div>
    <form action="" method="post">	
		<input type="hidden" name="feedback_id" value="<?= $feedback_id; ?>" />
		
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
        <button type="submit" name="updateFeedback2" class="btn btn-primary float-right" id="updateFeedback2" style="margin:0 20px 20px 20px;">Update Feedback</button>
    </form>
</div>
</section>

<?php
include 'footerAdmin.php';
?>
<!--reference taken from Nithya's class exercise -->