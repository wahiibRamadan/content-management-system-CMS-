<?php include"delete_model.php";  ?>
<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Tags</th>
            <th>comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * from posts order by post_id desc";
        $select_posts = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_catagory_id = $row['post_catagory_id'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_com_count = $row['post_com_count'];
            $post_Date = $row['post_date'];

            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";

            $query = "SELECT * from catagories where cat_id = {$post_catagory_id} ";
            $select_categories = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<td> $cat_title </td>";
            }


            echo "<td>$post_status</td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_com_count</td>";
            echo "<td>$post_Date</td>";
            echo "<td><a href='posts.php?source=edit_posts&p_id=$post_id'>update</a></td>";
            echo "<td><a onClick=\" javascript:return confirm('Are you sure you want to delete ?'); \"  href='posts.php?delete=$post_id'>Delete</a></td>";
            echo "</tr>";
        }


        ?>



    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    if (!isset($_SESSION['username'])) {
        // code...
        header('Location:index.php');
    }
    else{
    $the_post_id = $_GET['delete'];

    $query = "delete from posts where post_id =$the_post_id ";
    $delete_post_query = mysqli_query($con, $query);
    header("Location:posts.php");
}
}


?>