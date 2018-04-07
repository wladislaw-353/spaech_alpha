<?
session_start();
if(!isset($_SESSION['user'])){
	session_destroy();
	header('Location: /index.php');
}
include 'config.php';
include 'library/main.php';
$currentUser = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- <link rel="icon" type="image/vnd.microsoft.icon" href="img/icons/favicon.ico"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
    <title>Settings</title>
</head>
<body>

    <nav>
        <div class="avatar">
            <img src="img/<?=$currentUser->avatar;?>" alt="">
            <h1><?=$currentUser->login;?></h1>
        </div>
        <div class="links">
            <a href="myRating.php"><span class="material-icons">favorite_border</span> My Rating</a>
            <a href="account.php"><span class="material-icons">person_outline</span> Account</a>
            <a href="#"><span class="material-icons">notifications_none</span> Notification</a>
            <a href=""><span class="material-icons">settings</span> Settings</a>
            <a href="index.php?action=escape"><span class="material-icons">exit_to_app</span> Exit</a>
        </div>
    </nav>

    <div class="content-wrapper">

            <header>
                <div class="header-nav">
                    <div class="holder">
                        <a href="myRating.php" class="back-link">
                            <span class="material-icons">keyboard_arrow_left</span>
                        </a>
                        <span class="title">Settings</span>
                    </div>
                </div>
            </header>

		<p>Test <?echo alexa_rank("https://spaech.com/");?></p>
		<?
		function alexa_rank($url){
    		$xml = simplexml_load_file("http://data.alexa.com/data?cli=10&url=".$url);
    		if(isset($xml->SD)):
        		return $xml->SD->REACH->attributes();
    		endif;
		}
		?>

            <article>
                <form action="settings.php?action=change_info" method="post">
					<div class="holder">
						<div>
							<span class="sett-title">Change avatar</span>
							<input type="file">
						</div>
						<div>
							<span class="sett-title">Change login</span>
							<input type="text">
						</div>
						<div>
							<span class="sett-title">Change password</span>
							<input type="password">
							<input placeholder="repeat password" type="password">
						</div>
						<button class="btn btn-success">Save</button>
					</div>
				</form>
            </article>



        <!-- тут должен быть футер -->
    </div>

    <div class="mobile-menu">
        <div data-mm-close class="dark-bg-mobile-menu"></div>
        <div class="menu-bar">
            <div class="avatar">
                <img src="img/<?=$currentUser->avatar;?>" alt="">
                <h1><?=$currentUser->login;?></h1>
            </div>
            <div class="links">
                <a href="myRating.php">
                    <span class="material-icons">favorite_border</span> My Rating</a>
                <a href="account.php">
                    <span class="material-icons">person_outline</span> Account</a>
                <a href="#">
                    <span class="material-icons">notifications_none</span> Notification</a>
                <a href="">
                    <span class="material-icons">settings</span> Settings</a>
                <a href="index.php?action=escape">
                    <span class="material-icons">exit_to_app</span> Exit</a>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/mobile-menu.js"></script>
    <script src="js/main.js"></script>
</body>
</html>