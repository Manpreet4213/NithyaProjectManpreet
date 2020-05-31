<?php
include 'headerAdmin.php';
?>
<section id="main_section" style="background-color:whitesmoke; height:500px;">

<div id="heading" class="h1 text-center" style="margin-top:30px; padding-top:10px;">Welcome Admin</div>
<div class="h4 text-center">List of Activities that will take place in resort</div>
<a href="addActivity.php" id="addActivity" class="btn btn-success btn-lg float-right" style="margin-bottom:20px; margin-right:20px;">Add Activity</a>
<div <div class="m-1">
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Activity name</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
			<th scope="col">Time</th>
			<th scope="col">Location</th>
			<th scope="col">Update</th>
			<th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Swimming Event for guests</td>
                <td>activities.jpg</td>
				<td>Our resort is the only one who organize the swimming competition 
				for their guests on the last day of every month. 
				Guests can register and enjoy this event and 
				they also get a chance to win expensive gifts.
				</td>
				<td>2020-04-08</td>
				<td>11:00:00</td>
				<td>Ground floor, Swimming pool</td>
                <td>
                    <form action="updateActivity.php" method="post">
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="button btn btn-primary" name="updateActivity" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteActivity.php" method="post">
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="button btn btn-danger" name="deleteActivity" value="Delete"/>
                    </form>
                </td>
            </tr>
		    <tr>
                <td>2</td>
                <td>Swimming Event for guests</td>
                <td>activities.jpg</td>
				<td>Our resort is the only one who organize the swimming competition 
				for their guests on the last day of every month. 
				Guests can register and enjoy this event and 
				they also get a chance to win expensive gifts.
				</td>
				<td>2020-04-08</td>
				<td>11:00:00</td>
				<td>Ground floor, Swimming pool</td>
                <td>
                    <form action="updateActivity.php" method="post">
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="button btn btn-primary" name="updateActivity" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteActivity.php" method="post">
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="button btn btn-danger" name="deleteActivity" value="Delete"/>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

</div>
</section>
<section id="contact">
    <img class="c_img" src="../images/PROJECT_TASKLIST4/1958364874dbd3456967a9ba6c753945.jpg" height="100" alt="images of logo of facebook,twiteer and instagram">
</section>

<?php
include 'footerAdmin.php';
?>

<!--reference taken from Nithya's class exercise -->