<?php
class Del{
	
	function __construct($db, $table_name, $parent = 0, $block_id){
		$this->db = $db;
		$this->table_name = $table_name;
		$this->parent = $parent;
		$this->block_id = $block_id;
		$query = "SELECT name, id FROM $this->table_name WHERE language_id = '1'";
		if ($this->parent) {
			$query .= " AND parent = '0'";
		}
		if ($this->block_id) {
			if ($this->parent) {
				$query .= " AND block_id = '$this->block_id'";
			}else{
				$query .= " AND block_id = '$this->block_id'";
			}
		}
		$query .= " ORDER BY name ASC";
		$r = mysqli_query($this->db, $query);
			echo '<form method="POST" role="form">';
		echo '<ul class="nav nav-pills nav-stacked">';
		while($f = mysqli_fetch_assoc($r)){
			$id = $f['id'];
			echo "<li><a><label><input name='del_id[]' type='checkbox' value='{$id}'> {$f['name']}</label></a></li>";
			if ($this->parent) {
				$r1 = mysqli_query($this->db, "SELECT name, id FROM $this->table_name WHERE language_id = '1' AND parent = '$id'");
				if (mysqli_num_rows($r1)) {
					while ($f1 = mysqli_fetch_assoc($r1)) {
						echo "<li><a><label><input name='del_id[]' type='checkbox' value='{$f1['id']}'>&nbsp;&nbsp;----->&nbsp;{$f1['name']}</label></a></li>";
					}
				}
			}
		}
?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<button type="submit" name="submit" onclick="return confirm('Уверены?') ? true : false;" class="btn btn-primary">Удалить</button>			
		</div>
		<?php
		echo "</ul>";
		echo "</ul>";
		if (isset($_POST['del_id'])) {
			foreach ($_POST['del_id'] as $key => $value) {
				if ($value == '1' && $this->table_name == 'pages') {
					echo "
						<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<strong>!</strong> Ошибка, главную страницу невозможно удалить.
						</div>";
						continue;
				}
				$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE id = '$value'");
				if (mysqli_num_rows($r)) {
					$f = mysqli_fetch_assoc($r);
					$alias = $f['alias'];
					mysqli_query($this->db, "DELETE FROM $this->table_name WHERE alias = '$alias'");
				}
				mysqli_query($this->db, "DELETE FROM $this->table_name WHERE id = '$value' ");

			}
			exit("<meta http-equiv='refresh' content='1; url= $_SERVER[REQUEST_URI]'>");
		}
	}
}

