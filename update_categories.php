
                              <form action="" method="post">
                                <div class="form-group">
                                    <label>Edit Category</label>
                                    <?php
                                    if (isset($_GET['edit'])) {
                                       $cat_id = $_GET['edit'];
                                    
                                     $query = "SELECT * from catagories where cat_id = {$cat_id} ";
                                $select_categories_id= mysqli_query($con,$query);
                                     while($row=mysqli_fetch_assoc($select_categories_id)){
                              $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                            ?>

                            <input value="<?php echo $cat_title; ?>" type="text"  class="form-control" name="cat_title" >

                       <?php }} ?>


                       <?php
                        if (isset($_POST['update_category'])) {
                            $the_cat_title = $_POST['cat_title'];

                            $query = "update catagories set cat_title ='$the_cat_title' where cat_id = $cat_id ";
                            $update_query = mysqli_query($con,$query);
                            header('Location:categories.php');
                        }


                       ?>

    
                                    
                                </div>
                                 <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="update_category" value=" update">
                                    
                                </div>
                                
                            </form>