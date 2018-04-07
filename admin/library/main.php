<?php
include 'classes/Add.php';
include 'classes/Edit.php';
include 'classes/Del.php';
include 'classes/BlockEdit.php';
include 'classes/BlockDel.php';
include 'classes/Positions.php';
include 'classes/menu.php';
include 'classes/rewies.class.php';
?>
<style>
.left_admin_menu{
	padding: 0;
}
.btn-primary{
	background: #03587F;
	border: 1px solid #044665;
}
.btn-primary:hover{
	background: #044665;
}
.left_admin_menu li{
	padding: 0;
	border-top: none;
	border-left: none;
	border-right: none;
	border-bottom: 2px solid #266988;
}
.left_admin_menu li a{
	background: #03587F;
	color: #fff;
	padding: 15px;
}
.left_admin_menu li a:hover{
	background: #044665;
}
</style>
<?php include 'library/breadcrumbs.php'; ?>
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			<ul class="list-group nav left_admin_menu">
				<li class="list-group-item">
					<a href="index.php?type=pages&action=edit">
						<big><span class="glyphicon glyphicon-file" aria-hidden="true"></big></
						&nbsp;&nbsp;span>
						Страницы
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=menus&action=edit">
						<big><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></big></span>
						&nbsp;&nbsp;
						Меню
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=posts_blocks&action=edit">
						<big><span class="glyphicon glyphicon-edit" aria-hidden="true"></big></
						&nbsp;&nbsp;span>
						Записи
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=htmls&action=edit">
						<big><span class="glyphicon glyphicon-align-left" aria-hidden="true"></big></span>
						&nbsp;&nbsp;
						Произвольный контент
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=sliders&action=edit">
						<big><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></big></span>
						&nbsp;&nbsp;
						Слайдеры
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=galerys&action=edit">
						<big><span class="glyphicon glyphicon-picture" aria-hidden="true"></big></span>
						&nbsp;&nbsp;
						Галереи
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=carousels_blocks&action=edit">
						<big><span class="glyphicon glyphicon-retweet" aria-hidden="true"></big></span>
						&nbsp;&nbsp;
						Карусели
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=administrators&action=edit">
						<big><span class="glyphicon glyphicon-user" aria-hidden="true"></big></span>
						&nbsp;&nbsp;
						Пользователи
					</a>
				</li>
				<li class="list-group-item">
					<a href="index.php?type=rewies&action=edit">
						<big><span class="glyphicon glyphicon-align-center" aria-hidden="true"></big></span>
						&nbsp;&nbsp;
						Отзывы
					</a>
				</li>
			</ul>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
				<?php
				if (isset($type)) {
					include('settings/' . $type . '.php');
				}
				?>
		</div>