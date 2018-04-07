<?php
class BlockEdit{
	public $db;
	public $table_name;
	public $items;
	
	function __construct($db, $table_name, $items = 0){
		$this->db = $db;
		$this->table_name = $table_name;
		$this->items = $items;?>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
				<a class="btn btn-primary" href="index.php?type=<?=$this->table_name?>&action=add" role="button">Добавить новый блок</a>			
			</div>
		</div>
		<br>
<?php 
		$r = mysqli_query($this->db, "SELECT name, id FROM $this->table_name WHERE  language_id = '1' ORDER BY  name ASC");
		echo '<div class="row">';
		while($f = mysqli_fetch_assoc($r)){?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="thumbnail">
					<div class="caption">
						<h3><?=$f['name']?></h3>
						<p>
							<a href="index.php?type=<?=$this->table_name?>&action=edit&id=<?=$f['id']?>" class="btn btn-primary">Редактировать блок</a>
							<a href="index.php?type=<?=$this->table_name?>&action=position&id=<?=$f['id']?>" class="btn btn-success">Позиции</a>
							<?php if($this->items){?>
								<a href="index.php?type=<?=$this->table_name?>&action=items&block_id=<?=$f['id']?>&item=edit" class="btn btn-warning">Записи</a>
							<?php } ?>
							<a href="index.php?type=<?=$this->table_name?>&action=del&id=<?=$f['id']?>"  onclick="return confirm('Уверены?') ? true : false;" class="btn btn-danger">Удалить блок</a>
						</p>
					</div>
				</div>
			</div>
<?php
		}
		echo "<div>";
	}
}
?>
