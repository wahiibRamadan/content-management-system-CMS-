 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comments</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>in response to</th>
                                     <th>Date</th>
                                    <th>Approve</th>
                                    <th>unApprove</th>
                                     <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from comments";
                            $select_comments= mysqli_query($con,$query);
                             while($row=mysqli_fetch_assoc($select_comments)){
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_email = $row['comment_email'];
                            $comment_content= $row['comment_content'];
                            $comment_status= $row['comment_status'];
                            $comment_date= $row['comment_date'];
                            

                            echo "<tr>";
                            echo "<td>$comment_id </td>";
                            echo "<td>$comment_author</td>";
                             echo "<td>$comment_content</td>";

                        //      $query = "SELECT * from catagories where cat_id = {$post_catagory_id} ";
                        //      $select_categories= mysqli_query($con,$query);
                        //     while($row=mysqli_fetch_assoc($select_categories)){
                        //     $cat_id = $row['cat_id'];
                        //     $cat_title = $row['cat_title'];

                        //     echo "<td> $cat_title </td>";

                        // }

                            echo "<td>$comment_email</td>";
                            echo "<td>$comment_status</td>";
                        

                            
                            $query = "select * from posts where post_id =$comment_post_id ";
                            $select_post_id = mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($select_post_id)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                            }
                            echo "<td>$comment_date</td>";

                     echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                        echo "<td><a href='comments.php?unapprove=$comment_id'>UnApprove</a></td>";

                            echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                            echo "</tr>";
                        }


                                ?>


                                
                            </tbody>
                        </table>
<?php
if (isset($_GET['approve'])) {
    $the_comment_id = $_GET['approve'];

    $query = "update comments set comment_status = 'approved' where comment_id = $the_comment_id ";
    $approve_query = mysqli_query($con,$query);
    header('Location:comments.php');
}



if (isset($_GET['unapprove'])) {
    $the_comment_id = $_GET['unapprove'];

    $query = "update comments set comment_status = 'unapproved' where comment_id = $the_comment_id";
    $unapprove_query = mysqli_query($con,$query);
    header('Location:comments.php');
}





if (isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];

    $query = "delete from comments where comment_id =$the_comment_id ";
    $delete_post_query = mysqli_query($con,$query);
    header('Location:comments.php');
}


