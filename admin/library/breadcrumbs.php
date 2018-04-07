<ol class="breadcrumb">
	<?php if (!$nav1_name) {
		echo "<li class='active'>Главная</li>";
	}else{ 
		echo "<li>";
		echo "<a href='" . $root . "admin/'>Главная</a>";
		echo "</li>";
		if (!$id & !$item) {
			echo "<li class='active'>$nav1_name</li>";
		}
		if ($id) {
			if (!$item) {
				echo "<li>";
				echo "<a href='index.php?type=$nav1_tn&action=edit'>$nav1_name</a>";
				echo "</li>";
				$r = mysqli_query($db, "SELECT name FROM $nav1_tn WHERE id = '$id'");
				$f = mysqli_fetch_assoc($r);
				echo "<li class='active'>{$f['name']}</li>";
			}

		}
		if ($item) {
			if (!$id) {
				echo "<li>";
				echo "<a href='index.php?type=$nav1_tn&action=edit'>$nav1_name</a>";
				echo "</li>";
				$r = mysqli_query($db, "SELECT * FROM  $nav1_tn WHERE id = '$block_id'");
					$f = mysqli_fetch_assoc($r);
				echo "<li class='active'>{$f['name']}</li>";
			}else{
				echo "<li>";
				echo "<a href='index.php?type=$nav1_tn&action=edit'>$nav1_name</a>";
				echo "</li>";
				$r = mysqli_query($db, "SELECT * FROM  $nav1_tn WHERE id = '$block_id'");
					$f = mysqli_fetch_assoc($r);
				echo "<li>";
				echo "<a href='index.php?type=$nav1_tn&action=items&block_id=$block_id&item=edit'>{$f['name']}</a>";
				echo "</li>";
				echo "<li class='active'>Редактирование записи</li>";
			}
		}
	} 
	?>
</ol>