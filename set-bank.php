<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-26 05:54:52
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-26 06:33:48
 */

	if(!empty($_POST['quiz']) && !empty($_POST['answer'])){
		$bank = file_get_contents('bank.json');
		$bank = json_decode($bank);
		array_unshift($bank, [
			'quiz' => $_POST['quiz'],
			'answer' => $_POST['answer']
		]);
		file_put_contents('bank.json', json_encode($bank, JSON_PRETTY_PRINT));
	}
	$bank = file_get_contents('bank.json');
	$bank = json_decode($bank);
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
	</head>

	<body>
		<div class="container">
			<form action="" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<legend>Form title</legend>
				</div>
				<div class="form-group">
					<label for="inputQuiz" class="col-sm-2 control-label">Quiz:</label>
					<div class="col-sm-10">
						<input type="text" name="quiz" id="inputQuiz" class="form-control" required="required">
					</div>
				</div>
				<div class="form-group">
					<label for="inputAnswer" class="col-sm-2 control-label">Answer:</label>
					<div class="col-sm-10">
						<input type="text" name="answer" id="inputAnswer" class="form-control" required="required">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
			<h3><?php echo sizeof($bank); ?></h3>
			<?php foreach ($bank as $key => $value): ?>
				<ul>
					<li>
						<b><?php echo $value->quiz; ?></b>
						<br><?php echo $value->answer; ?>
					</li>
				</ul>
			<?php endforeach ?>
		</div>
	</body>

	</html>
