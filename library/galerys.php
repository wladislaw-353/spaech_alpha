<?php
$r1 = mysqli_query($db, "SELECT * FROM galerys_photo WHERE pp_id = '$block_id' ORDER BY sort ASC");
echo '<ul id="gallery" class="post-group-flex">';
while ($f1 = mysqli_fetch_assoc($r1)) {
	echo '<li class="design">';
	echo "
		<a href='{$root}img/other/{$f1['src']}' data-lightbox='projects' data-title='{$f1['photo_name']}' data-desc='{$f1['photo_desc']}'>
			<div style='background:url({$root}img/other/thumb/{$f1['src']}) no-repeat;  background-size: cover; background-position: 50% 50%; height: 349px;'></div>
		</a>";
	echo "</li>";
}
echo "</ul>";
?>