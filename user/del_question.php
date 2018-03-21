<?php
//get the user's id and username
$id = $_POST['id'];
$username = $_POST['username'];

$con = mysqli_connect("localhost","root","***","quizzme");
$sql = "SELECT * FROM all_question WHERE id = " . $id;
$answer = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($answer);

$q = $row['question'];
$A = $row['AChoice'];
$B = $row['BChoice'];
$C = $row['CChoice'];
$D = $row['DChoice'];
$ans = $row['answer'];
$ind = $row['indication'];
$theme = $row['theme'];
$l = $row['level'];

$value = "(\"".$username."\",\"".$q."\",\"".$A."\",\"".$B."\",\"".$C."\",\"".$D."\",\"".$ans."\",\"".$ind."\",\"".$theme."\",\"".$l."\",\"".$id."\")";
$sql1 = "INSERT INTO temporary_del (username,question,AChoice,BChoice,CChoice,DChoice,answer,indication,theme,level,id) VALUES".$value;
$result = mysqli_query($con,$sql1);

?>