 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>userName</th>
                                    <th>firstName</th>
                                    <th>lastName</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from users";
                            $select_users= mysqli_query($con,$query);
                             while($row=mysqli_fetch_assoc($select_users)){
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $password = $row['password'];
                            $firstname = $row['firstname'];
                            $lastname= $row['lastname'];
                            $email= $row['email'];
                            $role= $row['role'];
                            

                            echo "<tr>";
                            echo "<td> $user_id </td>";
                            echo "<td>$username</td>";
                             echo "<td>$firstname</td>";

                        //      $query = "SELECT * from catagories where cat_id = {$post_catagory_id} ";
                        //      $select_categories= mysqli_query($con,$query);
                        //     while($row=mysqli_fetch_assoc($select_categories)){
                        //     $cat_id = $row['cat_id'];
                        //     $cat_title = $row['cat_title'];

                        //     echo "<td> $cat_title </td>";

                        // }

                            echo "<td>$lastname</td>";
                            echo "<td>$email</td>";
                            echo "<td>$role</td>";
                        

                            
                            // $query = "select * from posts where post_id =$comment_post_id ";
                            // $select_post_id = mysqli_query($con,$query);
                            // while($row=mysqli_fetch_assoc($select_post_id)){
                            //     $post_id = $row['post_id'];
                            //     $post_title = $row['post_title'];
                            //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                            // }

                            

                     echo "<td><a href='users.php?admin=$user_id'>Admin</a></td>";
                        echo "<td><a href='users.php?subscriber=$user_id'>Subscriber</a></td>";

                        echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";

                            echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                            echo "</tr>";
                        }


                                ?>


                                
                            </tbody>
                        </table>
<?php
if (isset($_GET['admin'])) {
    $the_admin_id = $_GET['admin'];

    $query = "update users set role = 'admin' where user_id = $the_admin_id ";
    $admin_query = mysqli_query($con,$query);
    header('Location:users.php');
}



if (isset($_GET['subscriber'])) {
    $the_subscriber_id = $_GET['subscriber'];

    $query = "update users set role = 'subscriber' where user_id = $the_subscriber_id";
    $subscriber_query = mysqli_query($con,$query);
    header('Location:users.php');
}





if (isset($_GET['delete'])) {

    if (isset($_SESSION['role'])) {
        // code...
        if ($_SESSION['role'] == 'admin') {
            // code...

    $the_user_id =mysqli_real_escape_string($con, $_GET['delete']);

    $query = "delete from users where user_id =$the_user_id ";
    $delete_user_query = mysqli_query($con,$query);
    header('Location:users.php');
}

}

}


