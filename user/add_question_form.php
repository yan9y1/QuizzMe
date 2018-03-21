<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add New Question</title>
	<link rel="stylesheet" type="text/css" href="css/play_main.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/add_question.css">
	<script type="text/javascript">
		function jump(u){
			window.location.href = u;
		}
	</script>
</head>
<body>
	<div id="log"> <a href="index.php" onlclick="alert(111)">log out</a> </div>
	<div class="navigation">
		<button onclick="jump('home.php')">Play</button>
		<button onclick="jump('history.php')">History</button>
	</div>
	<div class = "maintain">
		<form action="add_question.php" method="GET">
		<label for="question">1. Please input your question in the box below:</label> <br \>
		<textarea name="question" required></textarea> <br>
		
		<div id="second"> <label>2. Input the choices of this question:</label> </div>
		<div class="answer">
		<label for="A_ans">A.</label>
		<input type="text" name="A_ans" id="A_ans" required> <br>
		<label for="B_ans">B.</label>
		<input type="text" name="B_ans" id="B_ans" required> <br>
		<label for="C_ans">C.</label>
		<input type="text" name="C_ans" id="C_ans" required> <br>
		<label for="D_ans">D.</label>
		<input type="text" name="D_ans" id="D_ans" required> <br>
		</div>

		<div class="right_answer">
		<label>3. The right answer(s) is/are:&nbsp</label> 
		<input type="checkbox" name="A" id="A">
		<label for="A">A</label>
		<input type="checkbox" name="B" id="B">
		<label for="B">B</label>
		<input type="checkbox" name="C" id="C">
		<label for="C">C</label>
		<input type="checkbox" name="D" id="D">
		<label for="D">D</label> <br>
		</div>

		<label for="indication">4. Indication of answers:</label> <br \>
		<input type="text" name="indication" id="indication" required> <br>

		<label>5. Theme:&nbsp</label>
		<select id="theme" name="theme">
			<option>History</option>
			<option>Math</option>
			<option>Chemistory</option>
			<option>Physics</option>
			<option>Music</option>
			<option>Movie</option>
			<option>English</option>
			<option>Others</option>
		</select> <br>

		<label>6. Difficulty level:&nbsp</label>
		<select id="lev" name="level">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
		</select> <br>
		<input id="end" type="submit" value="Submit">
		</form>
	</div>
</body>
</html
