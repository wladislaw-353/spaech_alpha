<?php
$form_id = $_POST['form_request']['form_id'];
$table_name = $_POST['form_request']['table_name'];
$link_from = $_POST['form_request']['link_from'];
$type_from = $_POST['form_request']['type_from'];
$alias = $_POST['form_request']['alias'];
if ($_POST['form_request'][$form_id]['antibot']) {
	echo "<script>$('#{$form_id}').remove();</script>";
	die;
}else{
	unset($_POST['form_request'][$form_id]['antibot']);
}

//Обрезка изображений при загрузке
function resize($file_input, $file_output, $w_o, $h_o, $percent = false) { 
    list($w_i, $h_i, $type) = getimagesize($file_input); 
    if (!$w_i || !$h_i) { 
        echo 'Невозможно получить длину и ширину изображения при уменьшении'; 
        return; 
    } 
    if ($w_i < 1000 && $h_1 < 1000) {
    	return $file_input;
    }else{
	    $types = array('','gif','jpeg','png'); 
	    $ext = $types[$type]; 
	    if ($ext) { 
	        $func = 'imagecreatefrom'.$ext; 
	        $img = $func($file_input); 
	    } else { 
	        echo 'Некорректный формат файла'; 
	        return; 
	    } 
	    if ($percent) { 
	        $w_o *= $w_i / 100; 
	        $h_o *= $h_i / 100; 
	    } 
	    if (!$h_o) $h_o = $w_o/($w_i/$h_i); 
	    if (!$w_o) $w_o = $h_o/($h_i/$w_i); 
	    $img_o = imagecreatetruecolor($w_o, $h_o); 
	    imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); 
	    if ($type == 2) { 
	        return imagejpeg($img_o,$file_output,100); 
	    } else { 
	        $func = 'image'.$ext; 
	        return $func($img_o,$file_output); 
	    } 
    }
}  
if(isset($_FILES['file-0'])){
	if ($_FILES['file-0']['name'] != '') {
		$file = $_FILES['file-0'];
		define('UPLOAD_FILE', '../img/other/');
		$valid_formats = array("jpg", "png", "gif","jpeg");
        $ph_name = $_FILES['file-0']['name'] ; // имя файла
        $size = $_FILES['file-0']['size'] ; // размер файла
        if(strlen($ph_name)) {
            list($txt, $ext) = explode(".", $ph_name) ; // разбиваем на имя и формат
            if(in_array($ext,$valid_formats))    // смотрим формат такой как мы разрешили?!
            {
                if($size < (1024 * 1024*10)) // Ограничиваем размер файла в 600kb
                {
                    $actual_image_name = time() . "." . $ext ; // задаем уникальное имя файлу
                    $tmp = $_FILES['file-0']['tmp_name'];
                    if(move_uploaded_file($tmp, UPLOAD_FILE .  $actual_image_name)) // переносим файл с tmp в наш каталог
                 	{
	                    resize(UPLOAD_FILE . $actual_image_name, UPLOAD_FILE . $actual_image_name, '1000', '');
                        $_POST['form_request'][$form_id]['photo']['value'] = $actual_image_name;
                 	}
                	else echo "Ошибка. =(";
                }
                else echo "
				<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>!</strong> Максимальный размер файла не должен превышать 600kb
				</div>";
            }
            else echo "
				<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong>!</strong> Допустимые форматы: jpg|jpeg|png|gif
				</div>";
        }
	}
}
$rewie = '';
foreach ($_POST['form_request'][$form_id] as $item) {
	$rewie .= addslashes(htmlspecialchars($item['name'])) . " = '" . addslashes(htmlspecialchars($item['value'])) . "', ";
}
$rewie .= "type_from = '" . addslashes(htmlspecialchars($type_from)) . "', ";
include '../config.php';
include '../library/main.php';
$r = mysqli_query($db, "SELECT * FROM $type_from WHERE alias = '$alias'");
$f = mysqli_fetch_assoc($r);
$group_id = $f['group_id'];
$rewie .= "group_id = '" . addslashes(htmlspecialchars($group_id))  . "', ";
$rewie .= "date_add = '" . date('Y-m-d H:i:s') . "'";
$res = mysqli_query($db, "INSERT INTO $table_name SET $rewie");
$subject = 'Новый отзыв';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: user <admin>' . "\r\n" .
		    "Subject: {$subject}" . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
$headers .= "From: http://" . $_SERVER['HTTP_HOST'] . "\r\n";

$mail = mail($email, $subject, 'На сайт добавлен новый отзыв, зайдите в админку для модерации', $headers);
?>
<script>$('#<?=$form_id?>').remove();</script>
<br><br>
<div class="callback-form">
	<div class='alert alert-success'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<strong>Спасибо,</strong> Ваше сообщение получено и ожидает модерацию!
	</div>
</div>