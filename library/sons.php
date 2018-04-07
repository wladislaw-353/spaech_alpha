<?php
$r = mysqli_query($db, "SELECT * FROM $type WHERE parent = '$id' ORDER BY sort");
while ($f = mysqli_fetch_assoc($r)) {
	$sons[] = $f;
}
if ($sons) { 
	echo "<div class='container text-center our-doctors'";
	echo "<div class='row'>";
	foreach ($sons as $s) {
		if ($myBase['is_text_prewie'] && $myBase['is_image_prewie']) {?>
			<div class="col-md-5 col-md-offset-1 col_links ">
				<article class="post if1" tabindex="0">
					<a href="<?=ROOT?>pages/<?=$s['alias']?>"><div class="post-img" style="background: url(<?=ROOT?>img/other/<?=$s['photo']?>) 50% 50%/cover no-repeat;"></div></a>
					
					<div class="post-content">
						<h4 class="text-left"><?=$s['name']?></h4>
						<?=short(strip_tags(htmlspecialchars_decode($s['description'])), 300)?><br>
						<a href="<?=ROOT?>pages/<?=$s['alias']?>" class="post-detail">Подробнее&nbsp;<img src="<?=ROOT?>img/back.png"></a>
					</div>
				</article>
			</div>
<?php
		}
		elseif ($myBase['is_text_prewie'] == 1 && !$myBase['is_image_prewie']) {?>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<article class="post if2" tabindex="0">
					<div class="post-content">
						<h4 class="text-left"><?=$s['name']?></h4>
						<?=short(strip_tags(htmlspecialchars_decode($s['description'])), 300)?><br>
						<a href="<?=ROOT?>pages/<?=$s['alias']?>" class="post-detail">Подробнее&nbsp;<img src="<?=ROOT?>img/back.png"></a>
					</div>
				</article>
			</div>
<?php
		}
		elseif (!$myBase['is_text_prewie'] && $myBase['is_image_prewie']) {?>
			
			<!-- <div class="col-md-5 col-md-offset-1 col_links ">
				<article class="post if3" tabindex="0">
					<a href="<?=ROOT?>pages/<?=$s['alias']?>"><div class="post-img" style="background: url(<?=ROOT?>img/other/<?=$s['photo']?>) 50% 50%/cover no-repeat;"></div></a>
					<div class="post-content">
						<h4 class="text-left"><?=$s['name']?></h4>
						<a href="<?=ROOT?>pages/<?=$s['alias']?>" class="post-detail">Подробнее&nbsp;<img src="<?=ROOT?>img/back.png"></a>
					</div>
				</article>
			</div> -->

			<a  href="<?=ROOT?>pages/<?=$s['alias']?>">
				<div class="col-md-4 col-sm-6 veterinar wow fadeIn" data-wow-offset="250" data-wow-delay="0.5">
				<img src="<?=ROOT?>img/other/<?=$s['photo']?>" alt="veterinar">
						<h4 class="open-sans-h4-black-lower"><?=$s['name']?></h4>
						<p class="open-sans-p-black-lower"><?=short(strip_tags(htmlspecialchars_decode($s['description'])), 300)?></p>
				</div>
			</a>
<?php
		}
	}
	echo "</div>";
	echo "</div>";
}
?>