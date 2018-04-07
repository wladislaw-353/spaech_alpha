<?php
if (!isset($_SESSION['user_id'])) {
	die;
}

/**
 * Постройка форм
 */
class Add{
	public $poles;
	public $poles_langs;
	private $db;
	public $table_name;
	private $check_array;
	public $base_array;
	public $readDb;
	public $main_alias;
	public $block_id;
	public $group_id;
	public $i = 1;
	public $alias_transform = array("а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e",
        "ё"=>"jo", "ж"=>"zh", "з"=>"z", "и"=>"i", "й"=>"jj", "к"=>"k", "л"=>"l",
        "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "ь"=>"", "с"=>"s", "т"=>"t", "у"=>"u",
        "ф"=>"f", "х"=>"kh", "ц"=>"c", "ч"=>"ch", "ш"=>"sh", "щ"=>"shh", "ы"=>"y",
        "э"=>"eh", "ю"=>"yu", "я"=>"ya", "А"=>"a", "Б"=>"b", "В"=>"v", "Г"=>"g",
        "Д"=>"d", "Е"=>"e", "Ё"=>"jo", "Ж"=>"zh", "З"=>"z", "И"=>"i", "Й"=>"jj",
        "К"=>"k", "Л"=>"l", "М"=>"m", "Н"=>"n", "О"=>"o", "П"=>"p", "Р"=>"r", "С"=>"s",
        "Т"=>"t", "У"=>"u", "Ф"=>"f", "Х"=>"kh", "Ц"=>"c", "Ч"=>"ch", "Ш"=>"sh",
        "Щ"=>"shh", "Ы"=>"y", "Э"=>"eh", "Ю"=>"yu", "Я"=>"ya", " "=>"-", "."=>"-",
        ","=>"-", "_"=>"-", "+"=>"-", ":"=>"-", ";"=>"-", "!"=>"-", "?"=>"-", "/"=>"-", "\\"=>"-", "&"=>"-", "\""=>"-", "'"=>"-");


	function __construct($db, $table_name, $block_id = 0){
		//подключение к базе
		$this->db = $db;
		//имя таблицы с которой работаем
		$this->table_name = $table_name;
		//id блока/модуля с которым работаем
		$this->block_id = $block_id;
	}
	//читаем базу
	function readDb($id){
		$this->id = $id;
		$query = "SELECT * FROM $this->table_name WHERE id = '$this->id'";
		$r = mysqli_query($this->db, $query);
		$this->readDb = mysqli_fetch_assoc($r);
	}

