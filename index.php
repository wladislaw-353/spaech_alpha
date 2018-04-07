<?php
session_start();
include 'config.php';
include 'library/main.php';
include 'library/menus.php';
include 'library/blocks.php';
include 'library/CreateForm.php';
if ($type) {
	if ($until_type) {
		include 'parts/' . $type . '/'. $until_type .'/index.php';
	}else{
		include 'parts/' . $type . '/index.php';
	}
}else{
	include 'parts/pages/index.php';
}
?>