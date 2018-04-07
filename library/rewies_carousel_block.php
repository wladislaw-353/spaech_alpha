<!-- блок отзывов выводимый в карусели -->

<?php 

$aliasOfPages = "uslugi"; //странца на которой выводится карусель с отзывами

if ($alias == $aliasOfPages || true): // "|| true" - временно

?>
		<?//php drawBlock(6); ?>
<div class="">
	<div class="row"><br><br>

		<div id="main_rewies" class="carousel slide" data-ride="carousel">
			<!-- <h3 class="text-center"><a href="/pages/otzyvy" class="text-white">ОТЗЫВЫ</a></h3>
			<br> -->
			<ol class="carousel-indicators">
				<li data-target="#main_rewies" data-slide-to="0" class="active"></li>
				<li data-target="#main_rewies" data-slide-to="1" class=""></li>
				<li data-target="#main_rewies" data-slide-to="2" class=""></li>
				<li data-target="#main_rewies" data-slide-to="3" class=""></li>
				<li data-target="#main_rewies" data-slide-to="4" class=""></li>
				<li data-target="#main_rewies" data-slide-to="5" class=""></li>
			</ol>
			<div class="carousel-inner">

				<?php
				$rewies_quantity = 6;

				$r = mysqli_query($db, "SELECT * FROM rewies WHERE checked='1' ORDER BY date_add DESC LIMIT $rewies_quantity");
				while ($f = mysqli_fetch_assoc($r)) {
					$rewies2[] = $f;
				}

				for ($i = 0; $i < $rewies_quantity; $i++){
					if ($i == 0){$active = "active";}
					else {$active = "";}
				?>
				<?php echo "<div class='item $active'>";?>
					<div class="container">
						<div class="row">
							<div class="col-sm-2">
								<br>
								<?php
								if ($rewies2[$i]['photo']) {
									echo "<div class='hidden-sm' style='background:url(/img/other/{$rewies2[$i]['photo']}) center center no-repeat; width:160px; height:160px; border-radius:100%;margin:0 auto;'></div>";
								}else{
									echo "<div style='background:url(/img/anonim.jpg) 50% 50%/cover no-repeat; width:160px; height:160px; border-radius:100%;margin:0 auto;'></div>";
								}
								?>

							</div>
							<div class="col-md-10 col-sm-12 vertical-padding-3-percent">
								<h5><b><?=$rewies2[$i]['name']?></b></h5>
								<p><?=short($rewies2[$i]['full_text'],300)?></p>
							</div>
						</div>
					</div>
				</div>	
				<?php
				}
				?>

			<!-- <button class="left carousel-control" href="#main_rewies" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></button>
			<button class="right carousel-control" href="#main_rewies" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></button> -->
		</div>
	  </div>
   </div>
</div>
	<?php endif ?>