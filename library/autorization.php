<?php
if (isset($_SESSION['name'])) {
	$logout_user = new CreateForm;
	$logout_user->logoutButton("<span class='glyphicon glyphicon-log-out' aria-hidden='true'></span>&nbsp;&nbsp;Выйти ({$_SESSION['name']})", "btn btn-default");
}else{
	$register_user = new CreateForm($db, 'users');
	$pole = [
		['title'=> 'Введите Ваше имя', 'name' => 'name', 'value'=>$_POST['name'], 'required' => '1', 'type'=> 'input'],
		['title'=> 'Введите пароль', 'name' => 'password', 'value'=>$_POST['password'], 'required' => '1', 'type'=> 'password'],
		['title'=> 'Введите Ваш Email', 'name' => 'email','value'=>$_POST['email'], 'required' => '1', 'type' => 'email'],
		['name' => 'antibot', 'value'=>$_POST['antibot'], 'type' => 'antibot'],
		['title'=> 'Отправить', 'type' => 'submit'],
	];	
	$register_user->poles = $pole;
	$register_user->drawModal(1, 'myForm', 'Регистрация на сайте');
	$register_user->drawButtonForModal("<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;Регистрация", "btn btn-default");
	$register_user->registerUser();

	$login_user = new CreateForm($db, 'users');
	$pole = [
		['title'=> 'Введите Ваш Email', 'name' => 'email','value'=>$_POST['email'], 'required' => '1', 'type' => 'email'],
		['title'=> 'Введите пароль', 'name' => 'password', 'value'=>$_POST['password'], 'required' => '1', 'type'=> 'password'],
		['name' => 'antibot', 'value'=>$_POST['antibot'], 'type' => 'antibot'],
		['title'=> 'Отправить', 'type' => 'submit'],
	];	
	$login_user->poles = $pole;
	$login_user->drawModal(1, 'myForm', 'Введите Ваши данные');
	$login_user->drawButtonForModal("<span class='glyphicon glyphicon-log-in' aria-hidden='true'></span>&nbsp;&nbsp;Ввойти", "btn btn-default");
	$login_user->loginUser();
}
?>