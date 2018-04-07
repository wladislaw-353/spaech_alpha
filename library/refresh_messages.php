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
include 'User.php';

//$arr = array("v", "b", "e");
$dialogs_id = $_GET['dialogs_id'];

$result_arr = array();

$dialogs_id_arr = explode("-", $dialogs_id);
for($i=0; $i<count($dialogs_id_arr); $i++){
	$cur_id = (int)$dialogs_id_arr[$i];
	$result_arr[$cur_id] = rebuild_messages($db, $cur_id);
}
//$result_arr[0] = rebuild_messages($db, 1);
echo json_encode($result_arr);


function rebuild_messages($db, $dialog_id){
	session_start();
	$currentUser = unserialize($_SESSION['user']);
	//$dialog = to_array(mysqli_query($db, "SELECT * FROM dialogs WHERE id = '$dialog_id'"));
	$messages = to_array(mysqli_query($db, "SELECT * FROM messages WHERE dialog_id = '$dialog_id'"));

	$result_code = "";
	foreach($messages as $message){
		$is_read = false;
		if($currentUser->login == $message['recipient']){
			mysqli_query($db, "UPDATE messages SET is_read = 1 WHERE recipient = '$currentUser->login' AND dialog_id = '$dialog_id'");
			$is_read = true;
		}
		$sender = $message['sender'];
		$mes_text = $message['text'];
		if($message['is_read']==1 && $message['sender']==$currentUser->login){
			if($message['type']=="image"){
				$result_code.="<p class='"."message_item1"."'><span class='"."time_sms"."'>{$message['time']}</span><img src='"."../messanger/img/{$message['text']}"."'><span class='"."material-icons"."'>done</span></p>";
			}
			else{
				$result_code.="<p class='"."message_item1"."'><span class='"."time_sms"."'>{$message['time']}</span><span class='"."message_sms"."'>{$mes_text}</span><span class='"."material-icons"."'>done</span></p>";
			}
		}
		else{
			if($message['type']=="image"){
				if($sender==$currentUser->login){ $result_code.="<p class='"."message_item1"."'><span class='"."time_sms"."'>{$message['time']}</span><img src='"."../messanger/img/{$message['text']}"."'></p>";}
				else {  $result_code.="<p class='"."message_item2"."'><span class='"."time_sms"."'>{$message['time']}</span><img src='"."../messanger/img/{$message['text']}"."'></p>"; }
			}
			else{
				if($sender==$currentUser->login){ $result_code.="<p class='"."message_item1"."'><span class='"."time_sms"."'>{$message['time']}</span><span class='"."message_sms"."'>{$mes_text}</span></p>";}
				else {  $result_code.="<p class='"."message_item2"."'><span class='"."time_sms"."'>{$message['time']}</span><span class='"."message_sms"."'>{$mes_text}</span></p>"; }
			}
		}
	}
	return $result_code;
	//return "<p>t1</p>";
}
?>