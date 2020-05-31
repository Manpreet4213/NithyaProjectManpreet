<?php

require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';

$dbcon = Database::getDb();
$blog = new Resort_Function($dbcon);

$blogs = $blog->listBlogs();
?>

<!-----------refernce taken from manpreet's code------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paradise Resort</title>
    <meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../styles/blogs.css">
</head>
<body>
    <!------------------- header -------------------------->
   <header id="header">
        <img id="logo" src="../images/PROJECT_TASKLIST4/logo.png" id="logo" width="150" height="70" class="left" alt="Paradise restaurant logo" />
        <nav id="header_nav">
            <h3 class="hidden">Main Navigation</h3>
            <ul id="nav_list" class="menu">
                <li><a href="index.php"><span class="h_home">HOME</span></a></li>
                <li><a href="../andriy/pages/about/about-admin.php">ABOUT</a></li>
                <li><a href="../andriy/pages/dining/dining-admin.php">RESORT-DINING</a></li>
                <li><a href="events.php">EVENTS</a></li>
                <li><a href="rooms.php">ROOMS</a></li>
                <li><a href="../andriy/pages/tours/tours-admin.php">TOURISM</a></li>

            </ul>
        </nav>
    </header>
<!---------------------- my code --------------------->
	<section id="main_section">
		<?php foreach ($blogs as $blog) { ?>
			<div>
				<h1 id="blog_heading"><?= $blog['blog_title'] ?></h1>
				<p id="blog_desc"><?= $blog['blog_description'] ?></p>
			</div>
		<?php } ?>
	</section>

<?php
include 'footer.php';
?>
<!-- Reference taken from Nithya's code-->