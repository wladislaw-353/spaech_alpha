<?/*
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
include 'User.php';*/

session_start();
$currentUser = unserialize($_SESSION['user']);
//mysqli_query($db, "DELETE FROM messages");
$dialogs = to_array(mysqli_query($db, "SELECT * FROM dialogs WHERE user1 = '$currentUser->login' OR user2 = '$currentUser->login' ORDER BY last_message_time DESC"));

$_SESSION['dialogs_id'] = "";
for($i=0; $i<count($dialogs); $i++){
	$second_person = ($dialogs[$i]['user1']==$currentUser->login)? $dialogs[$i]['user2'] : $dialogs[$i]['user1'];
	$messages = to_array(mysqli_query($db, "SELECT * FROM messages WHERE ( sender = '$currentUser->login' AND recipient = '$second_person') OR ( sender = '$second_person' AND recipient = '$currentUser->login')"));
	$dialogs[$i]['messages'] = $messages;
	$dialogs[$i]['friend'] = $second_person;
	$dialogs[$i]['friend_avatar'] = to_array(mysqli_query($db, "SELECT foto FROM users WHERE login = '$second_person'"))[0]['foto'];
	//print_r($dialog['messages'][0]['text']);
	if((string)$_SESSION['dialogs_id']==""){
		$_SESSION['dialogs_id'] .= $dialogs[$i]['id'];
	}
	else{ $_SESSION['dialogs_id'] .= "-".$dialogs[$i]['id']; }
}


function getDialogIdByUser($db, $friend_id){
		$dialog_id = to_array(mysqli_query($db, "SELECT id FROM dialogs WHERE ( user1 = '$currentUser->login' AND user2 = '$friend_id') OR ( user1 = '$friend_id' AND user2 = '$currentUser->login')"))[0]['id'];
		if($dialog_id==""){
			return false;
		}
		else{
			return $dialog_id;
		}
}
?>