	function drawForm(){
		//Проверяем есть ли языки в базе
		$r = mysqli_query($this->db, "SELECT * FROM languages");
		if(mysqli_num_rows($r) > 1){
			//Проверяем нужно ли вообще заморачиваться с языками. Тоесть записи для разных языков имеют одинаковый алиас. Этот алиас и дрочим
			if ($this->readDb['alias']) {
				//ссылка на все случаи жизни
				$link = "index.php?type={$_GET['type']}&action={$_GET['action']}&id={$_GET['id']}";
				if (isset($_GET['block_id'])) {
					$link .= "&block_id={$_GET['block_id']}";
				}
				if (isset($_GET['item'])) {
					$link .= "&item={$_GET['item']}";
				}
				//высер кнопок с переключением языков
				while ($f = mysqli_fetch_assoc($r)) {
					echo "<a href='{$link}&language_id={$f['id']}' class='btn btn-sm btn-default";
					if ($_GET['language_id'] == $f['id']) {
						echo " active";
					}elseif (!isset($_GET['language_id']) && $f['id'] == 1) {
						echo " active";
					}
					echo "'>{$f['name']}</a>";
				}
					//записали наш алиас, если будем изменять алиас то по этой переменной будем отлавливать записи для других языков и в них тоже имзенять алиас
					$this->main_alias = $this->readDb['alias'];
				//форма для главного языка
				if (!isset($_GET['language_id']) || $_GET['language_id'] == 1) {
					echo '<form method="POST" role="form"  enctype="multipart/form-data">';
					foreach ($this->poles as $pole) {
						$this->drawOne($pole);
					}
					echo "</form>";
					$this->poles[] = ['name' => 'language_id', 'value' => $_GET['language_id']];
				}else{
					//форма для вторчного языка
					$language_id = $_GET['language_id'];
					$r1 = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE alias = '$this->main_alias' AND language_id = '$language_id'");
					$f1 = mysqli_fetch_assoc($r1);
					$this->readDb($f1['id']);
					echo '<form method="POST" role="form"  enctype="multipart/form-data">';
					$this->poles = $this->poles_langs;
					foreach ($this->poles as $pole) {
						$this->drawOne($pole);
					}
					echo "</form>";
				}
			}else{
				//обычная форма когда не заморачиваемся с языками
				echo '<form method="POST" role="form"  enctype="multipart/form-data">';
				foreach ($this->poles as $pole) {
					$this->drawOne($pole);
				}
				echo "</form>";
			}
		}
	}
	//поля для формы
	private function drawOne($pole){
		switch ($pole['type']){
			case 'hidden':?>
					<input
						type="hidden"
						class="form-control" id="<?=$pole['name']?>"
						name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
						value="<?php
							if($this->readDb){
								echo $this->readDb[$pole['name']];
							}else{
								if(isset($pole['value'])) echo $pole['value'];
							}
							?>"
						<?php if($pole['required']) echo "required='required'"; ?>
					>
					<?php $this->myCheck($pole);?>
				<?php break;
			case 'input':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input
						type="text"
						class="form-control" id="<?=$pole['name']?>"
						name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
						value="<?php
							if($this->readDb){
								echo $this->readDb[$pole['name']];
							}else{
								if(isset($pole['value'])) echo $pole['value'];
							}
							?>"
						<?php if($pole['required']) echo "required='required'"; ?>
					>
					<?php $this->myCheck($pole);?>
				</div>
				<?php break;

			case 'yes/no':?>
				<div class="form-group">
					<div class="radio">
						<span for="<?=$pole['name']?>"><strong><?=$pole['title']?>:&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
						<label class="radio-inline" id="<?=$pole['name']?>">
							<input
								type="radio"
								name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
								value="1"
								<?php
									if($this->readDb){
										if($this->readDb[$pole['name']] == '1') echo "checked";
									}
								?>
							>
								Да
						</label>
						<label class="radio-inline">
							<input
								type="radio"
								name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
								value="0"
								<?php
									if($this->readDb){
										if($this->readDb[$pole['name']] != '1') echo "checked";
									}
								?>
							>
								Нет
						</label>
						<?php  $this->myCheck($pole);?>
					</div>
				</div>

				<?php break;

			case 'number':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input
						type="number"
						class="form-control"
						id="<?=$pole['name']?>"
						name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
						value="<?php
							if($this->readDb){
								echo $this->readDb[$pole['name']];
							}else{
								if(isset($pole['value'])) echo $pole['value'];
							}
						?>"
						<?php if($pole['required']) echo "required='required'"; ?>
					>
					<?php $this->myCheck($pole);?>
				</div>
				<?php break;

			case 'date':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input
						type="date"
						class="form-control"
						id="<?=$pole['name']?>"
						name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
						value="<?php
							if($this->readDb){
								echo $this->readDb[$pole['name']];
							}else{
								if(isset($pole['value'])) echo $pole['value'];
							}
						?>"
						<?php if($pole['required']) echo "required='required'"; ?>
					>
					<?php $this->myCheck($pole);?>
				</div>
				<?php break;

			case 'textarea':?>
				<div class="form-group">
					<label for="editor<?=$this->i?>"><?=$pole['title'] ?></label>
						<textarea
							class="form-control"
							rows="3"
							required="required"
							name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
							id="editor<?=$this->i?>"
							<?php if($pole['required']) echo "required='required'"; ?>
						>
							<?php
							if($this->readDb){
								echo $this->readDb[$pole['name']];
							}else{
								if(isset($pole['value'])) echo $pole['value'];
							}
							?>
						</textarea>
						<script type="text/javascript">
						CKEDITOR.replace( 'editor<?=$this->i?>');
						</script>
						<?php $this->myCheck($pole); ?>
				</div>
				<?php
				$this->i++;
				break;
			case 'text':?>
				<div class="form-group">
					<label for="editor<?=$this->i?>"><?=$pole['title'] ?></label>
						<textarea
							class="form-control"
							rows="20"
							required="required"
							name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
							<?php if($pole['required']) echo "required='required'"; ?>
						><?php
							if($this->readDb){
								echo $this->readDb[$pole['name']];
							}else{
								if(isset($pole['value'])) echo $pole['value'];
							}
							?></textarea>
						<?php $this->myCheck($pole); ?>
				</div>
				<?php
				$this->i++;
				break;

			case 'submit':?>
				<div class="form-group">
					<button
						type="submit"
						name="submit"
						class="btn btn-primary"
					>
						<?=$pole['title']?>
					</button>
				</div>
				<?php break;

			case 'images':?>
				<iframe
					width="100%"
					id="photo_frame"
					src="add_img.php?id=<?=$this->id?>&table_name=<?=$this->table_name?>" frameborder="0"
				>
				</iframe>
				<?php break;

			case 'image':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input
						type="file"
						class="form-control"
						id="<?=$pole['name']?>"
						name="<?=$pole['name']?>"
						<?php if($pole['disabled']){echo " disabled ";} ?>
					>
				</div>
				<?php
					$this->imageUpload($pole);
					if($this->readDb){
						if ($this->readDb[$pole['name']] != '') {
							echo "<div class='prev'><img src='../img/other/{$this->readDb[$pole['name']]}' class='img-responsive' alt='Image'></div>";
						}
					}
					?>
				<?php break;

            case 'parent':
                $r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE language_id = '1' AND parent = '0' ORDER BY sort, name");	?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
						<select
							name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
							id="<?=$pole['name']?>"
							class="form-control"
							<?php if($pole['required']) echo "required='required'"; ?>
						>
			                <option value="0"><?=$pole['title'] ?></option>
			                <?php
			                	while ($f = mysqli_fetch_assoc($r)) {
			                		if ($f['group_id'] == $this->id) {
			                			continue;
			                		}
			                		?>
		                    	<option
		                    		value="<?=$f['group_id']?>"
		                    		<?php
		                    			if($this->readDb[$pole['name']] == $f['group_id'])
		                    				echo "selected";
	                    			?>
	                    		>
	                    			<?=$f['name']?>
	                    		</option>
			                <?php
			                		$r1 = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE parent = '".$f['group_id']."' AND language_id = '1' ORDER BY sort, name");
			                		if (mysqli_num_rows($r1)) {
			                			while ($f1 = mysqli_fetch_assoc($r1)) {
					                		?>
					                    	<option
					                    		value="<?=$f1['group_id']?>"
					                    		<?php
					                    			if($this->readDb[$pole['name']] == $f1['group_id'])
					                    				echo "selected";
				                    			?>
				                    		>
				                    			<?=$f['name']?>--><?=$f1['name']?>
				                    		</option>
						                	<?php
			                			}
			                		}
			            		}
			            	?>
						</select>
					<?php $this->myCheck($pole);?>
				</div>
                <?php break;
            case 'pages':
                $r = mysqli_query($this->db, "SELECT * FROM pages WHERE language_id = '1' ORDER BY name");	?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
						<select
							name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
							id="<?=$pole['name']?>"
							class="form-control"
							required="required"
						>
			                <option value="0"><?=$pole['title'] ?></option>
			                <?php
			                while ($f = mysqli_fetch_assoc($r)) {?>
			                    <option
			                    	value="<?=$f['group_id']?>"
			                    	<?php if($this->readDb[$pole['name']] == $f['group_id'])
			                    		echo "selected";?>
			                    >
			                    	<?=$f['name']?>
			                    </option>
			                <?php } ?>
						</select>
					<?php $this->myCheck($pole);?>
				</div>
                <?php break;
            case 'category':
                $r = mysqli_query($this->db, "SELECT * FROM categories WHERE language_id = '1' ORDER BY name");	?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
						<select
							name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
							id="<?=$pole['name']?>"
							class="form-control"
							required="required"
						>
			                <option value=""><?=$pole['title'] ?></option>
			                <?php
			                while ($f = mysqli_fetch_assoc($r)) {?>
			                    <option
			                    	value="<?=$f['group_id']?>"
			                    	<?php if($this->readDb[$pole['name']] == $f['group_id'])
			                    		echo "selected";?>
			                    >
			                    	<?=$f['name']?>
			                    </option>
			                <?php } ?>
						</select>
					<?php $this->myCheck($pole);?>
				</div>
                <?php break;
            case 'menu-type':
                $r = mysqli_query($this->db, "SELECT * FROM menus WHERE id = '$this->id'");
                $f = mysqli_fetch_assoc($r);
                ?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
						<select
							name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
							id="<?=$pole['name']?>"
							class="form-control"
							required="required"
						>
			                <option value=""><?=$pole['title'] ?></option>
			                <option
			                	<?php if($f['type'] == 'vertical') echo "selected"; ?>
			                	value="vertical"
			                >
			                	Вертикальное
			                </option>
			                <option
			                	<?php if($f['type'] == 'horizontal') echo "selected"; ?>
			                	value="horizontal"
			                >
			                	Горизонтальное
			                </option>
			                <!-- <option value="accordeon">Аккордеон</option> -->
						</select>
					<?php $this->myCheck($pole);?>
				</div>
                <?php break;
            case 'menu-position':
                $table = $this->table_name;
                $r = mysqli_query($this->db, "SELECT * FROM menus_positions ORDER BY name");	?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
						<select
							name="<?=$pole['name']?>"
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?>
						<?php if($pole['disabled']){echo " disabled ";} ?>
							id="<?=$pole['name']?>"
							class="form-control"
							required="required"
						>
			                <option value=""><?=$pole['title'] ?></option>
			                <?php
			                while ($f = mysqli_fetch_assoc($r)) {?>
			                    <option
				                    value="<?=$f['id']?>"
				                    <?php if($this->readDb[$pole['name']] == $f['id'])
				                    	echo "selected";
				                    ?>
			                   	>
			                   		<?=$f['name']?>
			                   	</option>
			                <?php } ?>
						</select>
					<?php $this->myCheck($pole);?>
				</div>
                <?php break;
			case 'password':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input type="password" class="form-control" id="<?=$pole['name']?>" <?php if($pole['required']) echo "required='required'"; ?>  name="<?=$pole['name']?>">
						<?php if($pole['disabled']){echo " disabled ";} ?>
					<?php $this->myCheck($pole);?>
				</div>
<?php
		}
	}
	//Обрезка изображений при загрузке
	function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
	    list($w_i, $h_i, $type) = getimagesize($file_input);
	    if (!$w_i || !$h_i) {
	        echo 'Невозможно получить длину и ширину изображения при уменьшении';
	        return;
	    }
	    if ($w_i < 1000 && $h_1 < 1000) {
	    	return $file_input;
	    }else{
		    echo $w_i;
		    echo $h_i;
		    $types = array('','gif','jpeg','png');
		    $ext = $types[$type];
		    if ($ext) {
		        $func = 'imagecreatefrom'.$ext;
		        $img = $func($file_input);
		    } else {
		        echo 'Некорректный формат файла';
		        return;
		    }
		    if ($percent) {
		        $w_o *= $w_i / 100;
		        $h_o *= $h_i / 100;
		    }
		    if (!$h_o) $h_o = $w_o/($w_i/$h_i);
		    if (!$w_o) $w_o = $h_o/($h_i/$w_i);
		    $img_o = imagecreatetruecolor($w_o, $h_o);
		    imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
		    if ($type == 2) {
		        return imagejpeg($img_o,$file_output,100);
		    } else {
		        $func = 'image'.$ext;
		        return $func($img_o,$file_output);
		    }
	    }
	}
	//загрузчик изображений
	function imageUpload($pole){
		if(isset($pole['value'])){
			if ($pole['value']['name'] != '') {
				//var_dump($pole);
				unlink('../img/other/' . $this->readDb[$pole['name']]);
				$file = $pole['value'];
				define('UPLOAD_FILE', '../img/other/');
				$valid_formats = array("jpg", "png", "gif","jpeg");
	            $ph_name = $pole['value']['name'] ; // имя файла
	            $size = $pole['value']['size'] ; // размер файла
	            if(strlen($ph_name)) {
	                list($txt, $ext) = explode(".", $ph_name) ; // разбиваем на имя и формат
	                if(in_array($ext,$valid_formats))    // смотрим формат такой как мы разрешили?!
	                {
	                    if($size < (10000 * 1024)) // Ограничиваем размер файла в 3MB
	                    {
		                    $actual_image_name = time() . "." . $ext ; // задаем уникальное имя файлу
		                    $tmp = $pole['value']['tmp_name'];
		                    if(move_uploaded_file($tmp, UPLOAD_FILE .  $actual_image_name)) // переносим файл с tmp в наш каталог
	                     	{
	                            $this->base_array[$pole['name']] =  $actual_image_name;
	                     		$this->resize(UPLOAD_FILE . $actual_image_name, UPLOAD_FILE . $actual_image_name, '1000', '');
	                            $pole['value'] =  $actual_image_name;
	                            $this->photo =  $actual_image_name;
	                     	}
	                    	else echo "Ошибка. =(";
	                    }
	                    else echo "<h2 class='erred'>Максимальный размер файла не должен превышать 10mb</h2>";
	                }
	                else echo "Допустимые форматы: jpg|jpeg|png|gif)";
	            }
			}

        }
	}
	//проверка полученных с формы данных.
	function myCheck($pole){
		if(isset($pole['value'])){
			$check = addslashes(htmlspecialchars($pole['value']));
			if ($pole['required']) {
				if ($check  == '') {
					echo "
						<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>!</strong> Неверный формат или не заполнено обязательное поле ({$pole['title']})
						</div>";
					$this->base_array[$pole['name']] = 'post_disabled';
				}else{
					if ($pole['md5']) {
						$this->base_array[$pole['name']] = md5($pole['value']);
					}else{
						$this->base_array[$pole['name']] = $pole['value'];
					}
				}
			}else{
				$this->base_array[ $pole['name']] = $pole['value'];
			}
		}
	}
	//пишем все в базу
	function saveDb($alias=0){
		//если получили омассив после проверки данных с формы
		if (isset($this->base_array)) {
			//проверили можно ли его писать
			$this->check_array = array_search('post_disabled', $this->base_array);
			if ($this->check_array != true) {
				//добавили дату создания
				if (!$this->readDb) {
					$this->base_array['date_add'] = date('Y-m-d H:i:s');
				}
				//проверили на алиас, если надо - создали
				if ($alias != 0) {
					if (!$this->base_array['alias']) {
						$this->base_array['alias'] = strtr($this->base_array['name'],$this->alias_transform);
					}elseif ($this->base_array['alias'] == '') {
						$this->base_array['alias'] = strtr($this->base_array['name'],$this->alias_transform);
					}
				}
				//теперь проверяем алиас на уникальность
				if ($this->readDb) {
					$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE language_id = '1' AND alias = '" . $this->base_array['alias']. "' AND id <> '".$_GET['id']."'");
					if (mysqli_num_rows($r)) {
						$this->base_array['alias'] = $this->readDb['alias'];
					}
				}else{
					$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE language_id = '1' AND alias = '" . $this->base_array['alias']. "'");
					if (mysqli_num_rows($r)) {
						$this->base_array['alias'] = uniqid();
					}
				}
				//добавили ид блока, если надо
				if ($this->block_id) {
					$this->base_array['block_id'] = $this->block_id;
				}
				//превратили массив в строку для записи в базу
				foreach ($this->base_array as $key => $value) {
					//$connect .= addslashes(htmlspecialchars($key)) . " = '" . addslashes(htmlspecialchars($value)) . "', ";
					$connect .= $key . " = '" . $value . "', ";
				}
				//обрезали в конце запятую и пробел
				$connect = substr($connect, 0,-2);
				//echo $connect . "<br>";
				//если редактируем запись
				if($this->readDb){
					$res = mysqli_query($this->db, "UPDATE $this->table_name SET $connect WHERE id = '$this->id'");
					//если мы получили главный алиас, значит есть языки, парсим их
					if ($this->main_alias) {
						$r = mysqli_query($this->db, "SELECT * FROM languages");
						while ($f = mysqli_fetch_assoc($r)) {
							//пропускаем главный. так как на 5 строчек выше нужный запрос уже выполнен
							if ($f['id'] == 1) {
								continue;
							}
							$lconnect .= "alias = '{$this->base_array['alias']}', ";
							foreach ($this->base_array as $key => $value) {
								foreach ($this->poles_langs as $pvalue) {
									if ($key == $pvalue['name']) {
										unset($this->base_array[$key]);
									}
								}
							}
							foreach ($this->base_array as $key => $value) {
								$lconnect .= addslashes(htmlspecialchars($key)) . " = '" . addslashes(htmlspecialchars($value)) . "', ";
							}
							$lconnect = substr($lconnect, 0,-2);
							mysqli_query($this->db, "UPDATE $this->table_name SET $lconnect WHERE alias = '$this->main_alias' AND language_id = '".$f['id']."'");
						}
					}
					exit("<meta http-equiv='refresh' content='0; url= $_SERVER[REQUEST_URI]'>");
				}else{
					$res = mysqli_query($this->db, "INSERT INTO $this->table_name SET $connect");
					$this->group_id = mysqli_insert_id($this->db);
					mysqli_query($this->db, "UPDATE $this->table_name SET group_id = '$this->group_id' WHERE id = '$this->group_id'");
					$r = mysqli_query($this->db, "SELECT * FROM languages");
					$connect .= ", group_id = '".$this->group_id."' ";
					while ($f = mysqli_fetch_assoc($r)) {
						if ($f['id'] == 1) {
							continue;
						}
						mysqli_query($this->db, "INSERT INTO $this->table_name
							SET $connect, language_id = '".$f['id']."'");
					}
					$refresh = "index.php?type=";
					if ($this->block_id) {
						$refresh .= $this->table_name . '_blocks&action=items&block_id=' . $this->block_id . '&item=edit&id=' . $this->group_id;
					}else{
						$refresh .= $this->table_name . '&action=edit&id=' . $this->group_id;
					}
					exit("<meta http-equiv='refresh' content='0; url= {$refresh}'>");
				}
				unset($this->main_alias);
				unset($this->base_array);
				die;
				//var_dump($this->db);
			}else{
				echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<strong>!</strong> Ошибка, возможно вы не заполнили обязательные поля
					</div>";
					die;
			}
		}
	}
}
?>