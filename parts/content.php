<main class="main">
	<div class="main_content">

		<div class=""> <!-- container-fluid -->
			<div class=""> <!-- container -->
				<?php drawBlock(1); ?>
				<?php
				if ($myBase['leftbar'] || $parent) {
					if (!$main_page) {?>

			<!-- <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="page-header">
						<h1 class="text-center"><?=$myBase['name']?></h1>
					</div>
				</div>
			</div> -->
			<?php
		}
		?>
		<div class="container">
			<div class="row box">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content parents">
					<?php
					if ($parent_arr['parent']) {
						echo "<div class='clear'></div>";
						$r = mysqli_query($db, "SELECT * FROM $type WHERE parent = '".$parent_arr['parent']."' AND language_id = '".$_SESSION['lang']."' ORDER BY sort, name");
						while ($f = mysqli_fetch_assoc($r)) {?>
						<div class="parent <?php if($myBase['parent'] == $f['group_id']) echo " active";?>" style="background: url(<?=ROOT?>img/other/<?=$f['photo']?>) no-repeat 50% 50%/cover">
							<a href="<?=ROOT?>pages/<?=$f['alias']?>"><?=$f['name']?></a>
						</div>
						<?php
					}
				}elseif(!$parent_arr['parent'] AND $myBase['parent']){
					echo "<div class='clear'></div>";
					$r = mysqli_query($db, "SELECT * FROM $type WHERE parent = '".$myBase['parent']."' AND language_id = '".$_SESSION['lang']."' ORDER BY sort, name");
					while ($f = mysqli_fetch_assoc($r)) {?>
					<div class="parent <?php if($myBase['group_id'] == $f['group_id']) echo " active";?>" style="background: url(<?=ROOT?>img/other/<?=$f['photo']?>) no-repeat 50% 50%/cover">
						<a href="<?=ROOT?>pages/<?=$f['alias']?>"><?=$f['name']?></a>
					</div>
					<?php
				}
			}
			?>
		</div>
		<?php include 'parts/leftbar.php'; ?>
		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 content">
			<?php drawBlock(2); ?>
			<?php
			if (!$parent) {
				include 'library/sons.php';
			}
			?>
			<?=stripslashes(htmlspecialchars_decode($myBase['full_text']))?>
			<?php drawBlock(3); ?>

		</div>
	</div>
</div>
<?php	}else{
	if (!$main_page) {?>

				<!-- <div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="page-header">
							<h1 class="text-center"><?=$myBase['name']?></h1>
						</div>
					</div>
				</div> -->
				<?php
			}
			?>
		<!-- <div class="">
		<div class="row "> -->
			<div class="content">
				<?php drawBlock(2); ?>
				<?php
				if (!$parent['parent']) {
					include 'library/sons.php';
				}
				?>
				<div class="container">
					<?=stripslashes(htmlspecialchars_decode($myBase['full_text']))?>
				</div>
				<?php drawBlock(3); ?>
				<?php
						$aliasOfPages = "o-nas";  //странца на которой выводится блок с отзывами
						if ($alias == $aliasOfPages){
							echo "<div class='container'>";
							include 'library/rewies.php';
						//include 'library/rewies_carousel_block.php';// вывод карусели! с отзывами
							echo "</div>";
						}
						?>
					</div>
					<?php
					if ($myBase['is_rewies']) {
						//include 'library/rewies.php';
					}
					?>
				</div>

	<?php  	}	?>
</div>
</div>

<?php drawBlock(6); ?> <!-- Низ страницы -->

</main>