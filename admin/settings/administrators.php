<?php
switch ($action) {
	case 'add':
	$name = new Add($db, 'administrators');
	$pole = [
		['title'=> 'Введите имя пользователя', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
		['title'=> 'Продолжить', 'type' => 'submit'],
	];
	$name->poles = $pole;
	$name->drawForm();
	$name->saveDb();
		break;
	case 'edit':
	if (!isset($id)) {
		$edit = new Edit($db, 'administrators', 0);
	}else{
		$name = new Add($db, 'administrators');
		$name->readDb($id); //Для редактирования
		$pole = [
			['title'=> 'Введите имя пользователя', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите Login', 'name' => 'login', 'value'=>$_POST['login'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите новый пароль пользователя', 'name' => 'password', 'value'=>$_POST['password'], 'required' => '1', 'md5' => '1', 'type'=> 'password'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$name->drawForm();
		$name->saveDb();
	}
		break;
	case 'del':
	$del = new Del($db, 'administrators', 0);
		break;
}
?>