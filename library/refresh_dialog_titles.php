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

//mysqli_query($db, "DELETE * FROM messages WHERE sender = 'Vladislav'");

$dialogs_id = $_GET['dialogs_id'];
$result_arr = array();

$dialogs_id_arr = explode("-", $dialogs_id);
for($i=0; $i<count($dialogs_id_arr); $i++){
	$cur_id = (int)$dialogs_id_arr[$i];
	$result_arr[$cur_id] = rebuild_title($db, $cur_id);
}
echo json_encode($result_arr);

function rebuild_title($db, $dialog_id){
	session_start();
	$currentUser = unserialize($_SESSION['user']);
	$messages = to_array(mysqli_query($db, "SELECT * FROM messages WHERE dialog_id = '$dialog_id'"));

	
	if(count($messages)==0){
		$dialog = to_array(mysqli_query($db, "SELECT * FROM dialogs WHERE id = '$dialog_id'"))[0];
		if($dialog['user1']==$currentUser->login){
			$friend = $dialog['user2'];
		}
		else{
			$friend = $dialog['user1'];
		}
		//$friend = "admin";
	}
	else{
		$last_message = $messages[count($messages)-1];
		if($last_message['sender']==$currentUser->login){ $friend = $last_message['recipient']; }
		else{ $friend = $last_message['sender']; }
		$text = ($last_message['text']!="")? $last_message['text'] : " ";
	}

	$friend_avatar = to_array(mysqli_query($db, "SELECT foto FROM users WHERE login = '$friend'"))[0]['foto'];

	$result_code = "<img src='"."img/{$friend_avatar}"."' class='"."short_view_avatar"."'><span class='"."title_friend"."'>{$friend}</span><span class='"."title_message"."'>{$text}</span>";
	return $result_code;
}

?>