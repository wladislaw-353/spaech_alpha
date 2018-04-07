<div class="container text-center">
	<h1>Калькулятор топа</h1>
	<form action="" method="POST">
		<label for="">Наш сайт</label>
		<input type="text" name="our_site" value="<?=$_POST['our_site']?>"><br>
		<label for="">Конкурент 1</label>
		<input type="text" name="competitor1" value="<?=$_POST['competitor1']?>"><br>
		<label for="">Конкурент 2</label>
		<input type="text" name="competitor2" value="<?=$_POST['competitor2']?>"><br>
		<label for="">Конкурент 3</label>
		<input type="text" name="competitor3" value="<?=$_POST['competitor3']?>"><br>
		<h2>Бюджет</h2>
		<label for="">SEO:</label>
		<input type="text" name="SEO" value="<?=$_POST['SEO']?>"><br>
		<label for="">PPC:</label>
		<input type="text" name="PPC" value="<?=$_POST['PPC']?>"><br>
		<label for="">SMM:</label>
		<input type="text" name="SMM" value="<?=$_POST['SMM']?>"><br>
		<button name="calc_submit">Ok</button>
	</form>
</div>
<div class="container text-center">
	<? if(isset($_POST['calc_submit'])){
		$our_site = $_POST['our_site'];
		$competitor1 = $_POST['competitor1'];
		$competitor2 = $_POST['competitor2'];
		$competitor3 = $_POST['competitor3'];
		$SEO = (int)$_POST['SEO'];
		$PPC = (int)$_POST['PPC'];
		$SMM = (int)$_POST['SMM'];

		$all_money = $SEO + $PPC + $SMM;
		$ourrank = (alexa_rank($our_site))? (int)alexa_rank($our_site):20000000;
		$rank1 = alexa_rank($competitor1);
		$rank2 = alexa_rank($competitor2);
		$rank3 = alexa_rank($competitor3);
		echo $rank2." | ".$rank3;
		
		$day_speed = $all_money*3; //сколько долларов платим столько мест в день проходим 100$ - 1 speed

		if($rank1<$ourrank){
			for($i = $rank1; $i<$ourrank; $i++){
				$time1 += countTime($i, $ourrank);
			}
			$time1/=$day_speed;
		}
		else{
			$time1 = 0;
		}
		if($rank2<$ourrank){
			for($i = $rank2; $i<$ourrank; $i++){
				$time2 += countTime($i, $ourrank);
			}
			$time2/=$day_speed;
		}
		else{
			$time2 = 0;
		}
		if($rank3<$ourrank){
			for($i = $rank3; $i<$ourrank; $i++){
				$time3 += countTime($i, $ourrank);
			}
			$time3/=$day_speed;
		}
		else{
			$time3 = 0;
		}
		?>
		<p>Первого конкурента обгоним через <?=convertTime($time1)?></p>
		<p>Второго конкурента обгоним через <?=convertTime($time2)?></p>
		<p>Третьего конкурента обгоним через <?=convertTime($time3)?></p>
		<?
		//header('Location: /calc.php');
	}
	function alexa_rank($url){
    	$xml = simplexml_load_file("http://data.alexa.com/data?cli=10&url=".$url);
    	if(isset($xml->SD)):
        	return $xml->SD->REACH->attributes();
    	endif;
	}
	function convertTime($time){
		$time = (int)$time;
		$years = 0;
		$month = 0;
		$days = 0;
		for($j=0; ; $j++){
			if($time>365){
				$time-=365;
				$years++;
				continue;
			}
			if($time>30){
				$time-=30;
				$month++;
				continue;
			}
			if($time<30){
				$days+=$time;
				break;
			}
		}
		$result = $years. " лет, ".$month." месяцев, ".$days." дней";
		return $result;
	}
	function countTime(&$i, $ourrank){
		$i_copy = $i;
		if($i<10){
			if($ourrank<10){ $i=$ourrank; return 10000000*($ourrank-$i_copy); } else{ $i=10; return 10000000*(10-$i_copy); }
		}
		if($i<100){
			if($ourrank<100){ $i=$ourrank; return 100000*($ourrank-$i_copy); } else{ $i=100; return 100000*(100-$i_copy); }
		}
		if($i<1000){
			if($ourrank<1000){ $i=$ourrank; return 10000*($ourrank-$i_copy); } else{ $i=1000; return 10000*(1000-$i_copy); }
		}
		if($i<10000){
			if($ourrank<10000){ $i=$ourrank; return 1000*($ourrank-$i_copy); } else{ $i=10000; return 1000*(100-$i_copy); }
		}
		if($i<100000){
			if($ourrank<100000){ $i=$ourrank; return 100*($ourrank-$i_copy); } else{ $i=100000; return 100*(100000-$i_copy); }
		}
		if($i<1000000){
			if($ourrank<1000000){ $i=$ourrank; return 0.2*($ourrank-$i_copy); } else{ $i=1000000; return 0.2*(1000000-$i_copy); }
		}
		else{
			if($ourrank<20000000){ $i=$ourrank; return 0.1*($ourrank-$i_copy); } else{ $i=20000000; return 0.1*(20000000-$i_copy); }
		}
	}
	?>
	<? include 'parts/inner_mobile_menu.php';?>
