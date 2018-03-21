<?php

$pwd = $_POST['pwd'];
if($pwd == "TIEI"){
	header("LOCATION: home.php");
}else{
	header("LOCATION: error.php");
}

?>