<?php

session_start();

if(!isset($_SESSION['password']) ){
    header('Location: login.php');
}

include 'headerAdmin.php';
require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';

$dbcon = Database::getDb();
$feedback = new Resort_Function($dbcon);

$feedbacks = $feedback->listFeedbacks();
?>

<section id="main_section" style="background-color:whitesmoke; height:500px;">

<div id="heading" class="h1 text-center" style="margin-top:30px; padding-top:10px;">Welcome Admin</div>
<div class="h4 text-center">Feedback list</div>
<a href="addFeedback.php" id="addFeedback" class="btn btn-success btn-lg float-right" style="margin-bottom:20px; margin-right:20px;">Add Feedback</a>
<div <div class="m-1">
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Comment</th>
			<th scope="col">Date</th>
			<th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($feedbacks as $feedback) { ?>
            <tr>
                <td><?= $feedback['feedback_id'] ?></td>
                <td><?= $feedback['first_name'] ?></td>
                <td><?= $feedback['last_name'] ?></td>
				<td><?= $feedback['email'] ?></td>
				<td><?= $feedback['comment'] ?></td>
				<td><?= $feedback['date'] ?></td>
                <td>
                    <form action="updateFeedback.php" method="post">
                        <input type="hidden" name="feedback_id" value="<?= $feedback['feedback_id'] ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateFeedback" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteFeedback.php" method="post">
                        <input type="hidden" name="feedback_id" value="<?= $feedback['feedback_id'] ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteFeedback" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>    
        </tbody>
    </table>

</div>
</section>

<?php
include 'footerAdmin.php';
?>
<!--reference taken from Nithya's class exercise -->