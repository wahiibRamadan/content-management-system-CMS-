<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php
   
 if(isset($_POST['submit'])){
     $username = $_POST['username'];
     $Email = $_POST['email'];
     $password = $_POST['password'];

     if(!empty($username) && !empty($Email) && !empty($password)){

     $username = mysqli_real_escape_string($con ,$username);
     $Email = mysqli_real_escape_string($con , $Email);
     $password = mysqli_real_escape_string($con , $password);

     $query = "select randsalt from users";

     $select_randsalt_query = mysqli_query($con,$query);

     if(!$select_randsalt_query){
         die("QUERY FAILED" . mysqli_error($con));
     }

     $row=mysqli_fetch_array($select_randsalt_query);
     $salt = $row['randsalt'];
     $password = crypt($password , $salt);

     $query = "insert into users( firstname,lastname,role,username,email,password)";
     $query .= "values('','','subscriber','$username','$Email','$password')";
     
      $register_user_query = mysqli_query($con,$query);
     if(!$register_user_query){
         die("QUERY FAILED" . mysqli_error($con));
     }
    $message = ' <div class="alert alert-success">
    <strong> Your registration has been submitted </strong> 
  </div>';


    }else{
        $message = '<div class="alert alert-danger">
        <strong> This Feilds  can not be empty</strong>
      </div>';
    }

     
 }
 else {
     $message = "";
 }


?>




    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                        <h6 class="text-center"><?php echo $message?></h6>

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
