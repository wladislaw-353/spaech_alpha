<?php 
include '../config.php';
include '../library/main.php';
$form_id = $_POST['form_request']['form_id'];
$table_name = $_POST['form_request']['table_name'];
$link_from = $_POST['form_request']['link_from'];
$type_from = $_POST['form_request']['type_from'];
$alias = $_POST['form_request']['alias'];
$query = '';
if ($_POST['form_request'][$form_id]['antibot']) {
	echo "<script>$('#{$form_id}').remove();</script>";
	die;
}else{
	unset($_POST['form_request'][$form_id]['antibot']);
}
$customer_id = $_POST['form_request'][$form_id]['customer_id']['value'];
unset($_POST['form_request'][$form_id]['customer_id']);
foreach ($_POST['form_request'][$form_id] as $item) {
	$query .= addslashes(htmlspecialchars($item['name'])) . " = '" . addslashes(htmlspecialchars($item['value'])) . "', ";
}
$query = substr($query, 0,-2);
if ($query) {
	$query = mysqli_query($db, "UPDATE $table_name SET $query WHERE id = '$customer_id'");
	if ($query) {
		echo "<script>$('#{$form_id}').remove();</script>";
		echo "
			<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<strong>Спасибо, информация изменена.</strong><br>
				Через 3 секунды страница будет обновлена!
			</div>";

		exit("<meta http-equiv='refresh' content='3; url= {$link_from}'>");
	}
}
?>