<?php

class Resort_Function{
    private $dbcon;
    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
// Functions for blog feature
//method used to fetch all the posted blogs from database and display them
    public function listBlogs(){

        $sql = "SELECT * FROM blogs";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();

        $blogs = $pdostm->fetchAll(PDO::FETCH_ASSOC);
        return $blogs;
    }
//method used to post new blog by admin
    public function addBlog($blog_title, $blog_description){
        $sql = "INSERT INTO blogs (blog_title, blog_description, date) 
              VALUES (:blog_title, :blog_description, CURDATE()) ";
        $pst = $this->dbcon->prepare($sql);
		
		//bind the parameters
        $pst->bindParam(':blog_title', $blog_title);
        $pst->bindParam(':blog_description', $blog_description);

        $count = $pst->execute();
        return $count;
    }
//method used to delete blog from the database	
	public function deleteBlog($id){
		$sql = "DELETE FROM blogs WHERE id = :id";

		$d = $this->dbcon->prepare($sql);
		
		$d->bindParam(':id', $id);
		
		$count = $d->execute();
		return $count;
	}
//method used to fetch the data related to the selected blog	
	public function showBlog($id){
		$sql = "SELECT * FROM blogs where id = :id";
		
		$u = $this->dbcon->prepare($sql);
		$u->bindParam(':id', $id);
		$u->execute();
		$blog = $u->fetch(PDO::FETCH_OBJ);
		return $blog;

	}
//method used to update the blog in the database	
	public function updateBlog($id, $blog_title, $blog_description){
		$sql = "Update blogs 
				set blog_title = :blog_title,
                blog_description = :blog_description,
				date = CURDATE()
                WHERE id = :id
                ";

		$up = $this->dbcon->prepare($sql);

        $up->bindParam(':id', $id);
        $up->bindParam(':blog_title', $blog_title);
		$up->bindParam(':blog_description', $blog_description);

		$count = $up->execute();
		return $count;
	}
	
// Functions for Feedback feature
//method used to fetch all the posted feedbacks from database and display them 
  public function listFeedbacks(){

        $sql = "SELECT * FROM feedbacks";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();

        $feedbacks = $pdostm->fetchAll(PDO::FETCH_ASSOC);
        return $feedbacks;
    }

//method used to post feedback and store the data in the database
    public function addFeedback($first_name, $last_name, $email, $comment){
        $sql = "INSERT INTO feedbacks (first_name, last_name, email, comment, date) 
              VALUES (:first_name, :last_name, :email, :comment, CURDATE())";
        $a = $this->dbcon->prepare($sql);

        $a->bindParam(':first_name', $first_name);
        $a->bindParam(':last_name', $last_name);
		$a->bindParam(':email', $email);
		$a->bindParam(':comment', $comment);

        $count = $a->execute();
        return $count;
    }
	
//method used to delete feedback from database 
	public function deleteFeedback($feedback_id){
		$sql = "DELETE FROM feedbacks WHERE feedback_id = :feedback_id";

		$del = $this->dbcon->prepare($sql);
		
		$del->bindParam(':feedback_id', $feedback_id);
		
		$count = $del->execute();
		return $count;
	}
	
//method used to fetch the details of a selected feedback from database 
	public function showFeedback($feedback_id){
		$sql = "SELECT * FROM feedbacks where feedback_id = :feedback_id";
		
		$s = $this->dbcon->prepare($sql);
		$s->bindParam(':feedback_id', $feedback_id);
		$s->execute();
		$feedback = $s->fetch(PDO::FETCH_OBJ);
		return $feedback;

	}
	
//method used to update the feedback in the database
	public function updateFeedback($feedback_id, $first_name, $last_name, $email, $comment){
		$sql = "Update feedbacks 
				set first_name = :first_name,
                last_name = :last_name,
				email = :email,
				comment = :comment,
				date = CURDATE()
                WHERE feedback_id = :feedback_id
                ";

		$u = $this->dbcon->prepare($sql);
		//bind the parameters
        $u->bindParam(':feedback_id', $feedback_id);
        $u->bindParam(':first_name', $first_name);
		$u->bindParam(':last_name', $last_name);
		$u->bindParam(':email', $email);
		$u->bindParam(':comment', $comment);

		$count = $u->execute();
		return $count;
	}	
}  
                 









