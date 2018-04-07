<?php
$r1 = mysqli_query($db, "SELECT * FROM htmls WHERE id = '$block_id'");
$f1 = mysqli_fetch_assoc($r1);
echo stripslashes(htmlspecialchars_decode($f1['full_text']));
?>