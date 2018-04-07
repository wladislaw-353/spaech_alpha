<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- <link rel="icon" type="image/vnd.microsoft.icon" href="img/icons/favicon.ico"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
	<link rel="stylesheet" href="/css/modals.css">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
    <title><?=$page_title;?></title>
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
            <a href="messanger.php"><span class="material-icons">sms</span> Messages</a>
            <a href="settings.php"><span class="material-icons">settings</span> Settings</a>
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
								<span class="material-icons search-btn">search</span>
								<input type="text">
								<span class="material-icons close-btn">close</span>
							</div>
						<?} else{?>
                        <a href="<?=$back_url;?>" class="back-link">
                            <span class="material-icons">keyboard_arrow_left</span>
                        </a>
						<a href="<?=$back_url;?>"><span class="title friend_name_url"></span></a><?}?>
                    </div>
                </div>
            </header>