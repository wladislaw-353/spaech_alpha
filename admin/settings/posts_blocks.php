<?php
switch ($action) {
	case 'add':
	$name = new Add($db, 'posts_blocks');
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
		$edit = new BlockEdit($db, 'posts_blocks', 1);
	}else{
		$name = new Add($db, 'posts_blocks');
		$name->readDb($id); //Для редактирования
		$pole = [
			['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'input'],
			['title'=> 'Введите класс для блока', 'name' => 'class', 'value'=>$_POST['class'], 'type'=> 'input'],
			['title'=> 'Показывать заголовок?', 'name' => 'is_header', 'value'=>$_POST['is_header'], 'type'=> 'yes/no'],
			['title'=> 'Показывать текстовое превью?', 'name' => 'is_text_prewie', 'value'=>$_POST['is_text_prewie'], 'type'=> 'yes/no'],
			['title'=> 'Показывать изображение превью?', 'name' => 'is_image_prewie', 'value'=>$_POST['is_image_prewie'], 'type'=> 'yes/no'],
			['title'=> 'Колличество записей для вывода', 'name' => 'quantity', 'value'=>$_POST['quantity'], 'type'=> 'number'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$pole = [
			['title'=> 'Введите имя блока', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'hidden'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles_langs = $pole;
		$name->drawForm(1);
		$name->saveDb(1);
	}
		break;
	case 'del':
	$del = new BlockDel($db, 'posts_blocks', $id);
		break;
	case 'position':
	$name = new Positions($db, 'posts_blocks', $id);

		break;
	case 'position-del':
	$name = new Positions($db, 'posts_blocks', $id);
	$name->PageDelete($_GET['page_id']);

		break;
	case 'items':
	if (isset($_GET['item'])) {
		$item = $_GET['item'];
	}
	switch ($item) {
		case 'add':
		$name = new Add($db, 'posts', $_GET['block_id']);
		$pole = [
			['title'=> 'Введите имя записи', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Продолжить', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$name->drawForm();
		$name->saveDb(1);
			break;
		case 'edit':
		if (!isset($_GET['id'])) {
			$edit = new Edit($db, 'posts', 0, $_GET['block_id']);
		}else{
			$name = new Add($db, 'posts', $_GET['block_id']);
			$name->readDb($_GET['id']);
			$pole = [
				['title'=> 'Введите имя записи', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
				['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'input'],
				['title'=> 'Введите мета-тег Title', 'name' => 'title', 'value'=>$_POST['title'], 'required' => '1', 'type' => 'input'],
				['title'=> 'Введите мета-тег Description', 'name' => 'meta_d','value'=>$_POST['meta_d'], 'type' => 'input'],
				['title'=> 'Введите мета-тег Keywords', 'name' => 'meta_k','value'=>$_POST['meta_k'], 'type' => 'input'],
				['title'=> 'Введите текст превью', 'name' => 'description','value'=>$_POST['description'], 'type' => 'textarea'],
				['title'=> 'Добавте фото превью', 'name' => 'photo','value'=>$_FILES['photo'], 'type' => 'image'],
				['title'=> 'Введите полный текст', 'name' => 'full_text','value'=>$_POST['full_text'], 'type' => 'textarea'],
				['title'=> 'Введите номер сортировки', 'name' => 'sort','value'=>$_POST['sort'], 'type' => 'input'],
				//['title'=> 'Показывать левую колонку', 'name' => 'leftbar','value'=>$_POST['leftbar'], 'type' => 'yes/no'],
				['title'=> 'Ok', 'type' => 'submit'],
			];
			$name->poles = $pole;
			$pole = [
				['title'=> 'Введите имя записи', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
				['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'hidden'],
				['title'=> 'Введите мета-тег Title', 'name' => 'title', 'value'=>$_POST['title'], 'required' => '1', 'type' => 'input'],
				['title'=> 'Введите мета-тег Description', 'name' => 'meta_d','value'=>$_POST['meta_d'], 'type' => 'input'],
				['title'=> 'Введите мета-тег Keywords', 'name' => 'meta_k','value'=>$_POST['meta_k'], 'type' => 'input'],
				['title'=> 'Введите текст превью', 'name' => 'description','value'=>$_POST['description'], 'type' => 'textarea'],
				['title'=> 'Введите полный текст', 'name' => 'full_text','value'=>$_POST['full_text'], 'type' => 'textarea'],
				['title'=> 'Ok', 'type' => 'submit'],
			];
			$name->poles_langs = $pole;
			$name->drawForm();
			$name->saveDb(1);
		}
			break;
		case 'del':
			$del = new Del($db, 'posts', 0, $_GET['block_id']);
			break;
	}

		break;
}
	?>