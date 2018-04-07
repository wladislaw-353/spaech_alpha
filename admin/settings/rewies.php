<?php
switch ($action) {
	case 'edit':
	if (!isset($id)) {
		$edit = new Edit($db, 'rewies');
	}else{
		$name = new Add($db, 'rewies');
		$name->readDb($id);
		$pole = [
			['title'=> 'Имя пользователя', 'name' => 'name', 'value'=>$_POST['name'], 'type'=> 'input', 'disabled' => 1],
			['title'=> 'E-mail', 'name' => 'email', 'value'=>$_POST['email'], 'type'=> 'input', 'disabled' => 1],
			//['title'=> 'customer_id', 'name' => 'customer_id','value'=>$_POST['customer_id'], 'type' => 'customer'],
			['title'=> 'Телефон', 'name' => 'phone','value'=>$_POST['phone'], 'type' => 'input', 'disabled' => 1],
			['title'=> 'Текст отзыва', 'name' => 'full_text','value'=>$_POST['full_text'], 'type' => 'text'],
			['title'=> 'Фото', 'name' => 'photo','value'=>$_FILES['photo'], 'type' => 'image', 'disabled' => 1],
			['title'=> 'Разрешить показ отзыва?', 'name' => 'checked','value'=>$_POST['checked'], 'type' => 'yes/no'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$name->drawForm();
		$name->saveDb();
	}
		break;
	case 'del':
	$del = new Del($db, 'rewies');
		break;
}
?>