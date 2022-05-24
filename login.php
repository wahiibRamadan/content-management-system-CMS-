<?php include "db.php";  ?>
<?php session_start(); ?>

<?php
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = mysqli_real_escape_string($con , $username);
	$password =  mysqli_real_escape_string($con, $password);

	$query = "select * from users where username = '{$username}' ";
	$select_user = mysqli_query($con,$query);

	while($row=mysqli_fetch_assoc($select_user)){
		$db_user_id = $row['user_id'];
		$db_username = $row['username'];
		$db_password = $row['password'];
		$db_firstname = $row['firstname'];
		$db_lastname = $row['lastname'];
		$db_role = $row['role'];
	}
	// $password = crypt($password , $db_password);

	if ($username !== $db_username &&  $password !== $db_password ) {
		// code...

		header("Location:../index.php");
	}
	else if ($username == $db_username && $password !== $db_password) {
		
		header("Location:../index.php");
	}
	else if ($username !== $db_username && $password == $db_password) {
		
		header("Location:../index.php");
	}
	else{
		$_SESSION['username'] = $db_username;
		$_SESSION['firstname'] = $db_firstname;
		$_SESSION['lastname'] = $db_lastname;
		$_SESSION['role'] = $db_role;
		header("Location:../admin");
	}
}

?>