<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- <link rel="icon" type="image/vnd.microsoft.icon" href="img/icons/favicon.ico"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
	<link rel="stylesheet" href="/css/modals.css">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
    <script src="js/screenfull.js"></script>
    <title><?=$page_title;?></title>
    <script>
       if (screenfull.enabled) {
            screenfull.request();
        } else {
            // Ignore or do something else
        }

        document.fullscreenEnabled = document.fullscreenEnabled || document.mozFullScreenEnabled || document.documentElement.webkitRequestFullScreen;

        function requestFullscreen(element) {
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullScreen) {
                element.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        }

        if (document.fullscreenEnabled) {
            requestFullscreen(document.documentElement);
        }

    </script>
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
            <a href="messanger.php"><span class="material-icons">sms</span> Messenger</a>
            <a href="settings.php"><span class="material-icons">settings</span> Settings</a>
            <a href="settings.php"><span class="material-icons">videogame_asset</span> Games</a>
            <a href="settings.php"><span class="material-icons">live_help</span> FAQ / Support</a>
            <a href="index.php?action=escape"><span class="material-icons">exit_to_app</span> Exit</a>
        </div>
    </nav>

    <div class="content-wrapper">

            <header>
                <div class="header-nav">
                    <div class="holder">
						<?if($page_title == 'myRating'){?>
							<span class="material-icons bars" data-mm-open>menu</span>
							<span class="title">Spaech</span>
							<div class="searh-container">
								<span onclick="window.location.href='/add_contact.php'" class="material-icons search-button">search</span>
								<input type="text">
								<span class="material-icons close-btn">close</span>
							</div>
						<?} else{?>
                        <a href="<?=$back_url;?>" class="back-link">
                            <span class="material-icons">keyboard_arrow_left</span>
                        </a>
						<a href="<?=$back_url;?>"><span class="title"><? if($page_title=="Categories"){ echo $page_title." ".$target_user_login; } else{ echo $page_title; } ?></span></a><?}?>
                    </div>
                </div>
				<?if($page_title == 'myRating'){?>
					<div class="holder">
						<img src="img/<?=unserialize($_SESSION['user'])->avatar?>" alt="">
						<?$marks = (unserialize($_SESSION['user'])->getRating(unserialize($_SESSION['user'])->id)!="none")? unserialize($_SESSION['user'])->getRating(unserialize($_SESSION['user'])->id) : ""; ?>
						<h1 class="name"><?=unserialize($_SESSION['user'])->login." ".$marks['total'];?></h1>
					</div>
					<div class="tabs">
						<div class="" id="btn-contacs">contacts</div>
						<div class="active" id="btn-categories">categories</div>
					</div>
				<?}?>
            </header>