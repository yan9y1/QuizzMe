<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];
$con = mysqli_connect("localhost","root","***","quizzme");
if(!$con){
	die('could not connect: '.mysql_error());
}
$sql = "SELECT * FROM user WHERE username = \"".$username. "\"";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) == 0){
	echo("nameError");
}else{	
	$row = mysqli_fetch_assoc($result);
	$pwd = $row["password"];
	if($pwd === $password){
		echo "success";
		$_SESSION["login"] = $username;
	}else{
		echo "passwordError";
	}
}

?>