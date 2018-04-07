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
$target_user_login = $target_user['login'];
$page_title = "Categories";
$back_url = "user.php?id=".$user_id;
include 'parts/inner_header.php';
include 'parts/inner_content.php';
include 'parts/inner_mobile_menu.php';?>