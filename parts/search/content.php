<div class="container main-container">
	<div class="row box">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content">
			<div class="page-header">
			  <h1 class="text-center">Результаты поиска</h1>
			</div>
			<?php
			if ($_POST['search_field']) {
				$search = $_POST['search_field'];
				$r = mysqli_query($db, "SELECT * FROM pages WHERE name LIKE '%$search%' AND language_id = '".$_SESSION['lang']."' OR full_text LIKE '%$search%' AND language_id = '".$_SESSION['lang']."'");
				while ($f = mysqli_fetch_assoc($r)) {
					echo "<p><a href='{$root}pages/{$f['alias']}'>{$f['name']}</a></p>";
				}
			}
			?>
			</div></div></div>