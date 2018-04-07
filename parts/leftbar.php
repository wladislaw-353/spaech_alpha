			<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 leftbar">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php
						if ($parent_arr['parent']) {
							$r = mysqli_query($db, "SELECT * FROM $type WHERE parent = '$parent' AND language_id = '".$_SESSION['lang']."' ORDER BY sort, name");
							echo '<ul class="nav nav-pills nav-stacked leftbar_sons">';
							while ($f = mysqli_fetch_assoc($r)) {
								echo "<li";
								if($alias == $f['alias']) echo " class='active'";
								echo "><a href='{$root}pages/{$f['alias']}'>{$f['name']}</a></li>";
							}
							echo "</ul>";
						}
						elseif ($parent) {
							$r = mysqli_query($db, "SELECT * FROM $type WHERE parent = '".$myBase['group_id']."' AND language_id = '".$_SESSION['lang']."' ORDER BY sort, name");
							echo '<ul class="nav nav-pills nav-stacked leftbar_sons">';
							while ($f = mysqli_fetch_assoc($r)) {
								echo "<li";
								if($alias == $f['alias']) echo " class='active'";
								echo "><a href='{$root}pages/{$f['alias']}'>{$f['name']}</a></li>";
							}
							echo "</ul>";
						}
						?>

						<?php drawBlock(4); ?>	

					</div>
				</div>
			</div>