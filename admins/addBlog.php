<?php
include 'headerAdmin.php';
require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';


$t_error = "";
$d_error = "";
$blog_title = "";
$blog_description = "";

if(isset($_POST['addBlog'])){
	$blog_title = $_POST['blog_title'];
	$blog_description = $_POST['blog_description'];
	
	if(empty($blog_title)){
		$t_error .= "Please enter blog title";
	}
	if(empty($blog_description)){
		$d_error .= "Please enter blog description";
	}
	if($blog_title !== "" && $blog_description !== ""){
		$dbcon = Database::getDb();

		$blog = new Resort_Function($dbcon);

		$count = $blog->addBlog($blog_title, $blog_description);
	
		if($count){
			header("Location: blogsAdmin.php");
		} else {
        echo "There is some problem in adding a blog";
		}
}
}
?>

<section id="main_section" style="background-color:whitesmoke; height:500px;">

<div class="h1 text-center" style="margin-top:30px; padding-top:10px;">Add a Blog</div>
<div>
    
    <form action="" method="post">

        <div class="form-group" style="padding:20px;">
            <label for="blog_title">Title :</label>
            <input type="text" class="form-control" name="blog_title" id="blog_title" value="<?= $blog_title; ?>" placeholder="Enter blog title">
			<span id="title_error" style="color: red"><?= $t_error; ?>

            </span>
		</div>
        <div class="form-group" style="padding:0 20px 20px 20px;">
            <label for="blog_description">Description :</label>
            <textarea id="blog_description" class="form-control" name="blog_description" rows="5" cols="50" placeholder="Enter description for blog"><?= $blog_description; ?></textarea>
			<span id="desc_error" style="color: red"><?= $d_error; ?>

            </span>
		</div>

        <a href="blogsAdmin.php" id="btnBack" class="btn btn-success float-left" style="margin:0 20px 20px 20px;">Back</a>
        <button type="submit" name="addBlog" class="btn btn-primary float-right" id="addBlog" style="margin:0 20px 20px 20px;"> Add Blog </button>
    </form>
</div>
</section>

<?php
include 'footerAdmin.php';
?>

<!--reference taken from Nithya's class exercise -->
