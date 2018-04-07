<?php
class CreateForm{
	public $db;
	public static $table_name;
	public $returned_array;
	private $readDb;
	public $form_class;
	public $poles;
	public $form_id;
	public $modal_id;
	public $form_header;
	public $submit_id;
	public $i;
	public $settings;
	public $check_array;
	public $ajax;

	function __construct($db, $tale_name){
		$this->db = $db;
		$this->table_name = $tale_name;
		$this->i = rand(0,10000);
		$this->form_id = 'FCForm_' . $this->i;
		$this->submit_id = 'FCSubmitButton_' . $this->i;
		$this->modal_id = "FCModalWindow_" . $this->i;
	}
	//Читаем базу данных по ид записи, если нам нужно изменить данные уже записанные в нее
	function readDb($id){
		$this->id = $id;
		$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE id = '$this->id'");
		$this->readDb = mysqli_fetch_assoc($r);
	}

	//Создаем поля формы с необходимыми параметрами
	private function drawOne($pole){
		switch ($pole['type']){
			//самый обычный инпут
			case 'input':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>

					<?php if($pole['div_wrapper_class']){ ?>
					<div class="<?=$pole['div_wrapper_class'] ?>">
					<?php } ?>

					<input 
						type="text" 
						class="form-control" 
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						id="<?=$pole['name']?>"
						<?php if($pole['required']) echo 'required="required"'?>    
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?> 
						<?php if($pole['disabled']) echo "disabled";?> 
						<?php if($pole['value']) echo "value='{$pole['value']}'"; ?>
						<?php if($pole['placeholder']) echo "placeholder='{$pole['placeholder']}'"; ?>
					>
					<?php if($pole['div_wrapper_class']){ ?>
					</div>
					<?php } ?>

					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
				<?php break;
			//скрытый инпут
			case 'hidden':?>
					<input 
						type="hidden" 
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						<?php if($pole['value']) echo "value='{$pole['value']}'"; ?>
					>
					<?php $this->myCheck($pole);?>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
				<?php break;
			//инпут только с int значением
			case 'number':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>
					<input 
						type="number" 
						class="form-control"
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						id="<?=$pole['name']?>"
						<?php if($pole['required']) echo 'required="required"'?>    
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?> 
						<?php if($pole['disabled']) echo "disabled";?> 
						<?php if($pole['value']) echo "value='{$pole['value']}'"; ?>
					>
					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
				<?php break;
			//ипнут с проверкой на валидность мыла
			case 'email':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>

					<?php if($pole['div_wrapper_class']){ ?>
					<div class="<?=$pole['div_wrapper_class'] ?>">
					<?php } ?>

					<input type="email" 
						class="form-control"
						   name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						id="<?=$pole['name']?>"
						<?php if($pole['required']) echo 'required="required"'?>    
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?> 
						<?php if($pole['disabled']) echo "disabled";?> 
						<?php if($pole['value']) echo "value='{$pole['value']}'"; ?>
						<?php if($pole['placeholder']) echo "placeholder='{$pole['placeholder']}'"; ?>
					>

					<?php if($pole['div_wrapper_class']){ ?>
					</div>
					<?php } ?>

					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
			<?php break;
			//ипнут для пароля
			case 'password':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>
					<input type="password" 
						class="form-control"
						   name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						id="<?=$pole['name']?>"
						<?php if($pole['required']) echo 'required="required"'?>    
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?> 
						<?php if($pole['disabled']) echo "disabled";?> 
						<?php if($pole['value']) echo "value='{$pole['value']}'"; ?>
					>
					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
			<?php break;
			//инпут с проверкой на валидность телефона (работает хреново, иногда вообще не работает)
			case 'tel':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>
					<input type="tel" 
						class="form-control"
						   name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						id="<?=$pole['name']?>"
						<?php if($pole['required']) echo 'required="required"'?>    
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?> 
						<?php if($pole['disabled']) echo "disabled";?> 
						<?php if($pole['value']) echo "value='{$pole['value']}'"; ?>
					>
					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
			<?php break;
			//инпут для даты и времени
			case 'date':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>
					<input type="datetime-local" 
						class="form-control"
						   name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						id="<?=$pole['name']?>"
						<?php if($pole['required']) echo 'required="required"'?>    
						<?php if($pole['pattern']) echo "pattern='{$pole['pattern']}'"?> 
						<?php if($pole['disabled']) echo "disabled";?> 
						<?php if($pole['value']) echo "value='{$pole['value']}'"; ?>
					>
					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
			<?php break;
			//текстареа
			case 'textarea':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>

					<?php if($pole['div_wrapper_class']){ ?>
					<div class="<?=$pole['div_wrapper_class'] ?>">
					<?php } ?>

					<textarea
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						id="<?=$pole['name']?>" 
						class="form-control" 
						<?php if($pole['required']) echo 'required="required"'?>
						<?php if($pole['placeholder']) echo "placeholder='{$pole['placeholder']}'"; ?>
					><?php if($pole['value']) echo $pole['value']; ?></textarea>

					<?php if($pole['div_wrapper_class']){ ?>
					</div>
					<?php } ?>

					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
			<?php break;
			//рейтинг
			case 'rating':?>
				<div class="form-group has-feedback">
					<?php if(!$pole['placeholder']){ ?>
					<label for="<?=$pole['name']?>" class="control-label"><?=$pole['title'] ?></label>
					<?php } ?>
					<div class="btn-group" data-toggle="buttons">
					  <label class="btn btn-primary">
					    <input 
					    type="radio" 
					    autocomplete="off"
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						value="1"
						id="<?=$pole['name']?>" 
						class="form-control" 
						<?php if($pole['required']) echo 'required="required"'?>
					    > 1
					  </label>
					  <label class="btn btn-primary">
					    <input 
					    type="radio" 
					    autocomplete="off"
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						value="2"
						id="<?=$pole['name']?>" 
						class="form-control" 
						<?php if($pole['required']) echo 'required="required"'?>
					    > 2
					  </label>
					  <label class="btn btn-primary">
					    <input 
					    type="radio" 
					    autocomplete="off"
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						value="3"
						id="<?=$pole['name']?>" 
						class="form-control" 
						<?php if($pole['required']) echo 'required="required"'?>
					    > 3
					  </label>
					  <label class="btn btn-primary">
					    <input 
					    type="radio" 
					    autocomplete="off"
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						value="4"
						id="<?=$pole['name']?>" 
						class="form-control" 
						<?php if($pole['required']) echo 'required="required"'?>
					    > 4
					  </label>
					  <label class="btn btn-primary active">
					    <input 
					    checked
					    type="radio" 
					    autocomplete="off"
						name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
						value="5"
						id="<?=$pole['name']?>" 
						class="form-control" 
						<?php if($pole['required']) echo 'required="required"'?>
					    > 5
					  </label>
					</div>
					<span class="glyphicon form-control-feedback"></span>
					<?php $this->myCheck($pole);?>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
			<?php break;
			//да/нет, для включения/отключения каких-то параметров. Аналог true/false
			case 'yes/no':?>
				<div class="form-group">
					<div class="radio">
						<span for="<?=$pole['name']?>"><strong><?=$pole['title']?>:&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
						<label class="radio-inline" id="<?=$pole['name']?>">
							<input 
								type="radio"
								name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
								value="1"<?php  if($this->readDb){
													if($this->readDb[$pole['name']] == '1') 
														echo "checked";
												}
											?>
							>
								Да
						</label>
						<label class="radio-inline">
							<input 
								type="radio"
								name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]"
								value="0"<?php	if($this->readDb){
													if($this->readDb[$pole['name']] != '1') 
														echo "checked";
												}
													?>
							>
								Нет
						</label>
						<?php  $this->myCheck($pole);?>
					</div>
				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">

<?php 
				break;
			//Кнопка для отправки формы, можно добавить хтмл класс,
			case 'submit':
			?>
	          <div class="form-group">

	          	<?php if($pole['div_wrapper_class']){ ?>
					<div class="<?=$pole['div_wrapper_class'] ?>">
				<?php } ?>


	          	<button 
	          		type="submit"
	          		id="<?=$this->submit_id?>" 
	          		class="<?php 
	          				if($pole['class']) 
	          					echo $pole['class']; 
	          				else 
	          					echo "btn btn-primary"; 
	          			?>"
	          		<?php if ($pole['ajax']): ?>
	          		data-target="<?=$this->submit_id?>"	          			
	          		<?php endif ?>
	          	><?=$pole['title']?></button>

	          	<?php if($pole['div_wrapper_class']){ ?>
					</div>
				<?php } ?>

	          </div>
				<input type="hidden" name="form_request[form_id]" value="<?=$this->form_id?>">
				<input type="hidden" name="form_request[table_name]" value="<?=$this->table_name?>">
				<input type="hidden" name="form_request[link_from]" value="<?=$_SERVER['REQUEST_URI']?>">
				<input type="hidden" name="form_request[type_from]" value="<?=$_GET['type']?>">
				<input type="hidden" name="form_request[alias]" value="<?=$_GET['alias']?>">
				<?php break;
			//проверка на бота
			case 'antibot':?>
					<input type="text" name="form_request[<?=$this->form_id?>][antibot]" id="antibot" style="display: none;">
					<?php $this->myCheck($pole);?>
<?php
			break;
			case 'image':?>
				<div class="form-group">
					<div class="col-md-12">
						<label class="col-md-12 btn btn-success-custom" for="<?=$pole['name']?>"><?=$pole['title'] ?>
						</label>
					</div>
						
				

					<!-- <label class="file_upload">
						<span class="button">Выбрать</span>
						<mark>Файл не выбран</mark>
						<input type="file" class="hidden">
					</label> -->

					<?php if($pole['div_wrapper_class']){ ?>
					<div class="<?=$pole['div_wrapper_class'] ?>">
					<?php } ?>

					<input
					type="file"
					class="form-control"
					id="<?=$pole['name']?>"
					name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][value]">

