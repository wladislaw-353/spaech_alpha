<?php 
include("../config.php");
include '../library/main.php';
if(isset($_POST['num'])){
	$num = $_POST['num'];
	$type = $_POST['type'];
	unset($_POST['type']);
	$group_id = $_POST['group_id'];
	unset($_POST['group_id']);
	$r = mysqli_query($db, "SELECT * FROM rewies WHERE type_from = '$type' AND group_id = '$group_id' AND checked = '1' ORDER BY date_add DESC LIMIT $num, 5"); //Вытаскиваем из таблицы 5 комментариев начиная с $num
			            
	
	if(mysqli_num_rows($r) > 0){	
        while ($f = mysqli_fetch_assoc($r)) {
        	if ($f['photo']) {
        		$photo = ROOT . "img/other/" . $f['photo'];
        	}else{
        		$photo = ROOT . "img/anonim.jpg";
        	}
			$num++;
			?>
			<div class="row rewie">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 text-center">
					<div class="rewie_image" style="width:200px; height:200px; display: block; margin: 15px auto; background: url(<?=$photo?>) 50% 50%/cover no-repeat; border-radius:100%;"></div>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
					<h4><b><?=$f['name']?></b></h4>
					<p><?=$f['full_text']?></p>
					<p class="text-right">
						<i><?=$f['date_add']?></i>
					</p>
				</div>
				<div class="clear"></div>
			</div>
           <?php
        }
		sleep(1); //Сделана задержка в 1 секунду чтобы можно проследить выполнение запроса
	}else{
		echo 0; //Если записи закончились
	}
	
}
?>