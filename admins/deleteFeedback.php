<?php
require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';

if(isset($_POST['feedback_id'])){
    
	$feedback_id = $_POST['feedback_id'];

    $dbcon = Database::getDb();

    $feedback = new Resort_Function($dbcon);

    $count = $feedback->deleteFeedback($feedback_id);
	
    if($count){
        header("Location: feedbackAdmin.php");
    }
    else {
        echo " There is a problem in deleting the feedback";
    }
}
 

//reference taken from Nithya's class exercise