<?php
	session_start();
	$_SESSION["login"] = "";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>QuizzMe</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link type="text/css" rel="stylesheet" href="css/index.css" />
	<script type="text/javascript" src="js/signin.js"></script>
	<script type="text/javascript" src="js/ajaxFun.js"></script>
</head>
<body>
	<div class = header>
		<img src="images/logo.png">
		<form action="sign_up_form.php"> <input class = buttonstyle type="submit" value="sign up"> </form>
	</div>
	<form class="formstyle">
		<label for="name">Username</label>
		<input type="text" name="username" id="name" required="required"> 
		<span class = "error nameError"></span>
		<p class = nameError>The username doesn't exit!</p>	
		<label for="pwd">Password</label>
		<input type="password" name="password" id="pwd" required="required">
		<span class = "error pwdError"></span>
		<p class="pwdError">The password is wrong!</p>
		<span class = "sign_in"> <input class = "buttonstyle" type="button" value="sign in" id="signin"> </span>
		<span class = "try"> <input class = "buttonstyle" type="button" value="have a try" id="try"> </span>
	</form>
	<div id="copyright">
		copyright © 2018-03 B2G company <a href="about.html">know us</a>
	</div>
</body>
</html>