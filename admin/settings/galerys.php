<?php
switch ($action) {
	case 'add':
	$name = new Add($db, 'galerys');
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
		$edit = new BlockEdit($db, 'galerys', 0);
	}else{
		$name = new Add($db, 'galerys');
		$name->readDb($id); //Для редактирования
		$pole = [
			['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['type'=> 'images'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$name->drawForm();
		$name->saveDb();
	}
		break;
	case 'del':
	$del = new BlockDel($db, 'galerys', $id);
		break;
	case 'position':
	$name = new Positions($db, 'galerys', $id);

		break;
	case 'position-del':
	$name = new Positions($db, 'galerys', $id);
	$name->PageDelete($_GET['page_id']);

		break;
}
	?>