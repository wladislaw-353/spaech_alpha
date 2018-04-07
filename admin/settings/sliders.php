<?php
switch ($action) {
	case 'add':
	$name = new Add($db, 'sliders');
	$pole = [
		['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
		['title'=> 'Продолжить', 'type' => 'submit'],
	];
	$name->poles = $pole;
	$name->drawForm();
	$name->saveDb();
		break;
	case 'edit':
	if (!isset($id)) {
		$edit = new BlockEdit($db, 'sliders', 0);
	}else{
		$name = new Add($db, 'sliders');
		$name->readDb($id); //Для редактирования
		$pole = [
			['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'hidden'],
			['type'=> 'images'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$pole = [
			['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'hidden'],
			['type'=> 'images'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles_langs = $pole;
		$name->drawForm();
		$name->saveDb();
	}
		break;
	case 'del':
	$del = new BlockDel($db, 'sliders', $id);
		break;
	case 'position':
	$name = new Positions($db, 'sliders', $id);

		break;
	case 'position-del':
	$name = new Positions($db, 'sliders', $id);
	$name->PageDelete($_GET['page_id']);

		break;
}
	?>