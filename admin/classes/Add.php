<?php
if (!isset($_SESSION['user_id'])) {
	die;
}

/**
 * ��������� ����
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
	public $alias_transform = array("�"=>"a", "�"=>"b", "�"=>"v", "�"=>"g", "�"=>"d", "�"=>"e",
        "�"=>"jo", "�"=>"zh", "�"=>"z", "�"=>"i", "�"=>"jj", "�"=>"k", "�"=>"l",
        "�"=>"m", "�"=>"n", "�"=>"o", "�"=>"p", "�"=>"r", "�"=>"", "�"=>"s", "�"=>"t", "�"=>"u",
        "�"=>"f", "�"=>"kh", "�"=>"c", "�"=>"ch", "�"=>"sh", "�"=>"shh", "�"=>"y",
        "�"=>"eh", "�"=>"yu", "�"=>"ya", "�"=>"a", "�"=>"b", "�"=>"v", "�"=>"g",
        "�"=>"d", "�"=>"e", "�"=>"jo", "�"=>"zh", "�"=>"z", "�"=>"i", "�"=>"jj",
        "�"=>"k", "�"=>"l", "�"=>"m", "�"=>"n", "�"=>"o", "�"=>"p", "�"=>"r", "�"=>"s",
        "�"=>"t", "�"=>"u", "�"=>"f", "�"=>"kh", "�"=>"c", "�"=>"ch", "�"=>"sh",
        "�"=>"shh", "�"=>"y", "�"=>"eh", "�"=>"yu", "�"=>"ya", " "=>"-", "."=>"-",
        ","=>"-", "_"=>"-", "+"=>"-", ":"=>"-", ";"=>"-", "!"=>"-", "?"=>"-", "/"=>"-", "\\"=>"-", "&"=>"-", "\""=>"-", "'"=>"-");


	function __construct($db, $table_name, $block_id = 0){
		//����������� � ����
		$this->db = $db;
		//��� ������� � ������� ��������
		$this->table_name = $table_name;
		//id �����/������ � ������� ��������
		$this->block_id = $block_id;
	}
	//������ ����
	function readDb($id){
		$this->id = $id;
		$query = "SELECT * FROM $this->table_name WHERE id = '$this->id'";
		$r = mysqli_query($this->db, $query);
		$this->readDb = mysqli_fetch_assoc($r);
	}

	function drawForm(){
		//��������� ���� �� ����� � ����
		$r = mysqli_query($this->db, "SELECT * FROM languages");
		if(mysqli_num_rows($r) > 1){
			//��������� ����� �� ������ �������������� � �������. ������ ������ ��� ������ ������ ����� ���������� �����. ���� ����� � ������
			if ($this->readDb['alias']) {
				//������ �� ��� ������ �����
				$link = "index.php?type={$_GET['type']}&action={$_GET['action']}&id={$_GET['id']}";
				if (isset($_GET['block_id'])) {
					$link .= "&block_id={$_GET['block_id']}";
				}
				if (isset($_GET['item'])) {
					$link .= "&item={$_GET['item']}";
				}
				//����� ������ � ������������� ������
				while ($f = mysqli_fetch_assoc($r)) {
					echo "<a href='{$link}&language_id={$f['id']}' class='btn btn-sm btn-default";
					if ($_GET['language_id'] == $f['id']) {
						echo " active";
					}elseif (!isset($_GET['language_id']) && $f['id'] == 1) {
						echo " active";
					}
					echo "'>{$f['name']}</a>";
				}
					//�������� ��� �����, ���� ����� �������� ����� �� �� ���� ���������� ����� ����������� ������ ��� ������ ������ � � ��� ���� �������� �����
					$this->main_alias = $this->readDb['alias'];
				//����� ��� �������� �����
				if (!isset($_GET['language_id']) || $_GET['language_id'] == 1) {
					echo '<form method="POST" role="form"  enctype="multipart/form-data">';
					foreach ($this->poles as $pole) {
						$this->drawOne($pole);
					}
					echo "</form>";
					$this->poles[] = ['name' => 'language_id', 'value' => $_GET['language_id']];
				}else{
					//����� ��� ��������� �����
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
				//������� ����� ����� �� �������������� � �������
				echo '<form method="POST" role="form"  enctype="multipart/form-data">';
				foreach ($this->poles as $pole) {
					$this->drawOne($pole);
				}
				echo "</form>";
			}
		}
	}
	//���� ��� �����
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
								��
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
								���
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
			                	������������
			                </option>
			                <option
			                	<?php if($f['type'] == 'horizontal') echo "selected"; ?>
			                	value="horizontal"
			                >
			                	��������������
			                </option>
			                <!-- <option value="accordeon">���������</option> -->
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
	//������� ����������� ��� ��������
	function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
	    list($w_i, $h_i, $type) = getimagesize($file_input);
	    if (!$w_i || !$h_i) {
	        echo '���������� �������� ����� � ������ ����������� ��� ����������';
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
		        echo '������������ ������ �����';
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
	//��������� �����������
	function imageUpload($pole){
		if(isset($pole['value'])){
			if ($pole['value']['name'] != '') {
				//var_dump($pole);
				unlink('../img/other/' . $this->readDb[$pole['name']]);
				$file = $pole['value'];
				define('UPLOAD_FILE', '../img/other/');
				$valid_formats = array("jpg", "png", "gif","jpeg");
	            $ph_name = $pole['value']['name'] ; // ��� �����
	            $size = $pole['value']['size'] ; // ������ �����
	            if(strlen($ph_name)) {
	                list($txt, $ext) = explode(".", $ph_name) ; // ��������� �� ��� � ������
	                if(in_array($ext,$valid_formats))    // ������� ������ ����� ��� �� ���������?!
	                {
	                    if($size < (10000 * 1024)) // ������������ ������ ����� � 3MB
	                    {
		                    $actual_image_name = time() . "." . $ext ; // ������ ���������� ��� �����
		                    $tmp = $pole['value']['tmp_name'];
		                    if(move_uploaded_file($tmp, UPLOAD_FILE .  $actual_image_name)) // ��������� ���� � tmp � ��� �������
	                     	{
	                            $this->base_array[$pole['name']] =  $actual_image_name;
	                     		$this->resize(UPLOAD_FILE . $actual_image_name, UPLOAD_FILE . $actual_image_name, '1000', '');
	                            $pole['value'] =  $actual_image_name;
	                            $this->photo =  $actual_image_name;
	                     	}
	                    	else echo "������. =(";
	                    }
	                    else echo "<h2 class='erred'>������������ ������ ����� �� ������ ��������� 10mb</h2>";
	                }
	                else echo "���������� �������: jpg|jpeg|png|gif)";
	            }
			}

        }
	}
	//�������� ���������� � ����� ������.
	function myCheck($pole){
		if(isset($pole['value'])){
			$check = addslashes(htmlspecialchars($pole['value']));
			if ($pole['required']) {
				if ($check  == '') {
					echo "
						<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>!</strong> �������� ������ ��� �� ��������� ������������ ���� ({$pole['title']})
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
	//����� ��� � ����
	function saveDb($alias=0){
		//���� �������� ������� ����� �������� ������ � �����
		if (isset($this->base_array)) {
			//��������� ����� �� ��� ������
			$this->check_array = array_search('post_disabled', $this->base_array);
			if ($this->check_array != true) {
				//�������� ���� ��������
				if (!$this->readDb) {
					$this->base_array['date_add'] = date('Y-m-d H:i:s');
				}
				//��������� �� �����, ���� ���� - �������
				if ($alias != 0) {
					if (!$this->base_array['alias']) {
						$this->base_array['alias'] = strtr($this->base_array['name'],$this->alias_transform);
					}elseif ($this->base_array['alias'] == '') {
						$this->base_array['alias'] = strtr($this->base_array['name'],$this->alias_transform);
					}
				}
				//������ ��������� ����� �� ������������
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
				//�������� �� �����, ���� ����
				if ($this->block_id) {
					$this->base_array['block_id'] = $this->block_id;
				}
				//���������� ������ � ������ ��� ������ � ����
				foreach ($this->base_array as $key => $value) {
					//$connect .= addslashes(htmlspecialchars($key)) . " = '" . addslashes(htmlspecialchars($value)) . "', ";
					$connect .= $key . " = '" . $value . "', ";
				}
				//�������� � ����� ������� � ������
				$connect = substr($connect, 0,-2);
				//echo $connect . "<br>";
				//���� ����������� ������
				if($this->readDb){
					$res = mysqli_query($this->db, "UPDATE $this->table_name SET $connect WHERE id = '$this->id'");
					//���� �� �������� ������� �����, ������ ���� �����, ������ ��
					if ($this->main_alias) {
						$r = mysqli_query($this->db, "SELECT * FROM languages");
						while ($f = mysqli_fetch_assoc($r)) {
							//���������� �������. ��� ��� �� 5 ������� ���� ������ ������ ��� ��������
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
						<strong>!</strong> ������, �������� �� �� ��������� ������������ ����
					</div>";
					die;
			}
		}
	}
}
?>