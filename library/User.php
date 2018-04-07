<?
//include 'db_connect.php';
$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
mysqli_select_db($db, DB_NAME);
mysqli_query ($db,"set_client='utf8'");
mysqli_query ($db,"set character_set_results='utf8'");
mysqli_query ($db,"set collation_connection='utf8_general_ci'");
mysqli_query ($db,"SET NAMES utf8");
mysqli_set_charset($db,'utf8');
//mysqli_set_charset($db,"CP1251");

class Collection{
    private $members = array();
    public function addItem($obj, $key=null){ //$key - ключ в массиве
    	if($key){
      		if(isset($this->members[$key])){
        		echo "Error";
      		}
      		else{
        		$this->members[$key] = $obj;
      		}
    	}
    	else{
      		$this->members[] = $obj;
    	}
  	}
  	public function changeItem($newValue, $id){
  		foreach($this->members as $item){
  			if($item->id == $id){
  				$item->note_text = $newValue;
  			}
  		}
  	}
  	public function removeItem($key){
    	if(isset($this->members[$key])){
      		unset($this->members[$key]);
    	}
    	else{
     		echo "Error, invalid key";
    	}
  	}
    public function getItem($key){
        if(isset($this->members[$key])){
            return $this->members[$key];
        }
        else{
            echo "Error, invalid key";
        }
    }
    public function getmembers(){
    	return $this->members;
    }
    public function exist($key){
        return isset($this->members[$key]);
    }
    public function length(){
        return count($this->members);
    }
}

class User{
	public $id;
	public $login;
	public $password;
	public $city;
	public $number;
	public $email;
	public $sex;
	public $avatar;

	public $notes;

	public $current_estimate_user;
	public $rating;
	public $money;

	public $contacts_view;

	public function __construct($id, $login, $password, $number, $avatar){
		$this->id = (integer)$id;
		$this->login = $login;
		$this->password = $password;
		$this->number = $number;
		$this->avatar = $avatar;
		//$this->notes = new Collection;
		//$this->notes_fill();
	}
	public function change_login($newlogin){
		$this->login = $newlogin;
		global $db;
		$query = "UPDATE users SET login = '$this->login' WHERE id = '$this->id'";
		mysqli_query($db, $query);
	}
	public function change_password($newpassword){
		$this->password = $newpassword;
		global $db;
		$query = "UPDATE users SET password = '$this->password' WHERE id = '$this->id'";
		mysqli_query($db, $query);
	}
	public function change_number($newnumber){
		$this->number = $newnumber;
		global $db;
		$query = "UPDATE users SET number = '$this->number' WHERE id = '$this->id'";
		mysqli_query($db, $query);
	}
	public function change_avatar($newavatar){
		$this->avatar = $newavatar;
		global $db;
		$query = "UPDATE users SET foto = '$this->avatar' WHERE id = '$this->id'";
		mysqli_query($db, $query);
	}
	public function change_pol($newpol){
		$this->sex = $newpol;
		global $db;
		$query = "UPDATE users SET sex = '$this->sex' WHERE id = '$this->id'";
		mysqli_query($db, $query);
	}
	public function show(){
		echo("<br>text<br>text<br>text<br>text");
	}

	/*public function notes_fill($refill="none"){
		dbconnect();
		$query = "SELECT DISTINCT id, title, note_text, note_date, note_time FROM notes WHERE owner_id = '$this->id' ORDER BY note_date DESC, note_time DESC";
		$notes = mysql_query($query);
		$notes = to_array($notes);
		if($refill!="none"){ $this->notes = new Collection; }
		foreach ($notes as $value) {
			$this->notes->addItem(new Note($value['id'], $value['title'], $value['note_text'], $value['note_date'], $value['note_time']));
		}
	}
	public function add_note($title, $text){
		dbconnect();
		$data=date('Y-m-d');
		$time=date('H:i:s');
		$query = "INSERT INTO notes (owner_id, title, note_text, note_date, note_time) VALUES('$this->id', '$title', '$text', '$data', '$time')";
		mysql_query($query);
	}
	public function change_note($id, $new_text){
		$this->getNotes()->changeItem($new_text, $id);
		dbconnect();
		$query = "UPDATE notes SET note_text = '$new_text' WHERE id='$id'";
		mysql_query($query);
	}
	public function getNotes(){
		return $this->notes;
	}*/

