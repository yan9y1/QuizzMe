window.onload = function(){
	document.getElementById("signup").onclick = signup;
	var username = document.getElementById("name");
	var nameerror = document.getElementsByClassName("nameError");
	var pwd = document.getElementById("pwd");
	var pwdagain = document.getElementById("pwdagain");
	var pwderror = document.getElementsByClassName("errorPwd");
	var p = document.getElementsByTagName("p");
	pwd.onclick = clearError;
	pwdagain.onclick = clearError;
	username.onclick = clearError;

	function signup(){
		if(pwd.value == "" || username.value == "") return;
		if(pwd.value != pwdagain.value){
			pwd.style.border = "1px solid red";
			showError(pwdagain,pwderror);
		}else{
			SimpleAjax("sign_up.php","POST","name=" + username.value + "&pwd=" + pwd.value,onSuccess,onFailure)
		}
	}

	function clearError(){
		pwd.style.border = "1px solid black";
		pwdagain.style.border = "1px solid black";
		username.style.border = "1px solid black";
		for(var i = 0; i < pwderror.length; i++){
			pwderror[i].style.visibility = "hidden";
		}
		for(var i = 0; i < nameerror.length; i++){
			nameerror[i].style.visibility = "hidden";
		}
	}

	function showError(textInput,errorClass){
		textInput.style.border = "1px solid red";
		for(var i = 0; i < errorClass.length; i++){
			errorClass[i].style.visibility = "visible";
		}
	}

	function onSuccess(request){
		var res = request.responseText;
		console.log(res);
		if(res == "success"){
			window.location.href="index.php";
		}else if(res == "nameError"){
			showError(username, nameerror);
		}
	}

	function onFailure(request){
		console.log(request.responseText);
	}
}