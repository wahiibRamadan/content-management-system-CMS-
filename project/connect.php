<?php
$servername = 'localhost';
$username = 'root';
$dbpass = "";
$dbname = "form";

$conn = mysqli_connect($servername , $username , $dbpass , $dbname);

if(!$conn){
    echo "database is connected succesfully";
}


?>
