<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign_up.css">
	<script type="text/javascript" src="js/signup.js"></script>
	<script type="text/javascript" src="js/ajaxFun.js"></script>
</head>
<body>
	<div class = header>
		<img src="images/logo.png">
	</div>
	<form class = "formstyle">
		<label for="name">Username</label>
		<input type="text" name="username" id = "name" required="required">
		<span class = "error nameError" ></span>
		<p class = "nameError">This username has been used!</p>	
		<label for="pwd">Password</label>
		<input type="Password" name="password" id="pwd" required="required">
		<span class = "error errorPwd" id="pwdError"></span>
		<p class = "errorPwd">The two passwords are not the same!</p>	
		<label for="pwdagain">Confirm Password</label>
		<input type="Password" name="conPassword" id="pwdagain" required="required">
		<span class = "error errorPwd"></span>
		<p class = "errorPwd">The two passwords are not the same!</p>	
		<span><input class="buttonstyle" type="button" id="signup" value="Sign Up"></span>
	</form>
</body>
</html>