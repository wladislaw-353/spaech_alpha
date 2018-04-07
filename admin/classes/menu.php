<?php
if (!isset($_SESSION['user_id'])) {
	die;
}

class menuEdit{
	public $table_name;
	public $db;
	
	function __construct($db, $table_name){
		$this->db = $db;
		$this->table_name = $table_name;?>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<a class="btn btn-primary" href="index.php?type=<?=$this->table_name?>&action=add" role="button">Добавить новое меню</a>			
			</div>
		</div>
		<br>
<?php 
		$r = mysqli_query($this->db, "SELECT name, id FROM $this->table_name WHERE language_id = '1' ORDER BY   name ASC");
		echo '<div class="row">';
		while($f = mysqli_fetch_assoc($r)){?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="thumbnail">
					<div class="caption">
						<h3><?=$f['name']?></h3>
						<p>
							<a href="index.php?type=<?=$this->table_name?>&action=edit&id=<?=$f['id']?>" class="btn btn-primary">Редактировать меню</a>
							<a href="index.php?type=<?=$this->table_name?>&action=content&id=<?=$f['id']?>" class="btn btn-success">Добавить страницы</a>
							<a href="index.php?type=<?=$this->table_name?>&action=del&id=<?=$f['id']?>"  onclick="return confirm('Уверены?') ? true : false;" class="btn btn-danger">Удалить меню</a>
						</p>
					</div>
				</div>
			</div>
<?php
		}
		echo "<div>";
	}
}



class AddPagesIntoMenu{
	private $db;
	private $table_name;
	public $id;
	public $page_id;
	public $read_db;
	public $while_array;
	public $while_array2;
	
