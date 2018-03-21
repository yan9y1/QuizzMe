<?php

$id = $_POST['id'];
$how = $_POST['how'];
$con = mysqli_connect("localhost",'root','***','quizzme');
$sql = "DELETE FROM temporary_del where id=".$id;
mysqli_query($con,$sql);
if($how == "agree"){
	$sql1 = "DELETE FROM all_question where id=".$id;
	mysqli_query($con,$sql1);
}

header("LOCATION: del_question_form.php");

?>