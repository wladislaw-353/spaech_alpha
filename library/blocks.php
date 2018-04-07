<?php
function short($string, $q){
    $string = strip_tags($string);
    if (strlen($string) > $q) {
	    $string = substr($string, 0, $q);
	    $string = rtrim($string, "!,.-");
	    $string = substr($string, 0, strrpos($string, ' '));
	    echo $string."… ";
    }else{
    	echo $string;
    }
}

function drawBlock($position){
	global $db;
	global $myBase;
	global $root;
	global $type;
	global $id;
	global $language_array;
	//echo '<h1>text1</h1>';
	//echo $id;
	//print_r($db);
	//echo "<br>{$db}<br>";
	$r = mysqli_query($db, "SELECT * FROM pages_wrap WHERE page_id = '$id' AND position = '$position' OR page_id = 'all' AND position = '$position' ORDER BY sort");
	while ($f = mysqli_fetch_assoc($r)) {
		$block_id = $f['block_id'];
		$fpage_id = $f['page_id'];
		if($position == 100){ $type = 'pages'; }
		if ($type == 'pages' || $fpage_id == 'all') {
			include 'library/'.$f['table_name'].'.php';
		}
		unset($f);
	}
}
?>