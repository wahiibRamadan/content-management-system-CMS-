<?php
function user_online(){
    global $con;
    $session = session_id();
        $time = time();
        $time_out_second = 30;
        $time_out = $time - $time_out_second;

        $query = "select * from users_online where session = '$session'";
        $send_query = mysqli_query($con , $query);
        $count = mysqli_num_rows($send_query);

        if ($count ==NULL) {
            mysqli_query($con,"insert into users_online (session,time)values('$session','$time')");
        }
        else{
             mysqli_query($con,"update users_online set time ='$time' where session ='$session' ");
        
        }
        $user_online= mysqli_query($con,"select * from users_online where time > '$time_out'");
         return $count_user = mysqli_num_rows($user_online);
        



}
function confrimQuery($result)
{
    global $con;
    if (!$result) {
        // code...
        die("ERROR  . " . mysqli_error($con));
    }
}

function Insertfunction()
{
    global $con;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo '<div class="alert alert-danger">
                                   <strong>No!</strong>this should not be empty </div>';
        } else {
            $query = "insert into catagories(cat_title)values('$cat_title')";
            $create_category_query = mysqli_query($con, $query);
        }
    }
}
function findAllCategories()
{
    global $con;
    $query = "SELECT * from catagories";
    $select_categories = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function DeleteFunction()
{
    global $con;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];

        $query = "delete from catagories where cat_id = $the_cat_id";
        $delete_cat_query = mysqli_query($con, $query);
        header('Location:categories.php');
    }
}
