<?php 
switch ($action) {
	case 'add':
	$name = new Add($db, 'carousels_blocks');
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
		$edit = new BlockEdit($db, 'carousels_blocks', 1);
	}else{
		$name = new Add($db, 'carousels_blocks');
		$name->readDb($id); //Для редактирования
		$pole = [
			['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите класс для блока', 'name' => 'class', 'value'=>$_POST['class'], 'type'=> 'input'],
			['title'=> 'Показывать заголовок?', 'name' => 'is_header', 'value'=>$_POST['is_header'], 'type'=> 'yes/no'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$name->drawForm();
		$name->saveDb();
	}
		break;
	case 'del':
	$del = new BlockDel($db, 'carousels_blocks', $id);
		break;
	case 'position':
	$name = new Positions($db, 'carousels_blocks', $id);

		break;
	case 'position-del':
	$name = new Positions($db, 'carousels_blocks', $id);
	$name->PageDelete($_GET['page_id']);

		break;
	case 'items':
	if (isset($_GET['item'])) {
		$item = $_GET['item'];
	}
	switch ($item) {
		case 'add':
		$name = new Add($db, 'carousels', $_GET['block_id']);
		$pole = [
			['title'=> 'Введите имя записи', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Продолжить', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$name->drawForm(); 
		$name->saveDb();
			break;
		case 'edit':
		if (!isset($_GET['id'])) {
			$edit = new Edit($db, 'carousels', 0, $_GET['block_id']);
		}else{
			$name = new Add($db, 'carousels', $_GET['block_id']);
			$name->readDb($_GET['id']);
			$pole = [
				['title'=> 'Введите имя записи', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
				['title'=> 'Введите описание', 'name' => 'description','value'=>$_POST['description'], 'type' => 'textarea'],
				['title'=> 'Введите ссылку', 'name' => 'link', 'value'=>$_POST['link'], 'type'=> 'input'],
				['title'=> 'Добавте фото', 'name' => 'photo','value'=>$_FILES['photo'], 'type' => 'image'],
				['title'=> 'Номер сортировки', 'name' => 'sort','value'=>$_FILES['sort'], 'type' => 'number'],
				['title'=> 'Ok', 'type' => 'submit'],
			];
			$name->poles = $pole;
			$name->drawForm();
			$name->saveDb();
		}
			break;
		case 'del':
			$del = new Del($db, 'carousels', 0, $_GET['block_id']);
			break;
	}

		break;
}
	?>