</div>
<?
/*
Vjacheslav Zelinskiy, [29.03.18 21:50]
<div class="container text-center">
  <h1>Калькулятор топа</h1>
  <form action="" method="POST">
    <label for="">Наш сайт</label>
    <input type="text" name="our_site" value="<?=$_POST['our_site']?>"><br>
    <label for="">Конкурент 1</label>
    <input type="text" name="competitor1" value="<?=$_POST['competitor1']?>"><br>
    <label for="">Конкурент 2</label>
    <input type="text" name="competitor2" value="<?=$_POST['competitor2']?>"><br>
    <label for="">Конкурент 3</label>
    <input type="text" name="competitor3" value="<?=$_POST['competitor3']?>"><br>
    <h2>Бюджет</h2>
    <label for="">SEO:</label>
    <input type="text" name="SEO" value="<?=$_POST['SEO']?>"><br>
    <label for="">PPC:</label>
    <input type="text" name="PPC" value="<?=$_POST['PPC']?>"><br>
    <label for="">SMM:</label>
    <input type="text" name="SMM" value="<?=$_POST['SMM']?>"><br>
    <button name="calc_submit">Ok</button>
  </form>
</div>
<div class="container text-center">
  <? if(isset($_POST['calc_submit'])){
    $our_site = $_POST['our_site'];
    $competitor1 = $_POST['competitor1'];
    $competitor2 = $_POST['competitor2'];
    $competitor3 = $_POST['competitor3'];
    $SEO = (int)$_POST['SEO'];
    $PPC = (int)$_POST['PPC'];
    $SMM = (int)$_POST['SMM'];
  
    $all_money = $SEO + $PPC + $SMM;
    $ourrank = (alexa_rank($our_site))? (int)alexa_rank($our_site):20000000;
    //echo $ourrank;
  
    $rank1 = alexa_rank($competitor1);
    $rank2 = alexa_rank($competitor2);
    $rank3 = alexa_rank($competitor3);
    echo $rank2." | ".$rank3;
  
    // 
    $day_speed = $all_money; //сколько долларов платим столько мест в день проходим 100$ - 1 speed
    //$time1 = ($rank1<$ourrank)? (int)(($ourrank-$rank1)/$day_speed) : 0;
    //$time2 = ($rank2<$ourrank)? (int)(($ourrank-$rank2)/$day_speed) : 0;
    //$time3 = ($rank3<$ourrank)? (int)(($ourrank-$rank3)/$day_speed) : 0;
    //
    if($rank1<$ourrank){  
      for($i = $rank1; $i<$ourrank; $i+=50){
        $time1 += countTime($i)*50;
      }
      $time1/=$day_speed;
    }
    else{
      $time1 = 0;
    }
    if($rank2<$ourrank){  
      for($i = $rank2; $i<$ourrank; $i+=50){
        $time2 += countTime($i)*50;
      }
      $time2/=$day_speed;
    }
    else{
      $time2 = 0;
    }
    if($rank3<$ourrank){  
      for($i = $rank3; $i<$ourrank; $i+=50){
        $time3 += countTime($i)*50;
      }
      $time3/=$day_speed;
    }
    else{
      $time3 = 0;
    }
    
    //$time2/=$day_speed;
    //$time3/=$day_speed;
    
    ?>
    <p>Первого конкурента обгоним через <?=convertTime($time1)?></p>
    <p>Второго конкурента обгоним через <?=convertTime($time2)?></p>
    <p>Третьего конкурента обгоним через <?=convertTime($time3)?></p>
    <?
    //header('Location: /calc.php');
  }
  function alexa_rank($url){
      $xml = simplexml_load_file("http://data.alexa.com/data?cli=10&url=".$url);
      if(isset($xml->SD)):
          return $xml->SD->REACH->attributes();
      endif;
  }
  function convertTime($time){
    $time = (int)$time;
    $years = 0;
    $month = 0;
    $days = 0;
    for($j=0; ; $j++){
      if($time>365){
        $time-=365;
        $years++;
        continue;
      }
      if($time>30){
        $time-=30;
        $month++;
        continue;
      }
      if($time<30){
        $days+=$time;
        break;
      }
    }
    $result = $years. " лет, ".$month." месяцев, ".$days." дней";
    return $result;
  }
  function countTime($i){
    if($i<10){
      return 1000000;
      $days = (10-$i)*1000;
      return [$days, (10-$i)];
    }
    if($i<100){
      return 100000;
      $days = (100-$i)*100;
      return [$days, (100-$i)];
    }
    if($i<1000){
      return 10000;
      $days = (1000-$i)*10;
      return [$days, (1000-$i)];
    }
    if($i<10000){
      return 1000;
      $days = (10000-$i)*5;
      return [$days, (10000-$i)];
    }
    if($i<100000){
      return 100;
      $days = (100000-$i)*3;
      return [$days, (100000-$i)];
    }
    if($i<1000000){
      return 0.2;
      $days = (1000000-$i)*2;
      return [$days, (1000000-$i)];
    }
    else{

Vjacheslav Zelinskiy, [29.03.18 21:50]
return 0.01;
      $days = (20000000-$i)*1;
      return [$days, (20000000-$i)];
    }
  }
  */
  ?>