<?php

include 'headerAdmin.php';
require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';

$t_error = $d_error = $blog_title = $blog_description = "";

if(isset($_POST['updateBlog'])){
    $id= $_POST['id'];

    $dbcon = Database::getDb();
	$blog = new Resort_Function($dbcon);
	
	$blogs = $blog->showBlog($id);

    $blog_title =  $blogs->blog_title;
    $blog_description = $blogs->blog_description;
    
}
if(isset($_POST['updateBlog2'])) {
    $id = $_POST['id'];
    $blog_title = $_POST['blog_title'];
    $blog_description = $_POST['blog_description'];
	
	/*---------------validation--------------*/
	if(empty($blog_title)){
		$t_error .= "Please enter blog title";
	}
	if(empty($blog_description)){
		$d_error .= "Please enter blog description";
	}
	/*-----------save data in database--------*/
	if($blog_title !== "" && $blog_description !== ""){

	$dbcon = Database::getDb();

    $blog = new Resort_Function($dbcon);
  
	$count = $blog->updateBlog($id, $blog_title, $blog_description);
  
    if($count){
        header("Location: blogsAdmin.php");
    } else {
        echo "There is a problem in updating a blog";
    }
}
}
?>

<section id="main_section" style="background-color:whitesmoke; height:500px;">

<div class="h1 text-center" style="margin-top:30px; padding-top:10px;">Update "<?= $blog_title; ?>"</div>
<div>
    <form action="" method="post">
	
		<input type="hidden" name="id" value="<?= $id; ?>" />
		
        <div class="form-group" style="padding:20px;">
            <label for="blog_title">Title :</label>
            <input type="text" class="form-control" name="blog_title" id="blog_title" value="<?= $blog_title; ?>" placeholder="Enter title">
            <span id="title_error" style="color: red"><?= $t_error; ?>

            </span>
		</div>
		
        <div class="form-group" style="padding:0 20px 20px 20px;">
            <label for="blog_description">Description :</label>
			<textarea id="blog_description" class="form-control" name="blog_description" rows="5" cols="50" placeholder="Enter description for blog"><?= $blog_description; ?></textarea>
			<span id="desc_error" style="color: red"><?= $d_error; ?>

            </span>
	   </div>
		
        <a href="blogsAdmin.php" class="btn btn-success float-left" id="btnBack" style="margin:0 20px 20px 20px;">Back</a>
        <button type="submit" name="updateBlog2" id="updateBlog2" class="btn btn-primary float-right" style="margin:0 20px 20px 20px;">Update Blog</button>
    
	</form>
</div>

</section>
<?php
include 'footerAdmin.php';
?>