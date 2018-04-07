<?php
function drawMenu($position){
	global $db;
	global $root;
	$r = mysqli_query($db, "SELECT * FROM menus WHERE position = '$position' AND language_id = '".$_SESSION['lang']."'");
	while ($f = mysqli_fetch_assoc($r)) {
		$menu_id = $f['group_id'];
		$r1 = mysqli_query($db, "SELECT i.page_id, p.id, p.alias, p.name FROM menus_items AS i, pages AS p WHERE i.page_id = p.group_id AND i.parent = '0' AND i.menu_id = '$menu_id' AND p.language_id = '".$_SESSION['lang']."' ORDER BY i.sort");
		while ($f1 = mysqli_fetch_assoc($r1)) {
			$menu[$f1['id']] = $f1;
			$pid = $f1['id'];
			$r2 = mysqli_query($db, "SELECT i.page_id, p.id, p.alias, p.name FROM menus_items AS i, pages AS p WHERE i.page_id = p.id AND i.parent = '$pid' AND i.menu_id = '$menu_id' ORDER BY i.sort");
			if ($r2) {
				while ($f2 = mysqli_fetch_assoc($r2)) {
					$menu[$f1['id']]['sons'][$f2['id']] = $f2;
				}
			}
		}
		switch ($f['type']) {
			case 'horizontal':
		?>
			
							<?php
							foreach ($menu as $f) {
								if ($f['sons']) {
									echo "<li class='dropdown'><a href='#";
									echo "' class='dropdown-toggle' data-toggle='dropdown'>{$f['name']} <b class='caret'></b></a>
											<ul class='dropdown-menu'>";
									foreach ($f['sons'] as $f2) {
										echo "<li><a href='";
											if ($f['id'] == '1') {
												echo $root;
											}else{
												echo "
												{$root}pages/{$f2['alias']}";
											}
										echo "' >{$f2['name']}</a></li>";
									}
									echo "</ul></li>";
								}else{
									echo "<li  class=''>";
									echo "<a href='";
										if ($f['id'] == '1') {
											echo $root;
										}else{
											echo "
											{$root}pages/{$f['alias']}";
										}
									echo "' >{$f['name']}</a></li>";
								}
							}
							?>
						
<?php
			break;
			
			case 'vertical':?>

				<div class="<?=$f['class']?>">  <!-- panel panel-default  -->
					<?php if ($f['is_header']): ?>
					  <div class="panel-heading">
							<h3 class="panel-title text-center"><?=$f['name']?></h3>
					  </div>					
					<?php endif ?>
					
						
							<?php
							foreach ($menu as $f) {
								if ($f['sons']) {
									echo "<li><a  href='{$root}pages/{$f['alias']}'>{$f['name']}</a></li>
											<ul class='menu-sons'>";
									foreach ($f['sons'] as $f2) {
										echo "<li><a href='";
												if ($f2['id'] == '1') {
													echo $root;
												}else{
													echo "{$root}pages/{$f2['alias']}";
												}
											echo "'>{$f2['name']}</a></li>";
									}
									echo "</ul>";
								}else{
									echo "<li><a href='";
												if ($f['id'] == '1') {
													echo $root;
												}else{
													echo "{$root}pages/{$f['alias']}";
												}
											echo "'>{$f['name']}</a></li>";
								}
							}
							?>
						
					
				</div>
<?php
				break;
		}
	}
}
?>