					<?php if($pole['div_wrapper_class']){ ?>
					</div>
					<?php } ?>

				</div>
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][title]" value="<?=$pole['title']?>">
					<input type="hidden" name="form_request[<?=$this->form_id?>][<?=$pole['name']?>][name]" value="<?=$pole['name']?>">
				<?php 
					$this->imageUpload($pole); 

				break;

		}
	}

	//Рисуем форму, $ajax - форма работает через ajax, $form_class - хтмл класс для формы, $form_header - заголовок формы (legend)
	function drawForm($ajax=0, $form_class = '', $form_header = '', $one=''){
		$this->form_class = $form_class;
		$this->form_header = $form_header;
		$this->ajax = $ajax;
		echo "<form 
				method='post' 
				class='{$this->form_class}' 
				id='{$this->form_id}' 
				name='form[{$this->form_id}]' ";  
		if ($this->ajax) {
			echo	" action='javascript:{$this->form_id}(null);'";
		}
		echo	" enctype='multipart/form-data'
			>";


			if ($this->form_header){
				echo "<legend>{$this->form_header}</legend>";
			}
			

			foreach ($this->poles as $pole) {
				$this->drawOne($pole);
			}
		echo "</form>";
		echo "<div class='{$this->form_id}'></div>";
		$this->drawScript();
	}

	//Рисуем форму в модальном окне, $ajax - форма работает через ajax, $form_class - хтмл класс для формы, $form_header - заголовок формы (legend)
	function drawModal($ajax=0, $form_class = '', $form_header = ''){
		$this->form_class = $form_class;
		$this->form_header = $form_header;
		$this->ajax = $ajax;
		?>
		<div class="modal fade" id="<?=$this->modal_id?>" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <!-- Основная часть модального окна -->
			      <div class="modal-body">
			      	<?php $this->drawForm($this->ajax, $this->form_class, $this->form_header); ?>
			      </div>
		      <!-- Нижняя часть модального окна -->
		      <div class="modal-footer">
		        <input id="<?=$this->submit_id?>" type="hidden" type="button" class="btn btn-primary" data-target="#<?=$this->modal_id?>">
		        <button type="button" class="btn btn-primary" class="close" data-dismiss="modal">Закрыть</button>
		      </div>
		    </div>
		  </div>
		</div>
	<?php }

	//Рисуем кнопку для вызова модального окна с формой
	public function drawButtonForModal($value = 'Отправить',$class = 'btn btn-lg btn-primary'){
		?>
		<button type="button" class="<?=$class?>" data-toggle="modal" data-target="#<?=$this->modal_id?>">
	    	<?=$value?>
	  	</button>
	<?php }

	//Рисуем скрипт для проверки формы на заполненные поля
	public function drawScript(){?>
		<script>
			$(function() {
		    //при нажатии на кнопку с id="$this->submit_id"
		    $('#<?=$this->submit_id?>').click(function() {
		      //переменная formValid
		      var formValid = true;
		      //перебрать все элементы управления input & textarea
		      $('#<?=$this->form_id?> input, #<?=$this->form_id?> textarea').each(function() {
		      //найти предков, которые имеют класс .form-group, для установления success/error
		      var formGroup = $(this).parents('.form-group');
		      //найти glyphicon, который предназначен для показа иконки успеха или ошибки
		      var glyphicon = formGroup.find('.form-control-feedback');
		      //для валидации данных используем HTML5 функцию checkValidity
		      if (this.checkValidity()) {
		        //добавить к formGroup класс .has-success, удалить has-error
		        formGroup.addClass('has-success').removeClass('has-error');
		        //добавить к glyphicon класс glyphicon-ok, удалить glyphicon-remove
		        glyphicon.addClass('glyphicon-ok').removeClass('glyphicon-remove');
		      } else {
		        //добавить к formGroup класс .has-error, удалить .has-success
		        formGroup.addClass('has-error').removeClass('has-success');
		        //добавить к glyphicon класс glyphicon-remove, удалить glyphicon-ok
		        glyphicon.addClass('glyphicon-remove').removeClass('glyphicon-ok');
		        //отметить форму как невалидную
		        formValid = false;
		      }
		    });
		    //если форма валидна, то
		    if (formValid) {
		      //сркыть модальное окно
		      //$('#myModal').modal('hide');
		      //отобразить сообщение об успехе
		      $('#success-alert').removeClass('hidden');
		    }
		  });
		});
		</script>
	<?php 
	}

	//Проверяем форму, записываем полученные данные в массив
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
					$this->returned_array[$pole['name']] = 'post_disabled';
				}else{
					$this->returned_array[$pole['name']] = $pole['value'];
				}
			}else{
				$this->returned_array[$pole['name']] = $pole['value'];
			}
		}
	}

	//Загрузка изображения
	function imageUpload($pole){
		if(isset($pole['value'])){
			if ($pole['value']['name'] != '') {
				$file = $pole['value'];
				define('UPLOAD_FILE', 'img/other/');
				$valid_formats = array("jpg", "png", "gif","jpeg");
	            $ph_name = $pole['value']['name'] ; // имя файла
	            $size = $pole['value']['size'] ; // размер файла
	            if(strlen($ph_name)) {
	                list($txt, $ext) = explode(".", $ph_name) ; // разбиваем на имя и формат
	                if(in_array($ext,$valid_formats))    // смотрим формат такой как мы разрешили?!
	                {
	                    if($size < (600 * 1024)) // Ограничиваем размер файла в 600kb
	                    {
		                    $actual_image_name = time() . "." . $ext ; // задаем уникальное имя файлу
		                    $tmp = $pole['value']['tmp_name'];
		                    if(move_uploaded_file($tmp, UPLOAD_FILE .  $actual_image_name)) // переносим файл с tmp в наш каталог
	                     	{
	                            $this->returned_array[$pole['name']] =  $actual_image_name;
	                            $pole['value'] =  $actual_image_name;
	                     	}
	                    	else echo "Ошибка. =(";
	                    }
	                    else echo "
						<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>!</strong> Максимальный размер файла не должен превышать 600kb
						</div>";
	                }
	                else echo "
						<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>!</strong> Допустимые форматы: jpg|jpeg|png|gif
						</div>";
	            }
			}
        }
	}

	function mailResult(){?>
		<script type="text/javascript">
	    function <?=$this->form_id?>() {
	        var msg;
	        msg = $('#<?=$this->form_id?>').serializeArray();
	        console.log(msg);
	        $.ajax({
	            type: 'POST',
	            url: "<?=ROOT?>ajax/mailResult.php",
	            data: msg,
	            success: function(data) {
	                $('.<?=$this->form_id?>').html(data);
	            },
	            error:  function(xhr, str){
	                alert('Возникла ошибка: ' + xhr.responseCode);
	            }
	        });

	    }
		</script>
	<?php
	}

	function addRewie(){?>
		<script type="text/javascript">
	    function <?=$this->form_id?>() {
			var formData = new FormData($('#<?=$this->form_id?>')[0]);
			var files = $('input[type=file]');

			jQuery.each(files[0].files, function(i, file) {
				formData.append('file-'+i, file);
				console.log(file);
			});
	        
	        console.log(formData);
	        $.ajax({
	            type: 'POST',
	            url: "<?=ROOT?>ajax/addRewie.php",
	            data: formData,
				contentType: false,
				processData: false,
	            success: function(data) {
	                $('.<?=$this->form_id?>').html(data);
	            },
	            error:  function(xhr, str){
	                alert('Возникла ошибка: ' + xhr.responseCode);
	            }
	        });

	    }
		</script>
	<?php
	}

	function writeResult(){?>
	<script type="text/javascript">
    function <?=$this->form_id?>() {
        var msg;
        msg = $('#<?=$this->form_id?>').serializeArray();
        console.log(msg);
        $.ajax({
            type: 'POST',
            url: "<?=ROOT?>ajax/writeResult.php",
            data: msg,
            success: function(data) {
                $('.<?=$this->form_id?>').html(data);
            },
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

    }
</script>
<?php
	}

	function loginUser(){?>
		<script type="text/javascript" language="javascript">
	    function <?=$this->form_id?>() {
	        var msg;
	        msg = $('#<?=$this->form_id?>').serializeArray();
	        console.log(msg);
	        $.ajax({
	            type: 'POST',
	            url: "<?=ROOT?>ajax/loginUser.php",
	            data: msg,
	            success: function(data) {
	                $('.<?=$this->form_id?>').html(data);
	            },
	            error:  function(xhr, str){
	                alert('Возникла ошибка: ' + xhr.responseCode);
	            }
	        });

	    }
		</script>
	<?php
	}

	function editUserInfo(){?>
		<script type="text/javascript" language="javascript">
	    function <?=$this->form_id?>() {
	        var msg;
	        msg = $('#<?=$this->form_id?>').serializeArray();
	        console.log(msg);
	        $.ajax({
	            type: 'POST',
	            url: "<?=ROOT?>ajax/editUserInfo.php",
	            data: msg,
	            success: function(data) {
	                $('.<?=$this->form_id?>').html(data);
	            },
	            error:  function(xhr, str){
	                alert('Возникла ошибка: ' + xhr.responseCode);
	            }
	        });

	    }
		</script>
	<?php
	}
}
