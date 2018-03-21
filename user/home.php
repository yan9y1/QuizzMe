<?php
	session_start();

	//whether the user has logined
	$login = $_SESSION["login"];

	$con = mysqli_connect("localhost","root","***","quizzme");
	if(!$con){
		die('could not connect: '.mysql_error());
	}

	//select 10 questions randomly
	$sql = "SELECT * FROM all_question order by rand() LIMIT 10";
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	$q = array();
	for($i = 0; $i < $count; $i++){
		$row = mysqli_fetch_assoc($result);
		$q[$i] = array($row['question'],$row['AChoice'],$row['BChoice'],$row['CChoice'],$row['DChoice'],$row['answer'],$row['indication'],$row['theme'],$row['level'],$row['id']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quizz Me</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/play_main.css">
	<script type="text/javascript" src="js/play_game.js"></script>
	<script type="text/javascript" src="js/ajaxFun.js"></script>
	<script>
	//initialize
		var login = '<?php echo $login ?>';
		var Q = new Array();
		for(var i = 0; i < 10; i ++){
			Q[i] = new Array();
		}
		Q[0] = <?php echo json_encode($q[0]) ?>;
		Q[1] = <?php echo json_encode($q[1]) ?>;
		Q[2] = <?php echo json_encode($q[2]) ?>;
		Q[3] = <?php echo json_encode($q[3]) ?>;
		Q[4] = <?php echo json_encode($q[4]) ?>;
		Q[5] = <?php echo json_encode($q[5]) ?>;
		Q[6] = <?php echo json_encode($q[6]) ?>;
		Q[7] = <?php echo json_encode($q[7]) ?>;
		Q[8] = <?php echo json_encode($q[8]) ?>;
		Q[9] = <?php echo json_encode($q[9]) ?>;
	</script>
</head>
<body>
	<div id="log"> <a id="logout" href="index.php" onlclick="alert(111)">Sign in</a> </div>
	<div class="navigation">
		<button id="history" onclick="jump('history.php')">History</button>
		<button id="add_question" onclick="jump('add_question_form.php')">Add Question</button>
	</div>
	<div class = "maintain">
		<div class="title">
			<div class="left">
			<h1 id="theme"></h1>
			<div id="level">
				<img id="img1" src="">
				<img id="img2" src="">
				<img id="img3" src="">
				<img id="img4" src="">
				<img id="img5" src="">
			</div>
			<p id="hint"></p>
			</div>
			<img id="time" src="images/9.png">
		</div>
		<p id="question"></p>
		<div class="question">
			<div class="ans">
				<input type="checkbox" name="A" id="A_choice">
				<label for="A_choice" id="A_answer"></label>
			</div>
			<div class="ans">
				<input type="checkbox" name="B" id="B_choice">
				<label for="B_choice" id="B_answer"></label>
			</div>
			<div class="ans">
				<input type="checkbox" name="C" id="C_choice">
				<label for="C_choice" id="C_answer"></label>
			</div>
			<div class="ans">
				<input type="checkbox" name="D" id="D_choice">
				<label for="D_choice" id="D_answer"></label>
			</div>
			<button id="sub" onclick="check()">submit</button>
		</div>
		<div id="tail">
			<div id="left">
			<h2 id="end"></h2> </span>
			<button id="nex" onclick="begin()">Next</button>
			<button id="del" onclick="DeleteQuestion()">Delete</button>
			<button id="pAgain" onclick = "jump('home.php')">Play Again</button>
			</div>
			<div id="grade">
				<p id="num"></p>
				<img id="expr" src="">
			</div>
		</div>
	</div>
	<button id="begin" onclick= "begin()">Begin!</button>
</body>
</html>