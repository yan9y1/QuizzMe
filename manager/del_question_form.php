<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Deleting requests</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class = "header">
		<h1>Delete These Questions?</h1>
	</div>
	<div id="link"> <a href="home.php">View users' adding requests</a> </div>
	<table class="main-content"  border="1px" cellspacing="0">
		<tr>
			<th style="width: 200px">Question</th>
			<th style="width: 300px">Choices</th>
			<th style="width: 80px">ANS</th>
			<th style="width: 80px">Username</th>
			<th style="width: 100px">Indication</th>
			<th style="width: 100px">Theme</th>
			<th>Level</th>
			<th style="width: 80px">Option</th>
		</tr>
		<?php
			$con = mysqli_connect("localhost","root","***","quizzme");
			if(!$con){
				die('could not connect: '.mysql_error());
			}
			$sql = "SELECT * FROM temporary_del";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
		?>
				<tr>
					<td> <textarea id="que" readonly="readonly"> <?= $row["question"] ?> </textarea> </td>
					<td>
						<table id="in_table" border="1px" cellspacing="0">
							<tr>
								<th class="top">A</th>
								<td class="top">  <?= $row["AChoice"] ?> </td>
							</tr>
							<tr>
								<th>B</th>
								<td>  <?= $row["BChoice"] ?> </td>
							</tr>
							<tr>
								<th>C</th>
								<td>  <?= $row["CChoice"] ?> </td>
							</tr>
							<tr>
								<th class="bottom">D</th>
								<td class="bottom">  <?= $row["DChoice"] ?> </td>
							</tr>
						</table>
					</td>
					<td> <?= $row["answer"] ?> </td>
					<td> <?= $row["username"] ?> </td>
					<td> <textarea id="ind" readonly="readonly"> <?= $row["indication"] ?> </textarea> </td>
					<td> <?= $row["theme"] ?> </td>
					<td> <?= $row["level"] ?> </td>
					<td>		
						<form action="del_question.php" method="POST">
							<input type="hidden" name="how" value="agree">
							<input type="hidden" name="id" value=<?= $row['id'] ?> >
							<input class="button-style" id="yes" type="submit" value="Yes">
						</form>
						<span>
						<form action="del_question.php" method="POST">
							<input type="hidden" name="how" value="disagree">
							<input type="hidden" name="id" value=<?= $row['id'] ?>>
							<input class="button-style" type="submit" value="No">
						</form>
						</span>
					</td>
				</tr>
		<?php
				}
			}
		?>
	</table>
</body>
</html>