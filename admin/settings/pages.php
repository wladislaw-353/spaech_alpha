<?php
switch ($action) {
	case 'add':
	$name = new Add($db, 'pages');
	$pole = [
		['title'=> 'Введите имя страницы', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
		['title'=> 'Продолжить', 'type' => 'submit'],
	];
	$name->poles = $pole;
	$name->drawForm();
	$name->saveDb(1);
		break;
	case 'edit':
	if (!isset($id)) {
		$edit = new Edit($db, 'pages', 1);
	}else{
		$name = new Add($db, 'pages');
		$name->readDb($id);
		$pole = [
			['title'=> 'Введите имя страницы', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'input'],
			['title'=> 'Введите мета-тег Title', 'name' => 'meta_t', 'value'=>$_POST['meta_t'], 'required' => '1', 'type' => 'input'],
			['title'=> 'Введите мета-тег Description', 'name' => 'meta_d','value'=>$_POST['meta_d'], 'type' => 'input'],
			['title'=> 'Введите мета-тег Keywords', 'name' => 'meta_k','value'=>$_POST['meta_k'], 'type' => 'input'],
			['title'=> 'Введите текст превью', 'name' => 'description','value'=>$_POST['description'], 'type' => 'textarea'],
			['title'=> 'Введите полный текст', 'name' => 'full_text','value'=>$_POST['full_text'], 'type' => 'textarea'],
			['title'=> 'Выберите родителя', 'name' => 'parent','value'=>$_POST['parent'], 'type' => 'parent'],
			['title'=> 'Номер сортировки', 'name' => 'sort','value'=>$_POST['sort'], 'type' => 'number'],
			['title'=> 'Изображение для превью', 'name' => 'photo','value'=>$_FILES['photo'], 'type' => 'image'],
			['title'=> 'Показывать отзывы', 'name' => 'is_rewies','value'=>$_POST['is_rewies'], 'type' => 'yes/no'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles = $pole;
		$pole = [
			['title'=> 'Введите имя страницы', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
			['title'=> 'Введите алиас', 'name' => 'alias', 'value'=>$_POST['alias'], 'type'=> 'hidden'],
			['title'=> 'Введите мета-тег Title', 'name' => 'meta_t', 'value'=>$_POST['meta_t'], 'required' => '1', 'type' => 'input'],
			['title'=> 'Введите мета-тег Description', 'name' => 'meta_d','value'=>$_POST['meta_d'], 'type' => 'input'],
			['title'=> 'Введите мета-тег Keywords', 'name' => 'meta_k','value'=>$_POST['meta_k'], 'type' => 'input'],
			['title'=> 'Введите полный текст', 'name' => 'full_text','value'=>$_POST['full_text'], 'type' => 'textarea'],
			['title'=> 'ОК', 'type' => 'submit'],
		];
		$name->poles_langs = $pole;
		$name->drawForm();
		$name->saveDb(1);
	}
		break;
	case 'del':
	$del = new Del($db, 'pages', 1);
		break;
}
?>