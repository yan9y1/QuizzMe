var flag = 0;
var sources = ["9.png","8.png","7.png","6.png","5.png","4.png","3.png","2.png","1.png","0.png"];
var T = 1;
var timer;
var grade = 0;

//show the countdown images
function countdown(){
	document.getElementById("time").src = "images/" + sources[T];
	T++;
	if(T == 10){
		check();
	}
}

//show the question
function begin(){
	init();
	var q = Q[flag][0];
	var A = Q[flag][1];
	var B = Q[flag][2];
	var C = Q[flag][3];
	var D = Q[flag][4];
	var indi = Q[flag][6];
	var theme = Q[flag][7];
	var l = Q[flag][8];

	var begin = document.getElementById("begin");
	begin.style.visibility = "hidden";

	//theme
	var domain = document.getElementById("theme");
	domain.innerHTML = theme;

	//level
	for(var i = 1; i <= 5; i++){
		var img = document.getElementById("img" + i);
		if(i <= l){
			img.src = "images/star1.png";
		}else{
			img.src = "images/star2.png";
		}
	}

	//hint
	var hint = document.getElementById("hint");
	hint.innerHTML = "(hint:" + indi + ")";

	//question
	var question = document.getElementById("question");
	question.innerHTML = (flag + 1) + ". " + q;

	//choises
	var answer = document.getElementsByClassName("ans");
	for(var i = 0; i < answer.length; i++){
		answer[i].style.visibility = "visible";
	}
	var A_answer = document.getElementById("A_answer");
	A_answer.innerHTML = "A. " + A;
	var B_answer = document.getElementById("B_answer");
	B_answer.innerHTML = "B. " + B;
	var C_answer = document.getElementById("C_answer");
	C_answer.innerHTML = "C. " + C;
	var D_answer = document.getElementById("D_answer");
	D_answer.innerHTML = "D. " + D;

	var sub = document.getElementById("sub");
	sub.style.visibility = "visible";

	timer = setInterval(countdown,1000);
}

//init
function init(){
	var time = document.getElementById("time");
	time.src = "images/9.png";
	time.style.visibility = "visible";
	document.getElementById("A_choice").checked = false;
	document.getElementById("B_choice").checked = false;
	document.getElementById("C_choice").checked = false;
	document.getElementById("D_choice").checked = false;
	document.getElementById("sub").disabled = false;
	document.getElementById("A_choice").disabled = false;
	document.getElementById("B_choice").disabled = false;
	document.getElementById("C_choice").disabled = false;
	document.getElementById("D_choice").disabled = false;
	document.getElementById("history").disabled = true;
	document.getElementById("add_question").disabled = true;
	document.getElementById("tail").style.visibility = "hidden";
}

//when the user iif submitting the answer some buttons should be forbidenned
function forbiden(){
	document.getElementById("sub").disabled = true;
	document.getElementById("A_choice").disabled = true;
	document.getElementById("B_choice").disabled = true;
	document.getElementById("C_choice").disabled = true;
	document.getElementById("D_choice").disabled = true;
}

//check if the answer is right
function check(){
	clearInterval(timer);
	forbiden();
	var ans = Q[flag][5];
	var A_choice = document.getElementById("A_choice").checked;
	var B_choice = document.getElementById("B_choice").checked;
	var C_choice = document.getElementById("C_choice").checked;
	var D_choice = document.getElementById("D_choice").checked;
	var aa = "";
	if(A_choice) aa += "A";
	if(B_choice) aa += "B";
	if(C_choice) aa += "C";
	if(D_choice) aa += "D";	

	var tail = document.getElementById("tail");
	tail.style.visibility = "visible";
	var end = document.getElementById("end");
	if(aa == ans){
		grade++;
		end.innerHTML = "You are right!";
		end.style.color = "red";
	}else{
		end.innerHTML = "You are wrong! The answer is " + ans;
		end.style.color = "green";
	} 
	T = 1;
	flag++;
	if(flag == 10) gameOver();
}

//Game is over
function gameOver(){
	var left = document.getElementById("left");
	var nex = document.getElementById("nex");
	left.removeChild(nex);
	document.getElementById("pAgain").style.visibility = "visible";
	document.getElementById("history").disabled = false;
	document.getElementById("add_question").disabled = false;
	var gg = document.getElementById("grade");
	var num = document.getElementById("num");
	var expr = document.getElementById("expr");
	gg.style.visibility = "visible";
	grade *= 10;
	num.innerHTML = "Grade: " + grade;

	//different grade has different style
	if(grade < 60){
		num.style.color = "black";
		expr.src = "images/e-cry.png";
	}else if(grade >= 60 && grade < 80){
		num.style.color = "purple";
		expr.src = "images/e-soso.png";
	}else if(grade >= 80 && grade < 90){
		num.style.color = "green";
		expr.src = "images/e-smile.png";
	}else if(grade >= 90 && grade < 100){
		num.style.color = "orange";
		expr.src = "images/e-laugh.png";
	}else if(grade == 100){
		num.style.color = "red";
		expr.src = "images/e-cool.png";
	}

	if(login != ""){
		SimpleAjax("add_history.php","POST","username=" + login + "&grade=" + grade,onSuccess,onFailure);
	}
}

function onSuccess(request){
	console.log(request.responseText);
}

function onFailure(request){
	console.log(request.responseText);
}

function jump(u){
	window.location.href = u;
}

//the user want wo delete some question
function DeleteQuestion(){
	var id = Q[flag - 1][9];
	SimpleAjax("del_question.php","POST","username=" + login + "&id=" + id,onSuccess,onFailure);
	alert("Submitted successfully!");
}

window.onload = function(){
	if(login != ""){  
		var navigation = document.getElementsByClassName("navigation");
		navigation[0].style.visibility = "visible";
		var logout = document.getElementById("logout");
		logout.innerHTML = "Log out";
	}
}