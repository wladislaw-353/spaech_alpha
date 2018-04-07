<?php
session_start();
include '../config.php';
include '../library/main.php';
$form_id = $_POST['form_request']['form_id'];
unset($_POST['form_request']['form_id']);
$table_name = $_POST['form_request']['table_name'];
unset($_POST['form_request']['table_name']);
$page_form = $_POST['form_request']['page_form'];
unset($_POST['form_request']['page_form']);
if ($_POST['form_request'][$form_id]['antibot']) {
	echo "<script>$('#{$form_id}').remove();</script>";
	die;
}else{
	unset($_POST['form_request'][$form_id]['antibot']);
}
$connect = '';
foreach ($_POST['form_request'][$form_id] as $value) {
	switch ($value['name']) {
		case 'email':
			$connect .= addslashes(htmlspecialchars($value['name'])) . ' = \'' . addslashes(htmlspecialchars($value['value'])) . '\' AND ';
			break;
		case 'password':
			$value['value'] = md5($value['value']);
			$connect .= addslashes(htmlspecialchars($value['name'])) . ' = \'' . addslashes(htmlspecialchars($value['value'])) . '\' ';
			break;
		
		default:
			break;
	}
}
$r = mysqli_query($db, "SELECT * FROM $table_name WHERE $connect");
if (!mysqli_num_rows($r)) {
	echo "
		<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<strong>Не правильные E-mail или пароль!</strong>
		</div>";
}else{
	$f = mysqli_fetch_assoc($r);
	$_SESSION['customer_id'] = $f['id'];
	$_SESSION['customer_name'] = $f['name'];
	$_SESSION['customer_email'] = $f['email'];
	echo "
		<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<strong>Происходит вход...</strong>
		</div>";
	exit("<meta http-equiv='refresh' content='3; url= $page_form'>");

}