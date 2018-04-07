<?php
$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
mysqli_select_db($db, DB_NAME);
mysqli_query ($db,"set_client='utf8'");
mysqli_query ($db,"set character_set_results='utf8'");
mysqli_query ($db,"set collation_connection='utf8_general_ci'");
mysqli_query ($db,"SET NAMES utf8");
mysqli_set_charset($db,'utf8');

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
if(isset($_GET['block_id'])){
	$block_id = $_GET['block_id'];
}
if(isset($_GET['type'])){
	$type = $_GET['type'];
}
if(isset($_GET['action'])){
	$action = $_GET['action'];
}
if(isset($_GET['item'])){
	$item = $_GET['item'];
}
switch ($type) {
	case 'pages':
	$nav1_name = 'Страницы';
	$nav1_tn = 'pages';
		break;
	case 'htmls':
	$nav1_name = 'Произвольный контент';
	$nav1_tn = 'htmls';
		break;
	case 'sliders':
	$nav1_name = 'Слайдеры';
	$nav1_tn = 'sliders';
		break;
	case 'rewies':
	$nav1_name = 'Отзывы';
	$nav1_tn = 'rewies';
		break;
	case 'menus':
	$nav1_name = 'Меню';
	$nav1_tn = 'menus';
		break;
	case 'posts_blocks':
	$nav1_name = 'Блоки записей';
	$nav1_tn = 'posts_blocks';
		break;
	case 'carousels_blocks':
	$nav1_name = 'Карусели';
	$nav1_tn = 'carousels_blocks';
		break;
	case 'galerys':
	$nav1_name = 'Галереи';
	$nav1_tn = 'galerys';
		break;
	case 'administrators':
	$nav1_name = 'Пользователи';
	$nav1_tn = 'administrators';
		break;
	case 'categories':
	$nav1_name = 'Категории';
	$nav1_tn = 'categories';
		break;
	case 'products':
	$nav1_name = 'Товары';
	$nav1_tn = 'products';
		break;
	case 'spares':
	$nav1_name = 'Запчасти';
	$nav1_tn = 'spares';
		break;
	case 'providers':
	$nav1_name = 'Поставщики';
	$nav1_tn = 'providers';
		break;
}
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>