<?php

$how = $_POST['how'];
$id = $_POST['id'];
$con = mysqli_connect("localhost","root","***","quizzme");
if(!$con){
	die('could not connect: '.mysql_error());
}
if($how == "agree"){	
	$sql = "SELECT * FROM temporary_add WHERE id = \"" .$id. "\"";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$question = $row["question"];
	$AChoice = $row["AChoice"];
	$BChoice = $row["BChoice"];
	$CChoice = $row["CChoice"];
	$DChoice = $row["DChoice"];
	$answer = $row["answer"];
	$indication = $row["indication"];
	$theme = $row["theme"];
	$level = $row["level"];

	$left = "INSERT INTO all_question(question,AChoice,BChoice,CChoice,DChoice,answer,indication,theme,level)";
	$sql1 = $left . "VALUES(\"$question\",\"$AChoice\",\"$BChoice\",\"$CChoice\",\"$DChoice\",\"$answer\",\"$indication\",\"$theme\",\"$level\")";
	mysqli_query($con,$sql1);
}

$sql2 = "DELETE FROM temporary_add WHERE id = \"$id\"";
mysqli_query($con,$sql2);

header("LOCATION: home.php");

?>