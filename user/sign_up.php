<?php

$name = $_POST["name"];
$pwd = $_POST["pwd"];
$con = mysqli_connect("localhost","root","***","quizzme");
if(!$con){
	die('could not connect: '.mysql_error());
}
$sql = "SELECT * FROM user where username = \"" . $name ."\"";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) != 0){
	echo("nameError");
}else{
	$sql = "INSERT INTO user (username,password) VALUES (\"". $name. "\",\"". $pwd. "\")";
	mysqli_query($con,$sql);
	//create table for this user
	$sql2 = "CREATE TABLE ".$name."_table (grade INT NOT NULL, date DATE NOT NULL, time TIME NOT NULL )";
	mysqli_query($con,$sql2);
	echo("success");
}

?>
