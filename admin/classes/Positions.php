<?php 
class Positions{
	private $db;
	public $id;
	public $page_id;
	public $read_db;
	public $while_array;
	
	function __construct($db, $table_name, $id){
		$this->db = $db;
		$this->table_name = $table_name;
		$this->id = $id;
		$this->DrawPages();
	}
	function DrawPositionsForm()	{ ?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form method="post" role="form">
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
								$r = mysqli_query($this->db, "SELECT id, group_id, name FROM pages WHERE language_id = '1' AND parent = '0' ORDER BY name");
								while ($f = mysqli_fetch_assoc($r)) {
									$pages[$f['id']] = $f;
									$p_id = $f['id'];
									$r1 = mysqli_query($this->db, "SELECT id, group_id, name FROM pages WHERE language_id = '1' AND parent = '$p_id' ORDER BY name");
									while ($f1 = mysqli_fetch_assoc($r1)) {
										$pages[$f['group_id']]['sons'][$f1['group_id']] = $f1;
									}
								}
								foreach ($pages as $p) {
									echo "<option value='{$p['group_id']}'"; 
									if ($p['group_id'] == $this->while_array['page_id']) {
										echo "selected";
									}
									echo ">{$p['name']}</option>";
									if ($p['sons']) {
										foreach ($p['sons'] as $p2) {
											echo "<option value='{$p2['group_id']}'"; 
											if ($p2['group_id'] == $this->while_array['page_id']) {
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
						<label for=""><small>Выберите<br> позицию</small></label>
						<select name="position" id="input" class="form-control" required="required">
								<option value="">Выберите позицию</option>
								<?php
								$r = mysqli_query($this->db, "SELECT * FROM positions");
								while ($f = mysqli_fetch_assoc($r)) {
									echo "<option value='{$f['id']}'"; 
									if ($f['id'] == $this->while_array['position']) {
										echo "selected";
									}
									echo ">{$f['name']}</option>";
								}
								?>
						</select>	
					</td>
					<td>
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true" title="Редактировать"></span></button>
						<a href="index.php?type=<?=$this->table_name?>&action=position-del&id=<?=$this->id?>&page_id=<?=$this->while_array['id']?>"  onclick="return confirm('Уверены?') ? true : false;" class="btn btn-danger" <?php if (empty($this->while_array)) echo "disabled";?>><span class="glyphicon glyphicon-remove" aria-hidden="true" title="Удалить"></span></a>
					</td>
				</tr>
			</tbody>
		</table>		
		</form>		
	</div>
<?php
	}
	function DrawPages(){
		$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE id = '$this->id'");
		$f = mysqli_fetch_assoc($r);
		echo "
			<div class='page-header'>
			  <h3><small>Добавление/удаление позиций</small></h3>
			</div>";
		$r = mysqli_query($this->db, "SELECT w.page_id, w.id, p.name, w.position, w.sort 
			FROM pages_wrap AS w, pages AS p 
			WHERE w.block_id = '$this->id' AND  w.page_id = p.id  AND w.table_name = '$this->table_name' 
			OR  w.block_id = '$this->id' AND  w.page_id = 'all' AND w.table_name = '$this->table_name' ORDER BY w.sort");
		$all = false;
		while ($this->while_array = mysqli_fetch_assoc($r)) {
			if ($this->while_array['page_id'] == 'all') {
				if (!$all) {
					$all = $this->while_array['page_id'];
				}else{
					continue;
				}
			}
			$this->DrawPositionsForm();
		}
		echo "
			<div class='page-header'>
			  <h3><small>Добавить новую страницу</small></h3>
			</div>";
		$this->while_array = '';
		$this->DrawPositionsForm();
		if (isset($_POST['page_id'])) {
			$page_id = $_POST['page_id'];
			$r = mysqli_query($this->db, "SELECT * FROM pages_wrap WHERE page_id = '$page_id' AND block_id = '$this->id' AND table_name = '$this->table_name'");
			$f = mysqli_fetch_assoc($r);
			if ($f) {
				foreach ($_POST as $key => $value) {
					$connect .= $key . " = '" . $value . "', ";
				}
				$connect .= "table_name = '$this->table_name', block_id = '$this->id' ";
				//echo $connect;
				mysqli_query($this->db, "UPDATE pages_wrap SET $connect WHERE  page_id = '$page_id' AND block_id = '$this->id' AND table_name = '$this->table_name'");
				exit("<meta http-equiv='refresh' content='0; url= $_SERVER[REQUEST_URI]'>");
			}else{
				foreach ($_POST as $key => $value) {
					$connect .= $key . " = '" . $value . "', ";

				}
				$connect .= "table_name = '$this->table_name', block_id = '$this->id' ";
				mysqli_query($this->db, "INSERT INTO pages_wrap SET $connect");
				exit("<meta http-equiv='refresh' content='0; url= $_SERVER[REQUEST_URI]'>");

			}
		}
	}
	function PageDelete($page_id){
		$this->page_id = $page_id;
		$r = mysqli_query($this->db, "DELETE FROM pages_wrap WHERE block_id = '$this->id' AND id = '$this->page_id'");
		exit("<meta http-equiv='refresh' content='0; url= index.php?type={$this->table_name}&action=position&id={$this->id}'>");
	}
}


?>