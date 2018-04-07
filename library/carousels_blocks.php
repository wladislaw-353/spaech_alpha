<?php
$r1 = mysqli_query($db, "SELECT b.class, b.name AS carousel_header, b.is_header, c.id, c.description, c.link, c.photo
	FROM carousels_blocks AS b, carousels AS c
	WHERE b.id = '$block_id' AND c.block_id =  b.id
	ORDER BY c.sort ASC");

$header = false;
while ($f1 = mysqli_fetch_assoc($r1)) {
	$class = $f1['class'];?>

	<?php if (!$header): ?>
		<script type="text/javascript">
		$(document).ready(function() {
		  $("#<?=$class?>").owlCarousel({
		    navigation: true,
            navigationText: [
            
               "<img class=\"left-control\" src=\"<?=$root?>assets/img/Left-arrow-right-hi.png\">",
               "<img class=\"right-control\" src=\"<?=$root?>assets/img/right-arrow-right-hi.png\">"
            ]
		  });
		});
		</script>

		<?php
		if ($f1['is_header']) {
			echo "<div class='page-header text-center'><h3>{$f1['carousel_header']}</h3></div>";
		}
		$header = true;
		?>
	    <div id="<?=$class?>">
	
	<?php endif ?>
        <div class="item">
            <img src="<?=$root?>img/other/<?=$f1['photo']?>">
        </div>
<?php
}
?>

		</div>