<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
    <!-- Navigation -->
    <?php  include "includes/navigation.php"; ?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8">

            <!-- Blog Entries Column -->

            <?php
            if (isset($_GET['p_id'])) {
                $post_id = $_GET['p_id'];
            



            $query = "select * from posts where post_id = $post_id";
            $select_posts_query = mysqli_query($con,$query);
            $select_all_categories = mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($select_all_categories)){
               
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
            }


                ?>



               
           
             

             <h1 class="page-header">
                 Page Heading
                 <small>Secondary Text</small>
             </h1>

             <!-- First Blog Post -->
             <h2>
                 <a href="#"><?php echo $post_title; ?></a>
             </h2>
             <p class="lead">
                 by <a href="index.php"><?php echo $post_author; ?></a>
             </p>
             <p><span class="glyphicon glyphicon-time"></span><?php  echo $post_date;?></p>
             <hr>
             <img class="img-responsive" src="http://placehold.it/900x300" alt="">
             <hr><?php echo $post_content; ?></p>
            
             <hr>
             <?php }?>

              <!-- Blog Comments -->

              <?php
              if (isset($_POST['create_comment'])) {
                 $post_id = $_GET['p_id'];
                 $comment_author = $_POST['comment_author'];
                 $comment_email = $_POST['comment_email'];
                 $comment_content = $_POST['comment_content'];

              

                 if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){

                 $query = "insert into comments(comment_post_id,comment_author,comment_email,comment_content ,comment_status,comment_date)";
                 $query .= "values($post_id,'$comment_author', '$comment_email' , '$comment_content','unapproved',now())";

                 $create_comment = mysqli_query($con,$query);


                 $query= "update posts set post_com_count =post_com_count+1 ";
                 $query .= "where post_id=$post_id ";
                 $update_com_count = mysqli_query($con,$query);
                 }
                 else{
                     echo "<script>alert('Fields cannot be empty');</script>";
                 }
              }



              ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label>Auhtor</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                $query= "SELECT * from comments where comment_status = 'approved' ";
                $query .= "ORDER BY comment_id  desc";
                // $query .= "where comment_post_id = $post_id ";
                $select_comment_query = mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($select_comment_query)){
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];

                    ?>
                      <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author  ?>
                            <small><?php echo  $comment_date;?></small>
                        </h4>
                        <?php echo $comment_content;  ?>
                    </div>
                </div>

               <?php } ?>



               




                <!-- Comment -->
              


               

            </div>



            <!-- Blog Sidebar Widgets Column -->


           <?php include "includes/sidebar.php";  ?>


        </div>
        <!-- /.row -->

        <hr>
        <?php
        include "includes/footer.php";

        ?>
