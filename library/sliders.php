<?php
$r1 = mysqli_query($db, "SELECT * FROM sliders_photo WHERE pp_id = '$block_id' ORDER BY sort ASC");
$indicators = '';
$items = '';
for ($i=0; $f1 = mysqli_fetch_assoc($r1) ; $i++) { 
	$indicators .= "<li data-target='#slider_{$f['block_id']}' data-slide-to='{$i}' class='";
	if ($i == '0') {
		$indicators .= " active ";
	}
	$indicators .=  "'></li>";
	$items .= "<div class='item";
	if ($i == '0') {
		$items .= " active ";
	}
	$items .= "'><img src='{$root}img/other/{$f1['src']}'><div class='carousel-caption'><h1>{$f1['photo_name']}</h1><p>{$f1['photo_desc']}</p></div></div>";
}
?>
<section class="baner-wrap container">
		<div id="slider_<?=$block_id?>" class="carousel slide" data-ride="carousel">
		     <ol class="carousel-indicators">
		    	<?=$indicators?>
		    </ol>
		    <div class="carousel-inner">
		    	<?=$items?>
		    </div>
		    <button class="left carousel-control" href="#slider_<?=$block_id?>" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></button>
		    <button class="right carousel-control" href="#slider_<?=$block_id?>" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></button>
		</div>			
</section>
<?php
$items = false;
$indicators = false;
$r1 = false;
$f1 = false;
?>