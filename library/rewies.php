<script>
$(document).ready(function(){
	$("#imgLoad").hide(); // Скрываем прелоадер
});

var num = 5; //чтобы знать с какой записи вытаскивать данные

$(function() {
	$("#load button").click(function(){ // Выполняем если по кнопке кликнули
		
		$("#imgLoad").show(); // Показываем прелоадер
		
		$.ajax({
			url: "<?=ROOT?>ajax/loadRewies.php", // Обработчик
			type: "POST",       // Отправляем методом POST
			data: {num: num, type: '<?=$type?>', group_id: '<?=$myBase['group_id']?>'},
			cache: false,			
			success: function(response){
				if(response == 0){ // Смотрим ответ от сервера и выполняем соответствующее действие
					$(".rewies_all").removeClass('hidden');
					$("#load").hide
					$("#imgLoad").hide();
				}else{
					$(".rewies").append(response);
					num = num + 5;
					$("#imgLoad").hide();
				}
			}
		});
	});
});
</script>

<div class="rewies margin-top-55 ">
	<?php
    $r = mysqli_query($db, "SELECT * FROM rewies WHERE type_from = '$type' AND checked = '1' AND group_id = '".$myBase['group_id']."' ORDER BY date_add DESC LIMIT 5");
    while ($f = mysqli_fetch_assoc($r)) {
    	if ($f['photo']) {
    		$photo = ROOT . "img/other/" . $f['photo'];
    	}else{
    		$photo = ROOT . "img/anonim.jpg";
    	}
    	?>
		<div class="row rewie">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 text-l">
				<div class="rewie_image wow zoomIn" style="width:200px; height:200px; display: block; margin: 15px auto; background: url(<?=$photo?>) 50% 50%/cover no-repeat; border-radius:100%;"></div>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
				<h4><b><?=$f['name']?></b></h4>
                <p class="text-l">
                    <i><?=$f['date_add']?></i>
                </p>
				<p><?=$f['full_text']?></p>
				
			</div>
			<div class='clear'></div>
		</div>
       <?php
    }
    ?>
</div>

<?php
$rewies = new CreateForm($db, 'rewies');
$pole =[
    ['title' => 'Отправить', 'placeholder'=> 'Введите Имя', 'name' => 'name', 'required' => '1', 'value'=>$_POST['name'], 'type'=> 'input', 'div_wrapper_class' => 'col-md-4'],
    ['placeholder'=> 'E-mail', 'name' => 'email', 'value'=>$_POST['email'], 'type'=> 'email', 'required' => '1', 'div_wrapper_class' => 'col-md-4'],
    ['placeholder'=> 'Телефон', 'name' => 'phone', 'value'=>$_POST['phone'], 'type'=> 'input', 'div_wrapper_class' => 'col-md-4'],
    ['title'=> 'Загрузить ваше фото', 'name' => 'photo', 'value'=>$_FILES['photo'], 'type'=> 'image', 'div_wrapper_class' => 'col-md-12 hidden'],
    ['placeholder'=> 'Ваш отзыв', 'name' => 'full_text', 'required' => '1', 'value'=>$_POST['full_text'], 'type'=> 'textarea', 'div_wrapper_class' => 'col-md-12'],
    ['title' => 'Отправить отзыв', 'class' => '', 'type'=> 'submit', 'div_wrapper_class' => 'text-c'],
    ['name' => 'antibot', 'value'=>$_POST['antibot'], 'type' => 'antibot']
];
$rewies->poles = $pole;
$rewies->drawForm('1', "reviews-form margin-top-55", "Оставьте свой отзыв");
$rewies->addRewie();
//$rewies->drawForm('1', "reviews-form", "zagolovok formu");
?>



<!-- <div id="load" class="text-center">
	<br><button class="btn btn-warning">Загрузить еще отзывы</button><br>
	<img src="<?=ROOT?>img/loading.gif" id="<imgLoad></imgLoad>">
</div>
<h4 class="hidden rewies_all text-center"><br>Больше нет отзывов<br></h4> -->


