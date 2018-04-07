<?

$file = (isset($_FILES['file']))? $_FILES['file']:"none";
if($file!="none" and $file['errors']==0 and $file['size']>0){
	$path="messanger/img/".basename($file['name']);
	move_uploaded_file($file['tmp_name'], $path);
	
	$f_name = basename($file['name']);
	$f_name.="";
	//unset($_FILES['file']);
	echo $f_name;
	
}
else{
	echo "error";
}

	/*if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
		echo "success!!!";
    }*/

?>