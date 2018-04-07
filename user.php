<?
session_start();
if(!isset($_SESSION['user'])){
	session_destroy();
	header('Location: /index.php');
}
include 'config.php';
include 'library/main.php';
include 'library/blocks.php';
$user_id = $_GET['id'];
$currentUser = unserialize($_SESSION['user']);
$target_user = $currentUser->getUserById($user_id);

$friend = $currentUser->getUserById($user_id)['login'];
$dialog_id = to_array(mysqli_query($db, "SELECT id FROM dialogs WHERE ( user1 = '$currentUser->login' AND user2 = '$friend') OR ( user1 = '$friend' AND user2 = '$currentUser->login')"))[0]['id'];
if($dialog_id==""){
	$dialog_id = "false";
}

$page_title = "user";
$back_url = "myRating.php";
include 'parts/inner_header.php';
include 'parts/inner_content.php';
include 'parts/inner_mobile_menu.php';?>