	// Spaech
	public function getAllUsers($set){
		global $db;
		if($set=="none" or $set=="all_users"){
			$query = "SELECT id, login, city, number, foto, rating FROM users WHERE NOT id = '$this->id'";
		}
		else if($set=="boys_users"){
			$query = "SELECT id, login, city, number, foto, rating FROM users WHERE sex='Man' AND NOT id = '$this->id'";
		}
		else if($set=="girls_users"){
			$query = "SELECT id, login, city, number, foto, rating FROM users WHERE sex='Woman' AND NOT id = '$this->id'";
		}
		$allUsers = mysqli_query($db, $query);
		$allUsers = to_array($allUsers);
		return $allUsers;
	}
	public function getContacts(){
		global $db;
		$query = "SELECT contacts FROM users WHERE id='$this->id'";

		$contacts = to_array(mysqli_query($db, $query));
		if($contacts[0]['contacts']==""){ return false; }

		if($this->contacts_view=="Man" or $this->contacts_view=="Woman"){
			//return 0;
			$users = explode(",", $contacts[0]['contacts']);
			$res_users = array();
			foreach($users as $item_id){
				$user = $this->getUserById($item_id);
				$user_sex = $user['sex'];
				if($user_sex==$this->contacts_view){
					$res_users[] = $item_id;
				}
			}
			return $res_users;
		}
		else{ return explode(",", $contacts[0]['contacts']); }
	}
	public function getAllProperies(){
		global $db;
		$query = "SELECT id, property_name FROM properties";
		$allProperies = mysqli_query($db, $query);
		$allProperies = to_array($allProperies);
		return $allProperies;
	}
	public function addProperty($new_property){
		global $db;
		$query = "SELECT id, property_name FROM properties";
		$allProperies = mysqli_query($db, $query);
		$allProperies = to_array($allProperies);
		foreach($allProperies as $property){
			if($property['property_name'] == $new_property){
				return false;
			}
		}
		$query = "INSERT INTO properties VALUES('', '$new_property')";
		mysqli_query($db, $query);
	}
	public function countProperties(){
		global $db;
		$query = "SELECT COUNT(*) FROM properties";
		$allProperies = mysqli_query($db, $query);
		$allProperies = to_array($allProperies);
		return (integer)$allProperies[0][0];
	}
	public function getRating($id){
		global $db;
		$id = (integer)$id;
		$query = "SELECT property, mark, value FROM marks WHERE recipient_id = '$id'";
		$marks = mysqli_query($db, $query);
		$marks = to_array($marks);
		$propertiesMarks = array();
		foreach($marks as $item){
			$propertiesMarks[$item['property']][0]+=(integer) $item['mark']*$item['value'];
			$propertiesMarks[$item['property']][1]+=$item['value'];
		}

		$countOfProperties=0;
		foreach($propertiesMarks as $key=>$item){
			$propertiesMarks[$key]['avarage'] = (double)$item[0]/$item[1];
			$propertiesMarks['total']+=$propertiesMarks[$key]['avarage'];
			$countOfProperties++;
		}
		if($propertiesMarks['total']==0){
			return "none";
		}
		$propertiesMarks['total']/=$countOfProperties;
		$propertiesMarks['total'] = round($propertiesMarks['total'], 1);

		return $propertiesMarks;
	}
	public function getRatingFull($id){
		global $db;
		$id = (integer)$id;
		$query = "SELECT property, mark, value FROM marks WHERE sender_id = '$this->id' AND recipient_id = '$id'";
		$marks = mysqli_query($db, $query);
		$marks = to_array($marks);
		$propertiesMarks = array();
		foreach($marks as $item){
			$propertiesMarks[$item['property']][0]+=(integer) $item['mark']*$item['value'];
			$propertiesMarks[$item['property']][1]+=$item['value'];
		}

		$countOfProperties=0;
		foreach($propertiesMarks as $key=>$item){
			$propertiesMarks[$key]['avarage'] = (double)$item[0]/$item[1];
			$propertiesMarks['total']+=$propertiesMarks[$key]['avarage'];
			$countOfProperties++;
		}
		//if($propertiesMarks['total']==0){
		//	return "none";
		//}
		$propertiesMarks['total']/=$countOfProperties;
		$propertiesMarks['total'] = round($propertiesMarks['total'], 1);

		if(!$propertiesMarks){
			$propertiesMarks['total'] = 0;
		}
		$query2 = "SELECT property_name FROM properties";
		$all_properties = mysqli_query($db, $query2);
		$all_properties = to_array($all_properties);
		foreach($all_properties as $property){
			$check = true;
			foreach($propertiesMarks as $key=>$item){
				if($property['property_name']==$key){
					$check = false;
				}
			}
			if($check){
				$propertiesMarks[$property['property_name']]['avarage'] = 0;
			}
		}
		return $propertiesMarks;
	}
	public function EstimateAlready($id){
		global $db;
		$res = mysqli_query($db, "SELECT COUNT(*) FROM marks WHERE sender_id='$this->id' AND recipient_id='$id'");
		$res = to_array($res);
		$count = (integer)$res[0][0];
		if($count==0){ return false;}
		else{ return true; }
	}
	public function setNewMark($sender_id, $recipient_id, $POST){
		global $db;
		$allProperies = $this->getallProperies();
		foreach ($allProperies as $value) {
			if($POST[$value['property_name']] !="choose"){ //
				$POST[$value['property_name']] = (integer) $POST[$value['property_name']]; //

				$property = $value['property_name'];
				$mark = $_POST[$value['property_name']]; //

				$value = getImportanceFromApp();
				$mark_date = date('Y-m-d');
				$mark_time = date('H-i-s');

				$query = "INSERT INTO marks (id, sender_id, recipient_id, property, mark, value, mark_date, mark_time) VALUES('', '$sender_id', '$recipient_id', '$property', '$mark', '$value', '$mark_date', '$mark_time')"; //, '$importance'
				mysqli_query($db, $query);
			}
		}
		$new_rating = $this->getRating($recipient_id);
		$new_rating = (integer)$new_rating['total'];
		mysqli_query($db, "UPDATE users SET rating='$new_rating' WHERE id='$recipient_id'");
	}

