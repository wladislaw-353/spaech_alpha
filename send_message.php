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

$message = $_GET['message'];
$sender = $_GET['sender'];
$recipient = $_GET['recipient'];
$dialog_id = (int)$_GET['dialog_id'];
$mark_date = date('Y-m-d');
$mark_time = date('H:i:s');
$full_time = date('Y-m-d H:i:s');
if($message!=""){
	mysqli_query($db, "INSERT INTO messages VALUES('', '$sender', '$recipient', '$dialog_id', '$message', '$mark_date', '$mark_time', 'text', 0)");
	//mysqli_query($db, "UPDATE messages SET type = 'text'");
	mysqli_query($db, "UPDATE dialogs SET last_message_time = '$full_time' WHERE id = '$dialog_id'");
	echo rebuild_messages($db, $dialog_id);
}

function rebuild_messages($db, $dialog_id){
	//return array("fdf", "FTGEGT", "56");

	session_start();
	$currentUser = unserialize($_SESSION['user']);
	$dialog = to_array(mysqli_query($db, "SELECT * FROM dialogs WHERE id = '$dialog_id'"));
	$messages = to_array(mysqli_query($db, "SELECT * FROM messages WHERE dialog_id = '$dialog_id'"));
	//$arr = array("1","3","4","5","6");
	//return "1111111";//$arr;
	foreach($messages as $message){?>
		<? if($message['type']=="image"){?>
			<? if($message['sender']==$currentUser->login){ ?>
				<p class="message_item1"><span class="time_sms"><?=$message['time'];?></span><img src="messanger/img/<?=$message['text']?>"></p>
			<? } ?>
			<? if($message['sender']!=$currentUser->login){ ?>
				<p class="message_item2"><span class="time_sms"><?=$message['time'];?></span><img src="messanger/img/<?=$message['text']?>"></p>
			<? } ?>
		<? } ?>
		<? if($message['type']=="text"){ ?>
			<? if($message['sender']==$currentUser->login){ ?>
				<p class="message_item1"><span class="time_sms"><?=$message['time'];?></span><span class="message_sms"><?=$message['text']?></span></p>
			<? } ?>
			<? if($message['sender']!=$currentUser->login){ ?>
				<p class="message_item2"><span class="time_sms"><?=$message['time'];?></span><span class="message_sms"><?=$message['text']?></span></p>
			<? } ?>
		<? } ?>
	<?}
}


?>