<?php
/**
* Редактирование форм
*/
class Edit{
	public $table_name;
	public $db;
	public $parent;
	public $block_id;
	public $link;
	
	function __construct($db, $table_name, $parent = 0, $block_id = 0, $status = ''){
		$this->db = $db;
		$this->table_name = $table_name;
		$this->parent = $parent;
		$this->block_id = $block_id;
		$this->status = $status;
		if ($this->block_id) {
			$this->link = "index.php?type=" . $this->table_name . "_blocks&action=items&block_id=" . $this->block_id . "&item=";
		}else{
			$this->link = "index.php?type=" . $this->table_name . "&action=";
		}
		?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
				<a class="btn btn-primary" href="<?=$this->link?>add" role="button">Добавить</a>
				<a class="btn btn-danger" href="<?=$this->link?>del" role="button">Удалить</a>
				<a class="btn btn-warning" data-toggle="modal" href='#modal-id'>Фильтр</a>
				<div class="modal fade" id="modal-id">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title text-center">Фильтр</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<form action="" method="POST" role="form">
											<br>			
											<div class="form-group">
												<select name="sort_type" id="input" class="form-control" required="required">
													<option <?php if($_POST['sort_type'] == '1'){ echo " selected";}?> value="1">Выберите тип сортировки</option>
													<option <?php if($_POST['sort_type'] == 'date_asc'){ echo " selected";}?> value="date_asc">По дате (по возврастающей)</option>
													<option <?php if($_POST['sort_type'] == 'date_desc'){ echo " selected";}?> value="date_desc">По дате (по убывающей)</option>
													<option <?php if($_POST['sort_type'] == 'sort_asc'){ echo " selected";}?> value="sort_asc">По номеру сортировки (по возврастающей)</option>
													<option <?php if($_POST['sort_type'] == 'sort_desc'){ echo " selected";}?> value="sort_desc">По номеру сортировки (по убывающей)</option>
													<option <?php if($_POST['sort_type'] == 'name_asc'){ echo " selected";}?> value="name_asc">По имени (А-Я)</option>
													<option <?php if($_POST['sort_type'] == 'name_desc'){ echo " selected";}?> value="name_desc">По имени (Я-А)</option>
												</select>
											</div>
											<p class="text-left">
												<button type="submit" class="btn btn-primary">Сортировать</button>
											</p>
										</form>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
		$query = "SELECT * FROM $this->table_name WHERE language_id = '1'";

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
		if ($this->status != '') {
			$query .= " AND status = '$this->status'";
		}
		switch ($_POST['sort_type']) {
			case 'date_asc':
				$query .= " ORDER BY date_add ASC";
				break;
			case 'date_desc':
				$query .= " ORDER BY date_add DESC";
				break;
			case 'sort_asc':
				$query .= " ORDER BY sort ASC";
				break;
			case 'sort_desc':
				$query .= " ORDER BY sort DESC";
				break;
			case 'name_asc':
				$query .= " ORDER BY name ASC";
				break;
			case 'name_desc':
				$query .= " ORDER BY name DESC";
				break;
			
			default:
				$query .= " ORDER BY date_add DESC";
				break;
		}
		$r = mysqli_query($this->db, $query);
		while($f = mysqli_fetch_assoc($r)){
			$items[$f['id']] = $f;
			$item_id = $f['id'];
			if ($this->parent) {
				$r1 = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE parent = '$item_id' ORDER BY sort, name ASC");
				while ($f1 = mysqli_fetch_assoc($r1)) {
					if ($f1) {
						$items[$f['id']]['sons'][$f1['id']] = $f1;
					}
				}
			}
		}?>
	<table class="table table-hover">
		<?php
		$i = 1;
		foreach ($items as $value) {
			if ($i == 1) {?>

			<thead>
				<tr>
					<?php
					if (isset($value['group_id'])) {
						echo "<th>id</th>";
					}else{
						echo "<th>№</th>";
					}
					if (isset($value['sort'])) {
						echo "<th>Сортировка</th>";
					}
					if (isset($value['name'])) {
						echo "<th>Название</th>";
					}
					if (isset($value['original_number'])) {
						echo "<th>Original №</th>";
					}
					if (isset($value['license_number'])) {
						echo "<th>License №</th>";
					}
					if (isset($value['date_add'])) {
						echo "<th>Дата</th>";
					}
					if (isset($value['status'])) {
						echo "<th>Статус</th>";
					}
					?>
					<th class="text-right">Редактировать</th>
				</tr>
			</thead>
			<tbody>
			<?php
			}
			?>
			<tr>
				<?php
					if (isset($value['group_id'])) {
						echo "<td>{$value['group_id']}</td>";
					}else{
						echo "<td>{$value['id']}</td>";
					}
					if (isset($value['sort'])) {
						echo "<td>{$value['sort']}</td>";
					}
					if (isset($value['name'])) {
						echo "<td>{$value['name']}</td>";
					}
					if (isset($value['original_number'])) {
						echo "<td>{$value['original_number']}</td>";
					}
					if (isset($value['license_number'])) {
						echo "<td>{$value['license_number']}</td>";
					}
					if (isset($value['date_add'])) {
						echo "<td>{$value['date_add']}</td>";
					}
					if (isset($value['status'])) {
						echo "<td>{$value['status']}</td>";
					}
				?>
				<td class="text-right"><a href='<?=$this->link?>edit&id=<?=$value['id']?>' type="button" class="btn btn-primary">Редактировать</a></td>
				
			</tr>
			<?php
			if ($value['sons']) {
				$sons = $value['sons'];
				foreach ($sons as $value2) {
					echo "<tr>";
					if (isset($value['group_id'])) {
						echo "<td>{$value2['group_id']}</td>";
					}else{
						echo "<td>{$value2['id']}</td>";
					}
					if (isset($value['sort'])) {
						echo "<td>{$value2['sort']}</td>";
					}
					if (isset($value['name'])) {
						echo "<td>{$value['name']}&nbsp;-->&nbsp;{$value2['name']}</td>";
					}
					if (isset($value['original_number'])) {
						echo "<td>{$value2['original_number']}</td>";
					}
					if (isset($value['license_number'])) {
						echo "<td>{$value2['license_number']}</td>";
					}
					if (isset($value['date_add'])) {
						echo "<td>{$value2['date_add']}</td>";
					}
					if (isset($value['status'])) {
						echo "<td>{$value2['status']}</td>";
					}
					echo "<td class='text-right'><a href='{$this->link}edit&id={$value2['id']}' type='button' class='btn btn-primary'>Редактировать</a></td>";
					echo "</tr>";

					$r = mysqli_query($this->db, "SELECT * FROM $this->table_name WHERE parent = '".$value2['group_id']."' AND language_id = '1' ORDER BY sort, name");
					if (mysqli_num_rows($r)) {
						while ($f = mysqli_fetch_assoc($r)) {
							echo "<tr>";
							if (isset($value['group_id'])) {
								echo "<td>{$f['group_id']}</td>";
							}else{
								echo "<td>{$value2['id']}</td>";
							}
							if (isset($value['sort'])) {
								echo "<td>{$f['sort']}</td>";
							}
							if (isset($value['name'])) {
								echo "<td>{$value['name']}&nbsp;-->&nbsp;{$value2['name']}&nbsp;-->&nbsp;{$f['name']}</td>";
							}
							if (isset($value['original_number'])) {
								echo "<td>{$f['original_number']}</td>";
							}
							if (isset($value['license_number'])) {
								echo "<td>{$f['license_number']}</td>";
							}
							if (isset($value['date_add'])) {
								echo "<td>{$f['date_add']}</td>";
							}
							if (isset($value['status'])) {
								echo "<td>{$f['status']}</td>";
							}
							echo "<td class='text-right'><a href='{$this->link}edit&id={$f['id']}' type='button' class='btn btn-primary'>Редактировать</a></td>";
							echo "</tr>";

						}
					}
				}
			}
			$i++;
		}?>
		</tbody>
	</table>
	<?php
	}
}
?>