	function __construct($db, $table_name, $id){
		$this->db = $db;
		$this->table_name = $table_name;
		$this->id = $id;
	}
	function DrawEditPageForm()	{		?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form method="POST" role="form">
		<table class="table table-hover">
			<tbody>
				<tr>
					<td>
						<label for=""><small>Номер<br> сортировки</small></label>
						<input type="number" class="form-control" name="sort" value="<?=$this->while_array['sort']?>">
					</td>
					<td>
						<label for=""><small>Выберите <br> страницу</small></label>
						<select name="page_id" id="input" class="form-control" required="required">
								<option value="">Выберите страницу</option>
								<?php
								$r = mysqli_query($this->db, "SELECT id, name FROM pages WHERE language_id = '1' AND parent = '0' ORDER BY name");
								while ($f = mysqli_fetch_assoc($r)) {
									$pages[$f['id']] = $f;
									$p_id = $f['id'];
									$r1 = mysqli_query($this->db, "SELECT id, name FROM pages WHERE language_id = '1' AND parent = '$p_id' ORDER BY name");
									while ($f1 = mysqli_fetch_assoc($r1)) {
										$pages[$f['id']]['sons'][$f1['id']] = $f1;
									}
								}
								foreach ($pages as $p) {
									echo "<option value='{$p['id']}'"; 
									if ($p['id'] == $this->while_array['page_id']) {
										echo "selected";
									}
									echo ">{$p['name']}</option>";
									if ($p['sons']) {
										foreach ($p['sons'] as $p2) {
											echo "<option value='{$p2['id']}'"; 
											if ($p2['id'] == $this->while_array['page_id']) {
												echo "selected";
											}
											echo ">{$p['name']} --> {$p2['name']}</option>";
										}
									}
								}
								?>
								<option <?php if($this->while_array['page_id'] == 'all') echo "selected"; ?>  value="all"><strong>Отображать всегда</strong></option>
						</select>	
					</td>
					<td>							
						<label for=""><small>Выберите<br> родителя</small></label>
						<select name="parent" id="input" class="form-control" required="required">
								<option value="0">Выберите родителя</option>
								<?php
								$r = mysqli_query($this->db, "SELECT i.page_id, p.id, p.name FROM menus_items AS i, pages AS p WHERE i.page_id = p.id AND i.parent = '0'");
								while ($f = mysqli_fetch_assoc($r)) {
									echo "<option value='{$f['id']}'"; 
									echo ">{$f['name']}</option>";
								}
								?>
						</select>	
					</td>
					<td>
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true" title="Редактировать"></span></button>
						<a href="index.php?type=<?=$this->table_name?>&action=content-del&id=<?=$this->id?>&page_id=<?=$this->while_array['id']?>"  onclick="return confirm('Уверены?') ? true : false;" class="btn btn-danger" <?php if (empty($this->while_array)) echo "disabled";?>><span class="glyphicon glyphicon-remove" aria-hidden="true" title="Удалить"></span></a>
					</td>
				</tr>
			</tbody>
		</table>		
		</form>		
	</div>
<?php
	if ($this->while_array != '') {
		$parent_id = $this->while_array['page_id'];
		$r1 = mysqli_query($this->db, "SELECT i.page_id, i.id, p.name, i.sort, i.parent FROM menus_items AS i, pages AS p WHERE i.page_id = p.id AND i.menu_id = '$this->id' AND i.parent = '$parent_id' ORDER BY i.sort");
		while ($this->while_array2 = mysqli_fetch_assoc($r1)) { ?>
		<div class="col-xs-offset-1 col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<form method="POST" role="form">
			<table class="table table-hover">
				<tbody>
					<tr>
						<td>
							<label for=""><small>Номер сортировки</small></label>
							<input type="number" class="form-control" name="sort" value="<?=$this->while_array2['sort']?>">
						</td>
						<td>
							<label for=""><small>Выберите страницу</small></label>
							<select name="page_id" id="input" class="form-control" required="required">
									<option value="">Выберите страницу</option>
									<?php
									$r = mysqli_query($this->db, "SELECT id, name FROM pages WHERE language_id = '1' ORDER BY name");
									while ($f = mysqli_fetch_assoc($r)) {
										echo "<option value='{$f['id']}'"; 
										if ($f['id'] == $this->while_array2['page_id']) {
											echo "selected";
										}
										echo ">{$f['name']}</option>";
									}
									?>
							</select>	
						</td>
						<td>							
							<label for=""><small>Выберите родителя</small></label>
							<select name="parent" id="input" class="form-control" required="required">
									<option value="0">Выберите родителя</option>
									<?php
									$r = mysqli_query($this->db, "SELECT i.page_id, p.id, p.name FROM menus_items AS i, pages AS p WHERE i.page_id = p.id AND i.parent = '0'");
									while ($f = mysqli_fetch_assoc($r)) {
										echo "<option value='{$f['id']}'"; 
										if ($f['id'] == $this->while_array2['parent']) {
											echo " selected ";
										}
										echo ">{$f['name']}</option>";
									}
									?>
							</select>	
						</td>
						<td>
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true" title="Редактировать"></span></button>
							<a href="index.php?type=<?=$this->table_name?>&action=content-del&id=<?=$this->id?>&page_id=<?=$this->while_array2['id']?>"  onclick="return confirm('Уверены?') ? true : false;" class="btn btn-danger" <?php if (empty($this->while_array2)) echo "disabled";?>><span class="glyphicon glyphicon-remove" aria-hidden="true" title="Удалить"></span></a>
						</td>
					</tr>
				</tbody>
			</table>		
			</form>		
		</div>
		<?php
			}
		}
		?>
<?php
	}
	function DrawPages(){
		$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE id = '$this->id'");
		$f = mysqli_fetch_assoc($r);
		echo "
			<div class='page-header'>
			  <h3>{$f['name']} - <small>добавление/удаление страниц</small></h3>
			</div>";
		$r = mysqli_query($this->db, "SELECT i.page_id, i.id, p.name, i.sort FROM menus_items AS i, pages AS p WHERE i.page_id = p.id AND i.menu_id = '$this->id' AND i.parent = '0' ORDER BY i.sort");
		while ($this->while_array = mysqli_fetch_assoc($r)) {
			$this->DrawEditPageForm();
		}
		echo "
			<div class='page-header'>
			  <h3><small>Добавить новую страницу</small></h3>
			</div>";
		$this->while_array = '';
		$this->DrawEditPageForm();
		if (isset($_POST['page_id'])) {
			$page_id = $_POST['page_id'];
			$r = mysqli_query($this->db, "SELECT * FROM menus_items WHERE menu_id = '$this->id' AND page_id = '$page_id'");
			$f = mysqli_fetch_assoc($r);
			if ($f) {
				foreach ($_POST as $key => $value) {
					$connect .= addslashes(htmlspecialchars($key)) . " = '" . addslashes(htmlspecialchars($value)) . "', ";

				}
				$connect = substr($connect, 0,-2);
				mysqli_query($this->db, "UPDATE menus_items SET $connect WHERE menu_id = '$this->id' AND page_id = '$page_id'");
				exit("<meta http-equiv='refresh' content='0; url= $_SERVER[REQUEST_URI]'>");
			}else{
				foreach ($_POST as $key => $value) {
					$connect .= addslashes(htmlspecialchars($key)) . " = '" . addslashes(htmlspecialchars($value)) . "', ";

				}
				$connect .= "menu_id = '" . $this->id . "' ";
				mysqli_query($this->db, "INSERT INTO menus_items SET $connect");
				exit("<meta http-equiv='refresh' content='0; url= $_SERVER[REQUEST_URI]'>");

			}
		}
	}
	function PageDelete($page_id){
		$page_id = $page_id;
		$r = mysqli_query($this->db, "DELETE FROM menus_items WHERE menu_id = '$this->id' AND id = '$page_id'");
		exit("<meta http-equiv='refresh' content='0; url= index.php?type=menus&action=content&id={$this->id}'>");
	}
}
/**
* Удаление
*/
class MenuDel{
	private $db;
	private $table_name;
	private $id;
	
	function __construct($db, $table_name, $id){
		$this->db = $db;
		$this->table_name = $table_name;
		$this->id = $id;
			mysqli_query($this->db, "DELETE FROM $this->table_name WHERE id = '$this->id' ");
			exit("<meta http-equiv='refresh' content='0; url= index.php?type={$this->table_name}&action=edit'>");
	}
}
?>