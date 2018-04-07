<?php
$r1 = mysqli_query($db, "SELECT b.class, b.name AS posts_header, b.is_header, b.is_text_prewie, b.is_image_prewie, b.quantity, p.id, p.alias, p.name, p.description, p.title, p.meta_d, p.meta_k, p.photo
	FROM posts_blocks AS b, posts AS p
	WHERE b.id = '$block_id' AND p.block_id =  b.id
	ORDER BY p.date_add DESC");
$posts = false;
for($i = 0; $f1 = mysqli_fetch_assoc($r1); $i++) {
	$quantity = $f1['quantity'];
	if ($i >= $quantity) {
		break;
	}
	$posts[] = $f1;
}
$posts_header = false;
$posts_block = false;
$posts_list = false;
foreach ($posts as $value) {
	if (!$posts_header) {
		$posts_header = $value['posts_header'];
		if ($value['is_header']) {
			echo "<div class='post-header text-center'><h3>{$posts_header}</h3></div>";
		}
	}
	if ($value['is_text_prewie'] && $value['is_image_prewie']) {
		if (!$posts_block) {
			$posts_block = 1;
			echo "<div class='posts post-group-flex {$value['class']}'>";
		}
		?>
			
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
	if ($value['is_text_prewie'] && !$value['is_image_prewie']) {
		if (!$posts_block) {
			$posts_block = 1;
			echo "<div class='posts post-group-flex'>";
		}?>
				<article class="post" tabindex="0">					
					<div class="post-content">
						<h4 class="text-left"><?=$s['name']?></h4>
						<?=short(strip_tags(htmlspecialchars_decode($s['description'])), 300)?><br>
						<a href="<?=ROOT?>posts/<?=$s['alias']?>" class="post-detail">Подробнее&nbsp;<img src="<?=ROOT?>img/back.png"></a>
					</div>
				</article>
<?php
	}
	if (!$value['is_text_prewie'] && $value['is_image_prewie']) {
		if (!$posts_block) {
			$posts_block = 1;
			echo "<div class='posts post-group-flex-left'>";
		}?>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<article class="post" tabindex="0">
					<div class="post-img" style="width:100%; height: 330px; background: url(<?=ROOT?>img/other/<?=$value['photo']?>) 50% 50% no-repeat; background-size: cover;"></div>
					<h4 class="text-center"><a href="<?=ROOT?>posts/<?=$value['alias']?>"><?=$value['name']?></a></h4>
				</article>
			</div>
<?php
	}
}				
echo "</div>";
?>
<script>
$(document).ready(function(){
	$("#<?=$value['class']?>_imgLoad").hide(); // Скрываем прелоадер
});

var num = <?=$quantity?>; //чтобы знать с какой записи вытаскивать данные

$(function() {
	$("#<?=$value['class']?>_load button").click(function(){ // Выполняем если по кнопке кликнули
		
		$("#<?=$value['class']?>_imgLoad").show(); // Показываем прелоадер
		
		$.ajax({
			url: "<?=ROOT?>ajax/loadPosts.php", // Обработчик
			type: "POST",       // Отправляем методом POST
			data: {num: num, type: '<?=$type?>', group_id: '<?=$myBase['group_id']?>', limit: '<?=$quantity?>', block_id: '<?=$block_id?>'},
			cache: false,			
			success: function(response){
				if(response == 0){ // Смотрим ответ от сервера и выполняем соответствующее действие
					$(".<?=$value['class']?>_posts_all").removeClass('hidden');
					$("#<?=$value['class']?>_load").hide
					$("#<?=$value['class']?>_imgLoad").hide();
				}else{
					$(".<?=$value['class']?>").append(response);
					num = num + <?=$quantity?>;
					$("#<?=$value['class']?>_imgLoad").hide();
				}
			}
		});
	});
});
</script>
<div id="<?=$value['class']?>_load" class="text-center">
	<br><button class="btn btn-warning">Загрузить еще</button><br>
	<img src="<?=ROOT?>img/loading.gif" id="<?=$value['class']?>_imgLoad">
</div>
<h4 class="hidden <?=$value['class']?>_posts_all text-center"><br>Больше нет записей<br></h4>