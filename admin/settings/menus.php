<?php
switch ($action) {
	case 'add':
	$name = new Add($db, 'menus');
	$pole = [
		['title'=> 'Введите имя меню', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
		['title'=> 'Продолжить', 'type' => 'submit'],
	];
	$name->poles = $pole;
	$name->drawForm();
	$name->saveDb(1);
		break;
	case 'edit':
	if (!isset($id)) {
		$edit = new menuEdit($db, 'menus');
	}else{
		$name = new Add($db, 'menus');
		$name->readDb($id); //Для редактирования
		$pole = [
			['title'=> 'Введите имя меню', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			//['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'input'],
			['title'=> 'Введите класс для блока', 'name' => 'class', 'value'=>$_POST['class'], 'type'=> 'input'],
			['title'=> 'Выберите позицию', 'name' => 'position', 'value'=>$_POST['position'], 'required' => '1', 'type'=> 'menu-position'],
			['title'=> 'Выберите тип', 'name' => 'type', 'value'=>$_POST['type'], 'type'=> 'menu-type'],
			['title'=> 'Показывать заголовок', 'name' => 'is_header', 'value'=>$_POST['is_header'], 'type'=> 'yes/no'],

			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$pole = [
			['title'=> 'Введите имя меню', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'hidden'],

			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles_langs = $pole;
		$name->drawForm();
		$name->saveDb(1);
	}
		break;
	case 'del':
	$del = new MenuDel($db, 'menus', $id);
		break;
	case 'content':
	$name = new AddPagesIntoMenu($db, 'menus', $id);
	$name->DrawPages();

		break;
	case 'content-del':
	$name = new AddPagesIntoMenu($db, 'menus', $id);
	$name->PageDelete($_GET['page_id']);

		break;
}
	?>