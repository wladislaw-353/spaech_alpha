<?php
session_start();
include('config.php');
include('library/settings.php'); 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$_SERVER['HTTP_HOST']?> admin</title>
	<link rel="stylesheet" href="<?=$root?>assets/css/bootstrap.min.css">
	<script src="<?=$root?>assets/js/jquery.min.js"></script>
	<script src="<?=$root?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li>					
					<a class="btn btn-default btn-lg" href="<?=$root?>admin/" role="button"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
				</li>
				<li>					
					<a class="btn btn-default btn-lg" href="<?=$root?>" target="_blank" role="button"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<?php
		if (isset($_SESSION['user_id'])) {
			include 'library/main.php';
		}
		else{
			include 'library/auth.php';
		}
		?>
	</div>
</div>
</body>
</html>