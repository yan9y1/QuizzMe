<?php
	session_start();
	$login = $_SESSION["login"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>History</title>
	<link rel="stylesheet" type="text/css" href="css/history.css">
	<link rel="stylesheet" type="text/css" href="css/play_main.css">
	<script type="text/javascript">
		function jump(u){
			window.location.href = u;
		}
	</script>
</head>
<body>
	<div class="navigation">
		<button id="play" onclick="jump('home.php')">Play</button>
		<button id="add_question" onclick="jump('add_question_form.php')">Add Question</button>
	</div>
	<div class = "maintain">
		<table border="1">
			<tr>
				<th>Grade</th>
				<th>Date</th>
				<th>Time</th>
			</tr>
			<?php 
				$con = mysqli_connect("localhost","root","***","quizzme");
				if(!$con){
					die('could not connect: '.mysql_error());
				}
				if($login == "") header("LOCATION: error.php?error=nologin");
				$sql = "SELECT * FROM ".$login."_table";
				$result = mysqli_query($con,$sql);
				$count = mysqli_num_rows($result);
				for($i = 0; $i < $count; $i++){
					$row = mysqli_fetch_assoc($result);
			?>
			<tr>
				<td> <?= $row['grade'] ?> </td>
				<td> <?= $row['date'] ?> </td>
				<td> <?= $row['time'] ?> </td>
			</tr>
			<?php
				}
			?>
		</table>
		<div id="log"> <a href="index.php" onlclick="alert(111)">log out</a> </div>
	</div>
</body>
</html>