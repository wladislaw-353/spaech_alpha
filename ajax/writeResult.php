<?php

include '../config.php';
include '../library/main.php';
$form_id = $_POST['form_request']['form_id'];
unset($_POST['form_request']['form_id']);
$table_name = $_POST['form_request']['table_name'];
unset($_POST['form_request']['table_name']);
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
			$r = mysqli_query($db, "SELECT * FROM $table_name WHERE email = '".$value['value']."'");
			if (mysqli_num_rows($r)) {
				echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>Данный E-mail уже зарегистрирован!</strong>
					</div>";
				die;
			}else{
				$connect .= addslashes(htmlspecialchars($value['name'])) . '= \'' . addslashes(htmlspecialchars($value['value'])) . '\', ';
			}
			break;
		case 'password':
			$value['value'] = md5($value['value']);
			$connect .= addslashes(htmlspecialchars($value['name'])) . '= \'' . addslashes(htmlspecialchars($value['value'])) . '\', ';
			break;
		
		default:
			$connect .= addslashes(htmlspecialchars($value['name'])) . '= \'' . addslashes(htmlspecialchars($value['value'])) . '\', ';
			break;
	}
}
$connect .= "date_add = '" . date('Y-m-d H:i:s') . "'";
if ($connect) {
	$query = mysqli_query($db, "INSERT INTO $table_name SET $connect");
	if ($query) {
		echo "<script>$('#{$form_id}').remove();</script>";
		echo "
			<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<strong>Спасибо, Вы успешно зарегистрированы.</strong><br>
				Теперь Вы можете войти в личный кабинет используя указанные данные. <br>
			</div>";
	}
}