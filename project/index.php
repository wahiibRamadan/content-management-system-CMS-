<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $mobile = $_POST['Mobile'];

    $sql = "insert into `reg` (name ,mobile)values('$fname' , '$mobile')";
    $execute = mysqli_query($conn , $sql);
    if($execute == true){
        header("Location :read.php");
    }
    else{
        echo "data is wrong";
    }

}



?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <form  method="post">
  <div class="mb-3">
    <label  class="form-label">Firstname</label>
    <input type="text" class="form-control"  placeholder="Enter your name " name="fname">
    
  </div>

  <div class="mb-3">
    <label  class="form-label">Mobile</label>
    <input type="text" class="form-control"  placeholder="Enter your Mobile " name="Mobile">
    
  </div>
 
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

  </body>
</html>