<?php
if(isset($_GET['p_id'])){
  $the_post_id =  $_GET['p_id'];
}


 $query = "SELECT * from posts";
  $select_posts_by_id= mysqli_query($con,$query);
 while($row=mysqli_fetch_assoc($select_posts_by_id)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_catagory_id'];
$post_status = $row['post_status'];
$post_tags = $row['post_tags'];
$post_com_count = $row['post_com_count'];
 $post_Date = $row['post_date'];
 $post_content = $row['post_content'];
}

if (isset($_POST['update_post'])) {
$post_author = $_POST['author'];
$post_title =  $_POST['title'];

$post_catagory_id =  $_POST['post_category_id'];
$post_status =  $_POST['status'];

$post_tags =  $_POST['tags'];
$post_content = $_POST['content'];

$query = "update posts set post_title = '$post_title',";
$query .= "post_author = '$post_author',";
$query .= "post_catagory_id = '$post_catagory_id',";
$query .= "post_date = now(),";
$query .= "post_author = '$post_author',";
$query .= "post_status = '$post_status',";
$query .= "post_tags = '$post_tags',";
$query .= "post_content = '$post_content '";
$query .= "where post_id =$the_post_id ";

$update_post_query = mysqli_query($con,$query);

echo "<p>ost updated . <a href='../post.php?p_id= $post_id'> view post</a></p>";


 
  
}



?>





<form action="" method="post">
	
	 <div class="form-group">
    <label class="form-label">post title</label>
    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title">
  </div>

   <div class="form-group">

    <select name="post_category_id">
      <?php
      $query = "SELECT * from catagories ";
                                $select_categories= mysqli_query($con,$query);
                                     while($row=mysqli_fetch_assoc($select_categories)){
                              $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<option value= '$cat_id'>$cat_title</option>";
                          }



      ?>

      
    </select>
  </div>

   <div class="form-group">
    <label class="form-label">post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $post_author;?>">
  </div>

 <div class="form-group">
  <select name="status">
    <option value='<?php echo $post_status; ?>'> <?php echo $post_status; ?></option>
     <?php
     if ($post_status == 'published') {
        echo "<option value='draft'>Draft</option>";
     }
     else{
       echo "<option value='published'>published</option>";
     }

     ?>
  </select>
</div>



   <div class="form-group">
    <label class="form-label">post Tags</label>
    <input type="text" class="form-control" name="tags" value="<?php echo $post_tags; ?>">
  </div>

   <div class="form-group">
    <label class="form-label" for="summernote">post content</label>
    <textarea class="form-control" cols="30" rows="10" name="content" id="summernote">
      <?php echo $post_content;?>
    </textarea>
  </div>

  <div class="form-group">
    
    <input type="submit" class="btn btn-primary" name="update_post" value="publish">
  </div>

</form>