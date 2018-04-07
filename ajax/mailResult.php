<?php
include '../config.php';
$form_id = $_POST['form_request']['form_id'];
unset($_POST['form_request']['form_id']);
if ($_POST['form_request'][$form_id]['antibot']) {
	die();
}
unset($_POST['form_request'][$form_id]['antibot']);
foreach ($_POST['form_request'][$form_id] as $item) {
	//var_dump($item);
	$mail_string = $item['title'] . " " . $item['value'] . "<br>";
	$mail_array .= $mail_string;
}
$subject = 'SPAECH - Запрос на партнерскую программу';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: user <admin>' . "\r\n" .
		    "Subject: {$subject}" . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
$headers .= "From: http://" . $_SERVER['HTTP_HOST'] . "\r\n";
if ($mail) {
	die();
}
if (!empty($mail_array)) {
	$mail = mail($email, $subject, $mail_array, $headers);
}
?>
<script>$('#<?=$form_id?>').remove();</script>
<div class="callback-form">
	<div class='alert alert-success'>
		<button style="position:absolute; top:21px; right:25px; border: none; color: #fff; background-color: transparent;" type="button" class="btn btn-success-custom" data-dismiss="modal">
			<i class="fa fa-times" aria-hidden="true"></i>
		</button>
		<strong>Спасибо,</strong>  ваше сообщение отправлено!
	</div>
</div>