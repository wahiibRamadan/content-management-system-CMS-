<?php
if(isset($_POST['create_post'])){
  $post_category_id = $_POST['post_category_id'];
  $post_title = $_POST['title'];
  $post_author = $_POST['author'];
  $post_status = $_POST['status'];

 

  $post_tags = $_POST['tags'];
  $post_content = $_POST['content'];
  $post_date = date('d-m-y');
  $post_com_count = 4;

 


$query = "insert into posts (post_catagory_id, post_title,post_author,post_date,post_status,post_content,post_tags,post_com_count)";
$query .= "values($post_category_id ,' $post_title','$post_author',  now(),'$post_status','$post_content','$post_tags',$post_com_count)";

 $insert_post_query = mysqli_query($con,$query);

 confrimQuery($insert_post_query);

}


?>


<form action="" method="post">
	
	 <div class="form-group">
    <label class="form-label">post title</label>
    <input type="text" class="form-control" name="title">
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
    <input type="text" class="form-control" name="author">
  </div>

   <div class="form-group">
    <label class="form-label">post status</label>
    <input type="text" class="form-control" name="status">
  </div>

  

   <div class="form-group">
    <label class="form-label">post Tags</label>
    <input type="text" class="form-control" name="tags">
  </div>

   <div class="form-group">
    <label class="form-label" for="summernote">post content</label>
    <textarea class="form-control" cols="30" rows="10" id="summernote" name="content"></textarea>
  </div>

  <div class="form-group">
    
    <input type="submit" class="btn btn-primary" name="create_post" value="publish">
  </div>

</form>