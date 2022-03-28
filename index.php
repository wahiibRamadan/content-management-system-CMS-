<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!-- <form method="post" action="display.php">
    <label >userName</label>
    <input type="text" name="name">
    <input type="submit" name="submit">
    </form> -->


<?php
function insert(){
    
   $query = "select * from tbl";
   return $query;
}
$dns = "mysql:host=localhost; dbname=test";
$username = "root";
$pass = "";

$db = new PDO($dns , $username , $pass);

// $query = "select * from tbl";

$statement = $db ->prepare(insert());
$statement ->execute();
while($std= $statement ->fetch()){
    echo "name :" .  $std['name'];
    echo "pass" . $std['password'];
}



?>





</body>
</html>