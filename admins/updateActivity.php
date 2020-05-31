<?php
include 'headerAdmin.php';
?>
<section id="main_section" style="background-color:whitesmoke; height:900px;">

<div class="h1 text-center" style="margin-top:30px; padding-top:10px;">Update Activity</div>
<div>
    <form action="" method="post">	
        <div class="form-group" style="padding:20px;">
            <label for="activityName">Activity Name :</label>
            <input type="text" class="form-control" name="activityName" id="activityName" value="" placeholder="Enter title for activity">
        </div>
		<div class="form-group" style="padding:0 20px 20px 20px;">
            <label for="image">Upload Image :</label>
            <input type="text" class="form-control" name="image" id="image" value="">
        </div>
        <div class="form-group" style="padding:0 20px 20px 20px;">
            <label for="description">Description :</label>
            <textarea id="description" class="form-control" name="description" rows="5" cols="50" value="" placeholder="Enter description for activity"></textarea>
        </div>
        <div class="form-group" style="padding:0 20px 20px 20px;">
            <label for="date">Date :</label>
            <input type="text" class="form-control" name="date" id="date" value="">
        </div>
		<div class="form-group" style="padding:0 20px 20px 20px;">
            <label for="time">Time :</label>
            <input type="text" class="form-control" name="time" id="time" value="">
        </div>
		<div class="form-group" style="padding:0 20px 20px 20px;">
            <label for="locationn">Location :</label>
            <input type="text" class="form-control" name="locationn" id="locationn" value="">
        </div>
		
        <a href="activitiesAdmin.php" class="btn btn-success float-left" id="btnBack" style="margin:0 20px 20px 20px;">Back</a>
        <button type="submit" name="updateActivity" class="btn btn-primary float-right" id="updateActivity" style="margin:0 20px 20px 20px;">Update Activity</button>
    </form>
</div>
</section>
<section id="contact">
    <img class="c_img" src="../images/PROJECT_TASKLIST4/1958364874dbd3456967a9ba6c753945.jpg" height="100" alt="images of logo of facebook,twiteer and instagram">
</section>

<?php
include 'footerAdmin.php';
?>
<!--reference taken from Nithya's class exercise -->