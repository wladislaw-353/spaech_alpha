<?php
include 'User.php';
$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
mysqli_select_db($db, DB_NAME);
mysqli_query ($db,"set_client='utf8'");
mysqli_query ($db,"set character_set_results='utf8'");
mysqli_query ($db,"set collation_connection='utf8_general_ci'");
mysqli_query ($db,"SET NAMES utf8");
mysqli_set_charset($db,'utf8');

session_start();

/*echo "<br>jknkjjkjk<br>kjj<br>lkjkjk<br>kkjkj<br>kjk<br>";
$currentUser = unserialize($_SESSION['user']);
echo $currentUser->id;*/
if(isset($_GET['action'])){
	$action = $_GET['action'];
	switch($action){
		case 'enter':
			//echo "entered<br>entered<br>entered<br>entered<br>"; //break;
			if(!isset($_SESSION['user'])){
				$result = checkEnter($_POST['loginEnter'], $_POST['passwordEnter']);
				//echo "<br><br><br>dd<br><br><br>fgfgfg<br><br>";
				//print_r($result);
				if($result != false){
					$_SESSION['enter'] = $result[0];
					$_SESSION['user'] = $result[1];
					header('Location: /myRating.php');
				}
				else{
					header('Location: /index.php');
				}
			}
			else{
				header('Location: /myRating.php');
			}
			//header('Location: /myRating.php');
			break;
		case 'registration':
			$new_user['login'] = $_POST['login'];
			$_SESSION['user'] = register_new_user($new_user['login'], $_POST['number'], $_POST['password'], $_POST['confirm_password'], $_POST['pol'], date('Y-m-d'), date('H:i:s'));
			$_SESSION['enter'] = true;
			header('Location: /myRating.php');
			break;
		case 'change_info':
			//$file = (isset($_FILES['file_name']))? $_FILES['file_name']:"none";
			$_SESSION['user'] = update_profile_info($_SESSION['user'], $_POST['loginChange'], $_POST['numberChange'], $_POST['pol']);//, $file);
			header('Location: /account.php');
			break;
		case 'change_avatar':
			$file = (isset($_FILES['file_name']))? $_FILES['file_name']:"none";
			$_SESSION['user'] = update_profile_avatar($_SESSION['user'], $file);
			header('Location: /account.php');
			break;
		case 'contacts':
			$case = $_GET['case'];
			$currentUser = unserialize($_SESSION['user']);
			$currentUser->contacts_view = $case;
			$_SESSION['user'] = serialize($currentUser);
			header('Location: /myRating.php');
			break;
		case 'escape':
			$_SESSION['enter'] = false;
			unset($_SESSION['user']);
			session_destroy();
			header('Location: /index.php');
			break;
		case 'estimate_user':
			$sender_id = $_GET['sender_id'];
			$recipient_id = $_GET['id'];
			$currentUser = unserialize($_SESSION['user']);
			$POST = $_POST;
			$currentUser->setNewMark($sender_id, $recipient_id, $POST);
			header('Location: /index.php');
			break;
		case 'add_category':
			$id = $_GET['id'];
			$currentUser = unserialize($_SESSION['user']);
			$new_property = $_POST['new_category'];
			$currentUser->addProperty($new_property);
			header("Location: /addcategory_main.php?id={$id}");
			break;
		case 'add_user':
			$currentUser = unserialize($_SESSION['user']);
			$file = (isset($_FILES['file_name']))? $_FILES['file_name']:"none";
			$new_user_id = register_new_user_with_foto($_POST['login'], $_POST['number'], '', '', $_POST['pol'], date('Y-m-d'), date('H:i:s'), $file);
			$estimate = $_POST['estimate'];

			$datetime = date('Y-m-d H:i:s');
			$new_user_login = $_POST['login'];
			$cur_contacts = to_array(mysqli_query($db, "SELECT contacts FROM users WHERE id = '$currentUser->id'"))[0]['contacts'];
			$cur_contacts = (string)$cur_contacts;
			if($cur_contacts==""){
				$cur_contacts = $new_user_id;
			}
			else{
				$cur_contacts .= ",".$new_user_id;
			}
			mysqli_query($db, "UPDATE users SET contacts = '$cur_contacts' WHERE id = '$currentUser->id'");
			mysqli_query($db, "INSERT INTO dialogs (id, user1, user2, datetime, last_message_time) VALUES('', '$currentUser->login', '$new_user_login', '$datetime', '$datetime')");

			if($estimate){
				header('Location: /myRating.php');
			}
			else{
				header("Location: /addcategory_main.php?id={$new_user_id}");
			}
			break;
		case 'add_contact':
			$currentUser = unserialize($_SESSION['user']);
			$contact_id = $_GET['id'];
			$new_user_login = $currentUser->getUserById($contact_id)['login'];
			$cur_contacts = to_array(mysqli_query($db, "SELECT contacts FROM users WHERE id = '$currentUser->id'"))[0]['contacts'];
			$cur_contacts = (string)$cur_contacts;

			$already_exists = false;
			if($cur_contacts==""){
				$cur_contacts = $contact_id;
			}
			else{
				$contacts_arr = explode(",", $cur_contacts);
				foreach($contacts_arr as $item){
					if((string)$item==(string)$contact_id){
						$already_exists = true; break;
					}
				}
				$cur_contacts .= ",".$contact_id;
			}
			if(!$already_exists){
				$datetime = date('Y-m-d H:i:s');
				mysqli_query($db, "UPDATE users SET contacts = '$cur_contacts' WHERE id = '$currentUser->id'");
				mysqli_query($db, "INSERT INTO dialogs (id, user1, user2, datetime, last_message_time) VALUES('', '$currentUser->login', '$new_user_login', '$datetime', '$datetime')");
			}
			header("Location: /myRating.php#contacts");
			break;
		case 'forgot_password':
			$email = $_POST['email'];
			$password = getUserByEmail($email)['password'];
			mail($email, '', "Your password is: {$password}");
			header('Location: /index.php');
		default:
			break;
	}
}

if (isset($_GET['alias'])) {
	$alias = $_GET['alias'];
}
if (isset($_GET['type'])) {
	$type = $_GET['type'];
	$ex = explode('-', $type);
	if ($ex['1']) {
		$type = $ex['0'];
		$until_type = $ex['1'];
	}
}
if (!isset($_SESSION['lang'])) {
	$_SESSION['lang'] = '1';
}
if (!isset($_SESSION['currency'])) {
	$_SESSION['course'] = '1';
	$_SESSION['symbol_after'] = ' грн.';
	$_SESSION['currency'] = 'UAH';
}
if ($type) {
	$query = "SELECT * FROM $type WHERE alias = '$alias' AND language_id = '".$_SESSION['lang']."'";
}else{
	$query .= "SELECT * FROM pages WHERE group_id = '1' AND language_id = '".$_SESSION['lang']."'";
	$type = 'pages';
	//echo "<br>{$type}<br>jk<br>kj<br>kj<br>kj<br>kj<br>kj<br>jkjk<br>kj<br>";
	$main_page = 1;
}
$result = mysqli_query($db, $query);
$myBase = mysqli_fetch_assoc($result);
$id = $myBase['group_id'];
if ($myBase['parent']) {
	$p = mysqli_query($db, "SELECT * FROM $type WHERE group_id = '".$myBase['parent']."' AND language_id = '".$_SESSION['lang']."'");
	$parent_arr = mysqli_fetch_assoc($p);
}
include 'languages/'.$_SESSION['lang'].'/language.php';
include 'languages/'.$_SESSION['lang'].'/'.$type.'/index.php';