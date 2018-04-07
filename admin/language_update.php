<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
$language_id = '2';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'config.php';
include 'library/settings.php';
$connect = '';
$r = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO carousels SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM carousels_blocks WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM carousels_blocks WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO carousels_blocks SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM htmls WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM htmls WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO htmls SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM menus WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM menus WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO menus SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM pages WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM pages WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO pages SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM posts WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM posts WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO posts SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM posts_blocks WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM posts_blocks WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO posts_blocks SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO carousels SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO carousels SET $connect");
	}
}
$connect = '';
$r = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '1'");
while ($f = mysqli_fetch_assoc($r)) {
	$r1 = mysqli_query($db, "SELECT * FROM carousels WHERE language_id = '$language_id' AND group_id = '".$f['group_id']."'");
	if (!mysqli_num_rows($r1)) {
		$connect = '';
		foreach ($f as $key => $value) {
			if ($key == 'id') {
				continue;
			}
			elseif ($key == 'language_id') {
				$connect .= $key . " = '" . $language_id . "', ";
			}else{
				$connect .= $key . " = '" . $value . "', ";
			}
		}
		$connect = substr($connect, 0,-2);
		echo $connect;
		mysqli_query($db, "INSERT INTO carousels SET $connect");
	}
}
?>
</body>
</html>