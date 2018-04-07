<?
include 'config.php';
include 'library/main.php';
session_start();
if(!isset($_SESSION['user'])){
	session_destroy();
	header('Location: /index.php');
}
$user_id = $_GET['id'];
$currentUser = unserialize($_SESSION['user']);
$target_user = $currentUser->getUserById($user_id);
$page_title = "Add Category";
//include 'parts/inner_header.php';
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
    <title>Add Category</title>
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
            <div class="header-categories">
                <div class="holder">
                    <div class="name-categories">
                        <a href="#"><span class="material-icons">keyboard_arrow_left</span></a>
                        <a href="addcategory_main.php?id=<?=$user_id?>"><p>Categories <?=$target_user['login'];?></p></a>
                   </div>
                   <div class="edit-categories">
                     <form action="addcategory_main.php?id=<?=$user_id?>&action=add_category" method="POST">
                       <a href="addcategory_main.php?id=<?=$user_id?>"><input type="text" value="CANCEL" ></a>
                       <input type="submit" value="SAVE" id="new_category_save">
					   <input type="text" style="display:none" name="new_category" id="new_category_input_fake" value="" required>
                     </form>
                   </div>
                </div>
            </div>
        </header>

<?include 'parts/inner_content.php';
include 'parts/inner_mobile_menu.php';?>