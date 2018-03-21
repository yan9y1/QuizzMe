<?php

$error = $_GET['error'];
$info;
if($error == "nologin"){
	$info = "You haven't logged in!";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Error</title>
</head>
<body>
	<h1>ERROR!</h1>
	<hr \>
	<h2> <?= $info ?> </h2>
	click <a href="index.php">here </a>to go back home!


</body>
</html>