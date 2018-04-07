<?
session_start();
if(!isset($_SESSION['user'])){
	session_destroy();
	header('Location: /index.php');
}
include 'config.php';
include 'library/main.php';
include 'library/blocks.php';
$currentUser = unserialize($_SESSION['user']);
$page_title = "account";
$back_url = "myRating.php";
include 'parts/inner_header.php';
include 'parts/inner_content.php';
include 'parts/inner_mobile_menu.php';?>
<!-- тут должен быть футер -->