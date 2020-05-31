<?php
require_once '../DATABASE/Database.php';
require_once '../DATABASE/Resort_Function.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();

    $blog = new Resort_Function($dbcon);

    $count = $blog->deleteBlog($id);
	
    if($count){
        header("Location: blogsAdmin.php");
    }
    else {
        echo " There is a problem in deleting the blog";
    }
}
 

//reference taken from Nithya's class exercise