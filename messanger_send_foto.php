<?
header("Content-type: text/html; charset=utf-8");
define('DB_HOST', 'spaech.mysql.tools');
define('DB_LOGIN', 'spaech_db');
define('DB_PASSWORD', 'bF4hLlNR');
define('DB_NAME', 'spaech_db');
$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
mysqli_select_db($db, DB_NAME);
mysqli_query ($db,"set_client='utf8'");
mysqli_query ($db,"set character_set_results='utf8'");
mysqli_query ($db,"set collation_connection='utf8_general_ci'");
mysqli_query ($db,"SET NAMES utf8");
mysqli_set_charset($db,'utf8');
include 'library/User.php';

	///////////////////////// Send message with foto
	session_start();
	$currentUser = unserialize($_SESSION['user']);
	$sender = $currentUser->login;
	$recipient = $_GET['recipient'];
	$dialog_id = $_GET['dialog_id'];
	$message = $_GET['message'];
	$mark_date = date('Y-m-d');
	$mark_time = date('H:i:s');
	$full_time = date('Y-m-d H:i:s');
	mysqli_query($db, "INSERT INTO messages VALUES('', '$sender', '$recipient', '$dialog_id', '$message', '$mark_date', '$mark_time', 'image', 0)");
	mysqli_query($db, "UPDATE dialogs SET last_message_time = '$full_time' WHERE id = '$dialog_id'");

	//unlink('dirname/'.basename($_POST['file']));
	//unset($_FILES['file']);
	echo "success";

?>