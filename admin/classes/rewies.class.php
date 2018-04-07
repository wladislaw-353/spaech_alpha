<?php
if (!isset($_SESSION['user_id'])) {
	die;
}
class Rewies{
	public $db;
	public $poles;
	public $id;
	public $table_name;
	public $base_array;

	function __construct($a, $b){
		$this->db = $a;
		$this->table_name = $b;
	}
	function shortText($string){
	    $string = strip_tags($string);
	    if (strlen($string) > 250) {
		    $string = substr($string, 0, 250);
		    $string = rtrim($string, "!,.-");
		    $string = substr($string, 0, strrpos($string, ' '));
		    echo $string."… ";
	    }else{
	    	echo $string;
	    }		
	}

	function drawActiveRewies($i = 0){
		if ($i != 0) {
			$i = 1;
		}
		$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE checked = '$i'");
		while ($f = mysqli_fetch_assoc($r)) { ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="thumbnail">
						<div class="caption">
							<h3><?=$f['name']?></h3>
							<p>
								<?=$this->shortText($f['full_text'])?>
							</p>
							<p>
								<a href="index.php?rewies=edit&id=<?=$f['id']?>" class="btn btn-primary">Рекадкитровать</a>
								<a href="index.php?rewies=del&id=<?=$f['id']?>" class="btn btn-danger" onclick="return confirm('Уверены?') ? true : false;" >Удалить</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php }
	}
	function read_db($id){
		$this->id = $id;
		$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE id = '$this->id'");
		$this->read_db = mysqli_fetch_assoc($r);
	}
	function drawOne($pole){
		switch ($pole['type']){
			case 'input':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input type="text" class="form-control" id="<?=$pole['name']?>"  name="<?=$pole['name']?>" value="<?=$this->read_db[$pole['name']]?>">
				</div>
					<?php $this->my_check($pole);?>
			<?php 
			break;

			case 'email':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input type="email" class="form-control" id="<?=$pole['name']?>"  name="<?=$pole['name']?>" value="<?=$this->read_db[$pole['name']]?>">
				</div>
					<?php $this->my_check($pole);?>
			<?php 
			break;

			case 'phone':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input type="tel" class="form-control" id="<?=$pole['name']?>"  name="<?=$pole['name']?>" value="<?=$this->read_db[$pole['name']]?>">
				</div>
					<?php $this->my_check($pole);?>
			<?php 
			break;

			case 'date':?>
				<div class="form-group">
					<label for="<?=$pole['name']?>"><?=$pole['title'] ?></label>
					<input type="datetime" class="form-control" id="<?=$pole['name']?>"  name="<?=$pole['name']?>" value="<?=$this->read_db[$pole['name']]?>">
				</div>
				<?php break;
			case 'textarea':?>
				<div class="form-group">
					<label for="editor<?=$this->i?>"><?=$pole['title'] ?></label>
					<textarea class="form-control" rows="3" required="required" name="<?=$pole['name']?>"><?=$this->read_db[$pole['name']]?></textarea>
				</div>
					<?php $this->my_check($pole);?>
			<?php
			break;

			case 'foot':?>
				<div class="form-group">
					
					<button type="submit" class="btn btn-primary">Рекадкитровать</button>
					<a href="index.php?rewies=del&id=<?=$this->read_db['id']?>" class="btn btn-danger"  onclick="return confirm('Уверены?') ? true : false;" >Удалить</a>
				</div>
					<?php $this->my_check($pole);?>
			<?php
			break;

			case 'yes/no':?>
				<div class="radio">
					<label><?=$pole['title'] ?></label>
					<label class="radio-inline">
						<input type="radio" name="<?=$pole['name']?>" value="1"<?php if($this->read_db[$pole['name']] == '1') echo "checked"; ?>>
							Да
					</label>
					<label class="radio-inline">
						<input type="radio" name="<?=$pole['name']?>" value="0"<?php if($this->read_db[$pole['name']] != '1') echo "checked"; ?>>
							Нет
					</label>
				</div>
					<?php $this->my_check($pole);?>
			<?php 
			break;

		}
	}
	function drawRewie(){
		$this->poles = [
			['title'=> 'Имя', 'name' => 'name', 'value'=>$_POST['name'], 'type'=> 'input'],
			['title'=> 'E-mail', 'name' => 'email', 'value'=>$_POST['email'], 'type'=> 'input'],
			['title'=> 'Телефон', 'name' => 'phone', 'value'=>$_POST['phone'], 'type'=> 'input'],
			['title'=> 'Комментарий', 'name' => 'full_text', 'value'=>$_POST['full_text'], 'type'=> 'textarea'],
			['title'=> 'Дата', 'name' => 'date_add', 'value'=>$_POST['date_add'], 'type'=> 'date'],
			['title'=> 'Опубликован', 'name' => 'checked', 'value'=>$_POST['checked'], 'type'=> 'yes/no'],
			['type'=> 'foot']
		];
		echo '<form method="POST" role="form">';
		foreach ($this->poles as $pole) {		
			$this->drawOne($pole);
		}
		echo '</form>';
	}
	function my_check($pole){
		if(isset($pole['value'])){
			$this->base_array[$pole['name']] = $pole['value'];
		}
	}
	function editRewie(){
		if (isset($this->base_array)) {
			foreach ($this->base_array as $key => $value) {
				$connect .= $key . " = '" . $value . "', ";
			}
			$connect = substr($connect, 0,-2);
			$res = mysqli_query($this->db, "UPDATE $this->table_name SET $connect WHERE id = '$this->id'");
			exit("<meta http-equiv='refresh' content='0; url= index.php?{$this->table_name}=edit&id={$this->id}'>");
		}
	}
	function delRewie($id){
		$this->id = $id;
		$r = mysqli_query($this->db, "DELETE FROM $this->table_name WHERE id = $this->id");
		exit("<meta http-equiv='refresh' content='0; url= index.php?{$this->table_name}={$_SESSION['rewies']}'>");
	}
}
?>