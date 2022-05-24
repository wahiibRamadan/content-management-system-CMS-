<?php
if(isset($_POST['create_user'])){
 
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $role = $_POST['role'];

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
 


$query = "insert into users( firstname,lastname,role,username,email,password)";
$query .= "values(' $firstname','$lastname','$role','$username','$email','$password')";

 $insert_post_query = mysqli_query($con,$query);

 confrimQuery($insert_post_query);

 // echo "user created : " . " " . "<a href='users.php'>view users</a>";

}


?>


<form action="" method="post">
   <div class="form-group">
    <label class="form-label">Firstname</label>
    <input type="text" class="form-control" name="firstname">
  </div>

   <div class="form-group">
    <label class="form-label"> Lastname</label>
    <input type="text" class="form-control" name="lastname">
  </div>
	
	

   <div class="form-group">

    <select name="role">
      <option value="subscriber">Select Option</option>
      <option value="admin">admin</option>
      <option value="subscriber">subscriber</option>
      
    </select>
  </div>

  

   <div class="form-group">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

   <div class="form-group">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>

   <div class="form-group">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  <div class="form-group">
    
    <input type="submit" class="btn btn-primary" name="create_user" value="Add user">
  </div>

</form>