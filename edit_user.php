<?php
if (isset($_GET['edit_user'])) {
  $the_user_id = $_GET['edit_user'];

  $query = "SELECT * from users where user_id =$the_user_id ";
  $select_users_query = mysqli_query($con, $query);
  while ($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $role = $row['role'];
  }
}





if (isset($_POST['edit_user'])) {

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $role = $_POST['role'];

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = "select randsalt from users";

     $select_randsalt_query = mysqli_query($con,$query);

     if(!$select_randsalt_query){
         die("QUERY FAILED" . mysqli_error($con));
     }
     $row=mysqli_fetch_array($select_randsalt_query);
     $salt = $row['randsalt'];
     $hashed_password = crypt($password , $salt);



  $query = "update users set firstname = '$firstname',";
  $query .= "lastname = '$lastname',";
  $query .= "role = '$role',";
  $query .= "username = '$username',";
  $query .= "email = '$email',";
  $query .= "password = '$hashed_password '";
  $query .= "where user_id =$the_user_id ";

  $update_user_query = mysqli_query($con, $query);
}


?>


<form action="" method="post">
  <div class="form-group">
    <label class="form-label">Firstname</label>
    <input type="text" class="form-control" value="<?php echo $firstname; ?>" name="firstname">
  </div>

  <div class="form-group">
    <label class="form-label"> Lastname</label>
    <input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastname">
  </div>



  <div class="form-group">

    <select name="role">
      <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
      <?php
      if ($role == 'admin') {
        echo "<option value='subscriber'>subscriber</option>";
      } else {
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

    <input type="submit" class="btn btn-primary" name="edit_user" value="Edit user">
  </div>

</form>