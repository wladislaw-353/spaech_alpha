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
//echo "success";
//header('Location: /index.php');
$sender_id = $_GET['sender'];
$recipient_id = $_GET['recipient'];
$mark = $_GET['id'];
$property = $_GET['property'];
$mark_date = date('Y-m-d');
$mark_time = date('H-i-s');

$query = "INSERT INTO marks (id, sender_id, recipient_id, property, mark, value, mark_date, mark_time) VALUES('', '$sender_id', '$recipient_id', '$property', '$mark', '1', '$mark_date', '$mark_time')"; //, '$importance'
mysqli_query($db, $query);

//echo $db;
echo $sender_id." | ".$recipient_id." | ".$property." | ".$mark." | ".$mark_date." | ".$mark_time;
?>