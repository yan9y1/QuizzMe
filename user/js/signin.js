window.onload = function(){
	document.getElementById("signin").onclick = signIn;
	var name = document.getElementById("name");
	var pwd = document.getElementById("pwd");
	var nameerror = document.getElementsByClassName("nameError");
	var pwderror = document.getElementsByClassName("pwdError");
	document.getElementById("try").onclick = have_try;
	pwd.onclick = clearError;
	name.onclick = clearError;

	//click the "have a try" button
	function have_try(){
		window.location.href = "home.php";
	}
	
	//cick the "sign in" button
	function signIn(){
		var username = name.value;
		var password = pwd.value;
		if(username == "" || password == "") return;
		SimpleAjax("sign_in.php","POST","username=" + username + "&password=" + password,onSuccess,onFailure)
	}

	function clearError(){
		error(name,nameerror,"hidden");
		error(pwd,pwderror,"hidden");
	}

	//handle the error information and error icon
	function error(textInput, errorClass, attribute){
		if(attribute == "visible") textInput.style.border = "1px solid red";
		else if(attribute == "hidden") textInput.style.border = "1px solid black";
		for(var i = 0; i < errorClass.length; i++){
			errorClass[i].style.visibility = attribute;
		}
	}

	function onSuccess(request){
		console.log(request.responseText);
		if(request.responseText == "nameError"){  //username doesn't
			error(name,nameerror,"visible");
		}else if(request.responseText == "passwordError"){  //password is wrong
			error(pwd,pwderror,"visible");
		}else if(request.responseText == "success"){ //success
			window.location.href = "home.php";
		}
	}

	function onFailure(request){
		console.log(request.responseText);
	}
}