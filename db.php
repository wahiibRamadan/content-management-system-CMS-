<?php
$con = mysqli_connect('localhost' , 'root','' , 'cms');
if (!$con) {
	// code...
	die("eroor".mysqli_error($con));
}

?>