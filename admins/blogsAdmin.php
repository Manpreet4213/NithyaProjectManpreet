<?php

session_start();

if(!isset($_SESSION['password']) ){
    header('Location: login.php');
}

include 'headerAdmin.php';
require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';

$dbcon = Database::getDb();
$blog = new Resort_Function($dbcon);

$blogs = $blog->listBlogs();

?>
<section id="main_section" style="background-color:whitesmoke;">

<div id="heading" class="h1 text-center" style="margin-top:30px;">Welcome Admin</div>
<div class="h4 text-center">Here is your list of Blogs</div>
<a href="addBlog.php" id="addBlog" class="btn btn-success btn-lg float-right" style="margin-bottom:20px; margin-right:20px;">Add Blog</a>
<div class="m-1">
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($blogs as $blog) { ?>
            <tr>
                <td><?= $blog['id'] ?></td>
                <td><?= $blog['blog_title'] ?></td>
                <td><?= $blog['blog_description'] ?></td>
                <td>
                    <form action="updateBlog.php" method="post">
                        <input type="hidden" name="id" value="<?= $blog['id'] ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateBlog" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="deleteBlog.php" method="post">
                        <input type="hidden" name="id" value="<?= $blog['id'] ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteBlog" value="Delete"/>
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