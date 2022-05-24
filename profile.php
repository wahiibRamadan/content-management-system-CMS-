<?php include "includes/admin_header.php"; ?>

<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "select * from users where username = '$username'";
    $select_user_profile = mysqli_query($con,$query);

    while($row=mysqli_fetch_array($select_user_profile)){
         $user_id = $row['user_id'];
         $username = $row['username'];
         $password = $row['password'];
         $firstname = $row['firstname'];
         $lastname= $row['lastname'];
         $email= $row['email'];
         $role= $row['role'];
    }
}

?>

<?php

if(isset($_POST['edit_user'])){
 
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $role = $_POST['role'];

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
 


$query = "update users set firstname = '$firstname',";
$query .= "lastname = '$lastname',";
$query .= "role = '$role',";
$query .= "username = '$username',";
$query .= "email = '$email',";
$query .= "password = '$password' ";
$query .= "where username ='$username' ";

$update_user_query = mysqli_query($con,$query);

}


?>




    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php"; ?>
        
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To  Admin
                            <small>Author</small>
                        </h1>

<form action="" method="post">
   <div class="form-group">
    <label class="form-label">Firstname</label>
    <input type="text" class="form-control" value="<?php echo $firstname;?>" name="firstname">
  </div>

   <div class="form-group">
    <label class="form-label"> Lastname</label>
    <input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastname">
  </div>
  
  

   <div class="form-group">

    <select name="role">
      <option value="subscriber"><?php echo $role; ?></option>
      <?php
      if ($role == 'admin') {
       echo "<option value='subscriber'>subscriber</option>";
      
      }
      else{
        echo "<option value='admin'>admin</option>";
      }

      ?>
      
      
      
    </select>
  </div>

  

   <div class="form-group">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
  </div>

   <div class="form-group">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
  </div>

   <div class="form-group">
    <label class="form-label">Password</label>
    <input type="text" class="form-control" value="<?php echo $password; ?>" name="password">
  </div>

  <div class="form-group">
    
    <input type="submit" class="btn btn-primary" name="edit_user" value="edit_user">
  </div>

</form>
                       
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
  