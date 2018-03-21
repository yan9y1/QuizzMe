<?php
	$username = $_POST["username"];
	$grade = $_POST["grade"];
	$con = mysqli_connect("localhost","root","***","quizzme");
	if(!$con){
		die('could not connect: '.mysql_error());
	}
	$sql = "INSERT INTO ".$username."_table VALUES(\"".$grade."\",CURDATE(),CURTIME())";
	mysqli_query($con,$sql);
?>