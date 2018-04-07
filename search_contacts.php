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
include "library/User.php";

$login = $_GET['login'];
session_start();
//$_SESSION['search_login'] = $login;
//echo $_SESSION['search_login'];
$query = "SELECT id FROM users WHERE login LIKE '%$login%'";
$find_users = to_array(mysqli_query($db, $query));
echo generateResult($find_users);

function generateResult($find_users){
	session_start();
	$currentUser = unserialize($_SESSION['user']);
	if(!$find_users){ return ''; }
	foreach($find_users as $user_item){
			$id = (integer)$user_item['id'];
			//return $id." | ".$_SESSION;
			$user = $currentUser->getUserById($id);?>
			<a href="user.php?id=<?=$id?>">
				<div class="card">
					<div class="avatar">
						<img src="img/<?=$user['foto']?>" alt="">
					</div>
					<div class="card-footer">
						<span class="name"><?=$user['login']?></span>
						<div class="likes">
							<span><?if($user['rating']!="none") echo $user['rating']['total']?></span>
							<span class="material-icons">favorite</span>
						</div>
					</div>
				</div>
			</a>
	<?}	
}
?>