<?php
switch ($action) {
	case 'add':
	$name = new Add($db, 'htmls');
	$pole = [
		['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
		['title'=> 'Продолжить', 'type' => 'submit'],
	];
	$name->poles = $pole;
	$name->drawForm();
	$name->saveDb(1);
		break;
	case 'edit':
	if (!isset($id)) {
		$edit = new BlockEdit($db, 'htmls', 0);
	}else{
		$name = new Add($db, 'htmls');
		$name->readDb($id); //Для редактирования
		$pole = [
			['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'input'],
			['title'=> 'Введите полный текст', 'name' => 'full_text', 'value'=>$_POST['full_text'], 'required' => '1', 'type'=> 'text'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$pole = [
			['title'=> 'Введите полный текст', 'name' => 'full_text', 'value'=>$_POST['full_text'], 'required' => '1', 'type'=> 'text'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'hidden'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles_langs = $pole;
		$name->drawForm();
		$name->saveDb(1);
	}
		break;
	case 'del':
	$del = new BlockDel($db, 'htmls', $id);
		break;
	case 'position':
	$name = new Positions($db, 'htmls', $id);

		break;
	case 'position-del':
	$name = new Positions($db, 'htmls', $id);
	$name->PageDelete($_GET['page_id']);

		break;
}
	?>