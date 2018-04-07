<?php 
include("../config.php");
include '../library/main.php';

function short($valuetring, $q){
    $valuetring = strip_tags($valuetring);
    if (strlen($valuetring) > $q) {
	    $valuetring = substr($valuetring, 0, $q);
	    $valuetring = rtrim($valuetring, "!,.-");
	    $valuetring = substr($valuetring, 0, strrpos($valuetring, ' '));
	    echo $valuetring."… ";
    }else{
    	echo $valuetring;
    }
}
if(isset($_POST['num'])){
	$num = $_POST['num'];
	$type = $_POST['type'];
	unset($_POST['type']);
	$group_id = $_POST['group_id'];
	unset($_POST['group_id']);
	$limit = $_POST['limit'];
	unset($_POST['group_id']);
	$block_id = $_POST['block_id'];
	unset($_POST['block_id']);
	$r1 = mysqli_query($db, "SELECT b.class, b.name AS posts_header, b.is_header, b.is_text_prewie, b.is_image_prewie, b.quantity, p.id, p.alias, p.name, p.description, p.title, p.meta_d, p.meta_k, p.photo
	FROM posts_blocks AS b, posts AS p
	WHERE b.id = '$block_id' AND p.block_id =  b.id
	ORDER BY p.date_add DESC LIMIT $num, $limit"); //Вытаскиваем из таблицы
			            
	
	if(mysqli_num_rows($r1) > 0){
		$posts = false;
		for($i = 0; $f1 = mysqli_fetch_assoc($r1); $i++) {
			$quantity = $f1['quantity'];
			if ($i >= $quantity) {
				break;
			}
			$posts[] = $f1;
		}
		//var_dump($posts);
		foreach ($posts as $value) {
			if ($value['is_text_prewie'] && $value['is_image_prewie']) {?>
					
						<article class="post" tabindex="0">
							<a href="<?=ROOT?>posts/<?=$value['alias']?>"><div class="post-img" style="background: url(<?=ROOT?>img/other/<?=$value['photo']?>) 50% 50%/cover no-repeat;"></div></a>
							
							<div class="post-content">
								<h4 class="text-left"><?=$value['name']?></h4>
								<?=short(strip_tags(htmlspecialchars_decode($value['description'])), 300)?><br><br>
								<a href="<?=ROOT?>posts/<?=$value['alias']?>" class="post-detail">Подробнее&nbsp;<img src="<?=ROOT?>img/back.png"></a>
							</div>
						</article>

		<?php

			}
			if ($value['is_text_prewie'] && !$value['is_image_prewie']) {?>
						<article class="post" tabindex="0">					
							<div class="post-content">
								<h4 class="text-left"><?=$value['name']?></h4>
								<?=short(strip_tags(htmlspecialchars_decode($value['description'])), 300)?><br>
								<a href="<?=ROOT?>posts/<?=$value['alias']?>" class="post-detail">Подробнее&nbsp;<img src="<?=ROOT?>img/back.png"></a>
							</div>
						</article>
		<?php
			}
			if (!$value['is_text_prewie'] && $value['is_image_prewie']) {?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<article class="post" tabindex="0">
							<div class="post-img" style="width:100%; height: 330px; background: url(<?=ROOT?>img/other/<?=$value['photo']?>) 50% 50% no-repeat; background-size: cover;"></div>
							<h4 class="text-center"><a href="<?=ROOT?>posts/<?=$value['alias']?>"><?=$value['name']?></a></h4>
						</article>
					</div>
		<?php
			}
		}	
		sleep(1); //Сделана задержка в 1 секунду чтобы можно проследить выполнение запроса
	}else{
		echo 0; //Если записи закончились
	}
	
}
?>