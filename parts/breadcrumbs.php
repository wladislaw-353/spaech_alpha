<?php
if (!$main_page) {
	echo '<ol class="breadcrumb"><div class="container">';
	echo "
	<li>
		<a href='" . $root . "'>Главная</a>
	</li>";
	if($myBase['parent']){
		$parent = $myBase['parent'];
		$r = mysqli_query($db, "SELECT * FROM $type WHERE group_id = '$parent' AND language_id = '".$_SESSION['lang']."'");
		$f = mysqli_fetch_assoc($r);
		echo "
		<li>
			<a href='" . $root . $type . "/" . $f['alias'] . "'>{$f['name']}</a>
		</li>";
	}
	if ($type == 'posts') {
		$posts_block_id = $myBase['posts_block_id'];
		$r = mysqli_query($db, "SELECT * FROM pages_wrap WHERE table_name = 'posts_blocks' AND block_id = '$posts_block_id'");
		if (mysqli_num_rows($r)) {
			$f = mysqli_fetch_assoc($r);
			$block_page_id = $f['page_id'];
			$r1 = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '$block_page_id' AND language_id = '".$_SESSION['lang']."'");
			$f1 = mysqli_fetch_assoc($r1);
			echo "
			<li>
				<a href='" . $root . "pages/" . $f1['alias'] . "'>{$f1['name']}</a>
			</li>";
			if ($f1['parent']) {
				$parent = $f1['parent'];
				$r2 = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '$parent' AND language_id = '".$_SESSION['lang']."'");
				$f2 = mysqli_fetch_assoc($r2);
				echo "
				<li>
					<a href='" . $root . "pages/" . $f2['alias'] . "'>{$f2['name']}</a>
				</li>";
			}
		}
	}
	if ($type == 'categories') {
		$r = mysqli_query($db, "SELECT * FROM pages_wrap WHERE table_name = 'categories' AND block_id = '".$myBase['group_id']."'");
		$f = mysqli_fetch_assoc($r);
		$r = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '".$f['page_id']."' AND language_id = '".$_SESSION['lang']."'");
		$f = mysqli_fetch_assoc($r);
		$link[] = "
		<li>
			<a href='" . $root . "pages/" . $f['alias'] . "'>{$f['name']}</a>
		</li>";
		if ($f['parent']) {
			$r = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '".$f['parent']."' AND language_id = '".$_SESSION['lang']."'");
			$f = mysqli_fetch_assoc($r);
			$link[] = "
			<li>
				<a href='" . $root . "pages/" . $f['alias'] . "'>{$f['name']}</a>
			</li>";
		}
		$link = array_reverse($link);
		foreach ($link as $l) {
			echo $l;
		}

	}
	if ($type == 'products') {
		$r = mysqli_query($db, "SELECT * FROM categories WHERE group_id = '".$myBase['category']."' AND language_id = '".$_SESSION['lang']."'");
		$f = mysqli_fetch_assoc($r);
		$link[] = "
		<li>
			<a href='" . $root . "categories/" . $f['alias'] . "'>{$f['name']}</a>
		</li>";
		$r = mysqli_query($db, "SELECT * FROM pages_wrap WHERE table_name = 'categories' AND block_id = '".$f['group_id']."'");
		$f = mysqli_fetch_assoc($r);
		$r = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '".$f['page_id']."' AND language_id = '".$_SESSION['lang']."'");
		$f = mysqli_fetch_assoc($r);
		$link[] = "
		<li>
			<a href='" . $root . "pages/" . $f['alias'] . "'>{$f['name']}</a>
		</li>";
		if ($f['parent']) {
			$r = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '".$f['parent']."' AND language_id = '".$_SESSION['lang']."'");
			$f = mysqli_fetch_assoc($r);
			$link[] = "
			<li>
				<a href='" . $root . "pages/" . $f['alias'] . "'>{$f['name']}</a>
			</li>";
		}
		$link = array_reverse($link);
		foreach ($link as $l) {
			echo $l;
		}
	}
	if ($type == 'spares') {
		$r = mysqli_query($db, "SELECT * FROM products WHERE group_id = '".$myBase['product']."' AND language_id = '".$_SESSION['lang']."'");
		$f = mysqli_fetch_assoc($r);
		$link[] = "
		<li>
			<a href='" . $root . "products/" . $f['alias'] . "'>{$f['name']}</a>
		</li>";
		$r = mysqli_query($db, "SELECT * FROM categories WHERE group_id = '".$f['category']."' AND language_id = '".$_SESSION['lang']."'");
		$f = mysqli_fetch_assoc($r);
		$link[] = "
		<li>
			<a href='" . $root . "categories/" . $f['alias'] . "'>{$f['name']}</a>
		</li>";
		$r = mysqli_query($db, "SELECT * FROM pages_wrap WHERE table_name = 'categories' AND block_id = '".$f['group_id']."'");
		$f = mysqli_fetch_assoc($r);
		$r = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '".$f['page_id']."' AND language_id = '".$_SESSION['lang']."'");
		$f = mysqli_fetch_assoc($r);
		$link[] = "
		<li>
			<a href='" . $root . "pages/" . $f['alias'] . "'>{$f['name']}</a>
		</li>";
		if ($f['parent']) {
			$r = mysqli_query($db, "SELECT * FROM pages WHERE group_id = '".$f['parent']."' AND language_id = '".$_SESSION['lang']."'");
			$f = mysqli_fetch_assoc($r);
			$link[] = "
			<li>
				<a href='" . $root . "pages/" . $f['alias'] . "'>{$f['name']}</a>
			</li>";
		}
		$link = array_reverse($link);
		foreach ($link as $l) {
			echo $l;
		}
	}
		echo "
		<li>
			{$myBase['name']}
		</li>";
	echo "</div></ol>";
}
?>