	public function getMarks(){
		global $db;
		$query = "SELECT id, recipient_id, property, mark, value FROM marks WHERE sender_id='$this->id' ORDER BY mark_date, mark_time";
		$marks = to_array(mysqli_query($db, $query));
		$result = array();
		foreach($marks as $mark){
			$result[$mark['property']][$mark['recipient_id']]=$mark['mark'];
			$result[$mark['property']]['marks_sum']+=(integer)$mark['mark'];
			$result[$mark['property']]['total_count']++;
		}
		foreach($result as $key=>$item){
			$result[$key]['average'] = $item['marks_sum']/$item['total_count'];
		}
		return $result;
	}
	public function getUserById($id){
		$id = (integer)$id;
		global $db;
		$query = "SELECT login, city, number, sex, foto FROM users WHERE id='$id'";
		$user = to_array(mysqli_query($db, $query));
		$user[0]['rating'] = $this->getRating($id);
		return $user[0];
	}
	public function getUserByEmail($email){
		global $db;
		$query = "SELECT login, password, number, sex, foto FROM users WHERE email='$email'";
		$user = to_array(mysqli_query($db, $query));
		//$user[0]['rating'] = $this->getRating($id);
		return $user[0];
	}

}


class Note{
	public $id;
	public $title;
	public $note_text;
	public $note_date;
	public $note_time;
	public function __construct($id, $title, $note_text, $note_date="", $note_time=""){
		$this->id = $id;
		$this->title = $title;
		$this->note_text = $note_text;
		$this->note_date = $note_date;
		$this->note_time = $note_time;
	}
}
function to_array($result){
	$new_result=array();
	$count=0;
	while($row=mysqli_fetch_array($result)){
		$new_result[$count]=$row;
		$count++;
	}
	return $new_result;
}
function getUserByEmail($email){
	global $db;
	$query = "SELECT login, password, number, sex, foto FROM users WHERE email='$email'";
	$user = to_array(mysqli_query($db, $query));
	//$user[0]['rating'] = $this->getRating($id);
	return $user[0];
}
function checkEnter($login, $password){
	global $db;
	$login = htmlspecialchars(stripslashes($login));
	$password = htmlspecialchars(stripslashes($password));
	$query = "SELECT id, login, password, number, foto FROM users";
	$users = mysqli_query($db, $query);
	$users = to_array($users);
	foreach($users as $user){
		if($user['login']==$login){
			if($user['password']==$password){
				$currentUser = new User($user['id'], $login, $password, $user['number'], $user['foto']);
				$_SESSION['enter'] = true;
				$_SESSION['user'] = serialize($currentUser);
				return array($_SESSION['enter'], $_SESSION['user']);
			}
		}
	}
	return false;
}
function register_new_user($login, $number, $password, $confirm_password, $pol, $data, $time){
	$login = htmlspecialchars(stripslashes($login));
	$number = htmlspecialchars(stripslashes($number));
	$password = htmlspecialchars(stripslashes($password));
	$confirm_password = htmlspecialchars(stripslashes($confirm_password));
	$pol = htmlspecialchars(stripslashes($pol));

	global $db;
	//mysqli_query($db, "INSERT INTO users (id, login, password) VALUES ('', '1223424', '534456436543')");
	mysqli_query($db, "INSERT INTO users (id, login, password, number, sex, user_date, user_time, foto, rating, money, contacts) VALUES ('', '$login', '$password', '$number', '$pol', '$data', '$time', 'man1.jpg', 0, 0, '')");

	$query2 = "SELECT id FROM users WHERE login = '$login'";
	//$query2 = "SELECT COUNT(*) FROM users";
	$res = mysqli_query($db, $query2);
	$res = to_array($res);
	$currentUser = new User($res[0]['id'], $login, $password, $number, "man1.jpg");
	return serialize($currentUser);
}
function register_new_user_with_foto($login, $number, $password, $confirm_password, $pol, $data, $time, $file){
	$login = htmlspecialchars(stripslashes($login));
	$number = htmlspecialchars(stripslashes($number));
	$password = htmlspecialchars(stripslashes($password));
	$confirm_password = htmlspecialchars(stripslashes($confirm_password));
	$pol = htmlspecialchars(stripslashes($pol));

	if($file!="none" and $file['errors']==0 and $file['size']>0){
	  	$path="./img/".basename($file['name']);
		move_uploaded_file($file['tmp_name'], $path);
	}
	$avatar_name = basename($file['name']);

	global $db;
	//mysqli_query($db, "INSERT INTO users (id, login, password) VALUES ('', '1223424', '534456436543')");
	mysqli_query($db, "INSERT INTO users (id, login, password, number, sex, user_date, user_time, foto, rating, money, contacts) VALUES ('', '$login', '$password', '$number', '$pol', '$data', '$time', '$avatar_name', 0, 0, '')");

	$query2 = "SELECT id FROM users WHERE login='$login'";
	return to_array(mysqli_query($db, $query2))[0]['id'];

}
/*function register_new_user($login, $password, $city, $number, $email, $case, $comment, $data, $time){
	$login = htmlspecialchars(stripslashes($login));
	$password = htmlspecialchars(stripslashes($password));
	$city = htmlspecialchars(stripslashes($city));
	$number = htmlspecialchars(stripslashes($number));
	$email = htmlspecialchars(stripslashes($email));
	$comment = htmlspecialchars(stripslashes($comment));

	global $db;
	mysqli_query($db, "INSERT INTO users VALUES ('', '$login', '$password', '$city', '$number', '$email', '$case',
		'$comment', '$data', '$time', 'man1.jpg', 0, 0, '')");

	$query2 = "SELECT COUNT(*) FROM users";
	$res = mysqli_query($query2);
	$res = to_array($res);
	$currentUser = new User($res[0][0], $login, $password, "man1.jpg");
	return serialize($currentUser);
}*/
function update_profile_info($session_user, $newLogin, $newNumber, $pol){//, $file){//, $file=""){
	$currentUser = unserialize($session_user);

	if($newLogin!=$currentUser->login){
		$currentUser->change_login($newLogin);
	}
	if($newNumber!=$currentUser->number){
		$currentUser->change_number($newNumber);
	}
	if($pol=="Man" or $pol=="Woman"){
		$currentUser->change_pol($pol);
	}

	//echo "123entered<br>entered<br>entered<br>entered<br>";
	/*if($file!="none" and $file['errors']==0 and $file['size']>0){
	  	$path="./img/".basename($file['name']);
	  	$currentUser->change_avatar(basename($file['name']));
		move_uploaded_file($file['tmp_name'], $path);
	}*/
	return serialize($currentUser);
}
function update_profile_avatar($session_user, $file){
	$currentUser = unserialize($session_user);
	if($file!="none" and $file['errors']==0 and $file['size']>0){
	  	$path="./img/".basename($file['name']);
	  	$currentUser->change_avatar(basename($file['name']));
		move_uploaded_file($file['tmp_name'], $path);
	}
	return serialize($currentUser);
}

function getImportanceFromApp(){
	return mt_rand(1, 10)/10;
}
function getRelavanceFromApp(){
	return mt_rand(1, 10)/10;
}
?>