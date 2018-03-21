<?php

// question
$question = $_GET["question"];

// answer
$A_ans = $_GET["A_ans"];
$B_ans = $_GET["B_ans"];
$C_ans = $_GET["C_ans"];
$D_ans = $_GET["D_ans"];

// right answer
$answer = "";
if(isset($_GET["A"])) $answer = $answer."A";
if(isset($_GET["B"])) $answer = $answer."B";
if(isset($_GET["C"])) $answer = $answer."C";
if(isset($_GET["D"])) $answer = $answer."D";

// indication theme level
$indication = $_GET["indication"];
$theme = $_GET["theme"];
$level = $_GET["level"];

$con = mysqli_connect("localhost","root","***","quizzme");
if(!$con){
	die('could not connect: '.mysql_error());
}

// insert
$value = "(\"".$question."\",\"".$A_ans."\",\"".$B_ans."\",\"".$C_ans."\",\"".$D_ans."\",\"".$answer."\",\"".$indication."\",\"".$theme."\",\"".$level."\")";
$sql = "INSERT INTO temporary_add (question,AChoice,BChoice,CChoice,DChoice,answer,indication,theme,level) VALUES".$value;
if($question != "") $result = mysqli_query($con,$sql);
header("LOCATION: add_successfully.php");
?>